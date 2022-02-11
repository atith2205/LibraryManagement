<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
// include "includes/header.php";
if (isset($_POST['submit'])) {
	//Getting the values from the forms
	$name = sanitize(trim($_POST['name']));
	$username = sanitize(trim($_POST['username']));
	$password1 = sanitize(trim($_POST['password1']));
	$password2 = sanitize(trim($_POST['password2']));
	$email = sanitize(trim($_POST['email']));
	if (isset($_FILES['postimg'])) {
		$img_size = $_FILES['postimg']['size'];
		$temp = $_FILES['postimg']['tmp_name'];
		$img_type = $_FILES['postimg']['type'];
		$img_name = $_FILES['postimg']['name'];
		if ($img_size > 500000) {
			$err_flag = true;
			$error = "Your image size is too big... Try again.";
		}
		$extensions = array('jpg', 'jpeg', 'png', 'gif');
		$img_ext = explode('/', $img_type);
		$img_ext = end($img_ext);
		$img_ext = strtolower($img_ext);
		if (!(in_array($img_ext, $extensions))) {
			$err_flag = true;
			$error = "Unwanted image file type... Only jpg,jpeg,png and gif allowed";
		}
		$upload_dir = 'posts-images/';
		if (!is_dir($upload_dir)) {
			mkdir($upload_dir);
		}
		$img_path = "";
		$img_path = $upload_dir . time() . mt_rand(10, 99) . '.' . $img_ext;
		if (!isset($err_flag)) {
			$send = move_uploaded_file($temp, $img_path);
			if ($send) {
				echo "<script>alert('File uploaded')</script>";
				// return $img_path;
			} else {
				return false;
			}
		}
	}
	//Check if the password matches
	if ($password1 == $password2) {
		//create an sql statement
		$sql =
			"INSERT into admin (adminName, password, username, email, photo) 
			values ('$name', '$password1', '$username', '$email', '$img_path')";
		echo $img_picture;
		//query the database
		$query = mysqli_query($conn, $sql);
		$error = false;
		if ($query) {
			$error = true;
		} else {
			echo "<script>alert('Admin not added!');
				</script>";
		}
	} else {
		echo  "<script>alert('Password mismatched!')
				</script>";
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
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"></script>
	<title>Library Management</title>
</head>

<body>
	<div class="container">
		<?php include "includes/nav.php"; ?>
		<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
			<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
				<?php if (isset($error)) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Record Added Successfully!</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


					</div>
				<?php } ?>
				<p class="page-header h1" style="text-align: center">ADD ADMIN</p>
				<div class="container p-5 rounded" style="background-color:#f6f6f6;">
					<form class="form-horizontal" role="form" method="post" action="adduser.php" enctype="multipart/form-data">
						<div class="form-group row">
							<label for="Name" class="col-sm-3 control-label">Full Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" placeholder="Enter Full Name" id="name" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="Username" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="Password" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password1" placeholder="Enter Password" id="password" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="Confirmpassword" class="col-sm-3 control-label">Confirm Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" name="password2" placeholder="Enter Password" id="Confirmpassword" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
							</div>
						</div>
						<!-- <div class="form-group row">
							<label for="IMAGE" class="col-sm-3 control-label">IMAGE</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" name="postimg" placeholder="Enter image" id="IMAGE" style="padding: 0" required>
							</div>
						</div> -->

						<div class="form-group row justify-content-center ">
							<div class="col-auto">
								<button type="submit" class="btn btn-primary" name="submit">
									Submit <i class="fas fa-paper-plane"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		window.onload = function() {
			var input = document.getElementById('name').focus();
		}
	</script>
</body>

</html>