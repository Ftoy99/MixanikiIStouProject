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
    <title>SRS - Lecturer</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Vue JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
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
                            <h1 class="m-0">
                                <div id="title">
                                    {{ title }}
                                </div>
                            </h1>
                        </div><!-- /.col -->
                        <script>
                            var title = new Vue({
                                el: '#title',
                                data: {
                                    title: 'About'
                                }
                            })
                        </script>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- VUE ITEMS FOR ABOUT PAGE -->
                        <div id="VueInfo">
                            <div v-on:click="isHidden = !isHidden">
                                <a href="#" style="margin: auto;"><img src="../tepak.png" alt="University Logo"></a>
                            </div>
                            <div v-if="!isHidden">
                                <div id="info">
                                    <span v-for="info in lines">
                                        <b>{{ info.text }}</b><br>
                                    </span>
                                </div>
                                <script>
                                    var app4 = new Vue({
                                        el: '#info',
                                        data: {
                                            lines: [{
                                                    text: 'This website serves as the project for the course CEI-326 for 2021.'
                                                },
                                                {
                                                    text: 'The course was taught under the branch of EECEI at the Cyprus University of Technology.'
                                                },
                                                {
                                                    text: 'Primary Professor : Dr. Michael Sirivianos.'
                                                },
                                                {
                                                    text: 'Assistant Professor : Mr. Petros Papagiannis.'
                                                },

                                            ]
                                        }
                                    })
                                </script>
                                <div id="how">
                                    <span v-if="!isHidden" v-for="parts in howitwasmade">
                                        <b>{{ parts.text }}</b><br>
                                    </span>
                                </div>
                                <script>
                                    var app4 = new Vue({
                                        el: '#how',
                                        data: {
                                            howitwasmade: [{
                                                    text: 'This website was made without using frameworks.',
                                                },
                                                {
                                                    text: 'Primarily it uses HTML,PHP And JavaScript.',
                                                },
                                                {
                                                    text: 'Libraries Used Include : JQuery,VueJS and SweetAlert2.',
                                                }

                                            ]
                                        }
                                    })
                                </script>
                                <span><b>Members that participated for this project are :</b></span>
                                <div id="members">
                                    <span v-if="!isHidden" v-for="member in members">
                                        <b>{{ member.name }} : {{member.id}}</b><br>
                                    </span>
                                </div>
                                <script>
                                    var app4 = new Vue({
                                        el: '#members',
                                        data: {
                                            members: [{
                                                    name: 'Antonis Savvides',
                                                    id: '17007'
                                                },
                                                {
                                                    name: 'Charalambos Christofi',
                                                    id: '14792'
                                                },
                                                {
                                                    name: 'Dimitris Ioannou',
                                                    id: '14423'
                                                }

                                            ]
                                        }
                                    })
                                </script>
                            </div>

                        </div>
                        <script>
                            var app = new Vue({
                                el: '#VueInfo',
                                data: {
                                    isHidden: true
                                }
                            })
                        </script>
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