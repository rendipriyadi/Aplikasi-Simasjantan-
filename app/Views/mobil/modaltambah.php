<!-- Modal -->
<div class="modal fade" id="modaltambahmobil" aria-labelledby="modaltambahmobilLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('mobil/simpandata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
      <div class="form-group row">
        <label for="kode" class="col-sm-4 col-form-label">Kode Mobil</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kode" name="kode" placeholder="Isi Kode Mobil Anda">
            <div class="invalid-feedback errorKode" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Nama Mobil</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Mobil Anda">
            <div class="invalid-feedback errorNama" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="jenis" class="col-sm-4 col-form-label">Jenis Mobil</label>
            <div class="col-sm-8">
                <select class="form-control" name="jenis" id="jenis">
                    <option value=""> Pilih Jenis Mobil </option>
                    <option value="AMBULANCE">AMBULANCE</option>
                    <option value="DEREK">DEREK</option>
                    <option value="PATROLI">PATROLI</option>                          
                    <option value="PJR">PJR</option>                          
                    <option value="RESCUE">RESCUE</option>                          
                    <option value="ZEBRA">ZEBRA</option>                          
                    <option value="LAIN-LAIN">LAIN-LAIN</option>                          
                </select>
            </div>
      </div>
      <div class="form-group row">
        <label for="nopol" class="col-sm-4 col-form-label">No Polisi</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nopol" name="nopol" placeholder="Isi No Polisi Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="status" class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-4 form-check">
            <input type="radio" class="form-check-input" id="status" name="status" value="aktif">
            <label class="form-check-label" for="status">Aktif</label>
        </div>
        <div class="col-sm-4 form-check">
            <input type="radio" class="form-check-input" id="status" name="status" value="tidak aktif">
            <label class="form-check-label" for="status">Tidak Aktif</label>
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

    $('#jenis').select2({
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
                    if (response.error.errorKode) {
                        $('.errorKode').html(response.error.errorKode).show();
                        $('#kode').addClass('is-invalid');
                    }else{
                        $('.errorKode').fadeOut();
                        $('#kode').removeClass('is-invalid');
                        $('#kode').addClass('is-valid');
                    }
                    if (response.error.errorNama) {
                        $('.errorNama').html(response.error.errorNama).show();
                        $('#nama').addClass('is-invalid');
                    }else{
                        $('.errorNama').fadeOut();
                        $('#nama').removeClass('is-invalid');
                        $('#nama').addClass('is-valid');
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

