<?php
session_start();
include_once('../Php/connect.php'); 
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Student</title>

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

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
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
            <h1 class="m-0">My Lectures</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">My Lectures</li>
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
          <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">My Lectures</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                      <input type="text" name="table_search" id="SearchField" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button class="btn btn-default" onclick="Search()">
                          <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-default" data-toggle="modal" data-target="#modal-Create-Lecture">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="LecturesTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Lecturer</th>
                        <th>Date</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include_once('../Php/connect.php');
                      $sql = 'SELECT * FROM `participations` join lectures on participations.LectureID=lectures.LectureID where Date>="'.date('Y-m-d').'" AND AccountID="'.$_SESSION["UserID"].'";';
                      $result = mysqli_query($con, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                          $timestart = date('g:ia', strtotime($row["TimeS"]));
                          $timeend = date('g:ia', strtotime($row["TimeE"]));
                          $date = date("d-m-Y", strtotime($row["Date"]));
                          echo '
                          <tr>
                          <td><div data-value="' . $row["LectureID"] . '">' . $counter . '</div></td>     
                          <td>' . $row["Title"] . '</td>
                          <td>' . $row["LecturerName"] . '</td> 
                          <td>' . $date . '</td>
                          <td>' . $timestart . '</td>
                          <td>' . $timeend . '</td>
                          </tr>';
                          $counter++;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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
