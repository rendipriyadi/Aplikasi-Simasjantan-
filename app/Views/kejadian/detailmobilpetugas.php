<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped" style="width: 100%">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>No Laporan</th>
                <th>Mobil</th>
                <th>Petugas 1</th>
                <th>Petugas 2</th>
                <th>Petugas 3</th>
                <th>Petugas 4</th>
                <th>Waktu Tiba</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $no = 1;
            foreach ($tampildata->getResultArray() as $row) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['no_laporan']; ?></td>
                    <td><?= $row['kode_mobil']; ?> - <?= $row['nama_mobil']; ?></td>
                    <td><?= $row['nama_pt1']; ?></td>
                    <td><?= $row['nama_pt2']; ?></td>
                    <td><?= $row['nama_pt3']; ?></td>
                    <td><?= $row['nama_pt4']; ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['waktu_tiba'])); ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_mobil_petugas'] ?>')">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_mobil_petugas'] ?>')">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="viewmodal" style="display: none;"></div>

<script>
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
                    url: "<?= site_url('kejadian/hapusDetailMobilPetugas') ?>",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            tampilDataMobilPetugas();
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                html: response.sukses
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
            url: "<?= site_url('kejadian/formEditMobilPetugas') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditmobilpetugas').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>