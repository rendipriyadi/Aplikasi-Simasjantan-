<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMASJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA STATION
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active">Data Station</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-tasks"> List Data Station</i>
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
            <table id="datasta" class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Kode Lokasi</th>
                        <th>Deskripsi Lokasi</th>
                        <th>Ruas</th>
                        <th>Wilayah</th>
                        <th>KM</th>
                        <th>STA</th>
                        <th>Jalur</th>
                        <th>Kondisi Jalanan</th>
                        <th>Alinyemen</th>
                        <th width="80px">Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($datasta as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['kode_lokasi']; ?></td>
                            <td><?= $row['deskripsi_lokasi']; ?></td>
                            <td><?= $row['ruas']; ?></td>
                            <td><?= $row['wilayah']; ?></td>
                            <td><?= $row['km']; ?></td>
                            <td><?= $row['sta']; ?></td>
                            <td><?= $row['jalur']; ?></td>
                            <td><?= $row['kondisi_jalanan']; ?></td>
                            <td><?= $row['alinyemen']; ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_sta'] ?>')"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_sta'] ?>', '<?= $row['kode_lokasi'] ?>')"><i class="fa fa-trash-alt"></i></button>
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
        $('#datasta').DataTable();

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('sta/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahsta').modal('show');
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
            html: `Apakah anda yakin ingin menghapus data station dengan Kode Lokasi <strong>${kode}</strong> ?`,
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
                    url: "<?= site_url('sta/hapus') ?>",
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
            url: "<?= site_url('sta/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditsta').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>