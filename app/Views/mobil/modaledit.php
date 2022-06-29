<!-- Modal -->
<div class="modal fade" id="modaleditmobil" aria-labelledby="modaleditmobilLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('mobil/updatedata', ['class' => 'formtambah']) ?>
            <?php csrf_field(); ?>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label">Kode Mobil</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>">
                        <div class="invalid-feedback errorKode" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label">Nama Mobil</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                        <div class="invalid-feedback errorNama" style="display: none;"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-4 col-form-label">Jenis Mobil</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="AMBULANCE" <?php if ($jenis == 'AMBULANCE') echo "selected"; ?>>AMBULANCE</option>
                            <option value="DEREK" <?php if ($jenis == 'DEREK') echo "selected"; ?>>DEREK</option>
                            <option value="PATROLI" <?php if ($jenis == 'PATROLI') echo "selected"; ?>>PATROLI</option>
                            <option value="PJR" <?php if ($jenis == 'PJR') echo "selected"; ?>>PJR</option>
                            <option value="RESCUE" <?php if ($jenis == 'RESCUE') echo "selected"; ?>>RESCUE</option>
                            <option value="ZEBRA" <?php if ($jenis == 'ZEBRA') echo "selected"; ?>>ZEBRA</option>
                            <option value="LAIN-LAIN" <?php if ($jenis == 'LAIN-LAIN') echo "selected"; ?>>LAIN-LAIN</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nopol" class="col-sm-4 col-form-label">No Polisi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nopol" name="nopol" value="<?= $nopol; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-4 form-check">
                        <input type="radio" class="form-check-input" id="status" name="status" value="aktif" <?php if ($status == 'aktif') echo "checked"; ?>>
                        <label class="form-check-label" for="status">Aktif</label>
                    </div>
                    <div class="col-sm-4 form-check">
                        <input type="radio" class="form-check-input" id="status" name="status" value="tidak aktif" <?php if ($status == 'tidak aktif') echo "checked"; ?>>
                        <label class="form-check-label" for="status">Tidak Aktif</label>
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
    $(document).ready(function() {
        $('#jenis').select2({
            theme: 'bootstrap4',
        });

        $('.formtambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolSimpan').prop('disabled', true);
                    $('.tombolSimpan').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolSimpan').html('Update');
                    $('.tombolSimpan').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.errorKode) {
                            $('.errorKode').html(response.error.errorKode).show();
                            $('#kode').addClass('is-invalid');
                        } else {
                            $('.errorKode').fadeOut();
                            $('#kode').removeClass('is-invalid');
                            $('#kode').addClass('is-valid');
                        }
                        if (response.error.errorNama) {
                            $('.errorNama').html(response.error.errorNama).show();
                            $('#nama').addClass('is-invalid');
                        } else {
                            $('.errorNama').fadeOut();
                            $('#nama').removeClass('is-invalid');
                            $('#nama').addClass('is-valid');
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