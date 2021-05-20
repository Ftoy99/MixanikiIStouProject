<?php
session_start();
include_once('../Php/connect.php');
include_once('../Php/security.php');
Secure(0);
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
                            <h1 class="m-0">Contact</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Cards go Here -->
                        <!-- This is the form to submit -->
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <!-- Title of Card -->
                                <div class="card-header">
                                    <h3 class="card-title">Ask A Question</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="Title" placeholder="Quick Title Describing Your Problem.">
                                    </div>
                                    <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea class="form-control" rows="3" placeholder="Ask Your Question Here As Detailed As Prossible." spellcheck="false" id="Description"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input value="<?php

                                                    echo $_SESSION["UserID"]; ?>" id="id" hidden>
                                    <button class="btn btn-primary" onclick="AskQuestion()">Submit</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        include_once('../Php/connect.php');
                        $sql = 'SELECT * FROM `questions` WHERE `AskedBy` = ' . $_SESSION["UserID"] . ';';
                        if ($result = mysqli_query($con, $sql)) {
                            $result2 = mysqli_query($con, 'SELECT `Name` from `Accounts` WHERE `AccountID`=' . $_SESSION["UserID"] . ';');
                            $name = mysqli_fetch_assoc($result2)["Name"];
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row["AnsweredBy"] != "0") {
                                    $result3 = mysqli_query($con, 'SELECT `Name` from `Accounts` WHERE `AccountID`="' . $row["AnsweredBy"] . '";');
                                    $name2 = mysqli_fetch_assoc($result3)["Name"];
                                    echo '
                                <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            ' . $row["Title"] . '
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <blockquote>
                                            <p>' . $row["Description"] . '</p>
                                            <small>' . $name . '</small>
                                        </blockquote>
                                        <blockquote class="quote-secondary">
                                            <p>' . $row["Answer"] . '</p>
                                            <small>' . $name2 . '</small>
                                        </blockquote>
    
                                    </div>
                                </div>
                            </div>
                                ';
                                }else{
                                    echo '
                                    <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                            <i class="fa fa-question" aria-hidden="true"></i>
                                                ' . $row["Title"] . '
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <blockquote>
                                                <p>' . $row["Description"] . '</p>
                                                <small>' . $name . '</small>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                                    ';

                                }

                            }
                        }

                        ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

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
        function AskQuestion() {
            var title = $('#Title')[0].value;
            var description = $('#Description')[0].value;
            var id = $('#id')[0].value;
            Swal.fire({
                title: 'Are you sure?',
                text: "This question will be send to the secretary.",
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("../Php/questionCreate.php", {
                            title: title,
                            description: description,
                            id: id
                        })
                        .done(function(data) {
                            if (data == "TRUE") {
                                Swal.fire({
                                    title: 'Question Sent!',
                                    description: 'Your Question Has Been Sent,It Will Be Answered Shortly!',
                                    icon: 'success',
                                }).then((result) => {
                                    location.reload();
                                })
                            } else {
                                alert(data);
                            }
                        });
                }
            });
        }
    </script>
</body>

</html>