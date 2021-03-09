<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
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
        <a href="admin_index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
                    <h3 class="card-title">Manage Users</h3>
                  </div>
                <div class="card-body">
                  <p class="card-text">
                    <a href="url">Manage Lecturers</a>     
                  </p>
                  <p class="card-text">
                    <a href="url">Manage Students</a>
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
                        <a href="url">Lectures</a>
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
                    <a href="url">FAQ</a>     
                  </p>
                  <p class="card-text">
                    <a href="url">Queries</a>
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
    $("#sidebar").load("admin_sidebar.html"); 
  });
  </script> 
</body>
</html>
