<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/sweetalert.css'); ?>">
    <style>
        *,
        ::before,
        ::after {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0px;
            padding: 0px;
            height: 100%;
            background-color: #753f99;
            color: #fff;
        }

        .sweet-alert {
            background-color: #212529;
        }

        .sweet-alert .sa-icon.sa-success::before,
        .sweet-alert .sa-icon.sa-success::after,
        .sweet-alert .sa-icon.sa-success .sa-fix {
            background: #212529;
        }

        .img-logo {
            max-height: 80px;
            margin-bottom: 10px;
        }

        .login-hr {
            border-bottom: 1px dotted #bdbdbd;
            height: 5px;
            margin-bottom: 20px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 mt-5 pt-5 offset-md-4">
                <div class="text-center">
                    <img src="<?= base_url('img/logo1.png'); ?>" alt="logo" class="img-logo">
                    <h5>LOGIN MAHASISWA</h5>
                </div>
                <div class="login-hr">&nbsp;</div>
                <form action="<?= base_url('/login_mhs'); ?>" id="form-login-mhs" method="POST">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <div class="form-group my-2">
                        <label>Nim</label>
                        <input type="text" name="nim_mhs" id="nim_mhs" class="form-control" placeholder="Nim..." autocomplete="off">
                    </div>
                    <div class="form-group my-2">
                        <label>Password</label>
                        <input type="password" name="password_mhs" id="password_mhs" class="form-control" placeholder="Password...">
                    </div>
                    <div class="form-group my-2 text-end">
                        <button class="btn btn-success" id="submit-btn">
                            Sign In <i class="fas fa-sign-in-alt"></i>
                        </button>
                    </div>

                    <a href="<?= base_url('/login'); ?>" class="text-center text-light">Jika Admin Klik di sini</a>
                    </span>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('js/sweetalert.min.js'); ?>"></script>
    <script>
        $('#form-login-mhs').on('submit', function(e) {
            e.preventDefault();
            //tampung value
            var csrfName = '<?= csrf_token(); ?>';
            var csrfHash = $('input[name=csrf_token]').val();
            var userName = $('#nim_mhs').val();
            var password = $('#password_mhs').val();
            var url = $(this).attr('action');

            if (userName == '' || password == '') {
                swal({
                    title: "Error!",
                    text: "Username dan Password wajib diisi",
                    type: "error",
                    showCancelButton: false,
                    showConfirmButton: false,
                    timer: 1500
                }, function() {
                    swal.close();
                });

                return false;
            }

            //lakukan pengecekan data login melalui ajax
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    nim_mhs: userName,
                    password_mhs: password,
                    [csrfName]: csrfHash
                },
                success: function(obj) {
                    var a = $.parseJSON(obj);
                    //update token
                    $('input[name=<?= csrf_token(); ?>]').val(a.token);
                    //cek status
                    if (a.status == 'success') {
                        swal({
                            title: "Success!",
                            text: a.message,
                            type: "success",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1500
                        }, function() {
                            window.location.href = '<?= base_url('dashboard'); ?>';
                        });

                    } else {
                        swal({
                            title: "Error!",
                            text: a.message,
                            type: "error",
                            showCancelButton: false,
                            showConfirmButton: false,
                            timer: 1500
                        }, function() {
                            swal.close();
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>