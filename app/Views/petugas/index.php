<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMAJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA PETUGAS
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active">Data Petugas</li>
</ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
<i class="fa fa-user"> List Data Petugas</i>
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
            <table id="datapetugas" class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Kota</th>
                        <th>No Handphone</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th width="80px">Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1;
                    foreach ($datapetugas as $row) : ?>
                        <tr>
                            <td style="vertical-align: middle;"><?= $no++; ?></td>
                            <td style="vertical-align: middle;"><?= $row['nip_pt']; ?></td>
                            <td style="vertical-align: middle;"><?= $row['nama_pt']; ?></td>
                            <td style="vertical-align: middle;"><?= $row['jabatan_pt']; ?></td>
                            <td style="vertical-align: middle;"><?= $row['kota_pt']; ?></td>
                            <td style="vertical-align: middle;"><?= $row['nohp_pt']; ?></td>
                            <td style="vertical-align: middle;"><?= $row['email_pt']; ?></td>
                            <td style="vertical-align: middle;">
                                <?php if ($row['status_pt'] == 'aktif') { ?>
                                    <span class="badge badge-success" style="font-size:12px;">aktif</span>
                            </td>
                        <?php } else { ?>
                            <span class="badge badge-danger" style="font-size:12px;">tidak aktif</span></td>
                        <?php } ?>
                        </td>
                        <td style="vertical-align: middle;"><img src="<?= base_url() ?>/<?= $row['foto']; ?>" alt="Foto Petugas" width="100px" onclick="window.open('<?= base_url() ?>/<?= $row['foto']; ?>')"></td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_pt'] ?>')">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_pt'] ?>', '<?= $row['nip_pt'] ?>')">
                                <i class="fa fa-trash-alt"></i>
                            </button>
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
        $('#datapetugas').DataTable();

        $('.tombolTambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?= site_url('petugas/formtambah') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambahpetugas').modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });

    function hapus(id, nip) {
        Swal.fire({
            title: 'Hapus',
            html: `Apakah anda yakin ingin menghapus data petugas dengan NIP <strong>${nip}</strong> ?`,
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
                    url: "<?= site_url('petugas/hapus') ?>",
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
            url: "<?= site_url('petugas/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditpetugas').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>
<?= $this->endSection() ?>