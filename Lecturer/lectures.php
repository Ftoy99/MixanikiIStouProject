<?php
include_once('../Php/connect.php');
session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SRS - Lecturer</title>
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
              <h1 class="m-0">Lectures</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Lectures</li>
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
                      $sql = 'SELECT * FROM lectures WHERE Lecturer="'.$_SESSION["UserID"].'"';
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
                              <button class="btn btn-info" onclick="EditLectureModal(this.parentNode.parentNode.parentNode)"data-toggle="modal" data-target="#MEditLecture"><i class="fas fa-cog"></i></button>
                              <button class="btn btn-danger" onclick="DeleteLecture(this.parentNode.parentNode.parentNode)"><i class="fas fa-trash"></i></button>
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

  <div class="modal fade" id="modal-Create-Lecture">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create Lecture</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="Title" placeholder="Title">
            </div>
            <div class="form-group">
              <label>Date:</label>
              <input type="text" class="form-control" id="Date" placeholder="dd-mm-yyyy">

              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Start Time</label>
              <input type="text" class="form-control" id="STime" placeholder="hh:mm">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">End Time</label>
              <input type="text" class="form-control" id="ETime" placeholder="hh:mm">
            </div>
          </div>
          <input type="text" class="form-control" id="TID" value="<?php echo $_SESSION['UserID']; ?>" hidden>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="ClearLecture()" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="CreateLecture()">Create</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
    <!-- Modal -->
    <div class="modal fade" id="MEditLecture">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="eTitle" placeholder="Title">
            </div>
            <div class="form-group">
              <label>Date:</label>
              <input type="text" class="form-control" id="eDate" placeholder="dd/mm/yyyy">

              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Start Time</label>
              <input type="text" class="form-control" id="eSTime" placeholder="hh:mm">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">End Time</label>
              <input type="text" class="form-control" id="eETime" placeholder="hh:mm">
              <input id="eID" hidden>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="UpdateLecture()">Save</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script>
    function CreateLecture() {
      var title = $("#Title")[0].value;
      var date = $("#Date")[0].value;
      var stime = $("#STime")[0].value;
      var etime = $("#ETime")[0].value;
      var teacherid = $("#TID")[0].value;
      $.post("../Php/lectureCreate.php", {
          title: title,
          date: date,
          stime: stime,
          etime: etime,
          teacherid: teacherid
        })
        .done(function(data) {
          if (data == "TRUE") {
            Swal.fire({
              icon: 'success',
              title: 'Lecture Has Been Created!',
            }).then((result) => {
              location.reload();

            })

          } else {
            alert("Failed!");
          }
        });
    }

    function ClearLecture() {
      $("#Title")[0].value = "";
      $("#Date")[0].value = "";
      $("#STime")[0].value = "";
      $("#ETime")[0].value = "";
      $("#TID")[0].value = "";

    }

    function DeleteLecture(row) {
      var id = row.childNodes[1].childNodes[0].getAttribute('data-value');
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        reverseButtons: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post("../Php/lectureDelete.php", {
              id: id,
            })
            .done(function(data) {
              if (data == "TRUE") {
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
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

    function EditLectureModal(table){
      $("#eTitle")[0].value= table.cells[1].innerHTML;
      $("#eDate")[0].value= table.cells[2].innerHTML;
      $("#eSTime")[0].value= table.cells[3].innerHTML;
      $("#eETime")[0].value= table.cells[4].innerHTML;
      $("#eID")[0].value = table.childNodes[1].childNodes[0].getAttribute('data-value');
    }

    function UpdateLecture(){
      var title = $("#eTitle")[0].value;
      var date = $("#eDate")[0].value;
      var stime = $("#eSTime")[0].value;
      var etime = $("#eETime")[0].value;
      var id = $("#eID")[0].value;
      
      $.post("../Php/lectureUpdate.php", {
          id:id,
          title: title,
          date: date,
          stime: stime,
          etime: etime,
        })
        .done(function(data) {
          if (data == "TRUE") {
            Swal.fire({
              icon: 'success',
              title: 'Lecture Has Been Updated!',
            }).then((result) => {
              location.reload();

            })

          } else {
            alert("Failed!");
            alert(data);
          }
        });
    }


  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>

</html>