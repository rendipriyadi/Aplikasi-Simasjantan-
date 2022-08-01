<!-- Modal -->
<div class="modal fade" id="modaleditkorban" tabindex="-1" aria-labelledby="modaleditkorbanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Orang Terlibat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formupdatekorban']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idkorban" name="idkorban" value="<?= $idKorban ?>">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idKejadian ?>">
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Nama :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $namaKorban ?>">
                        <div class="invalid-feedback errorNama" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4 form-check">
                        <input type="radio" class="form-check-input" id="jenkel" name="jenkel" value="laki-laki" <?php if ($jenkelKorban == 'laki-laki') echo "checked"; ?>>
                        <label class="form-check-label" for="jenkel">Laki - Laki</label>
                    </div>
                    <div class="col-sm-4 form-check">
                        <input type="radio" class="form-check-input" id="jenkel" name="jenkel" value="perempuan" <?php if ($jenkelKorban == 'perempuan') echo "checked"; ?>>
                        <label class="form-check-label" for="jenkel">Perempuan</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No Hp/Telp :</label>
                    <div class="col-sm-8">
                        <input type="text" name="notlp" id="notlp" class="form-control" value="<?= $notlpKorban ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No SIM :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nosim" id="nosim" class="form-control" value="<?= $simKorban ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No KTP :</label>
                    <div class="col-sm-8">
                        <input type="text" name="noktp" id="noktp" class="form-control" value="<?= $ktpKorban ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Alamat :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $alamatKorban ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"><?= $catatanKorban ?></textarea style="font-size: 13px;">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kondisi Korban :</label>
                        <div class="col-sm-8">
                            <select name="kondisi" id="kondisi" class="form-control"  style="font-size: 13px;">
                                <option value="LUKA RINGAN" <?php if ($kondisiKorban == 'LUKA RINGAN') echo "selected"; ?>>LUKA RINGAN</option>
                                <option value="LUKA BERAT"  <?php if ($kondisiKorban == 'LUKA BERAT') echo "selected"; ?>>LUKA BERAT</option>   
                                <option value="MENINGGAL"  <?php if ($kondisiKorban == 'MENINGGAL') echo "selected"; ?>>MENINGGAL</option> 
                            </select>  
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
                <button type="submit" class="btn btn-outline-success tombolUpdateKorban">Update</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
            <?= form_close(); ?> 
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('.tombolUpdateKorban').click(function (e) {
        e.preventDefault();
        let form = $('.formupdatekorban')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/updateKorban') ?>",
            data: data,
            dataType: "json",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.tombolUpdateKorban').prop('disabled', true);
                $('.tombolUpdateKorban').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolUpdateKorban').html('Update');
                $('.tombolUpdateKorban').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
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
                    }
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text : response.sukses,
                    }).then (result => {
                        if (result.isConfirmed) {
                            $('#modaleditkorban').on('hidden.bs.modal', function(event) {
                                tampilDataKorban();
                            });
                            $('#modaleditkorban').modal('hide');
                            
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