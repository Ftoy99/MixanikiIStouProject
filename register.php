<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>Student Record System</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Enter your details and password</p>
        <?php
        if (isset($_SESSION['RegisterError'])) {

          if ($_SESSION['RegisterError'] == '1') {
            echo '<p class="login-box-msg" style="color: red;">Passwords Entered Dont Match.</p>';
          }

          if ($_SESSION['RegisterError'] == '2') {
            echo '<p class="login-box-msg" style="color: red;">This Email Is Already Registered.</p>';
          }
          if ($_SESSION['RegisterError'] == '3') {
            echo '<p class="login-box-msg" style="color: red;">Email Cant Be Empty.</p>';
          }
          if ($_SESSION['RegisterError'] == '4') {
            echo '<p class="login-box-msg" style="color: red;">Name Cant be Empty.</p>';
          }
          if ($_SESSION['RegisterError'] == '5') {
            echo '<p class="login-box-msg" style="color: red;">Password Must Be Longer Than 3 Characters.</p>';
          }

          unset($_SESSION['RegisterError']);
        }

        ?>
        <form action="Php/Register.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="E-Mail" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full Name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="password2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
      </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="/jss/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/jss/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/jss/dist/js/adminlte.min.js"></script>
</body>

</html>