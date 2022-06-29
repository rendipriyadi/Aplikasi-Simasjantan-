<!-- Modal -->
<div class="modal fade" id="modaleditmobilpetugas" aria-labelledby="modaleditmobilpetugasLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mobil Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kejadian/updateMobilPetugas', ['class' => 'formupdatemobil']) ?>
            <?php csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="idmobil" name="idmobil" value="<?= $idmobil ?>">
                <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Mobil :</label>
                    <div class="form-group col-sm-4">
                        <select name="mobil" id="mobil" class="form-control">
                            <?php foreach ($datamobil->getResultArray() as $row) : ?>
                                <?php if ($row['id_pakai_mobil'] == $mobil) : ?>
                                    <option selected value="<?= $row['id_pakai_mobil'] ?>"><?= $row['kode_mobil'] ?> - <?= $row['nama_mobil'] ?> - (<?= date('d-m-Y', strtotime($row['tgl_pakai_mobil'])) ?>)</option>
                                <?php else : ?>
                                    <option value="<?= $row['id_pakai_mobil'] ?>"><?= $row['kode_mobil'] ?> - <?= $row['nama_mobil'] ?> - (<?= date('d-m-Y', strtotime($row['tgl_pakai_mobil'])) ?>)</option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errorMobil" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Petugas 1 :</label>
                    <div class="col-sm-4">
                        <?php foreach ($datamobil->getResultArray() as $row) : ?>
                            <?php if ($row['id_pakai_mobil'] == $petugas1) : ?>
                                <input type="text" class="form-control" id="petugas1" name="petugas1" value="<?= $row['nama_pt1'] ?>" readonly>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <label for="nama" class="col-sm-2 col-form-label">Petugas 2 :</label>
                    <div class="col-sm-4">
                        <?php foreach ($datamobil->getResultArray() as $row) : ?>
                            <?php if ($row['id_pakai_mobil'] == $petugas2) : ?>
                                <input type="text" class="form-control" id="petugas1" name="petugas1" value="<?= $row['nama_pt2'] ?>" readonly>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Petugas 3 :</label>
                    <div class="col-sm-4">
                        <?php foreach ($datamobil->getResultArray() as $row) : ?>
                            <?php if ($row['id_pakai_mobil'] == $petugas3) : ?>
                                <input type="text" class="form-control" id="petugas1" name="petugas1" value="<?= $row['nama_pt3'] ?>" readonly>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <label for="nama" class="col-sm-2 col-form-label">Petugas 4 :</label>
                    <div class="col-sm-4">
                        <?php foreach ($datamobil->getResultArray() as $row) : ?>
                            <?php if ($row['id_pakai_mobil'] == $petugas4) : ?>
                                <input type="text" class="form-control" id="petugas1" name="petugas1" value="<?= $row['nama_pt4'] ?>" readonly>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Waktu Tiba :</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="<?= $waktu ?>">
                    </div>
                    <label for="nama" class="col-sm-2 col-form-label">Catatan :</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" id="catatan" name="catatan" rows="3"><?= $catatan ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success tombolUpdateMobilPetugas">Update</button>
                <button type="reset" class="btn btn-outline-warning">Reset</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#mobil').select2({
            theme: 'bootstrap4',
        });

        $('#mobil').change(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "<?= site_url('kejadian/ambilDataMobil') ?>",
                data: {
                    idmobil: $(this).val()
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        let data = response.sukses;

                        $('#petugas1').val(data.namapt1);
                        $('#petugas2').val(data.namapt2);
                        $('#petugas3').val(data.namapt3);
                        $('#petugas4').val(data.namapt4);
                    }

                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            html: response.error
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
        });

        $('.formupdatemobil').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolUpdateMobilPetugas').prop('disabled', true);
                    $('.tombolUpdateMobilPetugas').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolUpdateMobilPetugas').html('Update');
                    $('.tombolUpdateMobilPetugas').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.errorMobil) {
                            $('.errorMobil').html(response.error.errorMobil).show();
                            $('#mobil').addClass('is-invalid');
                        } else {
                            $('.errorMobil').fadeOut();
                            $('#mobil').removeClass('is-invalid');
                            $('#mobil').addClass('is-valid');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        }).then(result => {
                            if (result.isConfirmed) {
                                $('#modaleditmobilpetugas').on('hidden.bs.modal', function(event) {
                                    tampilDataMobilPetugas();
                                });
                                $('#modaleditmobilpetugas').modal('hide');
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