<?php
session_start();
include_once('../Php/connect.php');
include_once('../Php/security.php');
Secure(2);
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Admin</title>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
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
        <a href="dashboard.php" class="nav-link">Home</a>
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
                    <h3 class="card-title" >Manage Users</h3>
                  </div>
                <div class="card-body">
                  <p class="card-text">
                    <a href="lecturers.php" v-b-tooltip.hover title="List of all lecturers. Can edit or delete.">Manage Lecturers</a>     
                  </p>
                  <p class="card-text">
                    <a href="students.php" v-b-tooltip.hover title="List of all students. Can edit or delete. A new user will appear here by default.">Manage Students</a>
                  </p>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Assignments</h3>
                    </div>
                  <div class="card-body">
                    <p class="card-text">
                        <a href="lectures.php" v-b-tooltip.hover title="List of all lectures.">Lectures</a>
                    </p>
                  </div>
                </div>
              </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
          <div class = "row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Us</h3>
                  </div>
                <div class="card-body">                 
                  <p class="card-text">
                    <a href="contact.php" v-b-tooltip.hover title="Any questions the users send will appear here.">Queries</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
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
<script src="../jss/dist/js/adminlte.min.js"></script>
<script> 
  $(function(){
    $("#sidebar").load("sidebar.php"); 
  });
  </script> 
</body>
</html>
