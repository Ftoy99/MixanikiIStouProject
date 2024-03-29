<?php
session_start();
include_once('../Php/connect.php');
include_once('../Php/security.php');
Secure(1);
?>
<head>
<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
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
                <a href="profile.php" class="d-block" v-b-tooltip.hover title="Click to view your profile."><?php
                echo $_SESSION["Name"]; ?></a>
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
                    <a href="lectures.php" class="nav-link" v-b-tooltip.hover title="List of all your lectures. Can add, edit or delete.">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Manage Lectures</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="students.php" class="nav-link" v-b-tooltip.hover title="List of all students attending your lectures. Can remove students.">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>Manage Students</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link" v-b-tooltip.hover title="Any questions the users send will appear here.">
                    <i class="nav-icon fa fa-question" aria-hidden="true"></i>
                    <p>Contact Us Queries</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link"  v-b-tooltip.hover title="Information about the system's creators.">
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