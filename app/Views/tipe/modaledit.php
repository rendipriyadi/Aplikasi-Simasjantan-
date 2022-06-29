<!-- Modal -->
<div class="modal fade" id="modaledittipe" tabindex="-1" aria-labelledby="modaledittipeLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Tipe Kecelakaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formupdate']) ?>
            <?php csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $deskripsi ?>">
                        <div class="invalid-feedback errorDeskripsi" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-4 col-form-label">Icon :</label>
                    <div class="col-sm-8">
                        <img src="<?= base_url($icon) ?>" alt="Icon" width="50%">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-4 col-form-label">Upload Icon (<i>Jika Ada</i>) :</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="icon" name="icon" style="font-size: 13px;">
                        <div class="invalid-feedback errorIcon" style="display: none;"></div>
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
            let form = $('.formupdate')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= site_url('tipe/updatedata') ?>",
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
                        if (response.error.errorDeskripsi) {
                            $('.errorDeskripsi').html(response.error.errorDeskripsi).show();
                            $('#deskripsi').addClass('is-invalid');
                        } else {
                            $('.errorDeskripsi').fadeOut();
                            $('#deskripsi').removeClass('is-invalid');
                            $('#deskripsi').addClass('is-valid');
                        }
                        if (response.error.errorIcon) {
                            $('.errorIcon').html(response.error.errorIcon).show();
                            $('#icon').addClass('is-invalid');
                        } else {
                            $('.errorIcon').fadeOut();
                            $('#icon').removeClass('is-invalid');
                            $('#icon').addClass('is-valid');
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