<?= $this->extend('template/main') ?>

<?= $this->section('title') ?>
<title>SIMAJANTAN</title>
<?= $this->endSection() ?>

<?= $this->section('judul') ?>
DATA GANGGUAN
<?= $this->endSection() ?>

<?= $this->section('menu') ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Master Data</a></li>
        <li class="breadcrumb-item active">Gangguan</li>
    </ol>
<?= $this->endSection() ?>

<?= $this->section('detail') ?>
    <i class="fa fa-hammer"> List Data Gangguan</i>
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
            <table id="datagangguan"  class="table table-bordered table-sm table-striped" width="100%">
                <thead align="center">
                    <tr>
                        <th>No</th>
                        <th>Deskripsi Gangguan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <?php $no = 1; 
                    foreach ($datagangguan as $row) : ?>
                    <tr> 
                        <td><?= $no++; ?></td>
                        <td><?= $row['deskripsi_gangguan']; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_gangguan'] ?>')"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_gangguan'] ?>')"><i class="fa fa-trash-alt"></i></button>
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
    $('#datagangguan').DataTable();

    $('.tombolTambah').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "<?= site_url('gangguan/formtambah') ?>",
            dataType: "json",
            success: function (response) {
                $('.viewmodal').html(response.data).show();
                $('#modaltambahgangguan').modal('show');
            },
            error: function (xhr, ajaxOptions, thrownError) {
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
                url: "<?= site_url('gangguan/hapus') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
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
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
    });
}
function edit(id) {
    $.ajax({
        type: "post",
        url: "<?= site_url('gangguan/formedit') ?>",
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            $('.viewmodal').html(response.data).show();
            $('#modaleditgangguan').modal('show');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

</script>
<?= $this->endSection() ?>