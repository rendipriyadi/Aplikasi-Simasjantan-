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
    <li class="breadcrumb-item active">Input Kejadian</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-tasks"> Input Data Kejadian</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-warning" onclick="window.location='<?= site_url('kejadian/index') ?>'">
    <i class="fa fa-backward"> Kembali</i>
</button>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<?= form_open_multipart('', ['class' => 'formtambah']) ?>
<?php csrf_field(); ?>
<div class="form-group row">
    <input type="hidden" name="idkejadian" id="idkejadian" class="form-control">
    <input type="hidden" name="idlaporan" id="idlaporan" class="form-control">
    <label for="nokejadian" class="col-sm-1 col-form-label">Laporan :</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="nolaporan" name="nolaporan" readonly>
        <div class="invalid-feedback errorNolaporan" style="display: none;"></div>
    </div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-info" id="tombolCariNoLaporan">Pilih Laporan</button>
    </div>
    <label for="status" class="col-sm-1 col-form-label labelStatus" style="display: none;">Status :</label>
    <input type="hidden" name="idstatus" id="idstatus" class="form-control">
    <div class="col-sm-3">
        <input type="text" class="form-control formStatus" style="display: none;" id="status" name="status" readonly>
    </div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-info tombolStatus" style="display: none;" id="tombolUpdateStatus">Pilih Status</button>
    </div>
