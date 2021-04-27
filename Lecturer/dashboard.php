<?php
session_start();
include_once('../Php/connect.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Lecturer</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <link rel="stylesheet" href="../css/darktheme.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <div id="sidebar"></div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Main Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Upcoming Lectures</h3>
                </div>
                <div class="card-body">
                  <?php
                  $sql = 'SELECT * FROM `lectures` WHERE `Date`>="' . date('Y-m-d') . '" AND `Lecturer`="' . $_SESSION["UserID"] . '";';
                  if ($result = mysqli_query($con, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo '<p class="card-text">
                        <a href="students.php?lecture=' . $row["LectureID"] . '">' . $row["Title"] . '</a>
                    </p>';
                    }
                  }

                  ?>
                  <!-- <p class="card-text">
                        <a href="url">Mock Link</a>
                    </p>
                    <p class="card-text">
                        <a href="url">Mock Link</a>
                    </p> -->
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Contact Us</h3>
                </div>
                <div class="card-body">
                  <p class="card-text">
                    <a href="contact.php">Queries</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <!-- /.row -->
          <!-- start vue js -->
          <div id="secret">
            <button @click="modalAction()">ッ</button>
            <div v-if="modal" class="bg-white pin-t pin-l h-500 w-500">
              <div class="bg-white p-4 rounded w-1/3">
                <h2 class="mb-2">You found a secret!</h2>
                <p>As a reward you can have a look at our lead engineer, hard at work to bring you this system!</p>
                <img src="https://media.giphy.com/media/unQ3IJU2RG7DO/giphy.gif">
                <br>
                <button @click="modalAction()" class="bg-teal text-white font-bold px-4 py-2 rounded-full">Close</button>            
              </div>
            </div>
          </div>
          <script type="text/javascript">
            var secret = new Vue({
              el: '#secret',
              data: {
                modal: false
              },
              methods: {
                modalAction(){
                  if(this.modal == false){
                    this.modal = true
                  } else {
                    this.modal = false
                  }
                }
              }
            })
          </script>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right 
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
      <!-- Default to the left
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../jss/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../jss/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../jss/dist/js/adminlte.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <script>
    $(function() {
      $("#sidebar").load("sidebar.php");
    });
  </script>
</body>

</html>