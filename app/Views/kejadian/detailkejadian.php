<?php
$session = \Config\Services::session();
?>
<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SENKOM</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA KEJADIAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Detail Kejadian</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-tasks"> Detail Data Kejadian</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="window.location='<?= site_url('kejadian/index') ?>'">
    <i class="fa fa-backward"> Kembali</i>
</button>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<?= form_open_multipart('', ['class' => 'formupdate']) ?>
<?php csrf_field(); ?>
<div class="form-group row">
    <input type="hidden" name="idkejadian" id="idkejadian" class="form-control" value="<?= $idkejadian ?>">
    <input type="hidden" name="idlaporan" id="idlaporan" class="form-control" value="<?= $nolaporan ?>">
    <input type="hidden" name="idstatus" id="idstatus" class="form-control" value="<?= $status ?>">
    <label for="nokejadian" class="col-sm-1 offset-1 col-form-label">Laporan :</label>
    <div class="col-sm-4">
        <?php foreach ($datalaporan->getResultArray() as $row) : ?>
            <?php if ($row['id_pelapor'] == $nolaporan) : ?>
                <input type="text" class="form-control" id="nolaporan" name="nolaporan" value="<?= $row['no_laporan'] ?>" readonly>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="invalid-feedback errorNolaporan"></div>
    </div>
    <label for="status" class="col-sm-1 col-form-label labelStatus">Status :</label>
    <div class="col-sm-4">
        <?php foreach ($datastatus as  $row) : ?>
            <?php if ($row['id_status'] == $status) : ?>
                <input type="text" class="form-control" id="status" name="status" value="<?= $row['deskripsi_status'] ?>" readonly>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<div class="row kejadian">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="" style="color: blue;">Kejadian</label>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-sm-2">Tipe :</label>
                <div class="form-group col-sm-8">
                    <div class="form-group row">
                        <div class="col-sm-4 form-check">
                            <input type="radio" class="form-check-input" id="tipeKecelakaan" name="tipe" value="kecelakaan" <?php if ($tipe == 'kecelakaan') echo "checked"; ?>>
                            <label class="form-check-label" for="tipe">Kecelakaan</label>
                        </div>
                        <div class="col-sm-4 form-check">
                            <input type="radio" class="form-check-input" id="tipeNonKecelakaan" name="tipe" value="non kecelakaan" <?php if ($tipe == 'non kecelakaan') echo "checked"; ?>>
                            <label class="form-check-label" for="tipe">Non Kecelakaan</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="card col-sm-7">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="" style="color: blue;">Informasi Waktu Kejadian & Penanganannya</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-4">Kejadian :</label>
                            <div class="form-group col-sm-6">
                                <input type="datetime-local" class="form-control" id="waktukejadian" name="waktukejadian" value="<?= date('Y-m-d\TH:i', strtotime($waktukejadian)) ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-4">Penanganan :</label>
                            <div class="form-group col-sm-6">
                                <input type="datetime-local" class="form-control" id="waktupenanganan" name="waktupenanganan" value="<?= date('Y-m-d\TH:i', strtotime($waktupenanganan)) ?>" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-4">selesai :</label>
                            <div class="form-group col-sm-6">
                                <input type="datetime-local" class="form-control" id="waktuselesai" name="waktuselesai" value="<?= date('Y-m-d\TH:i', strtotime($waktuselesai)) ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-sm-5">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="" style="color: blue;">Kondisi Saat Kejadian</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-5">Cuaca :</label>
                            <div class="form-group col-sm-7">
                                <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly value="<?= $cuaca ?>">
                                <div class="invalid-feedback errorCuaca"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-5">Hari Kejadian :</label>
                            <div class="form-group col-sm-7">
                                <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly value="<?= $harilibur ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label for="" style="color: blue;">Lokasi Kejadian</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $sta ?>">
                            <label for="" class="col-sm-2">STA/KM :</label>
                            <div class="form-group col-sm-4">
                                <?php foreach ($datasta as $row) : ?>
                                    <?php if ($row['id_sta'] == $sta) : ?>
                                        <input type="text" class="form-control" id="sta" name="sta" value="<?= $row['kode_lokasi'] ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <div class="invalid-feedback errorSta"></div>
                            </div>
                            <label for="" class="col-sm-2">Ruas :</label>
                            <div class="form-group col-sm-4">
                                <?php foreach ($datasta as $row) : ?>
                                    <?php if ($row['id_sta'] == $ruas) : ?>
                                        <input type="text" class="form-control" id="ruas" name="ruas" value="<?= $row['ruas'] ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-2">Keterangan :</label>
                            <div class="form-group col-sm-4">
                                <?php foreach ($datasta as $row) : ?>
                                    <?php if ($row['id_sta'] == $keteranganlokasi) : ?>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $row['deskripsi_lokasi'] ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <label for="" class="col-sm-2">Wilayah :</label>
                            <div class="form-group col-sm-4">
                                <?php foreach ($datasta as $row) : ?>
                                    <?php if ($row['id_sta'] == $wilayah) : ?>
                                        <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= $row['wilayah'] ?>" readonly>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-2">Lajur :</label>
                            <div class="form-group col-lg-4 col-md-3">
                                <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= $lajur ?>" readonly>
                            </div>
                            <label for="" class="col-sm-2">Kondisi Lalu Lintas :</label>
                            <div class="form-group col-lg-4 col-md-3">
                                <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?= $lalulintas ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row detailKejadian">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="form-row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <nav class="nav nav-pills">
                            <div class="nav nav-tabs" id="nav-tab">
                                <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#detail" role="tab">Detail Kejadian</a>
                                <a class="nav-item nav-link" id="nav-kecelkorban-tab" data-toggle="tab" href="#korban" role="tab">Korban Kecelakaan</a>
                                <a class="nav-item nav-link" id="nav-mobilkorban-tab" data-toggle="tab" href="#mobilkorban" role="tab">Mobil Terlibat</a>
                                <a class="nav-item nav-link" id="nav-mobilpetugas-tab" data-toggle="tab" href="#mobilpetugas" role="tab">Mobil Petugas</a>
                                <a class="nav-item nav-link" id="nav-tindakan-tab" data-toggle="tab" href="#tindakan" role="tab">Tindakan</a>
                                <a class="nav-item nav-link" id="nav-laporanterkait-tab" data-toggle="tab" href="#laporanterkait" role="tab">Laporan Terkait</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="detail" role="tabpanel">
                                <div class="form-row form1">
                                    <label for="" class="col-sm-2">Penyebab :</label>
                                    <div class="form-group col-sm-4">
                                        <?php foreach ($penyebabTab as $row) : ?>
                                            <?php if ($row['id_penyebab'] == $penyebab) : ?>
                                                <input type="text" class="form-control" readonly value="<?= $row['deskripsi_penyebab'] ?>">
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <label for="" class="col-sm-2">Posisi Mobil :</label>
                                    <div class="form-group col-sm-4">
                                        <input type="text" class="form-control" readonly value="<?= $posisi ?>">
                                    </div>
                                </div>
                                <div class="form-row form2">
                                    <label for="" class="col-sm-2">Detail Lokasi :</label>
                                    <div class="form-group col-sm-4">
                                        <input type="text" class="form-control" readonly value="<?= $lokasi ?>">
                                    </div>
                                    <label for="" class="col-sm-2">Tipe Kecelakaan :</label>
                                    <div class="form-group col-sm-4">
                                        <?php foreach ($tipeTab as $row) : ?>
                                            <?php if ($row['id_tipe_tabrakan'] == $tipetabrakan) : ?>
                                                <input type="text" class="form-control" readonly value="<?= $row['deskripsi_tipe'] ?>">
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-sm-2">Kode Gangguan :</label>
                                    <div class="form-group col-sm-4">
                                        <?php foreach ($gangguanTab as $row) : ?>
                                            <?php if ($row['id_gangguan'] == $gangguan) : ?>
                                                <input type="text" class="form-control" readonly value="<?= $row['deskripsi_gangguan'] ?>">
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-sm-2">Keterangan :</label>
                                    <div class="form-group col-sm-10">
                                        <textarea name="keterangan" id="keterangan" class="form-control" rows="5" style="font-size: 13px;" readonly><?= $keterangan ?></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-sm-2">Rekaman CCTV :</label>
                                    <div class="form-group col-sm-4">
                                        <video width="370" preload="metadata" controls="true" onclick="window.open('<?= base_url() ?>/<?= $file; ?>')">
                                            <source src="<?= base_url() ?>/<?= $file; ?>" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div id="korban" class="tab-pane fade" role="tabpanel">
                                <div class="form-row korban">

                                </div>
                            </div>
                            <div id="laporanterkait" class="tab-pane fade" role="tabpanel">
                                <div class="form-row laporanTerkait">

                                </div>
                            </div>
                            <div id="mobilkorban" class="tab-pane fade" role="tabpanel">
                                <div class="form-row mobilKorban">

                                </div>
                            </div>
                            <div id="mobilpetugas" class="tab-pane fade" role="tabpanel">
                                <div class="form-row mobilPetugas">

                                </div>
                            </div>
                            <div id="tindakan" class="tab-pane fade" role="tabpanel">
                                <div class="form-row tindakan">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>
