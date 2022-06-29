<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SENKOM</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA PENERIMAAN LAPORAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Edit Laporan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-tasks"> Edit Laporan</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="window.location='<?= site_url('penerimaanlaporan/index') ?>'">
    <i class="fa fa-backward"> Kembali</i>
</button>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<?= form_open_multipart('', ['class' => 'formedit']) ?>
<?= csrf_field() ?>
<input type="hidden" name="id" id="id" value="<?= $id ?>">
<div class="form-group row">
    <label for="nolaporan" class="col-sm-2 col-form-label" style="color: blue;">No. Laporan :</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly value="<?= $nolaporan ?>">
    </div>
    <label for="" class="col-sm-2" style="color: blue;">Tanggal Laporan :</label>
    <div class="form-group col-sm-4">
        <input type="datetime-local" class="form-control" id="tgllaporan" name="tgllaporan" value="<?= $tgllaporan ?>">
    </div>
</div>
<div class="form-group row">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="form-row">
                <label for="" class="col-sm-2">Kategori Laporan :</label>
                <div class="form-group col-sm-4">
                    <select class="form-control" name="kategori" id="kategori">
                        <option value="INFORMASI" <?php if ($kategorilaporan == 'INFORMASI') echo "selected"; ?>>INFORMASI</option>
                        <option value="PELAYANAN" <?php if ($kategorilaporan == 'PELAYANAN') echo "selected"; ?>>PELAYANAN</option>
                        <option value="PENGADUAN" <?php if ($kategorilaporan == 'PENGADUAN') echo "selected"; ?>>PENGADUAN</option>
                    </select>
                    <div class="invalid-feedback errorKategori" style="display: none;"></div>
                </div>
                <label for="" class="col-sm-2">Sumber Informasi :</label>
                <div class="form-group col-sm-4">
                    <select name="informasi" id="informasi" class="form-control">
                        <?php foreach ($datainformasi as $row) : ?>
                            ` <?php if ($row['id_informasi'] == $informasilaporan) : ?>
                                <option selected value="<?= $row['id_informasi'] ?>"><?= $row['deskripsi_informasi'] ?></option>
                            <?php else : ?>
                                <option value="<?= $row['id_informasi'] ?>"><?= $row['deskripsi_informasi'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback errorInformasi" style="display: none;"></div>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">Nama Pelapor:</label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $namapelapor ?>">
                    <div class="invalid-feedback errorNama" style="display: none;"></div>
                </div>
                <label for="" class="col-sm-2">Kode Gangguan :</label>
                <div class="form-group col-sm-4">
                    <select name="gangguan" id="gangguan" class="form-control">
                        <?php foreach ($datagangguan as $row) : ?>
                            ` <?php if ($row['id_gangguan'] == $gangguanlaporan) : ?>
                                <option selected value="<?= $row['id_gangguan'] ?>"><?= $row['deskripsi_gangguan'] ?></option>
                            <?php else : ?>
                                <option value="<?= $row['id_gangguan'] ?>"><?= $row['deskripsi_gangguan'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback errorGangguan" style="display: none;"></div>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">Kontak Pelapor:</label>
                <div class="form-group col-sm-4">
                    <textarea class="form-control" name="kontak" id="kontak" rows="3"><?= $kontakpelapor ?></textarea>
                </div>
                <label for="" class="col-sm-2">Keterangan Laporan :</label>
                <div class="form-group col-sm-4">
                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $keteranganlaporan ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">No. Telp :</label>
                <div class="form-group col-sm-4">
                    <input type="number" class="form-control" id="notlp" name="notlp" value="<?= $notlppelapor ?>">
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">File :</label>
                <div class="form-group col-sm-4">
                    <a href="<?= base_url($file) ?>" download><i class="fa fa-download"> Jika file berupa gambar klik disini untuk mendownload</i></a><br>
                    <video width="400" preload="metadata" autobuffer="true" controls="true" poster="<?= base_url($file) ?>" onclick="window.open('<?= base_url($file) ?>')">
                        <source src="<?= base_url($file) ?>" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">Ganti File (<i>Jika Ada</i>) :</label>
                <div class="form-group col-sm-4">
                    <input type="file" class="form-control" id="file" name="file" style="font-size: 13px;">
                    <div class="invalid-feedback errorFile" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-6 offset-1">
        <button type="submit" class="btn btn-success tombolUpdateLaporan">Update</button>
        <button type="button" class="btn btn-warning" onclick="window.location='<?= site_url('penerimaanlaporan/index') ?>'">Batal</button>
    </div>
</div>
<?= form_close(); ?>

<script>
    $(document).ready(function() {
        $('body').addClass('sidebar-collapse');

        $('#kategori').select2({
            theme: 'bootstrap4',
        });
        $('#informasi').select2({
            theme: 'bootstrap4',
        });
        $('#gangguan').select2({
            theme: 'bootstrap4',
        });

        $('.tombolUpdateLaporan').click(function(e) {
            e.preventDefault();
            let form = $('.formedit')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= site_url('penerimaanlaporan/updatedata') ?>",
                data: data,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.tombolUpdateLaporan').html('<i class="fas fa-spinner fa-spin"></i>');
                    $('.tombolUpdateLaporan').prop('disabled', true);
                },
                complete: function() {
                    $('.tombolUpdateLaporan').html('Update');
                    $('.tombolUpdateLaporan').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        let dataError = response.error;

                        if (dataError.errorKategori) {
                            $('.errorKategori').html(dataError.errorKategori).show();
                            $('#kategori').addClass('is-invalid');
                        } else {
                            $('.errorKategori').fadeOut();
                            $('#kategori').removeClass('is-invalid');
                        }

                        if (dataError.errorInformasi) {
                            $('.errorInformasi').html(dataError.errorInformasi).show();
                            $('#informasi').addClass('is-invalid');
                        } else {
                            $('.errorInformasi').fadeOut();
                            $('#informasi').removeClass('is-invalid');
                        }

                        if (dataError.errorGangguan) {
                            $('.errorGangguan').html(dataError.errorGangguan).show();
                            $('#gangguan').addClass('is-invalid');
                        } else {
                            $('.errorGangguan').fadeOut();
                            $('#gangguan').removeClass('is-invalid');
                        }

                        if (dataError.errorNama) {
                            $('.errorNama').html(dataError.errorNama).show();
                            $('#nama').addClass('is-invalid');
                        } else {
                            $('.errorNama').fadeOut();
                            $('#nama').removeClass('is-invalid');
                        }

                        if (dataError.errorFile) {
                            $('.errorFile').html(dataError.errorFile).show();
                            $('#file').addClass('is-invalid');
                        } else {
                            $('.errorFile').fadeOut();
                            $('#file').removeClass('is-invalid');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Diupdate',
                        }).then(result => {
                            if (result.isConfirmed) {
                                window.location = response.sukses.link;
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
<?= $this->endSection() ?>