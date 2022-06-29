<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMAJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA Mobil Petugas
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Mobil Petugas</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-car-crash"> List Data Mobil Petugas</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<button type="button" class="btn btn-outline-primary tombolTambah">
    <i class="fa fa-plus-circle"> Tambah Data</i>
</button>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datajadwalmobils" class="table table-bordered table-sm" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Mobil</th>
                        <th>Nama</th>
                        <th>Petugas 1</th>
                        <th>Petugas 2</th>
                        <th>Petugas 3</th>
                        <th>Petugas 4</th>
                        <th>Shift Mobil</th>
                        <th>Odo Awal</th>
                        <th>Odo Akhir</th>
                        <th width="80px">Aksi</th>
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
        $('#datajadwalmobils').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('jadwalmobil/listData') ?>',
                type: 'POST',
            },
            order: [],
            columns: [{
                    "data": "no",
                    "orderable": false,
                },
                {
                    "data": "tgl_pakai_mobil"
                },
                {
                    "data": "kode_mobil"
                },
                {
                    "data": "nama_mobil"
                },
                {
                    "data": "nama_pt1"
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
                    "data": "shift_mobil"
                },
                {
                    "data": "odo_awal"
                },
                {
                    "data": "odo_akhir"
                },
                {
                    "data": "aksi"
                }
            ],
            columnDefs: [{
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                    className: 'text-center'
                },
                {
                    render: function(data, type, row) {
                        return data + ' -  ' + row['nama_mobil'] + '';
                    },
                    "targets": 2
                },
                {
                    "visible": false,
                    "targets": 3
                }
            ],
        });

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('jadwalmobil/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaljadwalmobil').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
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
                    url: "<?= site_url('jadwalmobil/hapus') ?>",
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
        $.ajax({
            type: "post",
            url: "<?= site_url('jadwalmobil/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditjadwalmobil').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>