<?= $this->extend("template/dashboard") ?>

<?= $this->section("title") ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section("judul") ?>
Dashboard Simasjantan
<?= $this->endSection() ?>

<?= $this->section("menu") ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active"></li>
</ol>
<?= $this->endSection() ?>

<?= $this->section("isi") ?>
<div class="row">
    <div class="card col-lg-12">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="card col-lg-4 col-12">
                    <div class="card-header" style="font-weight: bold; font-size:15px;"><i class="fas fa-clipboard-list mr-1"></i>Data Kejadian</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5><?= hitungKejadianHariIni() ?><i class="fab fa-accessible-icon ml-4"></i></h5>

                                        <p style="font-size: 12px;">Hari Ini</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5><?= hitungKejadianBulanIni() ?><i class="fab fa-accessible-icon ml-4"></i></h5>

                                        <p style="font-size: 12px;">Bulan Ini</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5><?= hitungKejadianTahunIni() ?><i class="fab fa-accessible-icon ml-4"></i></h5>

                                        <p style="font-size: 12px;">Tahun Ini</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-12">
                    <div class="card-header" style="font-weight: bold; font-size:15px;"><i class="fa fa-user mr-1"></i>Data Korban Kecelakaan Per Tahun</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <div class="small-box  bg-danger">
                                    <div class="inner">
                                        <h5><?= totalKematian() ?><i class="fas fa-bed ml-4"></i></h5>

                                        <p style="font-size: 12px;">Meninggal</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-sm-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="small-box  bg-danger">
                                    <div class="inner">
                                        <h5><?= totalLukaRingan() ?><i class="fas fa-user-nurse ml-4"></i></h5>

                                        <p style="font-size: 12px;">Luka Ringan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="small-box  bg-danger">
                                    <div class="inner">
                                        <h5><?= totalLukaBerat() ?><i class="fas fa-user-injured ml-4"></i></h5>

                                        <p style="font-size: 12px;">Luka Berat</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-12">
                    <div class="card-header" style="font-weight: bold; font-size:15px;"><i class="fas fa-tasks mr-1"></i>Tipe Kejadian Per Tahun</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="small-box  bg-secondary">
                                    <div class="inner">
                                        <h5><?= nonKecelakaan() ?><i class="fas fa-car ml-5"></i></h5>

                                        <p style="font-size: 12px;">Non Kecelakaan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h5><?= kecelakaan() ?><i class="fas fa-car-crash ml-5"></i></h5>

                                        <p style="font-size: 12px;">Kecelakaan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card col-lg-12">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="card col-lg-4 col-12">
                    <div class="card-header" style="font-weight: bold; font-size:15px;"><i class="fas fa-clipboard mr-1"></i>Data Laporan</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5><?= hitungLaporanHariIni() ?><i class="fas fa-save ml-4"></i></h5>

                                        <p style="font-size: 12px;">Hari Ini</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5><?= hitungLaporanBulanIni() ?><i class="fas fa-save ml-4"></i></h5>

                                        <p style="font-size: 12px;">Bulan Ini</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5><?= hitungLaporanTahunIni() ?><i class="fas fa-save ml-4"></i></h5>

                                        <p style="font-size: 12px;">Tahun Ini</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-8 col-12">
                    <div class="card-header" style="font-weight: bold; font-size:15px;"><i class="fas fa-info-circle mr-1"></i>Data Sumber Inforasi Per Tahun</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5><?= radioKomunikasi() ?><i class="fas fa-broadcast-tower ml-5"></i></h5>

                                        <p style="font-size: 12px;">Radio Komunikasi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5><?= cctvSenkom() ?><i class="fas fa-tv ml-5"></i></h5>

                                        <p style="font-size: 12px;">CCTV Senkom</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5><?= sosialMedia() ?><i class="fab fa-whatsapp ml-5"></i><i class="fab fa-instagram"></i><i class="fab fa-twitter"></i></h5>

                                        <p style="font-size: 12px;">Sosial Media</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5><?= telepon() ?><i class="fas fa-phone ml-5"></i></h5>

                                        <p style="font-size: 12px;">Telepon</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card col-lg-12 col-12">
        <div class="card-header" style="font-weight: bold; font-size:15px;">
            <i class="fas fa-tasks mr-1"></i>Kejadian Hari Ini
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped" width="100%">
                    <thead align="center">
                        <tr>
                            <th>No</th>
                            <th>Waktu Kejadian</th>
                            <th>Status Kejadian</th>
                            <th>Tipe Kejadian</th>
                            <th>Kode Gangguan</th>
                            <th>Lokasi</th>
                            <th>Waktu Selesai</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <?php
                        $no = 1;
                        foreach ($datakejadian->getResultArray() as $row) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date("d-m-Y H:i", strtotime($row["waktu_kejadian"])) ?></td>
                                <td>
                                    <?php if ($row["deskripsi_status"] == "LAPORAN - BELUM ADA PETUGAS") { ?>
                                        <span class="badge badge-info" style="font-size:12px;">LAPORAN - BELUM ADA PETUGAS</span>
                                </td>
                            <?php } elseif ($row["deskripsi_status"] == "SEDANG DITANGANI PETUGAS") { ?>
                                <span class="badge badge-danger" style="font-size:12px;">SEDANG DITANGANI PETUGAS</span></td>
                            <?php } elseif ($row["deskripsi_status"] == "PENDING") { ?>
                                <span class="badge badge-warning" style="font-size:12px;">PENDING</span></td>
                            <?php } else { ?>
                                <span class="badge badge-success" style="font-size:12px;">SELESAI</span></td>
                            <?php } ?>
                            </td>
                            <td><?= $row["tipe_kejadian"] ?></td>
                            <td><?= $row["deskripsi_gangguan"] ?></td>
                            <td><?= $row["kode_lokasi"] ?></td>
                            <td>
                                <?php if ($row["waktu_selesai_penanganan"] == null || $row["waktu_selesai_penanganan"] == "0000-00-00 00:00:00") { ?>
                                    <p>-</p>
                                <?php } else { ?>
                                    <?= date("d-m-Y H:i", strtotime($row["waktu_selesai_penanganan"])) ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($row["deskripsi_status"] == "SELESAI") : ?>
                                    <button type="button" class="btn btn-success btn-sm" onclick="detail('<?= sha1($row["id_kejadian"]) ?>')">Lihat</button>
                                <?php endif; ?>
                                <?php if ($row["deskripsi_status"] == "LAPORAN - BELUM ADA PETUGAS" || $row["deskripsi_status"] == "SEDANG DITANGANI PETUGAS") : ?>
                                    <button type="button" class="btn btn-success btn-sm" onclick="detail('<?= sha1($row["id_kejadian"]) ?>')">Lihat</button>
                                    <?php if (session()->level_user == 'admin') : ?>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="edit('<?= sha1($row["id_kejadian"]) ?>')">Update</button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id) {
        window.location.href = "<?= site_url("kejadian/editKejadian/") ?>" + id;
    }

    function detail(id) {
        window.location.href = "<?= site_url("kejadian/detailKejadian/") ?>" + id;
    }

    setTimeout(function() {
        location.reload();
    }, 300000);
</script>
<?= $this->endSection() ?>