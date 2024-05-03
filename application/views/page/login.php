<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.: LOGIN E-UPT PELATIHAN DINAS KOPERASI DAN UKM JAWA TIMUR :.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Ikon -->
  <link rel="shortcut icon" href="<?= base_url() ?>/assets/dist/img/favicon.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css">
  <!-- pace-progress -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- PWA -->
  <link rel="manifest" href="/manifest.json" />

  <style>
    #pageloader {
      background: rgba(255, 255, 255, 0.8);
      display: none;
      height: 100%;
      width: 100%;
    }

    #pageloader img {
      left: 50%;
      top: 50%;
    }
  </style>
</head>

<body class="hold-transition login-page bg-green pace-warning" style="background-image: url(<?= 
base_url('/assets/dist/img/tiles.jpg') ?>); background-size: cover;">

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body rounded-circle">
        <div class="login-logo">
          <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/dist/img/login-logo.png" alt="Logo Aplikasi"></a>
        </div>
        <hr>
        <p class="text-center">Masukkan Email dan Password</p>
        <form action="<?= site_url('auth/process') ?>" method="post" id="FormLogin">
          <div class="input-group mb-3">
            <input type="email" name="username" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock" onclick="showPassword()"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="login" class="btn btn-success btn-block">LOGIN <i class="fas fa-forward"></i></button>
              <hr>
              <!-- <a href="<?= base_url("auth/loginOTP") ?>" class="btn btn-warning btn-block"><i class="fab fa-whatsapp"></i> Login Via No HP</a>
              <a href="<?= base_url("auth/google") ?>" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login With Google</a> -->
              <button type="button" class="btn btn-outline-secondary btn-block btn-sm" data-toggle="modal" data-target="#modal-default">
                <i class="fab fa-android"></i> Install Aplikasi di Android
              </button>
            </div>
          </div>
          <div id="pageloader" class="text-center">
            <img src="<?= base_url() ?>/assets/dist/img/loader-large.gif" alt="processing..." />
          </div>
        </form>
        <br>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
    <!-- /.login-card-body -->
  </div>
  <?php $this->view('message'); ?>
  </div>
  <!-- /.login-box -->

  <!-- MOdal Petunjuk Install di Android -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="color:black;">Tutorial Install Aplikasi E-Logbook di Android</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="color:black;">
          <p>
          <ol>
            <li>Tekan Tombol <i class="fa fa-ellipsis-v" aria-hidden="true"></i> pada Pojok Kanan Atas</li>
            <li>Tekan Install App / Tambahkan ke Halaman Utama.</li>
            <li>WAJIB MENGGUNAKAN Perangkat Android dan Browser Chrome</li>
            <small>*E-Logbook UPTKUKM Jatim menggunakan teknik Progress Web Application (PWA) sehingga memungkinkan untuk mengkonversi website menjadi aplikasi android secara otomatis. Pastikan anda menggunakan Chrome versi terbaru.</small>
          </ol>
          </p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url() ?>/assets/plugins/pwa/pwa.js"></script>

  <!-- jQuery -->
  <script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
  <!-- jquery-validation -->
  <script src="<?= base_url() ?>/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>/assets/plugins/jquery-validation/additional-methods.min.js"></script>

  <!-- pace-progress -->
  <script src="<?= base_url() ?>/assets/plugins/pace-progress/pace.min.js"></script>

  <script type="text/javascript">
    function showPassword() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#FormLogin').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 8
          },
        },
        messages: {
          email: {
            required: "Masukkan Email dengan benar",
            email: "Masukkan Email dengan benar"
          },
          password: {
            required: "Masukkan Password",
            minlength: "Password Setidaknya 8 karakter"
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("form").on("submit", function() {
        $("#pageloader").fadeIn(3000);
      }); //submit
    }); //document ready
  </script>
</body>

</html>