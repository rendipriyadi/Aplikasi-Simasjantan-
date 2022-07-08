<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA MOBIL
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active">Data Mobil</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fas fa-car"> List Data Mobil</i>
<?= $this->endSection() ?>

<?= $this->section('subjudul') ?>
<?php if (session()->level_user == 'admin') : ?>
    <button type="button" class="btn btn-outline-primary tombolTambah">
        <i class="fa fa-plus-circle"> Tambah Data</i>
    </button>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('isi') ?>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datamobil" class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Kode Mobil</th>
                        <th>Nama Mobil</th>
                        <th>Jenis Mobil</th>
                        <th>No Polisi Mobil</th>
                        <th>Status</th>
                        <?php if (session()->level_user == 'admin') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($datamobil as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['kode_mobil']; ?></td>
                            <td><?= $row['nama_mobil']; ?></td>
                            <td><?= $row['jenis_mobil']; ?></td>
                            <td><?= $row['nopol_mobil']; ?></td>
                            <td>
                                <?php if ($row['status_mobil'] == 'aktif') { ?>
                                    <span class="badge badge-success" style="font-size:12px;">aktif</span>
                            </td>
                        <?php } else { ?>
                            <span class="badge badge-danger" style="font-size:12px;">tidak aktif</span></td>
                        <?php } ?>
                        </td>
                        <?php if (session()->level_user == 'admin') : ?>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_mobil'] ?>')"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_mobil'] ?>', '<?= $row['kode_mobil'] ?>')"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        <?php endif; ?>
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
        $('#datamobil').DataTable();

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('mobil/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahmobil').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });

    function hapus(id, kode) {
        Swal.fire({
            title: 'Hapus',
            html: `Apakah anda yakin ingin menghapus data mobil dengan Kode Mobil <strong>${kode}</strong> ?`,
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
                    url: "<?= site_url('mobil/hapus') ?>",
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
            url: "<?= site_url('mobil/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditmobil').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>

<?= $this->endSection() ?>