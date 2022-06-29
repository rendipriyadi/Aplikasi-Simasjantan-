<!-- Modal -->
<div class="modal fade" id="modalcarilaporan" tabindex="-1" aria-labelledby="modalcarilaporanLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Data Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <label for="" class="col-sm-1 form-label">Dari :</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="tglawal" name="tglawal">
                            </div>
                            <label for="" class="col-sm-1 form-label">Sampai :</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="tglakhir" name="tglakhir">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-sm btn-primary" id="tombolCari">Tampilkan</button>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table id="datalaporan" class="table table-bordered table-sm table-striped" width="100%">
                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>No Laporan</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Nama Pelapor</th>
                                        <th>Kategori Laporan</th>
                                        <th>Kontak Pelapor</th>
                                        <th>No Tlp Pelapor</th>
                                        <th>Informasi Laporan</th>
                                        <th>Kode Gangguan</th>
                                    </tr>
                                </thead>
                                <tbody>

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
    function listDataLaporan() {
        var table = $('#datalaporan').DataTable({
            destroy: true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('kejadian/listDataLaporan') ?>",
                "type": "POST",
                "data": {
                    tglawal: $('#tglawal').val(),
                    tglakhir: $('#tglakhir').val(),
                },
            },
            "columnDefs": [{
                "targets": [0, 9],
                "orderable": false,
                "className": 'text-center'
            }, ],
        });
    }

    $(document).ready(function() {
        listDataLaporan();

        $('#tombolCari').click(function(e) {
            e.preventDefault();

            listDataLaporan();
        });
    });

    function pilih(idlaporan) {
        $('#idlaporan').val(idlaporan);
        $('#modalcarilaporan').on('hidden.bs.modal', function(event) {
            ambilDataLaporan();
        });

        $('#modalcarilaporan').modal('hide');
    }
</script>