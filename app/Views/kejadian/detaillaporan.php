<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped" style="width: 100%">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>No Laporan</th>
                <th>Tanggal Laporan</th>
                <th>Nama Pelapor</th>
                <th>Kategori Laporan</th>
                <th>Kontak Pelapor</th>
                <th>No Tlp Pelapor</th>
                <th>Informasi Laporan</th>
                <th>Kode Gangguan</th>
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
                    <td><?= $row['tgl_laporan']; ?></td>
                    <td><?= $row['nama_pelapor']; ?></td>
                    <td><?= $row['kategori_laporan']; ?></td>
                    <td><?= $row['kontak_pelapor']; ?></td>
                    <td><?= $row['notlp_pelapor']; ?></td>
                    <td><?= $row['deskripsi_informasi']; ?></td>
                    <td><?= $row['deskripsi_gangguan']; ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus('<?= $row['id_detaillaporan'] ?>')">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>        
        </tbody>
    </table>
</div>

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
                url: "<?= site_url('kejadian/hapusDetailLaporan') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    if (response.sukses) {
                        tampilDataHapusLaporan();
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            html: response.sukses
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
</script>
