<!-- Modal -->
<div class="modal fade" id="modalkorban" tabindex="-1" aria-labelledby="modalkorbanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Orang Terlibat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formkorban']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Nama :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" id="nama" class="form-control">
                        <div class="invalid-feedback errorNama" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4 form-check">
                        <input type="radio" class="form-check-input" id="jenkel" name="jenkel" value="laki-laki">
                        <label class="form-check-label" for="jenkel">Laki - Laki</label>
                    </div>
                    <div class="col-sm-4 form-check">
                        <input type="radio" class="form-check-input" id="jenkel" name="jenkel" value="perempuan">
                        <label class="form-check-label" for="jenkel">Perempuan</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No Hp/Telp :</label>
                    <div class="col-sm-8">
                        <input type="text" name="notlp" id="notlp" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No SIM :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nosim" id="nosim" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No KTP :</label>
                    <div class="col-sm-8">
                        <input type="text" name="noktp" id="noktp" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Alamat :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea style="font-size: 13px;">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kondisi Korban :</label>
                        <div class="col-sm-8">
                            <select name="kondisi" id="kondisi" class="form-control"  style="font-size: 13px;">
                                <option value="">Pilih Kondisi Korban</option>
                                <option value="LUKA RINGAN">LUKA RINGAN</option>
                                <option value="LUKA BERAT">LUKA BERAT</option>   
                                <option value="MENINGGAL">MENINGGAL</option> 
                            </select>  
                        </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Foto (<i>Jika Ada</i>) :</label>
                        <div class="col-sm-8">
                        <input type="file" name="foto" id="foto" class="form-control" style="font-size: 13px;">
                        <div class="invalid-feedback errorFoto" style="display: none;"></div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success tombolSimpanKorban">Simpan</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
        <?= form_close(); ?> 
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('.tombolSimpanKorban').click(function (e) {
        e.preventDefault();
        let form = $('.formkorban')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/simpankorban') ?>",
            data: data,
            dataType: "json",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.tombolSimpanKorban').prop('disabled', true);
                $('.tombolSimpanKorban').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolSimpanKorban').html('Simpan');
                $('.tombolSimpanKorban').prop('disabled', false);
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
                            $('#modalkorban').modal('hide');
                            tampilDataKorban();
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