<div class="datamodal" style="display: none;"></div>
<script>
    function ambilDataSta() {
        let id = $('#id').val();

        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/ambilDataSta') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    let data = response.sukses;
                    $('#sta').val(data.sta);
                    $('#keterangan').val(data.keterangan);
                    $('#ruas').val(data.ruas);
                    $('#wilayah').val(data.wilayah);
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
    }

    function ambilDataLaporan() {
        let idlaporan = $('#idlaporan').val();

        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/ambilDataLaporan') ?>",
            data: {
                idlaporan: idlaporan
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    let data = response.sukses;

                    $('#idkejadian').val(response.idkejadian);
                    $('#nolaporan').val(data.nolaporan);

                    $('.labelStatus').show();
                    $('.formStatus').show();
                    $('.tombolStatus').show();
                    $('.kejadian').show();
                    $('.detailKejadian').show();
                    $('.detailLaporan').show();
                    $('.tombolAksi').show();

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
    }

    function tampilDataLaporan() {
        let idlaporanterkait = $('#idlaporanterkait').val();
        let idkejadian = $('#idkejadian').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/tampilDataLaporan') ?>",
            data: {
                idlaporanterkait: idlaporanterkait,
                idkejadian: idkejadian
            },
            dataType: "json",
            beforeSend: function() {
                $('.laporanTerkait').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.data) {
                    $('.laporanTerkait').html(response.data);
                }

                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses,
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function tampilDataHapusLaporan() {
        let idkejadian = $('#idkejadian').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/tampilDataLaporanHapus') ?>",
            data: {
                idkejadian: idkejadian
            },
            dataType: "json",
            beforeSend: function() {
                $('.laporanTerkait').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.data) {
                    $('.laporanTerkait').html(response.data);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function tampilDataKorban() {
        let idkejadian = $('#idkejadian').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/tampilDataKorban') ?>",
            data: {
                idkejadian: idkejadian
            },
            dataType: "json",
            beforeSend: function() {
                $('.korban').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.data) {
                    $('.korban').html(response.data);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function tampilDataMobilKorban() {
        let idkejadian = $('#idkejadian').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/tampilDataMobilKorban') ?>",
            data: {
                idkejadian: idkejadian
            },
            dataType: "json",
            beforeSend: function() {
                $('.mobilKorban').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.data) {
                    $('.mobilKorban').html(response.data);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function tampilDataMobilPetugas() {
        let idkejadian = $('#idkejadian').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/tampilDataMobilPetugas') ?>",
            data: {
                idkejadian: idkejadian
            },
            dataType: "json",
            beforeSend: function() {
                $('.mobilPetugas').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.data) {
                    $('.mobilPetugas').html(response.data);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function tampilDataTindakan() {
        let idkejadian = $('#idkejadian').val();
        $.ajax({
            type: "post",
            url: "<?= site_url('kejadian/tampilDataTindakan') ?>",
            data: {
                idkejadian: idkejadian
            },
            dataType: "json",
            beforeSend: function() {
                $('.tindakan').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            success: function(response) {
                if (response.data) {
                    $('.tindakan').html(response.data);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }


    $(document).ready(function() {

        $('body').addClass('sidebar-collapse');

        $('#cuaca').select2({
            theme: 'bootstrap4',
        });
        $('#lajur').select2({
            theme: 'bootstrap4',
        });
        $('#lokasi').select2({
            theme: 'bootstrap4',
        });
        $('#penyebab').select2({
            theme: 'bootstrap4',
        });
        $('#gangguan').select2({
            theme: 'bootstrap4',
        });
        $('#tipeTabrakan').select2({
            theme: 'bootstrap4',
        });

        $('input:radio[name=tipe]').each(function() {
            if ($(this).is(':checked')) {
                var tipe = $(this).val();
                if (tipe == 'kecelakaan') {
                    $('#penyebab').attr('disabled', false);
                    $('#lokasi').attr('disabled', false);
                    $('#tipeTabrakan').attr('disabled', false);
                    $('.form1').show();
                    $('.form2').show();
                    $('#nav-kecelkorban-tab').show();
                } else if (tipe == 'non kecelakaan') {
                    $('#penyebab').attr('disabled', true);
                    $('#lokasi').attr('disabled', true);
                    $('#tipeTabrakan').attr('disabled', true);
                    $('.form1').hide();
                    $('.form2').hide();
                    $('#nav-kecelkorban-tab').hide();
                }
            }
        });

        $('#nav-kecelkorban-tab').click(function(e) {
            e.preventDefault();

            tampilDataKorban();
        });

        $('#nav-mobilkorban-tab').click(function(e) {
            e.preventDefault();

            tampilDataMobilKorban();
        });

        $('#nav-mobilpetugas-tab').click(function(e) {
            e.preventDefault();

            tampilDataMobilPetugas();
        });

        $('#nav-tindakan-tab').click(function(e) {
            e.preventDefault();

            tampilDataTindakan();
        });

        $('#nav-laporanterkait-tab').click(function(e) {
            e.preventDefault();

            tampilDataHapusLaporan();
        });

        $('#tipeKecelakaan').click(function() {

            $('#penyebab').attr('disabled', false);
            $('#lokasi').attr('disabled', false);
            $('#tipeTabrakan').attr('disabled', false);
            $('.form1').show();
            $('.form2').show();
            $('#nav-kecelkorban-tab').show();
        });

        $('#tipeNonKecelakaan').click(function() {
            $('#penyebab').attr('disabled', true);
            $('#lokasi').attr('disabled', true);
            $('#tipeTabrakan').attr('disabled', true);
            $('.form1').hide();
            $('.form2').hide();
            $('#nav-kecelkorban-tab').hide();
        });

        $('#tombolCariNoLaporan').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('kejadian/cariDataLaporan') ?>",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modalcarilaporan').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolLaporanTerkait').click(function(e) {
            e.preventDefault();
            let idkejadian = $('#idkejadian').val();
            $.ajax({
                url: "<?= site_url('kejadian/laporanTerkait') ?>",
                dataType: "json",
                type: "post",
                data: {
                    idkejadian: idkejadian
                },
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modallaporanterkait').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolCariSta').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('kejadian/cariDataSta') ?>",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modalcarista').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolUpdateStatus').click(function(e) {
            e.preventDefault();
            let idkejadian = $('#idkejadian').val();
            $.ajax({
                url: "<?= site_url('kejadian/formeditstatus') ?>",
                dataType: "json",
                type: "post",
                data: {
                    idkejadian: idkejadian,
                    idstatus: $('#idstatus').val()
                },
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modaleditstatus').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });

        });

        $('#tombolMobilPetugas').click(function(e) {
            e.preventDefault();
            let idkejadian = $('#idkejadian').val();
            $.ajax({
                url: "<?= site_url('kejadian/formMobilPetugas') ?>",
                type: "post",
                data: {
                    idkejadian: idkejadian
                },
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modalmobilpetugas').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolDetailMobilPetugas').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('kejadian/formDetailMobilPetugas') ?>",
                type: "post",
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modaldetailmobilpetugas').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolKorban').click(function(e) {
            e.preventDefault();
            let idkejadian = $('#idkejadian').val();
            $.ajax({
                url: "<?= site_url('kejadian/formKorban') ?>",
                type: "post",
                data: {
                    idkejadian: idkejadian
                },
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modalkorban').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolMobilKorban').click(function(e) {
            e.preventDefault();
            let idkejadian = $('#idkejadian').val();
            $.ajax({
                url: "<?= site_url('kejadian/formMobilKorban') ?>",
                type: "post",
                data: {
                    idkejadian: idkejadian
                },
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modalmobilkorban').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('#tombolTindakan').click(function(e) {
            e.preventDefault();
            let idkejadian = $('#idkejadian').val();
            $.ajax({
                url: "<?= site_url('kejadian/formTindakan') ?>",
                type: "post",
                data: {
                    idkejadian: idkejadian
                },
                dataType: "json",
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modaltindakan').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $('.tombolUpdate').click(function(e) {
            e.preventDefault();
            let form = $('.formupdate')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= site_url('kejadian/updatedata') ?>",
                data: data,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.tombolUpdate').prop('disabled', true);
                    $('.tombolUpdate').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolUpdate').html('Update');
                    $('.tombolUpdate').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.errorSta) {
                            $('.errorSta').html(response.error.errorSta).show();
                            $('#sta').addClass('is-invalid');
                        } else {
                            $('.errorSta').fadeOut();
                            $('#sta').removeClass('is-invalid');
                            $('#sta').addClass('is-valid');
                        }

                        if (response.error.errorCuaca) {
                            $('.errorCuaca').html(response.error.errorCuaca).show();
                            $('#cuaca').addClass('is-invalid');
                        } else {
                            $('.errorCuaca').fadeOut();
                            $('#cuaca').removeClass('is-invalid');
                            $('#cuaca').addClass('is-valid');
                        }

                        if (response.error.errorNolaporan) {
                            $('.errorNolaporan').html(response.error.errorNolaporan).show();
                            $('#nolaporan').addClass('is-invalid');
                        } else {
                            $('.errorNolaporan').fadeOut();
                            $('#nolaporan').removeClass('is-invalid');
                            $('#nolaporan').addClass('is-valid');
                        }

                        if (response.error.errorFile) {
                            $('.errorFile').html(response.error.errorFile).show();
                            $('#file').addClass('is-invalid');
                        } else {
                            $('.errorFile').fadeOut();
                            $('#file').removeClass('is-invalid');
                            $('#file').addClass('is-valid');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil diupdate',
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