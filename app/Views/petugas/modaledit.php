<!-- Modal -->
<div class="modal fade" id="modaleditpetugas" tabindex="-1" aria-labelledby="modaleditpetugasLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit data Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('', ["class" => "formtambah"]) ?>
      <?php csrf_field(); ?>
      <input type="hidden" name="id" value="<?= $id; ?>">
      <div class="modal-body">
        <div class="form-group row">
          <label for="nip" class="col-sm-4 col-form-label">Nip :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nip" name="nip" value="<?= $nip; ?>">
            <div class="invalid-feedback errorNip" style="display: none;"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-4 col-form-label">Nama :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
            <div class="invalid-feedback errorNama" style="display: none;"></div>
          </div>
        </div>
        <div class="form-group row">
          <label for="jabatan" class="col-sm-4 col-form-label">Jabatan :</label>
          <div class="col-sm-8">
            <select class="form-control" name="jabatan" id="jabatan" style="font-size:13px;">
              <option value="SENKOM" <?php if ($jabatan == 'SENKOM') echo "selected"; ?>>SENKOM</option>
              <option value="PATROLI" <?php if ($jabatan == 'PATROLI') echo "selected"; ?>>PATROLI</option>
              <option value="DEREK" <?php if ($jabatan == 'DEREK') echo "selected"; ?>>DEREK</option>
              <option value="LAIN - LAIN" <?php if ($jabatan == 'LAIN - LAIN') echo "selected"; ?>>LAIN - LAIN</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="notlp" class="col-sm-4 col-form-label">No Telepon :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="notlp" name="notlp" value="<?= $notlp; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nohp" class="col-sm-4 col-form-label">No Handphone :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $nohp; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Email :</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-sm-4 col-form-label">Status :</label>
          <div class="col-sm-2 form-check">
            <input type="radio" class="form-check-input" id="status" name="status" value="aktif" <?php if ($status == 'aktif') echo "checked"; ?>>
            <label class="form-check-label" for="status">Aktif</label>
          </div>
          <div class="col-sm-4 form-check">
            <input type="radio" class="form-check-input" id="status" name="status" value="tidak aktif" <?php if ($status == 'tidak aktif') echo "checked"; ?>>
            <label class="form-check-label" for="status">Tidak Aktif</label>
          </div>
        </div>
        <div class="form-group row">
          <label for="namaats" class="col-sm-4 col-form-label">Nama Atasan :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="namaats" name="namaats" value="<?= $namaats; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="alamat" class="col-sm-4 col-form-label">Alamat :</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="alamat" id="alamat" rows="3"> <?= $alamat; ?> </textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="kota" class="col-sm-4 col-form-label">Kota :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="kota" name="kota" value="<?= $kota; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="kodepos" class="col-sm-4 col-form-label">Kode Pos :</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="kodepos" name="kodepos" value="<?= $kodepos; ?>">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolUpdate">Update</button>
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.tombolUpdate').click(function(e) {
      e.preventDefault();
      let form = $('.formtambah')[0];
      let data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?= site_url('petugas/updatedata') ?>",
        data: data,
        dataType: "json",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function() {
          $('.tombolUpdate').prop('disabled', true);
          $('.tombolUpdate').html('<i class="fas fa-spinner fa-spin"></i>');
        },
        complete: function() {
          $('.tombolUpdate').html('Update');
          $('.tombolUpdate').prop('disabled', false);
        },
        success: function(response) {
          if (response.error) {
            if (response.error.errorNip) {
              $('.errorNip').html(response.error.errorNip).show();
              $('#nip').addClass('is-invalid');
            } else {
              $('.errorNip').fadeOut();
              $('#nip').removeClass('is-invalid');
              $('#nip').addClass('is-valid');
            }
            if (response.error.errorNama) {
              $('.errorNama').html(response.error.errorNama).show();
              $('#nama').addClass('is-invalid');
            } else {
              $('.errorNama').fadeOut();
              $('#nip').removeClass('is-invalid');
              $('#nip').addClass('is-valid');
            }
          } else {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              html: response.sukses
            }).then(result => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            });
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
      return false;
    });
  });
</script>