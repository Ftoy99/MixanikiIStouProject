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
              <h1 class="m-0">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">My Details</h3>
              </div>
              <!-- /.card-header -->
              <?php
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM accounts WHERE Email = '$email'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row["AccountID"];
                        $name = $row["Name"];
                        switch($row["Type"]) {
                            case 0: 
                                $type = "Student";
                                break;
                            case 1: 
                                $type = "Lecturer";
                                break;
                            case 2: 
                                $type = "Secretary";
                                break;
                        }
                    }
                }
              ?>
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $email ?>">
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $name ?>">
                  </div>  
                  <div class="form-group" hidden>
                    <label for="name">ID</label>
                    <input type="text" class="form-control" id="id" value="<?php echo $id ?>">
                  </div>                                                                                                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-primary" onclick="editMyDetails()">Confirm</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (right) -->
          <div class="col-md-6">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body color-palette-box">

                    <h3 class="profile-username text-center"><?php echo $name ?></h3>

                    <p class="text-muted text-center"><?php echo $type ?></p>

                    <p class="text text-center">Lecture History</p>

                    <ul class="list-group list-group-unbordered mb-3">
                    <?php
                        $date = date('Y-m-d');
                        $query = "SELECT * FROM lectures WHERE (Date < '$date' AND Lecturer = '$id') ORDER BY Date DESC LIMIT 10";
                        $res = mysqli_query($con,$query);
                        if (mysqli_num_rows($result) > 0) {                          
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                echo '  
                                    <li class="list-group-item">
                                    <b>' . $rows["Title"] . '</b>
                                    </li>  
                                    ';                             
                            }
                        }

                    ?>
                    </ul>
                <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Password Change</h3>
                </div>
                <!-- /.card-header -->
                <?php
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM accounts WHERE Email = '$email'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["AccountID"];
                    $name = $row["Name"];
                    switch ($row["Type"]) {
                      case 0:
                        $type = "Student";
                        break;
                      case 1:
                        $type = "Lecturer";
                        break;
                      case 2:
                        $type = "Secretary";
                        break;
                    }
                  }
                }
                ?>
                <!-- form start -->
                <form>
                  <div class="card-body">
                  <div class="form-group">
                    <label id="warning" style="color:red;visibility: hidden;" >Passwords Entered Dont match</label>
                    </div>
                    <div class="form-group">
                    <label id="warning">Passwords Entered Dont match</label>
                      <label for="name">Current Password</label>
                      <div class="input-group" id="password">
                        <input type="password" class="form-control" id="passInput1" placeholder="Change password here">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat" onclick="passwordVisibility(1)">Show/Hide Password</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name">New Password</label>
                      <div class="input-group" id="password">
                        <input type="password" class="form-control" id="passInput3" placeholder="Change password here">
                        <span class="input-group-append">
                          <button type="button" class="btn btn-info btn-flat" onclick="passwordVisibility(3)">Show/Hide Password</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="passwordSwap()">Confirm</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
  <script>
      function editMyDetails()
      {
        var id = $("#id")[0].value;
        var name = $("#name")[0].value;
        var email = $("#email")[0].value;
        
        $.post("../Php/detailsEdit.php", {
          id: id,
          name: name,
          email: email,
        })
        .done(function(data) {
          if (data == "TRUE") {
            Swal.fire({
              icon: 'success',
              title: 'User updated successfully!',
            }).then((result) => {
              location.reload();             
            })

          } else {
            alert("Failed!");
          }
        });
      }
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script>
    function passwordVisibility(x) {
      if (x == 1) {
        var x = document.getElementById("passInput1");
      }
      if (x == 3) {
        var x = document.getElementById("passInput3");
      }
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function passwordSwap() {
      var pass1 = document.getElementById("passInput1").value;
      var pass3 = document.getElementById("passInput3").value;
        $.post("../Php/changePass.php", {
            pass: pass1,
            newpass: pass3
          })
          .done(function(data) {
            if (data == 1) {
              Swal.fire({
                icon: 'success',
                title: 'Password Changed successfully!'
              }).then((result) => {
                location.reload();
              })

            }
            if (data == 2) {
              var x = document.getElementById("warning");
              x.style.visibility = "visible";
            }
          });
      }
  </script>
</body>

</html>