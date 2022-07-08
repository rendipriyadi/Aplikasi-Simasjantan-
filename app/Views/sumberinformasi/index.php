<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA SUMBER INFORMASI
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active">Sumber Informasi</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-car-crash"> List Data Sumber Informasi</i>
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
            <table id="datainformasi" class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Deskripsi Informasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($datainformasi as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['deskripsi_informasi']; ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_informasi'] ?>')"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_informasi'] ?>')"><i class="fa fa-trash-alt"></i></button>
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
        $('#datainformasi').DataTable();

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('sumberinformasi/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahinformasi').modal('show');
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
                    url: "<?= site_url('sumberinformasi/hapus') ?>",
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
            url: "<?= site_url('sumberinformasi/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaledit').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>