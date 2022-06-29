<!-- Modal -->
<div class="modal fade" id="modaltambahtipe" tabindex="-1" aria-labelledby="modaltambahtipeLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tipe Kecelakaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formsimpan']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Isi Deskripsi">
                        <div class="invalid-feedback errorDeskripsi" style="display: none;"></div>
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
                <button type="submit" class="btn btn-outline-success tombolSimpan">Simpan</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.tombolSimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formsimpan')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= site_url('tipe/simpandata') ?>",
                data: data,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.tombolSimpan').prop('disabled', true);
                    $('.tombolSimpan').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolSimpan').html('Simpan');
                    $('.tombolSimpan').prop('disabled', false);
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