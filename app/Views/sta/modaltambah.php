<!-- Modal -->
<div class="modal fade" id="modaltambahsta" tabindex="-1" aria-labelledby="modaltambahstaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Station</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('sta/simpandata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
      <div class="form-group row">
        <label for="kode" class="col-sm-4 col-form-label">Kode Lokasi :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Isi Kode Lokasi">
            <div class="invalid-feedback errorKode" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi Lokasi :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Isi Deskripsi Lokasi">
            <div class="invalid-feedback errorDeskripsi" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="ruas" class="col-sm-4 col-form-label">Ruas :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="ruas" name="ruas" placeholder="Isi Ruas Lokasi">
            <div class="invalid-feedback errorRuas" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="wilayah" class="col-sm-4 col-form-label">Wilayah :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="wilayah" name="wilayah" placeholder="Isi Wilayah Lokasi">
            <div class="invalid-feedback errorWilayah" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">KM :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="km" name="km" placeholder="Isi KM">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">STA :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="sta" name="sta" placeholder="Isi STA">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Jalur :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jalur" name="jalur" placeholder="Isi Jalur">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Kondisi Jalan :</label>
            <div class="col-sm-8">
                <select name="kondisi" id="kondisi" class="form-control" style="font-size: 13px;">
                    <option value="">Pilih Kondisi Jalan</option>
                    <option value="LURUS">LURUS</option> 
                    <option value="MELENGKUNG">MELENGKUNG</option> 
                </select>
            </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Alinyemen :</label>
            <div class="col-sm-8">
                <select name="alinyemen" id="alinyemen" class="form-control" style="font-size: 13px;">
                    <option value="">Pilih Alinyemen</option>
                    <option value="DATAR">DATAR</option> 
                    <option value="MENANJAK">MENANJAK</option> 
                    <option value="MENURUN">MENURUN</option> 
                </select>
            </div>
      </div>
      <div class="form-group row">
        <label for="latitude" class="col-sm-4 col-form-label">Latitude :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Isi Latitude Lokasi">
        </div>
      </div>
      <div class="form-group row">
        <label for="longitude" class="col-sm-4 col-form-label">Longitude :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Isi Longitude Lokasi">
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