<!-- Modal -->
<div class="modal fade" id="modaleditpthini" aria-labelledby="modaleditpthiniLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas Hari Ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open('petugashariini/updatedata', ['class' => 'formtambah']) ?>
      <?php csrf_field(); ?>
      <input type="hidden" name="id" value="<?= $id ?>">
      <div class="modal-body">
      <div class="form-group row">
        <label for="deskripsi" class="col-sm-4 col-form-label">Petugas 1</label>
        <div class="col-sm-8">
            <select name="petugas1" id="petugas1" class="form-control">
            <?php foreach($datapetugas as $row) : ?>
                <?php if($row['id_pt'] == $id_pt1) : ?> 
                    <option selected value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>    
                <?php else: ?>
                    <option value="<?= $row['id_pt'] ?>"><?= $row['nama_pt'] ?></option>
                <?php endif; ?>
                <option value=""></option>
                <?php endforeach; ?>                                         
            </select>  
            <div class="invalid-feedback errorKepalashift"></div>                 
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
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success tombolSimpan">Update</button>
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
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
                $('.tombolSimpan').html('Update');
                $('.tombolSimpan').prop('disabled', false);
            },
            success: function (response) {
                if (response.error) {
                    if (response.error.errorPetugas1) {
                        $('#petugas1').addClass('is-invalid');
                        $('.errorPetugas1').html(response.error.errorPetugas1);
                    } else {
                        $('#petugas1').removeClass('is-invalid');
                        $('.errorPetugas1').html('');
                    }
                }else{
                    if (response.sukses) {
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