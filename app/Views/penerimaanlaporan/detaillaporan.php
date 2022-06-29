<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>Central Information Platform</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA PENERIMAAN LAPORAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Detail Laporan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-tasks"> Detail Laporan</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="window.location='<?= site_url('penerimaanlaporan/index') ?>'">
    <i class="fa fa-backward"> Kembali</i>
</button>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<input type="hidden" name="id" id="id" value="<?= $id ?>">
<div class="form-group row">
    <label for="" class="col-sm-2 col-form-label" style="color: blue;">No. Laporan :</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly value="<?= $nolaporan ?>">
    </div>
    <label for="" class="col-sm-2" style="color: blue;">Tanggal Laporan :</label>
    <div class="form-group col-sm-4">
        <input type="datetime-local" class="form-control" id="tgllaporan" name="tgllaporan" readonly value="<?= $tgllaporan ?>">
    </div>
</div>
<div class="form-group row">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="form-row">
                <label for="" class="col-sm-2">Kategori Laporan :</label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly value="<?= $kategorilaporan ?>">
                </div>
                <label for="" class="col-sm-2">Sumber Informasi :</label>
                <div class="form-group col-sm-4">
                    <?php foreach ($datainformasi as $row) : ?>
                        <?php if ($row['id_informasi'] == $informasilaporan) : ?>
                            <input type="text" class="form-control" readonly value="<?= $row['deskripsi_informasi'] ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">Nama Pelapor:</label>
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly value="<?= $namapelapor ?>">
                </div>
                <label for="" class="col-sm-2">Kode Gangguan :</label>
                <div class="form-group col-sm-4">
                    <?php foreach ($datagangguan as $row) : ?>
                        <?php if ($row['id_gangguan'] == $gangguanlaporan) : ?>
                            <input type="text" class="form-control" readonly value="<?= $row['deskripsi_gangguan'] ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">Kontak Pelapor:</label>
                <div class="form-group col-sm-4">
                    <textarea class="form-control" name="kontak" id="kontak" rows="3" readonly><?= $kontakpelapor; ?></textarea>
                </div>
                <label for="" class="col-sm-2">Keterangan Laporan :</label>
                <div class="form-group col-sm-4">
                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3" readonly><?= $keteranganlaporan; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">No. Telp :</label>
                <div class="form-group col-sm-4">
                    <input type="number" class="form-control" id="notlp" name="notlp" readonly value="<?= $notlppelapor ?>">
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
        </div>
    </div>
</div>
<?= $this->endSection() ?>