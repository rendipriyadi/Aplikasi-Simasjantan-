<!-- Modal -->
<div class="modal fade" id="modaltambahbbm" tabindex="-1" aria-labelledby="modaltambahbbmLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengisian BBM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('bbmMobil/simpandata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Tanggal Pengisian :</label>
        <div class="col-sm-8">
            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
            <div class="invalid-feedback errorTanggal" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jenis Mobil :</label>
        <div class="col-sm-8">
            <select name="mobil" id="mobil" class="form-control" style="font-size: 13px;">
                <option value="">Pilih Mobil</option>
                    <?php foreach($datamobil as $row) : ?> 
                        <option value="<?= $row['id_mobil'] ?>"><?= $row['kode_mobil'] ?> <?= $row['nama_mobil'] ?></option>
                    <?php endforeach; ?>              
            </select>
            <div class="invalid-feedback errorMobil" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jenis BBM :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Isi Jenis BBM">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jumlah BBM :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Isi Jumlah BBM">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Shift Pengisian :</label>
        <div class="col-sm-8">
            <select class="form-control" id="shift" name="shift" style="font-size: 13px;">
                <option value="">Pilih Shift Pengisian</option>
                <option value="1">Shift 1</option>
                <option value="2">Shift 2</option>
                <option value="3">Shift 3</option>
            </select>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpan">Simpan</button>
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

    $('.formtambah').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('.tombolSimpan').prop('disabled', true);
                $('.tombolSimpan').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolSimpan').html('Simpan');
                $('.tombolSimpan').prop('disabled', false);
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