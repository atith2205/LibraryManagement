<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['del'])) {

	$id = sanitize(trim($_POST['id']));
	// echo $id;

	$sql_del = "DELETE from admin where adminId = $id";
	$error = false;

	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		$error = true;
	}
}
?>
<div class="container">
	<?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning w-100 ">
		<h4 class="center-block">
			<span class="admin_name">Users List</span>
		</h4>
	</div>
</div>
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<?php if (isset($error) === true) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Record Deleted Successfully!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Holy guacamole!</strong> You should check in on some of those fields below.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php } ?>
			<div class="row">
				<!-- <a href="adduser.php">
					<button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px">
						<span class="glyphicon glyphicon-plus-sign"></span>Add User
					</button>
				</a> -->
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
				</div>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>adminId</th>
					<th>adminName</th>
					<th>password</th>
					<th>username</th>
					<th>email</th>
					<th>Delete</th>
				</tr>
			</thead>
			<?php
			$sql = "SELECT * from admin";
			$query = mysqli_query($conn, $sql);
			$counter = 1;
			while ($row = mysqli_fetch_array($query)) {
			?>
				<tbody>
					<td> <?php echo $counter++ ?></td>
					<td> <?php echo $row['adminName'] ?></td>
					<td> <?php echo $row['password'] ?></td>
					<td> <?php echo $row['username'] ?></td>
					<td> <?php echo $row['email'] ?></td>
					<form method='post' action='users.php'>
						<input type='hidden' value="<?php echo $row['adminId']; ?>" name='id'>
						<!--this og <td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td> -->
						<td><button name="del" class="btn btn-danger" type='submit' value='Delete' data-toggle="modal" data-target="#popUpWindow" onclick='return Delete()'><i class="fas fa-user-minus"></i></button></td>
					</form>
				</tbody>
			<?php
			}
			?>
		</table>
		<div class="row justify-content-center">
			<div class="col-auto">
				<a class="btn btn-success px-4 py-2" href="adduser.php"><i class="fas fa-user-plus"></i> Add User</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	function Delete() {
		return confirm('Would you like to delete the user?');
	}
</script>
</body>

</html>