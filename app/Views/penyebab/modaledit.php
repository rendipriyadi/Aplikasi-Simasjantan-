<!-- Modal -->
<div class="modal fade" id="modaleditpenyebab" tabindex="-1" aria-labelledby="modaleditpenyebabLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Penyebab Kecelakaan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('penyebab/updatedata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="modal-body">
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $deskripsi ?>">
            <div class="invalid-feedback errorDeskripsi" style="display: none;"></div>
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
                    if (response.error.errorDeskripsi) {
                        $('.errorDeskripsi').html(response.error.errorDeskripsi).show();
                        $('#deskripsi').addClass('is-invalid');
                    }else{
                        $('.errorDeskripsi').fadeOut();
                        $('#deskripsi').removeClass('is-invalid');
                        $('#deskripsi').addClass('is-valid');
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