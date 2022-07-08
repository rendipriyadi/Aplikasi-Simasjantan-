<!-- Modal -->
<div class="modal fade" id="modaledittindakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Tindakan Kejadian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kejadian/updateTindakan', ['class' => 'formupdatetindakan']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idtindakan" name="idtindakan" value="<?= $idtindakan ?>">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Tindakan :</label>
                    <div class="col-sm-8">
                        <select name="tindakan" id="tindakan" class="form-control" style="font-size: 13px;">
                            <option value="">Pilih Tindakan</option>
                            <option value="DIBANTU LANJUT PERJALANAN" <?php if ($tindakan == 'DIBANTU LANJUT PERJALANAN') echo "selected"; ?>>DIBANTU LANJUT PERJALANAN</option>
                            <option value="PENGAMANAN / TUNGGU STORING" <?php if ($tindakan == 'PENGAMANAN / TUNGGU STORING') echo "selected"; ?>>PENGAMANAN / TUNGGU STORING</option>
                            <option value="DIDEREK KELUAR OFF TERDEKAT" <?php if ($tindakan == 'DIDEREK KELUAR OFF TERDEKAT') echo "selected"; ?>>DIDEREK KELUAR OFF TERDEKAT</option>
                            <option value="KOORDINASI JAYA II/WILAYAH" <?php if ($tindakan == 'KOORDINASI JAYA II/WILAYAH') echo "selected"; ?>>KOORDINASI JAYA II/WILAYAH</option>
                            <option value="DIPINJAMKAN BAN SEREP" <?php if ($tindakan == 'DIPINJAMKAN BAN SEREP') echo "selected"; ?>>DIPINJAMKAN BAN SEREP</option>
                            <option value="LAIN-LAIN" <?php if ($tindakan == 'LAIN-LAIN') echo "selected"; ?>>LAIN-LAIN</option>
                        </select>
                        <div class="invalid-feedback errorTindakan" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Waktu Tindakan :</label>
                    <div class="col-sm-8">
                        <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="<?= $waktu ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"><?= $catatan ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success tombolUpdateTindakan">Update</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formupdatetindakan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolUpdateTindakan').prop('disabled', true);
                    $('.tombolUpdateTindakan').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolUpdateTindakan').html('Update');
                    $('.tombolUpdateTindakan').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.errorTindakan) {
                            $('.errorTindakan').html(response.error.errorTindakan).show();
                            $('#tindakan').addClass('is-invalid');
                        } else {
                            $('.errorTindakan').fadeOut();
                            $('#tindakan').removeClass('is-invalid');
                            $('#tindakan').addClass('is-valid');
                        }
                    }
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            html: response.sukses
                        }).then(result => {
                            if (result.isConfirmed) {
                                $('#modaledittindakan').on('hidden.bs.modal', function(event) {
                                    tampilDataTindakan();
                                });
                                $('#modaledittindakan').modal('hide');
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