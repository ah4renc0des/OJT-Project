<?php require_once('./config.php') ?>
<?php require_once('inc/sess_auth.php') ?>
<!DOCTYPE html>
<html lang="en" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <!-- Add Montserrat Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;700;800;900&display=swap">
  <style>
    body {
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size: cover;
      background-repeat: no-repeat;
      backdrop-filter: contrast(1);
      font-family: 'Montserrat', sans-serif; /* Apply Montserrat font */
    }
    .login-box .card {
      border-radius: 10px;
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.85);
    }
    .btn-primary {
      background-color: #1845ad;
      border-color: #1845ad;
    }
    .btn-primary:hover {
      background-color: #23a2f6;
      border-color: #23a2f6;
    }
    .login-box-msg {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .forgot-register-links {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }
    .forgot-register-links a {
      color: #007bff;
    }
  </style>
  <br>
    <br>
    <br>
  </br>
<div class="login-box">
  <div class="card card-navy my-2">
    <div class="card-body">
      <p class="login-box-msg">SIGN IN</p>
      <form id="login-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" autofocus placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="forgot-register-links">
          <a href="forgot-password.php">Forgot password?</a>
          <a href="<?php echo base_url ?>register.php">Register</a>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-block mx-auto" style="width: 50%;">LOGIN</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>
