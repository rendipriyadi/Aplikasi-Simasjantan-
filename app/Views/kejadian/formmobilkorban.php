<!-- Modal -->
<div class="modal fade" id="modalmobilkorban" aria-labelledby="modalmobilkorbanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mobil Terlibat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formtambahkorban']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Nama Pengemudi :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Isi Nama Pengemudi">
                        <div class="text-danger">* Isi (Tidak Diketahui) jika nama pengemudi kosong</div>
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
                    <div class="invalid-feedback errorJenkel" style="display: none;"></div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">No Polisi :</label>
                    <div class="col-sm-8">
                        <input type="text" name="nopol" id="nopol" class="form-control">
                        <div class="invalid-feedback errorNopol" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Jenis Mobil :</label>
                    <div class="col-sm-8">
                        <select name="mobil" id="mobil" class="form-control" style="font-size: 13px;">
                            <option value="">Pilih Jenis Mobil</option>
                            <option value="BOX">BOX</option>
                            <option value="BUS">BUS</option>
                            <option value="CRANE">CRANE</option>
                            <option value="JIP">JIP</option>
                            <option value="MINIBUS">MINIBUS</option>
                            <option value="MOTOR">MOTOR</option>
                            <option value="PICKUP">PICKUP</option>
                            <option value="SEDAN">SEDAN</option>
                            <option value="TRUK">TRUK</option>
                            <option value="TRUK GANDENG">TRUK GANDENG</option>
                            <option value="TRUK TANGKI">TRUK TANGKI</option>
                            <option value="TRAILER">TRAILER</option>
                            <option value="WINGBOX">WINGBOX</option>
                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Golongan Mobil :</label>
                    <div class="col-sm-8">
                        <select name="golongan" id="golongan" class="form-control" style="font-size: 13px;">
                            <option value="">Pilih Golongan Mobil</option>
                            <option value="GOLONGAN 1">GOLONGAN 1</option>
                            <option value="GOLONGAN 2">GOLONGAN 2</option>
                            <option value="GOLONGAN 3">GOLONGAN 3</option>
                            <option value="GOLONGAN 4">GOLONGAN 4</option>
                            <option value="GOLONGAN 5">GOLONGAN 5</option>
                        </select>
                        <div class="invalid-feedback errorGolongan" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Merek :</label>
                    <div class="col-sm-8">
                        <input type="text" name="merek" id="merek" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Jenis Derek :</label>
                    <div class="col-sm-8">
                        <select name="derek" id="derek" class="form-control" style="font-size: 13px;">
                            <option value="">Pilih Derek</option>
                            <option value="DEREK 1">DEREK 1</option>
                            <option value="DEREK 2">DEREK 2</option>
                            <option value="DEREK 3">DEREK 3</option>
                            <option value="DEREK 4">DEREK 4</option>
                            <option value="DEREK 5">DEREK 5</option>
                            <option value="DEREK 6">DEREK 6</option>
                            <option value="DEREK 7">DEREK 7</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kondisi Kendaraan :</label>
                    <div class="col-sm-8">
                        <select name="kondisi" id="kondisi" class="form-control" style="font-size: 13px;">
                            <option value="">Pilih Kondisi Kendaraan</option>
                            <option value="TIDAK RUSAK">TIDAK RUSAK</option>
                            <option value="RUSAK RINGAN">RUSAK RINGAN</option>
                            <option value="RUSAK BERAT">RUSAK BERAT</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Catatan :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea style="font-size: 13px;">
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
                    <button type="submit" class="btn btn-outline-success tombolSimpanMobil">Simpan</button>
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

    $('.tombolSimpanMobil').click(function (e) {
        e.preventDefault();
        let form = $('.formtambahkorban')[0];
        let data = new FormData(form);

        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/simpanmobilkorban') ?>",
            data: data,
            dataType: "json",
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function () {
                $('.tombolSimpanMobil').prop('disabled', true);
                $('.tombolSimpanMobil').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolSimpanMobil').html('Simpan');
                $('.tombolSimpanMobil').prop('disabled', false);
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
                    if (response.error.errorNama) {
                        $('.errorNama').html(response.error.errorNama).show();
                        $('#nama').addClass('is-invalid');
                    }else{
                        $('.errorNama').fadeOut();
                        $('#nama').removeClass('is-invalid');
                        $('#nama').addClass('is-valid');
                    }
                    if (response.error.errorJenkel) {
                        $('.errorJenkel').html(response.error.errorJenkel).show();
                        $('#jenkel').addClass('is-invalid');
                    }else{
                        $('.errorJenkel').fadeOut();
                        $('#jenkel').removeClass('is-invalid');
                        $('#jenkel').addClass('is-valid');
                    }
                    if (response.error.errorGolongan) {
                        $('.errorGolongan').html(response.error.errorGolongan).show();
                        $('#golongan').addClass('is-invalid');
                    }else{
                        $('.errorGolongan').fadeOut();
                        $('#golongan').removeClass('is-invalid');
                        $('#golongan').addClass('is-valid');
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
                            $('#modalmobilkorban').modal('hide');
                            tampilDataMobilKorban();
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