<?php

require 'includes/db-inc.php';
session_start();
$student_name = $_SESSION['studentId'];
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Library Management </title>
</head>

<body>
	<div class="container">
		<!-- navbar begins -->
		<?php include "includes/nav2.php"; ?>
	</div>

	<div class="container ">
		<div class="row col-lg-12 col-lg-offset-1 my-3">
			<div class="">
				<h1 class="text-center">Student Profile</h1>
			</div>
		</div>
		<div class="jumbotron">
			<table class="table table-bordered">
				<?php
				$sql = "SELECT * from students where studentId = '$student_name'";
				$query = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($query)) { ?>
					<div class="profilePhoto my-3 text-center">
						<img src="posts-images/<?php echo $row['photo']; ?>" class="img-thumbnail rounded mx-auto rounded-circle" alt="">
					</div>
					<!-- <tbody>
						<tr>
							<td>Name : </td>
							<td><?php echo $row['name']; ?></td>
						</tr>
						<tr>
							<td>Matric No : </td>
							<td><?php echo $row['matric_no']; ?></td>
						</tr>
						<tr>
							<td>Email : </td>
							<td><?php echo $row['email']; ?></td>
						</tr>
						<tr>
						<tr>
							<td>Department : </td>
							<td><?php echo $row['dept']; ?></td>
						</tr>
						<tr>
							<td>Phone Number : </td>
							<td><?php echo $row['phoneNumber']; ?></td>
						</tr>
						<tr>
							<td>Username : </td>
							<td><?php echo $row['username']; ?></td>
						</tr>
						<tr>
							<td>Password : </td>
							<td><?php echo $row['password']; ?></td>
						</tr>
					</tbody> -->

					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">Name : </div>
						<div class="col-sm-2"><?php echo $row['name']; ?></div>
					</div>
					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">Matric No : </div>
						<div class="col-sm-2"><?php echo $row['matric_no']; ?></div>
					</div>
					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">Email : </div>
						<div class="col-sm-2"><?php echo $row['email']; ?></div>
					</div>
					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">Department : </div>
						<div class="col-sm-2"><?php echo $row['dept']; ?></div>
					</div>
					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">Phone Number : </div>
						<div class="col-sm-2"><?php echo $row['phoneNumber']; ?></div>
					</div>
					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">Username : </div>
						<div class="col-sm-2"><?php echo $row['username']; ?></div>
					</div>
					<div class="row justify-content-center mb-3">
						<div class="col-sm-2">password : </div>
						<div class="col-sm-2"><?php echo $row['password']; ?></div>
					</div>
				<?php
				}
				?>
			</table>


		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>