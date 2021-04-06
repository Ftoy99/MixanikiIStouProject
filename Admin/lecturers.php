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
          <a href="dashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="contact.php" class="nav-link">Contact</a>
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
              <h1 class="m-0">Lecturers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Lecturers</li>
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
                  <h3 class="card-title">Lecturers</h3>

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
                  <table class="table table-hover text-nowrap" id="userTable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>    
                        <th>Email</th>                
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include_once('../Php/connect.php');
                      $result = mysqli_query($con, "SELECT * FROM accounts WHERE Type = 1");
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
                            <td>' . $id .'</td>               
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td hidden>' . $type . '</td>
                            <td class="text-right py-0 align-middle">
                              <div class="btn-group btn-group-sm">                       
                                <button class="btn btn-info" type="submit" data-toggle="modal" data-target="#modal-Edit-User" onclick="modalGetData(this.parentNode.parentNode.parentNode)"><i class="fas fa-cog"></i></button>
                                <button class="btn btn-danger" type="submit" onclick="deleteUser(this.parentNode.parentNode.parentNode);"><i class="fas fa-trash"></i></button>
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
              <input type="text" class="form-control" id="name" value="">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="email" value="">
            </div>
            <div class="form-group">
              <label>Permissions</label>
              <select class="form-control" id="permissions">
                <option value=0>Student</option>
                <option selected="selected" value=1>Lecturer</option>
                <option value=2>Secretary</option>
              </select>
            </div> 
            <input hidden id="id"></field>       
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    function EditUser()
    {
      var id = $("#id")[0].value;
      var name = $("#name")[0].value;
      var email = $("#email")[0].value;
      var permissions = $("#permissions")[0].value;
      
      $.post("../Php/userEdit.php", {
          id: id,
          name: name,
          email: email,
          permissions: permissions
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
  <script>
  function deleteUser(row) {
    var id = row.cells[1].innerHTML;
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
          $.post("../Php/userDelete.php", {
              id: id,
            })
            .done(function(data) {
              if (data == "TRUE") {
                Swal.fire(
                  'Deleted!',
                  'The user has been deleted.',
                  'success'
                );
                row.parentNode.removeChild(row);
              
              }else{
                alert(data);
              }
            });
        }
      });
    }
  </script>
  <script>
    function Search(){
        // Declare variables
        var input, filter, table, tr, td, i ;
        input = document.getElementById("SearchField");
        filter = input.value.toUpperCase();
        table = document.getElementById("userTable");
        tr = table.getElementsByTagName("tr"),
        th = table.getElementsByTagName("th");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
                    tr[i].style.display = "none";
                    for(var j=0; j<th.length; j++){
                td = tr[i].getElementsByTagName("td")[j];      
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)                               {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }

        input.value="";
    }
  </script>
  <script>
    function modalGetData(row)
    {
      var id = row.cells[1].innerHTML;
      var name = row.cells[2].innerHTML;
      var email = row.cells[3].innerHTML;
      var type = row.cells[4].innerHTML;

      document.getElementById("id").value=id;
      document.getElementById("name").value=name;
      document.getElementById("email").value=email;
    }
  </script>
</body>

</html>