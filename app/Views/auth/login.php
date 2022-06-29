<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SIMAJANTAN</title>

    <!-- Icon -->
    <link rel="icon" href="<?= base_url() ?>/img/cmnp.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="<?= base_url() ?>/plugins/select2/js/select2.min.js"></script>
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2/sweetalert2.min.css') ?>">
    <script src="<?= base_url('plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>
</head>
<style>
    .container {
        margin-top: 6rem;
    }

    .coba1 {
        margin-top: 5rem;
    }

    @media screen and (max-width: 600px) {
        .container {
            margin-top: 0;
        }
    }

    .card {
        border: 8px solid white;
        border-radius: 30px;
    }

    .fullscreen-bg {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        width: 100vw;
        overflow: hidden;
        z-index: -100;
    }
</style>

<body>
    <video loop muted autoplay class="fullscreen-bg">
        <source src="<?= base_url() ?>/img/login.mp4" type="video/mp4">
    </video>
    <div class="container">
        <div class="col-md-12 col-lg-4 offset-lg-4">
            <div class="card">
                <div class="card-body login-card-body">
                    <h5 class="login-box-msg">SISTEM INFORMASI PELAYANAN LALU LINTAS</h5>
                    <hr style="border: 1px solid black;">

                    <?= form_open('login/cekuser', ['class' => 'formlogin']); ?>
                    <?= csrf_field(); ?>
                    <label for="username">Username</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Isi Username Anda" name="username" id="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback errorUsername"></div>
                    </div>
                    <label for="password">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Isi Password Anda" name="password" id="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback errorPassword"></div>
                    </div>
                    <label for="shift">Pilih Shift</label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="shift" id="shift">
                            <option value=""> Pilih Shift </option>
                            <option value="1">Shift 1</option>
                            <option value="2">Shift 2</option>
                            <option value="3">Shift 3</option>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback errorShift"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block btnlogin">Login</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="viewmodal" style="display: none;"></div>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.formlogin').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnlogin').prop('disabled', true);
                        $('.btnlogin').html('<i class="fas fa-spinner fa-spin"></i>');
                    },
                    complete: function() {
                        $('.btnlogin').html('Login');
                        $('.btnlogin').prop('disabled', false);
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.username) {
                                $('#username').addClass('is-invalid');
                                $('.errorUsername').html(response.error.username);
                            } else {
                                $('#username').removeClass('is-invalid');
                                $('.errorUsername').html('');
                            }
                            if (response.error.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html('');
                            }
                            if (response.error.shift) {
                                $('#shift').addClass('is-invalid');
                                $('.errorShift').html(response.error.shift);
                            } else {
                                $('#shift').removeClass('is-invalid');
                                $('.errorShift').html('');
                            }
                        }
                        if (response.gagal) {
                            $('.viewmodal').html(response.gagal).show();
                            $('#modalpetugas').modal('show');
                        }

                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Login Berhasil !'
                            }).then(result => {
                                if (result.isConfirmed) {
                                    window.location = response.sukses.link;
                                }
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>