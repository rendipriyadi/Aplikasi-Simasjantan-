<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA PETUGAS HARI INI
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Data Transaksi</a></li>
    <li class="breadcrumb-item active">Petugas Hari Ini</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-users"> List Data Petugas Hari Ini</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>

<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datapetugashariini" class="table table-bordered table-sm" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Tugas</th>
                        <th>Petugas 1</th>
                        <th>Petugas 2</th>
                        <th>Petugas 3</th>
                        <th>Petugas 4</th>
                        <th>Shift</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>

<script>
    $(document).ready(function() {
        $('#datapetugashariini').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('petugashariini/listData') ?>',
                type: 'POST',
            },
            order: [],
            columns: [{
                    "data": "no",
                    "orderable": false,
                },
                {
                    "data": "tgl_tugas"
                },
                {
                    "data": "nama_pt2"
                },
                {
                    "data": "nama_pt3"
                },
                {
                    "data": "nama_pt4"
                },
                {
                    "data": "nama_pt5"
                },
                {
                    "data": "shift"
                },
                {
                    "data": "aksi"
                }
            ],
            columnDefs: [{
                targets: [0, 1, 2, 3, 4, 5, 6, 7],
                className: 'text-center'
            }, ]
        });
    });

    function edit(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('petugashariini/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditpthini').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
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
                    url: "<?= site_url('petugashariini/hapus') ?>",
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
</script>

<?= $this->endSection() ?>