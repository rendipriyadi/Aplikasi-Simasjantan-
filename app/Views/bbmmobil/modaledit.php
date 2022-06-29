<!-- Modal -->
<div class="modal fade" id="modaleditbbm" tabindex="-1" aria-labelledby="modaleditbbmLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data Pengisian BBM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('bbmMobil/updatedata', ['class' => 'formupdate']) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
        <input type="hidden" name="id" id="id" value="<?= $id ?>">
        <div class="form-group row">
            <label for="" class="col-sm-4 col-form-label">Tanggal Pengisian :</label>
            <div class="col-sm-8">
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal ?>">
                <div class="invalid-feedback errorTanggal" style="display: none;"></div>
            </div>
        </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jenis Mobil :</label>
        <div class="col-sm-8">
            <select name="mobil" id="mobil" class="form-control" style="font-size: 13px;">
                <?php foreach($datamobil as $row) : ?>
                `   <?php if($row['id_mobil'] == $mobil) : ?> 
                        <option selected value="<?= $row['id_mobil'] ?>"><?= $row['kode_mobil'] ?> <?= $row['nama_mobil'] ?></option>    
                    <?php else: ?>
                        <option value="<?= $row['id_mobil'] ?>"><?= $row['kode_mobil'] ?> <?= $row['nama_mobil'] ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback errorMobil" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jenis BBM :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $jenis ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jumlah BBM :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $jumlah ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Shift Pengisian :</label>
        <div class="col-sm-8">
            <select class="form-control" id="shift" name="shift" style="font-size: 13px;">
                <option value="1" <?php if ($shift == '1') echo "selected"; ?>>Shift 1</option>
                <option value="2" <?php if ($shift == '2') echo "selected"; ?>>Shift 2</option>
                <option value="3" <?php if ($shift == '3') echo "selected"; ?>>Shift 3</option>
            </select>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolUpdate">Update</button>
        <button type="reset" class="btn btn-outline-warning">Reset</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>

$(document).ready(function () {

    $('#mobil').select2({
        theme : 'bootstrap4',
    });

    $('.formupdate').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('.tombolUpdate').prop('disabled', true);
                $('.tombolUpdate').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolUpdate').html('Update');
                $('.tombolUpdate').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.errorTanggal) {
                        $('.errorTanggal').html(response.error.errorTanggal).show();
                        $('#tanggal').addClass('is-invalid');
                    }else{
                        $('.errorTanggal').fadeOut();
                        $('#tanggal').removeClass('is-invalid');
                        $('#tanggal').addClass('is-valid');
                    }
                    if (response.error.errorMobil) {
                        $('.errorMobil').html(response.error.errorMobil).show();
                        $('#mobil').addClass('is-invalid');
                    }else{
                        $('.errorMobil').fadeOut();
                        $('#mobil').removeClass('is-invalid');
                        $('#mobil').addClass('is-valid');
                    }
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: response.sukses
                    }).then (result => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});   
</script>