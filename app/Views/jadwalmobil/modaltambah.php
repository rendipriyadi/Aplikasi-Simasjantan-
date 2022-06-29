<!-- Modal -->
<div class="modal fade" id="modaljadwalmobil"  aria-labelledby="modaljadwalmobilLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mobil Petugas Hari Ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('jadwalmobil/simpandata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <div class="modal-body">
      <div class="form-group row">
        <label for="tglpakai" class="col-sm-4 col-form-label">Tanggal</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" id="tglpakai" name="tglpakai" value="<?= date('Y-m-d') ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="mobil" class="col-sm-4 col-form-label">Mobil</label>
        <div class="col-sm-8">
            <select name="mobil" id="mobil" class="form-control">
            <option value="">Pilih Mobil</option>
                <?php foreach($datamobil as $row) : ?> 
                    <option value="<?= $row['id_mobil'] ?>"><?= $row['kode_mobil'] ?> - <?= $row['nama_mobil'] ?></option>
                <?php endforeach; ?>                  
            </select>
            <div class="invalid-feedback errorMobil" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 1</label>
        <div class="col-sm-8">
            <select name="petugas1" id="petugas1" class="form-control">
            <option selected value="">Pilih Petugas 1</option>
                <?php foreach($datapetugas as $row) : ?> 
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endforeach; ?>                  
            </select>
            <div class="invalid-feedback errorPetugas1" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 2</label>
        <div class="col-sm-8">
            <select name="petugas2" id="petugas2" class="form-control">
            <option selected value="">Pilih Petugas 2</option>
                <?php foreach($datapetugas as $row) : ?> 
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endforeach; ?>                  
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 3</label>
        <div class="col-sm-8">
            <select name="petugas3" id="petugas3" class="form-control">
            <option selected value="">Pilih Petugas 3</option>
                <?php foreach($datapetugas as $row) : ?> 
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endforeach; ?>                
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 4</label>
        <div class="col-sm-8">
            <select name="petugas4" id="petugas4" class="form-control">
            <option selected value="">Pilih Petugas 2</option>
                <?php foreach($datapetugas as $row) : ?> 
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endforeach; ?>               
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Odo Awal</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="odoawal" name="odoawal">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Odo Akhir</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="odoakhir" name="odoakhir">
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpan">Simpan</button>
        <button type="reset" class="btn btn-outline-warning">Reset</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    $('#mobil').select2({
        theme : 'bootstrap4',
    });
    $('#petugas1').select2({
        theme : 'bootstrap4',
    });
    $('#petugas2').select2({
        theme : 'bootstrap4',
    });
    $('#petugas3').select2({
        theme : 'bootstrap4',
    });
    $('#petugas4').select2({
        theme : 'bootstrap4',
    });

    $('.formtambah').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function () {
                $('.tombolSimpan').prop('disabled', true);
                $('.tombolSimpan').html('<i class="fas fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.tombolSimpan').html('Simpan');
                $('.tombolSimpan').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.errorMobil) {
                        $('.errorMobil').html(response.error.errorMobil).show();
                        $('#mobil').addClass('is-invalid');
                    }else{
                        $('.errorMobil').fadeOut();
                        $('#mobil').removeClass('is-invalid');
                        $('#mobil').addClass('is-valid');
                    }
                    if (response.error.errorPetugas1) {
                        $('.errorPetugas1').html(response.error.errorPetugas1).show();
                        $('#petugas1').addClass('is-invalid');
                    }else{
                        $('.errorPetugas1').fadeOut();
                        $('#petugas1').removeClass('is-invalid');
                        $('#petugas1').addClass('is-valid');
                    }
                }else{
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: response.sukses
                    }).then (result => {
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
        return false;
    });
});   
</script>