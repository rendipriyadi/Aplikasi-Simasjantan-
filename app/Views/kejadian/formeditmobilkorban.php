<!-- Modal -->
<div class="modal fade" id="modaleditmobilkorban" aria-labelledby="modaleditmobilkorbanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mobil Terlibat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formeditmobilkorban']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idmobilkorban" name="idmobilkorban" value="<?= $idmobilkorban ?>">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No Polisi :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nopol" id="nopol" class="form-control" value="<?= $nopol ?>">
                        <div class="invalid-feedback errorNopol" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Jenis Mobil :</label>
                    <div class="col-sm-8">
                        <select name="mobil" id="mobil" class="form-control" style="font-size: 13px;">
                            <option value="BOX" <?php if ($jenismobil == 'BOX') echo "selected"; ?>>BOX</option>
                            <option value="BUS" <?php if ($jenismobil == 'BUS') echo "selected"; ?>>BUS</option>
                            <option value="JIP" <?php if ($jenismobil == 'JIP') echo "selected"; ?>>JIP</option>
                            <option value="MINIBUS" <?php if ($jenismobil == 'MINIBUS') echo "selected"; ?>>MINIBUS</option>
                            <option value="PICKUP" <?php if ($jenismobil == 'PICKUP') echo "selected"; ?>>PICKUP</option>
                            <option value="SEDAN" <?php if ($jenismobil == 'SEDAN') echo "selected"; ?>>SEDAN</option>
                            <option value="TRUK" <?php if ($jenismobil == 'TRUK') echo "selected"; ?>>TRUK</option>
                            <option value="TRUK GANDENG" <?php if ($jenismobil == 'TRUK GANDENG') echo "selected"; ?>>TRUK GANDENG</option>
                            <option value="TRUK TANGKI" <?php if ($jenismobil == 'TRUK TANGKI') echo "selected"; ?>>TRUK GANDENG</option>
                            <option value="TRAILER" <?php if ($jenismobil == 'TRAILER') echo "selected"; ?>>TRAILER</option>
                            <option value="LAIN-LAIN" <?php if ($jenismobil == 'LAIN-LAIN') echo "selected"; ?>>LAIN-LAIN</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Golongan Mobil :</label>
                    <div class="col-sm-8">
                        <select name="golongan" id="golongan" class="form-control" style="font-size: 13px;" required>
                            <option value="GOLONGAN 1" <?php if ($golongan == 'GOLONGAN 1') echo "selected"; ?>>GOLONGAN 1</option>
                            <option value="GOLONGAN 2" <?php if ($golongan == 'GOLONGAN 2') echo "selected"; ?>>GOLONGAN 2</option>
                            <option value="GOLONGAN 3" <?php if ($golongan == 'GOLONGAN 3') echo "selected"; ?>>GOLONGAN 3</option>
                            <option value="GOLONGAN 4" <?php if ($golongan == 'GOLONGAN 4') echo "selected"; ?>>GOLONGAN 4</option>
                            <option value="GOLONGAN 5" <?php if ($golongan == 'GOLONGAN 5') echo "selected"; ?>>GOLONGAN 5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Merek :</label>
                    <div class="col-sm-8">
                        <input type="text" name="merek" id="merek" class="form-control" value="<?= $merk ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Warna Mobil :</label>
                    <div class="col-sm-8">
                        <input type="text" name="warna" id="warna" class="form-control" value="<?= $warna ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Jenis Derek :</label>
                    <div class="col-sm-8">
                        <select name="derek" id="derek" class="form-control" style="font-size: 13px;">
                            <option value="DEREK 1" <?php if ($derek == 'DEREK 1') echo "selected"; ?>>DEREK 1</option>
                            <option value="DEREK 2" <?php if ($derek == 'DEREK 2') echo "selected"; ?>>DEREK 2</option>
                            <option value="DEREK 3" <?php if ($derek == 'DEREK 3') echo "selected"; ?>>DEREK 3</option>
                            <option value="DEREK 4" <?php if ($derek == 'DEREK 4') echo "selected"; ?>>DEREK 4</option>
                            <option value="DEREK 5" <?php if ($derek == 'DEREK 5') echo "selected"; ?>>DEREK 5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kondisi Kendaraan :</label>
                    <div class="col-sm-8">
                        <select name="kondisi" id="kondisi" class="form-control" style="font-size: 13px;">
                            <option value="TIDAK RUSAK" <?php if ($kondisi == 'TIDAK RUSAK') echo "selected"; ?>>TIDAK RUSAK</option>
                            <option value="RUSAK RINGAN" <?php if ($kondisi == 'RUSAK RINGAN') echo "selected"; ?>>RUSAK RINGAN</option>
                            <option value="RUSAK BERAT" <?php if ($kondisi == 'RUSAK BERAT') echo "selected"; ?>>RUSAK BERAT</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"><?= $catatan ?></textarea style="font-size: 13px;">
                </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-4 col-form-label">Foto :</label>
                    <div class="col-sm-8">
                        <img src="<?= base_url($foto) ?>" alt="foto" width="50%">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Ganti Foto :</label>
                        <div class="col-sm-8">
                        <input type="file" name="foto" id="foto" class="form-control" style="font-size: 13px;">
                        <div class="invalid-feedback errorFoto" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success tombolUpdateMobil">Update</button>
                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                </div>
            <?= form_close(); ?> 
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#mobil').select2({
        theme : 'bootstrap4',
    });
    $('#derek').select2({
        theme : 'bootstrap4',
    });

    $('.tombolUpdateMobil').click(function (e) {
        e.preventDefault();
        let form = $('.formeditmobilkorban')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/updateMobilKorban') ?>",
            data: data,
            dataType: "json",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.tombolUpdateMobil').prop('disabled', true);
                $('.tombolUpdateMobil').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolUpdateMobil').html('Simpan');
                $('.tombolUpdateMobil').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.errorNopol) {
                        $('.errorNopol').html(response.error.errorNopol).show();
                        $('#nopol').addClass('is-invalid');
                    }else{
                        $('.errorNopol').fadeOut();
                        $('#nopol').removeClass('is-invalid');
                        $('#nopol').addClass('is-valid');
                    }
                    if (response.error.errorFoto) {
                        $('.errorFoto').html(response.error.errorFoto).show();
                        $('#foto').addClass('is-invalid');
                    }else{
                        $('.errorFoto').fadeOut();
                        $('#foto').removeClass('is-invalid');
                    }
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text : response.sukses,
                    }).then (result => {
                        if (result.isConfirmed) {
                            $('#modaleditmobilkorban').on('hidden.bs.modal', function(event) {
                                tampilDataMobilKorban();
                            });
                            $('#modaleditmobilkorban').modal('hide');
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