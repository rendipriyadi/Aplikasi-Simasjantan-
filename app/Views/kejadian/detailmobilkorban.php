<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped" style="width: 100%">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>No Laporan</th>
                <th>Jenis Mobil</th>
                <th>Golongan Mobil</th>
                <th>Merk</th>
                <th>Warna Mobil</th>
                <th>Kondisi Kendaraan</th>
                <th>Catatan</th>
                <th>Foto</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php $no = 1;
            foreach ($tampildata->getResultArray() as $row) :
            ?>
                <tr>
                    <td style="vertical-align: middle;"><?= $no++; ?></td>
                    <td style="vertical-align: middle;"><?= $row['no_laporan']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['jenis_mobil_korban']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['golongan_mobil']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['merk_mobil_korban']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['warna_mobil']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['kondisi_kendaraan']; ?></td>
                    <td style="vertical-align: middle;"><?= $row['catatan']; ?></td>
                    <td style="vertical-align: middle;">
                        <a href="<?= base_url() ?>/<?= $row['foto']; ?>" download><i class="fa fa-download"></i></a>&nbsp;&nbsp;
                        <img src="<?= base_url() ?>/<?= $row['foto']; ?>" alt="Foto Korban" width="80px" onclick="window.open('<?= base_url() ?>/<?= $row['foto']; ?>')">
                    </td>
                    <td style="vertical-align: middle;">
                        <button type="button" class="btn btn-outline-success btn-sm" onclick="edit('<?= $row['id_mobil_korban'] ?>')">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_mobil_korban'] ?>')">
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
                    url: "<?= site_url('kejadian/hapusDetailMobilKorban') ?>",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            tampilDataMobilKorban();
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
            url: "<?= site_url('kejadian/formEditMobilKorban') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();
                $('#modaleditmobilkorban').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>