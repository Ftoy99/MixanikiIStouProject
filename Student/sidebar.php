<?php
session_start();
include_once('../Php/connect.php');
include_once('../Php/security.php');
Secure(0);
$email = $_SESSION['email'];
?>
<head>
<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
</head>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <span class="brand-text font-weight-light">Student Record System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="profile.php" class="d-block" v-b-tooltip.hover title="List of all your lectures. Can add, edit or delete.">
                    <?php
                     $UserID = $_SESSION['UserID'];

                     $sql = "SELECT * FROM accounts WHERE AccountID = '$UserID'";
                     $result = mysqli_query($con, $sql);
                        $name_query = mysqli_query($con, "SELECT Name FROM accounts WHERE AccountID = '$UserID'");
                        if($name_query)
                        {
                            while($rows = mysqli_fetch_assoc($name_query))
                            {
                                $name = $rows['Name'];  
                                echo $name;
                            }
                        }
                    ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                    <a href="dashboard.php" class="nav-link" v-b-tooltip.hover title="Return to the main page.">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                    </a>
                </li>              
                <li class="nav-item">
                    <a href="lectures.php" class="nav-link" v-b-tooltip.hover title="List of all lectures you enrolled.">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>My Lectures</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="enroll.php" class="nav-link"  v-b-tooltip.hover title="List of all lectures. Can enroll to a lecture.">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Enroll to a Lecture</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link" v-b-tooltip.hover title="Ask questions to the admin. Any answers will also appear here.">
                    <i class="nav-icon fa fa-question" aria-hidden="true"></i>
                    <p>Contact</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link" v-b-tooltip.hover title="Information about the system's creators.">
                    <i class="nav-icon fa fa-info"></i>
                    <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link" v-b-tooltip.hover title="Return to login page.">
                    <i class="nav-icon fa fa-sign-out" aria-hidden="true"></i>
                    <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>