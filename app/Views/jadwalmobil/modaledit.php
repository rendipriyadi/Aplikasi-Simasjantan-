<!-- Modal -->
<div class="modal fade" id="modaleditjadwalmobil"  aria-labelledby="modaleditjadwalmobilLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Mobil Petugas Hari Ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('jadwalmobil/updatedata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="modal-body">
      <div class="form-group row">
        <label for="tglpakai" class="col-sm-4 col-form-label">Tanggal</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" id="tglpakai" name="tglpakai" value="<?= $tglpakai ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="mobil" class="col-sm-4 col-form-label">Mobil</label>
        <div class="col-sm-8">
            <select name="mobil" id="mobil" class="form-control">
                <?php foreach($datamobil as $row) : ?>
                <?php if($row['id_mobil'] == $mobil) : ?> 
                    <option selected value="<?= $row['id_mobil'] ?>"><?= $row['kode_mobil'] ?> - <?= $row['nama_mobil'] ?></option>    
                <?php else: ?>
                    <option value="<?= $row['id_mobil'] ?>"><?= $row['kode_mobil'] ?> - <?= $row['nama_mobil'] ?></option>
                <?php endif; ?>
                <?php endforeach; ?>                  
            </select>
            <div class="invalid-feedback errorMobil" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 1</label>
        <div class="col-sm-8">
            <select name="petugas1" id="petugas1" class="form-control">
            <?php foreach($datapetugas as $row) : ?>
                <?php if($row['id_pt'] == $id_pt1) : ?> 
                    <option selected value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>    
                <?php else: ?>
                    <option value=""></option>
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endif; ?>
                <?php endforeach; ?>    
            </select>
            <div class="invalid-feedback errorPetugas1" style="display: none;"></div>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 2</label>
        <div class="col-sm-8">
            <select name="petugas2" id="petugas2" class="form-control">
            <?php foreach($datapetugas as $row) : ?>
                <?php if($row['id_pt'] == $id_pt2) : ?> 
                    <option selected value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>    
                <?php else: ?>
                    <option value=""></option>
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endif; ?>
                <?php endforeach; ?>                              
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 3</label>
        <div class="col-sm-8">
            <select name="petugas3" id="petugas3" class="form-control">
            <?php foreach($datapetugas as $row) : ?>
                <?php if($row['id_pt'] == $id_pt3) : ?> 
                    <option selected value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>    
                <?php else: ?>
                    <option value=""></option>
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endif; ?>
                <?php endforeach; ?>               
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 4</label>
        <div class="col-sm-8">
            <select name="petugas4" id="petugas4" class="form-control">
            <?php foreach($datapetugas as $row) : ?>
                <?php if($row['id_pt'] == $id_pt4) : ?> 
                    <option selected value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>    
                <?php else: ?>
                    <option value=""></option>
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endif; ?>
                <?php endforeach; ?>                 
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Odo Awal</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="odoawal" name="odoawal" value="<?= $odoawal ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Odo Akhir</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="odoakhir" name="odoakhir" value="<?= $odoakhir ?>">
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpan" id="tombolSimpan'">Update</button>
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
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

    // $('#tombolSimpan').on('click',function(){
	// var min=parseInt($('[name=odoawal]').val());
	// var max=parseInt($('[name=odoakhir]').val());

	// if(max < min)
	// 	{	alert('Nilai Odo Akhir harus lebih besar dari Odo Awal');
	// 		$('[name=odoakhir]').val('').focus()
	// 	}
	// })

    $('.formtambah').submit(function (e) {
        e.preventDefault();
        var min=parseInt($('[name=odoawal]').val());
        var max=parseInt($('[name=odoakhir]').val());

        if(max < min)
		{	alert('Nilai Odo Akhir harus lebih besar dari Odo Awal');
			$('[name=odoakhir]').val('').focus()
		}
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
                $('.tombolSimpan').html('Update');
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