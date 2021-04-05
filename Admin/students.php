<?php
session_start();
?>

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
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" id="searchInput" type="text" placeholder="Search" aria-label="Search" onkeyup="searchFunction()">
          <div class="input-group-append">
            <!--<button class="btn btn-navbar" type="submit value="Search">
              <i class="fas fa-search"></i>
            </button>-->
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
              <h1 class="m-0">Students</h1>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Students</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" id="searchInput" class="form-control float-right" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="userTable">
                    <thead>
                      <tr>
                        <th>A/A</th>
                        <th>Name</th>    
                        <th>Email</th>                 
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include_once('../Php/connect.php');
                      $result = mysqli_query($con, "SELECT * FROM accounts WHERE Type = 0");
                      $bool = mysqli_num_rows($result);
                      if($bool != 0) {
                        // output data of each row
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                          $id = $row["AccountID"];
                          $name = $row["Name"];
                          $email = $row["Email"];
                          $type = $row["Type"];
                          echo '
                          <tr>   
                            <td>' . $i .'</td>               
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                            <form method = "POST">
                              <input type="hidden" name="edit_id" value="echo $rows['AccountID'];">    
                              <input type="hidden" name="edit_name" value="echo $rows['Name'];">  
                              <input type="hidden" name="edit_email" value="echo $rows['Email'];">         
                              <button class="btn btn-info" type="submit" data-toggle="modal" data-target="#modal-Edit-User"><i class="fas fa-cog"></i></button>
                              <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            </div>
                          </td>
                          </tr>
                          ';
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

  <!-- Modal -->
  <div class="modal fade" id="modal-Edit-User">
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
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" value=<?php echo $name ?>>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="email" value=<?php echo $email ?>>
            </div>        
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="EditUser()">Confirm</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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
    function EditUser()
    {
      var name = $("#name")[0].value;
      var email = $("#email")[0].value;
      <?php $_SESSION["userID"] = $id ?>
      $.post("../Php/userEdit.php", {
          name: name,
          email: email,
          userId: userID
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
  </script>
</body>

</html>