<?php
session_start();
include_once '../Php/connect.php';
$email = $_SESSION['email'];
?>
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
                <a href="profile.php" class="d-block">
                    <?php
                        $name_query = mysqli_query($con, "SELECT Name FROM accounts WHERE Email = '$email'");
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
                    <a href="dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                    </a>
                </li>              
                <li class="nav-item">
                    <a href="lectures.php" class="nav-link">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>My Lectures</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="enroll.php" class="nav-link">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Enroll to a lecture</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">
                    <i class="nav-icon fa fa-question" aria-hidden="true"></i>
                    <p>Contact</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>