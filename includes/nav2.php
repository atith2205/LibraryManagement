<?php
require 'includes/db-inc.php';
?>
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="studentportal.php">Library Management System </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav">
                <li><a href="studentportal.php">Home</a></li>
                <li><a href="profile.php">View Profile</a></li>
                <li><a href="borrow-student.php">Borrow Books</a></li>
                <li><a href="fine-student.php">Fines</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="studentportal.php">Library Management System </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="studentportal.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">View Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="borrow-student.php">Borrow Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fine-student.php">Fines</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link text-decoration-none active" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>