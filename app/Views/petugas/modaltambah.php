<!-- Modal -->
<div class="modal fade" id="modaltambahpetugas" tabindex="-1" aria-labelledby="modaltambahpetugasLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('', ["class" => "formtambah"]) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
      <div class="form-group row">
        <label for="nip" class="col-sm-4 col-form-label">Nip :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Isi Nomor Nip Anda">
            <div class="invalid-feedback errorNip" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Nama :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Anda">
            <div class="invalid-feedback errorNama" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan :</label>
            <div class="col-sm-8">
                <select class="form-control" name="jabatan" id="jabatan" style="font-size:13px;">
                    <option value=""> Pilih Jabatan </option>
                    <option value="SENKOM">SENKOM</option>
                    <option value="PATROLI">PATROLI</option>
                    <option value="DEREK">DEREK</option>                          
                </select>
            </div>
      </div>
      <div class="form-group row">
        <label for="notlp" class="col-sm-4 col-form-label">No Telepon :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="notlp" name="notlp" placeholder="Isi No Telepon Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="nohp" class="col-sm-4 col-form-label">No Handphone :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Isi No Handphone Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">Email :</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" placeholder="Isi Alamat Email Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="status" class="col-sm-4 col-form-label">Status :</label>
        <div class="col-sm-2 form-check">
            <input type="radio" class="form-check-input" id="status" name="status" value="aktif">
            <label class="form-check-label" for="status">Aktif</label>
        </div>
        <div class="col-sm-4 form-check">
            <input type="radio" class="form-check-input" id="status" name="status" value="tidak aktif">
            <label class="form-check-label" for="status">Tidak Aktif</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="namaats" class="col-sm-4 col-form-label">Nama Atasan :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="namaats" name="namaats" placeholder="Isi Nama Atasan Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="alamat" class="col-sm-4 col-form-label">Alamat :</label>
        <div class="col-sm-8">
              <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Isi alamat Anda"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="kota" class="col-sm-4 col-form-label">Kota :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kota" name="kota" placeholder="Isi Kota Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="kodepos" class="col-sm-4 col-form-label">Kode Pos :</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Isi Kode Pos Anda">
        </div>
      </div>
      <div class="form-group row">
        <label for="icon" class="col-sm-4 col-form-label">Upload Foto (<i>Jika Ada</i>) :</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" id="foto" name="foto" style="font-size: 13px;">
            <div class="invalid-feedback errorFoto" style="display: none;"></div>
        </div>
      </div> 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpan">Simpan</button>
        <button type="reset" class="btn btn-outline-warning">Reset</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>

$(document).ready(function () {
    $('.tombolSimpan').click(function (e) { 
        e.preventDefault();
        let form = $('.formtambah')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('petugas/simpandata') ?>",
            data: data,
            dataType: "json",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
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
                    if (response.error.errorNip) {
                        $('.errorNip').html(response.error.errorNip).show();
                        $('#nip').addClass('is-invalid');
                    }else{
                        $('.errorNip').fadeOut();
                        $('#nip').removeClass('is-invalid');
                        $('#nip').addClass('is-valid');
                    }
                    if (response.error.errorNama) {
                        $('.errorNama').html(response.error.errorNama).show();
                        $('#nama').addClass('is-invalid');
                    }else{
                        $('.errorNama').fadeOut();
                        $('#nama').removeClass('is-invalid');
                        $('#nama').addClass('is-valid');
                    }
                    if (response.error.errorFoto) {
                        $('.errorFoto').html(response.error.errorFoto).show();
                        $('#foto').addClass('is-invalid');
                    }else{
                        $('.errorFoto').fadeOut();
                        $('#foto').removeClass('is-invalid');
                        $('#foto').addClass('is-valid');
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