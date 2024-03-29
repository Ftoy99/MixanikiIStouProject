<?php
session_start();
include_once('../Php/connect.php');
include_once('../Php/security.php');
Secure(1);
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Lecturer</title>

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
              <h1 class="m-0">Manage Students</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Manage Student</li>
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
            <!-- TABLES GO HERE -->
            <?php
            $sql = 'SELECT * FROM `lectures` WHERE `Date`>="' . date('Y-m-d') . '" AND `Lecturer`="' . $_SESSION["UserID"] . '";';
            if ($result = mysqli_query($con, $sql)) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <div class="col-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">' . $row["Title"] . '</h3>
                        <div class="card-tools">
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="LecturesTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Student</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                              ';
                              $sql2='SELECT * FROM `participations` JOIN accounts ON participations.AccountID=accounts.AccountID WHERE `LectureID`="'.$row["LectureID"].'";';
                              if ($results2=mysqli_query($con,$sql2)){
                                $count=1;
                                while ($rows=mysqli_fetch_assoc($results2)){
                                  echo '<tr>
                                  <td>'.$count.'</td>
                                  <td>'.$rows["Name"].'</td>
                                  <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                      <button class="btn btn-danger" onclick="KickStudent('.$rows["AccountID"].','.$rows["LectureID"].')"><i class="fa fa-gavel" aria-hidden="true"></i></button>
                                    </div>
                                  </td>
                                  </tr>'
                                  ;
                                  $count++;
                                }
                              }
                              echo '
                              </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                          </div>
                          ';
              }
            }
            ?>
          </div>
        </div>
        <!-- /.row -->
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $(function() {
      $("#sidebar").load("sidebar.php");
    });
  </script>
    <script>
      function KickStudent(x,y){
      $.post("../Php/kickstudent.php", {
          student:x,
          lecture:y
        })
        .done(function(data) {
          if (data == "TRUE") {
            Swal.fire({
              icon: 'success',
              title: 'The Ban Hammer Has Spoken!!!',
            }).then((result) => {
              location.reload();
            })
          } else {
            alert("Failed!");
            alert(data);
          }
        });
      }

      function Search(SearchBox,Table) {
      // Declare variables
      var input, filter, table, tr, td, i;
      input = SearchBox.childNodes[1];
      filter = input.value.toUpperCase();
      table = Table;
      tr = table.getElementsByTagName("tr"),
      th = table.getElementsByTagName("th");

      // Loop through all table rows, and hide those who don't match the        search query
      for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        for (var j = 0; j < th.length; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1) {
              tr[i].style.display = "";
              break;
            }
          }
        }
      }

      input.value = "";
    }


  </script>
</body>

</html>