<!-- Modal -->
<div class="modal fade" id="modalupdatestatus" aria-labelledby="modalupdatestatusLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('kejadian/simpanstatus', ['class' => 'formstatus']) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="idkejadian" name="idkejadian" value="<?= $idkejadian ?>">
        <div class="form-group row">
        <label for="kode" class="col-sm-4 col-form-label">Status :</label>
        <div class="col-sm-8">
            <select name="status" id="status" class="form-control" style="font-size: 13px;">
              <option value="">Pilih Status</option>
              <option value="LAPORAN - BELUM ADA PETUGAS">LAPORAN - BELUM ADA PETUGAS</option>
              <option value="SEDANG DITANGANI PETUGAS">SEDANG DITANGANI PETUGAS</option>
              <option value="SELESAI">SELESAI</option>
              <option value="PENDING">PENDING</option>
            </select>
            <div class="invalid-feedback errorStatus" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Waktu :</label>
        <div class="col-sm-8">
            <input type="datetime-local" class="form-control" id="waktu" name="waktu">
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpanStatus">Simpan</button>
        <button type="reset" class="btn btn-outline-warning">Reset</button>
      </div>
      <?= form_close(); ?> 
    </div>
  </div>
</div>

<script>

$(document).ready(function () {

    $('#petugas').select2({
        theme : 'bootstrap4',
    });

    $('.formstatus').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('.tombolSimpanStatus').prop('disabled', true);
                $('.tombolSimpanStatus').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolSimpanStatus').html('Simpan');
                $('.tombolSimpanStatus').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.errorStatus) {
                        $('.errorStatus').html(response.error.errorStatus).show();
                        $('#status').addClass('is-invalid');
                    }else{
                        $('.errorStatus').fadeOut();
                        $('#status').removeClass('is-invalid');
                        $('#status').addClass('is-valid');
                    }
                }
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: response.sukses
                    }).then (result => {
                        if (result.isConfirmed) {
                            $('#idstatus').val(response.idstatus);
                            if (response.status == 'LAPORAN - BELUM ADA PETUGAS') {
                                $('#status').val(response.status);
                                $('#waktukejadian').val(response.waktu);
                                $('#modalupdatestatus').modal('hide');
                            }
                            if (response.status == 'SEDANG DITANGANI PETUGAS') {
                                $('#status').val(response.status);
                                $('#waktupenanganan').val(response.waktu);
                                $('#modalupdatestatus').modal('hide');
                            }
                            if (response.status == 'SELESAI') {
                                $('#status').val(response.status);
                                $('#waktuselesai').val(response.waktu);
                                $('#modalupdatestatus').modal('hide');
                            }
                        }
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    });
});   
</script>