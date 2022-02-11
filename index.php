<?php
require 'includes/db-inc.php';
include "includes/header.php";
if (isset($_POST['submit'])) {
	$news = sanitize(trim($_POST['news']));
	$sql = "INSERT into news (announcement) values ('$news')";
	$query = mysqli_query($conn, $sql);
	$error = false;
	if ($query) {
		$error = true;
	} else {
		echo "<script>alert('Not successful!! Try again.');
                    </script>";
	}
}
if (isset($_POST['UpDat'])) {
	$id = sanitize(trim($_POST['id']));
	$text = sanitize(trim($_POST['text']));
	$sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
	// echo mysqli_error($sql_up);
	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		echo "<script>           
                   alert('Update successful');
         </script>";
	}
}
if (isset($_POST['del'])) {
	$id = sanitize(trim($_POST['id']));
	$sql_del = "DELETE from news where newsId = $id";
	$result = mysqli_query($conn, $sql_del);
	if ($result) {
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>
</head>

<body>
	<!-- <div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
						<span class="sr-only">:</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Library Management System</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div> -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Library Management System </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link " aria-current="page" href="#">Home</a>
					</li>
				</ul>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item ">
						<a class="nav-link text-decoration-none active" href="login.php">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid slide">
		<div class="slider">
			<!-- <h1>Flickity - wrapAround</h1> -->
			<div class="carousel" data-flickity='{ "autoPlay": true }' ;>
				<div class="carousel-cell" auto-play>
					<img src="ify/1.jfif">
				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/2.jpg">
				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/3.jpeg">
				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/4.jpeg">
				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/5.jpg">
				</div>
			</div>
		</div>
	</div>
	<!-- Default panel contents -->
	<div class="container slide2">
		<div class="panel-heading">
			<div class="row">
				<h3 class="center-block" style="font-size: 30px;">Published Announcements</h3>
			</div>
		</div>
		<table class="table table-bordered" style="font-size: 18px;">
			<thead>
				<tr>
					<th>Sr no</th>
					<th>Announcement</th>
				</tr>
			</thead>
			<?php
			$sql2 = "SELECT * from news";
			$query2 = mysqli_query($conn, $sql2);
			$counter = 1;
			while ($row = mysqli_fetch_array($query2)) {  ?>
				<tbody>
					<td><?php echo $counter++; ?></td>
					<td><?php echo $row['announcement']; ?></td>
				</tbody>
			<?php }
			?>
			</tbody>
		</table>
	</div>
	<!-- <div class="container-fluid slide3" style="background-color: #282828">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail"> -->
	<!-- <img src="ify/9.jpeg"> -->
	<!-- <img src="ify/4.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail"> -->
	<!-- <img src="ify/6.jpeg"> -->
	<!-- <img src="ify/6.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/7.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/8.jpeg">
					</a>
				</div>
			</div>
		</div>
	</div> -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>