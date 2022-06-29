<!-- Modal -->
<div class="modal fade" id="modaleditsta" tabindex="-1" aria-labelledby="modaleditstaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Station</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('sta/updatedata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="modal-body">
      <div class="form-group row">
        <label for="kode" class="col-sm-4 col-form-label">Kode Lokasi</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode ?>">
            <div class="invalid-feedback errorKode" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi Lokasi</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $deskripsi ?>">
            <div class="invalid-feedback errorDeskripsi" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="ruas" class="col-sm-4 col-form-label">Ruas</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="ruas" name="ruas" value="<?= $ruas ?>">
            <div class="invalid-feedback errorRuas" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="wilayah" class="col-sm-4 col-form-label">Wilayah</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= $wilayah ?>">
            <div class="invalid-feedback errorWilayah" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">KM :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="km" name="km" value="<?= $km ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">STA :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="sta" name="sta" value="<?= $sta ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jalur :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jalur" name="jalur" value="<?= $jalur ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Kondisi Jalan :</label>
            <div class="col-sm-8">
                <select name="kondisi" id="kondisi" class="form-control" style="font-size: 13px;">
                    <option value="LURUS" <?php if ($kondisi == 'LURUS') echo "selected"; ?>>LURUS</option> 
                    <option value="MELENGKUNG" <?php if ($kondisi == 'MELENGKUNG') echo "selected"; ?>>MELENGKUNG</option> 
                </select>
            </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Alinyemen :</label>
            <div class="col-sm-8">
                <select name="alinyemen" id="alinyemen" class="form-control" style="font-size: 13px;">
                    <option value="DATAR" <?php if ($alinyemen == 'DATAR') echo "selected"; ?>>DATAR</option>
                    <option value="MENANJAK" <?php if ($alinyemen == 'MENANJAK') echo "selected"; ?>>MENANJAK</option>
                    <option value="MENURUN" <?php if ($alinyemen == 'MENURUN') echo "selected"; ?>>MENURUN</option>
                </select>
            </div>
      </div>
      <div class="form-group row">
        <label for="latitude" class="col-sm-4 col-form-label">Latitude :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="latitude" name="latitude" value="<?= $latitude ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="longitude" class="col-sm-4 col-form-label">Longitude :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="longitude" name="longitude"  value="<?= $longitude ?>">
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpan">Update</button>
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>

$(document).ready(function () {
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
                $('.tombolSimpan').html('Update');
                $('.tombolSimpan').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.errorKode) {
                        $('.errorKode').html(response.error.errorKode).show();
                        $('#kode').addClass('is-invalid');
                    }else{
                        $('.errorKode').fadeOut();
                        $('#kode').removeClass('is-invalid');
                        $('#kode').addClass('is-valid');
                    }
                    if (response.error.errorDeskripsi) {
                        $('.errorDeskripsi').html(response.error.errorDeskripsi).show();
                        $('#deskripsi').addClass('is-invalid');
                    }else{
                        $('.errorDeskripsi').fadeOut();
                        $('#deskripsi').removeClass('is-invalid');
                        $('#deskripsi').addClass('is-valid');
                    }
                    if (response.error.errorRuas) {
                        $('.errorRuas').html(response.error.errorRuas).show();
                        $('#ruas').addClass('is-invalid');
                    }else{
                        $('.errorRuas').fadeOut();
                        $('#ruas').removeClass('is-invalid');
                        $('#ruas').addClass('is-valid');
                    }
                    if (response.error.errorWilayah) {
                        $('.errorWilayah').html(response.error.errorWilayah).show();
                        $('#wilayah').addClass('is-invalid');
                    }else{
                        $('.errorWilayah').fadeOut();
                        $('#wilayah').removeClass('is-invalid');
                        $('#wilayah').addClass('is-valid');
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