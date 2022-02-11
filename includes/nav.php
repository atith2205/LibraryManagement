<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin.php">Library Management System </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookstable.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewstudents.php">Students</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="borrowedbooks.php">Borrowed books</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fines.php">Fines</a>
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
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Library Management System </a>
        </div> -->
<div class="collapse navbar-collapse" id="bs-example">
    <ul class="nav navbar-nav">
        <?php if (isset($admin)) { ?>
            <li class="active"><a href="admin.php">Home</a></li>
            <li><a href="bookstable.php">Books</a></li>
            <li><a href="users.php">Admins</a></li>
            <li><a href="viewstudents.php">Students</a></li>
            <li><a href="borrowedbooks.php">Borrowed books</a></li>
            <li><a href="fines.php">Fines</a></li>
        <?php } ?>
        <?php if (isset($student)) { ?>
            <li class="active"><a href="studentportal.php">Home</a></li>
            <li><a href="profile.php">View Profile</a></li>
            <li><a href="borrow-student.php">Borrow Books</a></li>
            <li><a href="fine-student.php">Fines</a></li>
    </ul>
<?php } ?>
<ul class="nav navbar-nav navbar-right">
    <li><a href="logout.php">Logout</a></li>
</ul>
</div>