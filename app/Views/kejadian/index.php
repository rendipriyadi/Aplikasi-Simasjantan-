<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA TIPE KEJADIAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Kejadian</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-tasks"> List Data Kejadian</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-outline-primary tombolTambah">
    <i class="fa fa-plus-circle"> Input Data Kejadian</i>
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
            <table id="datakejadian" class="table table-bordered table-sm" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>No Laporan</th>
                        <th>Tgl Laporan</th>
                        <th>Kategori Laporan</th>
                        <th>Tipe Laporan</th>
                        <th>Waktu Kejadian</th>
                        <th>Status</th>
                        <th>Cuaca</th>
                        <th>Sta</th>
                        <th>Ruas</th>
                        <th>Lajur</th>
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
    function listDataKejadian() {
        var table = $('#datakejadian').DataTable({
            destroy: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('kejadian/listData') ?>",
                "type": "POST",
                "data": {
                    tglawal: $('#tglawal').val(),
                    tglakhir: $('#tglakhir').val(),
                },
            },
            "columnDefs": [{
                    "targets": [0, 11],
                    "orderable": false,
                    "className": 'text-center'
                },
                {
                    "targets": [6],
                    "render": function(data, type, row) {
                        if (data == 'LAPORAN - BELUM ADA PETUGAS') {
                            return '<span class="badge badge-info">LAPORAN - BELUM ADA PETUGAS</span>';
                        } else if (data == 'SEDANG DITANGANI PETUGAS') {
                            return '<span class="badge badge-danger">SEDANG DITANGANI PETUGAS</span>';
                        } else if (data == 'PENDING') {
                            return '<span class="badge badge-warning">PENDING</span>';
                        } else {
                            return '<span class="badge badge-success">SELESAI</span>';
                        }
                    }
                },
            ],
        });
    }

    $(document).ready(function() {

        listDataKejadian();

        $('#tombolCari').click(function(e) {
            e.preventDefault();

            listDataKejadian();
        });

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            window.location.href = "<?= site_url('kejadian/input') ?>";
        });
    });

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
                    url: "<?= site_url('kejadian/hapus') ?>",
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
        window.location.href = "<?= site_url('kejadian/editKejadian/') ?>" + id;
    }

    function detail(id) {
        window.location.href = "<?= site_url("kejadian/detailKejadian/") ?>" + id;
    }
</script>
<?= $this->endSection() ?>