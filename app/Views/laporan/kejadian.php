<?= $this->extend("template/main") ?>

<?= $this->section("title") ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section("judul") ?>
DATA LAPORAN KEJADIAN
<?= $this->endSection() ?>

<?= $this->section("menu") ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Laporan</a></li>
    <li class="breadcrumb-item active">Kejadian</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>

<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>

<?= $this->endSection() ?>

<?= $this->section("isi") ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Pilih Periode</div>
            <div class="card-body bg-white">
                <p class="card-text">
                <form action="<?= site_url('laporan/laporanKejadian') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" name="tglawal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success tombolExport">
                            <i class="fas fa-file-excel"></i> Cetak Excel
                        </button>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>