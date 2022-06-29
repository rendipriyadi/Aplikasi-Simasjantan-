<!-- Modal -->
<div class="modal fade" id="modaltindakan" tabindex="-1" aria-labelledby="modaltindakanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tindakan Kejadian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kejadian/simpantindakan', ['class' => 'formsimpantindakan']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Tindakan :</label>
                    <div class="col-sm-8">
                        <select name="tindakan" id="tindakan" class="form-control" style="font-size: 13px;">
                            <option value="">Pilih Tindakan</option>
                            <option value="DIBANTU LANJUT PERJALANAN">DIBANTU LANJUT PERJALANAN</option>
                            <option value="PENGAMANAN / TUNGGU STORING">PENGAMANAN / TUNGGU STORING</option>
                            <option value="DIDEREK KELUAR OFF TERDEKAT">DIDEREK KELUAR OFF TERDEKAT</option>
                            <option value="KOORDINASI JAYA II/WILAYAH">KOORDINASI JAYA II/WILAYAH</option>
                            <option value="DIPINJAMKAN BAN SEREP">DIPINJAMKAN BAN SEREP</option>
                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                        </select>
                        <div class="invalid-feedback errorTindakan" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Waktu Tindakan :</label>
                    <div class="col-sm-8">
                        <input type="datetime-local" class="form-control" id="waktu" name="waktu">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success tombolSimpanTindakan">Simpan</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formsimpantindakan').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolSimpanTindakan').prop('disabled', true);
                    $('.tombolSimpanTindakan').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolSimpanTindakan').html('Simpan');
                    $('.tombolSimpanTindakan').prop('disabled', false);
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
                                $('#modaltindakan').modal('hide');
                                tampilDataTindakan();
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