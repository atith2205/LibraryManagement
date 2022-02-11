<?php
session_start();
require 'includes/snippet.php';
require 'includes/db-inc.php';
// include "includes/header.php";
$error = false;
if (isset($_POST['submit'])) {
	$username = sanitize(trim($_POST['username']));
	$password = sanitize(trim($_POST['password']));
	$sql_admin = "SELECT * from admin where username = '$username' and  password = '$password' ";
	$query = mysqli_query($conn, $sql_admin);
	$error = false;
	// echo mysqli_error($conn);
	if (mysqli_num_rows($query) > 0) {
		while ($row = mysqli_fetch_assoc($query)) {
			$_SESSION['auth'] = true;
			$_SESSION['admin'] = $row['username'];
		}
		if ($_SESSION['auth'] === true) {
			header("Location: admin.php");
			exit();
		}
	} else {
		$sql_stud = "SELECT * from students where username='$username' and password = '$password'";
		$query = mysqli_query($conn, $sql_stud);
		$row = mysqli_fetch_assoc($query);
		if (mysqli_num_rows($query) > 0) {
			$_SESSION['student-username'] = $row['username'];
			$_SESSION['student-name'] = $row['name'];
			$_SESSION['student-matric'] = $row['matric_no'];
			$_SESSION['studentId'] = $row['studentId'];
			header("Location:studentportal.php");
		} else {
			$error = true;
		}
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
		<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  ">
			<?php
			if ($error) {
			?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong style='text-align: center'> Wrong Username Or Password.</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php
			}
			?>
			<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
				<p class="page-header h1" style="text-align: center">LOGIN</p>
				<div class="container p-5 rounded" style="background-color:#f6f6f6;">
					<form class="form-horizontal" role="form" method="post" action="login.php" enctype="multipart/form-data">
						<div class="from-group row mb-3 justify-content-center">
							<label for="Username" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" autocomplete="off" required>
							</div>
						</div>
						<div class="from-group row mb-3 justify-content-center">
							<label for="Password" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" autocomplete="off" required>
							</div>
						</div>
						<div class="from-group row mb-3 justify-content-center ">
							<div class="col-auto">
								<input type="submit" class="btn btn-primary" name="submit" value="Sign In">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.min.js"> </script>
	<?php if (isset($alert_user)) { ?>
		<script type="text/javascript">
			swal("Oops...", "You are not allowed to view this page directly...!", "error");
		</script>
	<?php } ?>
</body>

</html>