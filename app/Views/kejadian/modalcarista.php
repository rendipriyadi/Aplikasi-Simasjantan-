<!-- Modal -->
<div class="modal fade" id="modalcarista" tabindex="-1" aria-labelledby="modalcaristaLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Data Station</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datasta" class="table table-bordered table-sm table-striped">
                        <thead align="center">
                            <tr>
                                <th>No</th>
                                <th>Kode Lokasi</th>
                                <th>Deskripsi Lokasi</th>
                                <th>Ruas</th>
                                <th>Wilayah</th>
                                <th>Aksi</th>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="pilih('<?= $row['id_sta'] ?>')">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
function pilih(id){
    $('#id').val(id);
    $('#modalcarista').on('hidden.bs.modal', function (event) {
       ambilDataSta();
    });

    $('#modalcarista').modal('hide');
}

$(document).ready(function () {
    $('#datasta').DataTable();
});
</script>