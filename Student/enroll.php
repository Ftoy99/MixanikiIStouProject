<?php
include_once('../Php/connect.php');
session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Student</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" onkeyup="">
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
              <h1 class="m-0">Lecture Enrollment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Enroll</li>
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
                  <h3 class="card-title">Lectures</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 200px;">
                      <input type="text" name="table_search" id="SearchField" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button class="btn btn-default" onclick="Search()">
                          <i class="fas fa-search"></i>
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
                        <th>Date</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php                    
                      include_once('../Php/connect.php');
                      $date = date("Y/m/d");
                      $sql = "SELECT * FROM lectures WHERE Date > '$date'";
                      $result = mysqli_query($con, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $timestart = date('g:ia', strtotime($row["TimeS"]));
                            $timeend = date('g:ia', strtotime($row["TimeE"]));
                            $date = date("d-m-Y", strtotime($row["Date"]));
                            if (strtotime(date("d-m-Y")) > strtotime($date)) {
                              $Status = "Finished";
                            } else {
                              $current = $_SERVER["REQUEST_TIME"] + 60 * 60;
                              $start = strtotime($row["TimeS"]);
                              $end = strtotime($row["TimeE"]);
                              if (date("d-m-Y") < $date) {
                                $Status = "Pending";
                              } else {
                                if ($current > $end) {
                                  $Status = "Finished";
                                } else {
                                  if ($current > $start) {
                                    $Status = "Ongoing";
                                  } else {
                                    $Status = "Pending";
                                  }
                                }
                              }
                            }
                          echo '
                          <tr>
                          <td><div data-value="' . $row["LectureID"] . '">' . $counter . '</div></td>
                          <td>' . $row["Title"] . '</td>
                          <td>' . $date . '</td>
                          <td>' . $timestart . '</td>
                          <td>' . $timeend . '</td>
                          <td>' . $Status . '</td>
                          <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                              <button class="btn btn-primary" onclick="enrollLecture(this.parentNode.parentNode.parentNode)"><i class="fas fa-plus"></i></button>
                            </div>
                          </td>
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
          <!-- end vue js -->
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
  <script>
    $(function() {
      $("#sidebar").load("sidebar.php");
    });
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    function Search() {
      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("SearchField");
      filter = input.value.toUpperCase();
      table = document.getElementById("LecturesTable");
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
  <script>
      function enrollLecture(row) {
      var id = row.childNodes[1].childNodes[0].getAttribute('data-value');
      var title = row.cells[1].innerHTML;
      var date = row.cells[2].innerHTML;
      var timeStart = row.cells[3].innerHTML;
      var timeEnd = row.cells[4].innerHTML;

      Swal.fire({
        title:'Enroll to lecture: ' + title,
        text: "You will enroll to participate this lecture. Once you do you need to contact the lecturer in case you have to miss the lecture for any reason.",
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post("../Php/enrollLecture.php", {
              id: id,
              date: date,
              timeStart: timeStart,
              timeEnd: timeEnd
            })
            .done(function(data) {
              if (data == "TRUE") {
                Swal.fire(
                  'Success!',
                  'You have enrolled for the lecture.',
                  'success'
                );
                row.parentNode.removeChild(row);

              } else {
                alert(data);
              }
            });
        }
      });
    }
  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>

</html>