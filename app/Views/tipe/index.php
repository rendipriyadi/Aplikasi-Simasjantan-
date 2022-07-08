<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA TIPE KECELAKAAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active">Tipe Kecelakaan</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-car-crash"> List Data Tipe Kecelakaan</i>
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
            <table id="datatipe" class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Deskripsi Tipe Kecelakaan</th>
                        <th>Icon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($datatipe as $row) : ?>
                        <tr>
                            <td style="vertical-align: middle;"><?= $no++; ?></td>
                            <td style="vertical-align: middle;"><?= $row['deskripsi_tipe']; ?></td>
                            <td style="vertical-align: middle;"><img src="<?= base_url() ?>/<?= $row['icon']; ?>" alt="icon" width="80px"></td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_tipe_tabrakan'] ?>')"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_tipe_tabrakan'] ?>')"><i class="fa fa-trash-alt"></i></button>
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
        $('#datatipe').DataTable();

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('tipe/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahtipe').modal('show');
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
                    url: "<?= site_url('tipe/hapus') ?>",
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
            url: "<?= site_url('tipe/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaledittipe').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>