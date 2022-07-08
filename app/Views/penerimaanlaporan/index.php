<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA PENERIMAAN LAPORAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Penerimaan Laporan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fas fa-book"> List Penerimaan Laporan</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-outline-primary tombolTambah">
    <i class="fa fa-plus-circle"> Input Laporan</i>
</button>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="card">
    <div class="card-body">
        <div class="form-row">
            <label for="" class="col-sm-1 form-label">Dari :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" id="tglawal" name="tglawal">
            </div>
            <label for="" class="col-sm-1 form-label">Sampai :</label>
            <div class="col-sm-2">
                <input type="date" class="form-control" id="tglakhir" name="tglakhir">
            </div>
            <div class="col">
                <button type="button" class="btn btn-sm btn-primary" id="tombolCari">Tampilkan</button>
            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table id="datapenerimaanlaporan" class="table table-bordered table-sm" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>No Laporan</th>
                        <th>Tanggal Laporan</th>
                        <th>Nama Pelapor</th>
                        <th>Kategori Laporan</th>
                        <th>Kontak Pelapor</th>
                        <th>No Tlp Pelapor</th>
                        <th>Informasi Laporan</th>
                        <th>Kode Gangguan</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function listDataLaporan() {
        var table = $('#datapenerimaanlaporan').DataTable({
            destroy: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('penerimaanlaporan/listData') ?>",
                "type": "POST",
                "data": {
                    tglawal: $('#tglawal').val(),
                    tglakhir: $('#tglakhir').val(),
                },
            },
            "columnDefs": [{
                "targets": [0, 9],
                "orderable": false,
                "className": 'text-center'
            }, ],
        });
    }

    $(document).ready(function() {
        listDataLaporan();

        $('#tombolCari').click(function(e) {
            e.preventDefault();

            listDataLaporan();
        });

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            window.location.href = "<?= site_url('penerimaanlaporan/inputLaporan') ?>";
        });
    });

    function detail(id) {
        window.location.href = "<?= site_url('penerimaanlaporan/detailLaporan/') ?>" + "/" + id;
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus',
            html: `Apakah anda yakin ingin menghapus data ini ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('penerimaanlaporan/hapus') ?>",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                html: response.sukses
                            }).then((result) => {
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
        });
    }

    function edit(id) {
        window.location.href = "<?= site_url('penerimaanlaporan/editLaporan/') ?>" + "/" + id;
    }
</script>
<?= $this->endSection() ?>