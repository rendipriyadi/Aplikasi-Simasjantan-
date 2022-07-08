<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA PENGISIAN BBM
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
    <li class="breadcrumb-item active">Pengisisan BBM</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fas fa-gas-pump"> List Data Pengisian BBM</i>
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
            <table id="databbm" class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Isi</th>
                        <th>Nama Mobil</th>
                        <th>Jenis BBM</th>
                        <th>Jumlah BBM</th>
                        <th>Shift</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($databbm->getResultArray() as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($row['tanggal_bbm'])); ?></td>
                            <td><?= $row['kode_mobil']; ?> <?= $row['nama_mobil']; ?></td>
                            <td><?= $row['jenis_bbm']; ?></td>
                            <td><?= $row['jumlah_bbm']; ?></td>
                            <td><?= $row['shift_bbm']; ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_bbm'] ?>')"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_bbm'] ?>')"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="viewmodal" style="display: none;"></div>

<script>
    $(document).ready(function() {
        $('#databbm').DataTable();

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('bbmMobil/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahbbm').modal('show');
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
                    url: "<?= site_url('bbmMobil/hapus') ?>",
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
            url: "<?= site_url('bbmMobil/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditbbm').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>