</div>
<div class="row kejadian" style="display: none;">
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
                            <input type="radio" class="form-check-input" id="tipeKecelakaan" name="tipe" value="kecelakaan">
                            <label class="form-check-label" for="tipe">Kecelakaan</label>
                        </div>
                        <div class="col-sm-4 form-check">
                            <input type="radio" class="form-check-input" id="tipeNonKecelakaan" name="tipe" checked value="non kecelakaan">
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
                                <input type="datetime-local" class="form-control" id="waktukejadian" name="waktukejadian" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-4">Penanganan :</label>
                            <div class="form-group col-sm-6">
                                <input type="datetime-local" class="form-control" id="waktupenanganan" name="waktupenanganan" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-4">selesai :</label>
                            <div class="form-group col-sm-6">
                                <input type="datetime-local" class="form-control" id="waktuselesai" name="waktuselesai" readonly>
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
                                <select name="cuaca" id="cuaca" class="form-control">
                                    <option value="">Pilih Cuaca</option>
                                    <option value="CERAH">CERAH</option>
                                    <option value="GERIMIS">GERIMIS</option>
                                    <option value="HUJAN">HUJAN</option>
                                    <option value="MENDUNG">MENDUNG</option>
                                </select>
                                <div class="invalid-feedback errorCuaca" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-5">Hari Kejadian :</label>
                            <div class="form-group col-sm-7">
                                <select name="harilibur" id="harilibur" class="form-control" style="font-size: 13px;">
                                    <option value="">Pilih Hari Kejadian</option>
                                    <option value="HARI KERJA">HARI KERJA</option>
                                    <option value="HARI LIBUR">HARI LIBUR</option>
                                </select>
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
                            <input type="hidden" class="form-control" id="id" name="id">
                            <label for="" class="col-sm-2">STA/KM :</label>
                            <div class="form-group col-sm-3">
                                <input type="text" class="form-control" id="sta" name="sta">
                                <div class="invalid-feedback errorSta" style="display: none;"></div>
                            </div>
                            <div class="orm-group col-sm-1">
                                <button type="button" class="btn btn-info" id="tombolCariSta">Pilih</button>
                            </div>
                            <label for="" class="col-sm-2">Ruas :</label>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" id="ruas" name="ruas" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-2">Keterangan :</label>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" readonly>
                            </div>
                            <label for="" class="col-sm-2">Wilayah :</label>
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control" id="wilayah" name="wilayah" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="" class="col-sm-2">Lajur :</label>
                            <div class="form-group col-lg-4 col-md-3">
                                <select name="lajur" id="lajur" class="form-control">
                                    <option value="">Pilih Lajur</option>
                                    <option value="LAJUR 1">LAJUR 1</option>
                                    <option value="LAJUR 2">LAJUR 2</option>
                                    <option value="LAJUR 3">LAJUR 3</option>
                                </select>
                            </div>
                            <label for="" class="col-sm-2">Kondisi Lalu Lintas :</label>
                            <div class="form-group col-lg-4 col-md-3">
                                <select name="lalulintas" id="lalulintas" class="form-control" style="font-size: 13px;">
                                    <option value="">Pilih Kondisi Lalu Lintas</option>
                                    <option value="LANCAR">LANCAR</option>
                                    <option value="RAMAI LANCAR">RAMAI LANCAR</option>
                                    <option value="PADAT">PADAT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row detailKejadian" style="display: none;">
    <div class="card col-sm-12">
        <div class="card-body">
            <div class="form-row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <nav class="nav nav-pills">
                            <div class="nav nav-tabs" id="nav-tab">
                                <a class="nav-item nav-link active" id="nav-detail-tab" data-toggle="tab" href="#detail" role="tab">Detail Kejadian</a>
                                <a class="nav-item nav-link" id="nav-kecelkorban-tab" data-toggle="tab" href="#korban" role="tab">Korban</a>
                                <a class="nav-item nav-link" id="nav-mobilkorban-tab" data-toggle="tab" href="#mobilkorban" role="tab">Mobil Terlibat</a>
                                <a class="nav-item nav-link" id="nav-korban-tab" data-toggle="tab" href="#mobilpetugas" role="tab">Mobil Petugas</a>
                                <a class="nav-item nav-link" id="nav-korban-tab" data-toggle="tab" href="#tindakan" role="tab">Tindakan</a>
                                <a class="nav-item nav-link" id="nav-korban-tab" data-toggle="tab" href="#laporanterkait" role="tab">Laporan Terkait</a>
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
                                    <div class="form-group col-lg-4 col-sm-3">
                                        <select name="penyebab" id="penyebab" class="form-control">
                                            <option value="">Pilih Penyebab</option>
                                            <?php foreach ($penyebab as $row) : ?>
                                                <option value="<?= $row['id_penyebab'] ?>"><?= $row['deskripsi_penyebab'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <label for="" class="col-sm-2">Posisi Mobil :</label>
                                    <div class="form-group col-lg-4 col-sm-3">
                                        <select name="posisi" id="posisi" class="form-control" style="font-size: 13px;">
                                            <option value="">Pilih Posisi Mobil</option>
                                            <option value="MENYEBRANG">MENYEBRANG</option>
                                            <option value="TIDAK MENYEBRANG">TIDAK MENYEBRANG</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row form2">
                                    <label for="" class="col-sm-2">Detail Lokasi :</label>
                                    <div class="form-group col-lg-4 col-sm-3">
                                        <select name="lokasi" id="lokasi" class="form-control">
                                            <option value="">Pilih Lokasi</option>
                                            <option value="DAERAH GERBANG">DAERAH GERBANG</option>
                                            <option value="INTERCHANGE">INTERCHANGE</option>
                                            <option value="JALAN UTAMA">JALAN UTAMA</option>
                                            <option value="JALAN AKSES">JALAN AKSES</option>
                                            <option value="JEMBATAN">JEMBATAN</option>
                                            <option value="RAMP">RAMP</option>
                                            <option value="LOKASI LAINYA">LOKASI LAINYA</option>
                                        </select>
                                    </div>
                                    <label for="" class="col-sm-2">Tipe Kecelakaan :</label>
                                    <div class="form-group col-lg-4 col-sm-3">
                                        <select name="tipeTabrakan" id="tipeTabrakan" class="form-control">
                                            <option value="">Pilih Tipe Tabrakan</option>
                                            <?php foreach ($tipe as $row) : ?>
                                                <option value="<?= $row['id_tipe_tabrakan'] ?>"><?= $row['deskripsi_tipe'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-sm-2">Kode Gangguan :</label>
                                    <div class="form-group col-sm-4">
                                        <select name="gangguan" id="gangguan" class="form-control" style="font-size: 13px;">
                                            <option value="">Pilih Kode Gangguan</option>
                                            <?php foreach ($gangguan as $row) : ?>
                                                <option value="<?= $row['id_gangguan'] ?>"><?= $row['deskripsi_gangguan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-sm-2">Keterangan :</label>
                                    <div class="form-group col-sm-10">
                                        <textarea name="keterangan" id="keterangan" class="form-control" rows="5" style="font-size: 13px;"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-sm-2">Rekaman CCTV (<i>Jika Ada</i>) :</label>
                                    <div class="form-group col-sm-4">
                                        <input type="file" name="file" id="file" class="form-control" style="font-size: 13px;">
                                        <div class="invalid-feedback errorFile" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="korban" class="tab-pane fade" role="tabpanel">
                                <div class="form-row">
                                    <div class="card col-sm-12">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-info" id="tombolKorban"><i class="fa fa-plus-circle"> Korban</i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row korban">

                                </div>
                            </div>
                            <div id="laporanterkait" class="tab-pane fade" role="tabpanel">
                                <div class="form-row">
                                    <input type="hidden" name="idlaporanterkait" id="idlaporanterkait">
                                    <div class="card col-sm-12">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-info" id="tombolLaporanTerkait"><i class="fa fa-plus-circle"> Laporan Terkait</i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row laporanTerkait">

                                </div>
                            </div>
                            <div id="mobilkorban" class="tab-pane fade" role="tabpanel">
                                <div class="form-row">
                                    <div class="card col-sm-12">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-info" id="tombolMobilKorban"><i class="fa fa-plus-circle"> Mobil Korban</i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mobilKorban">

                                </div>
                            </div>
                            <div id="mobilpetugas" class="tab-pane fade" role="tabpanel">
                                <div class="form-row">
                                    <div class="card col-sm-12">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-info" id="tombolMobilPetugas"><i class="fa fa-plus-circle"> Mobil Petugas</i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mobilPetugas">

                                </div>
                            </div>
                            <div id="tindakan" class="tab-pane fade" role="tabpanel">
                                <div class="form-row">
                                    <div class="card col-sm-12">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-info" id="tombolTindakan"><i class="fa fa-plus-circle"> Tindakan</i></button>
                                        </div>
                                    </div>
                                </div>
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
<div class="form-row tombolAksi" style="display: none;">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-6 offset-1">
        <button type="submit" class="btn btn-success tombolSimpan">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>
</div>
<?= form_close(); ?>
<div class="datamodal" style="display: none;"></div>
<script>
    function disableClass() {
        $('#penyebab').attr('disabled', true);
        $('#lokasi').attr('disabled', true);
        $('#tipeTabrakan').attr('disabled', true);
        $('.form1').hide();
        $('.form2').hide();
        $('#nav-kecelkorban-tab').hide();
    }

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

                    tampilDataMobilKorban();
                    tampilDataHapusLaporan();
                    tampilDataTindakan();
                    tampilDataMobilPetugas();
                    tampilDataKorban()

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

        disableClass();

        $('#tipeKecelakaan').click(function() {

            $('#penyebab').attr('disabled', false);
            $('#lokasi').attr('disabled', false);
            $('#tipeTabrakan').attr('disabled', false);
            $('.form1').show();
            $('.form2').show();
            $('#nav-kecelkorban-tab').show();
        });

        $('#tipeNonKecelakaan').click(function() {
            disableClass();
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
                url: "<?= site_url('kejadian/formstatus') ?>",
                dataType: "json",
                type: "post",
                data: {
                    idkejadian: idkejadian
                },
                success: function(response) {
                    if (response.data) {
                        $('.datamodal').html(response.data).show();
                        $('#modalupdatestatus').modal('show');
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

        $('.tombolSimpan').click(function(e) {
            e.preventDefault();
            let form = $('.formtambah')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= site_url('kejadian/simpandata') ?>",
                data: data,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.tombolSimpan').prop('disabled', true);
                    $('.tombolSimpan').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('.tombolSimpan').html('Simpan');
                    $('.tombolSimpan').prop('disabled', false);
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
                            text: 'Data berhasil disimpan',
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