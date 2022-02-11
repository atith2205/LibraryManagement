<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

?>
<div class="container">
	<?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning w-100 text-center">

		<span class="glyphicon glyphicon-book"></span>
		<strong>Borrowed Books</strong>
	</div>

</div>

<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">

				</div>

			</div>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Book Name</th>
					<th>Member Name</th>
					<th>Matric Number</th>

				</tr>
			</thead>
			<?php

			$sql = "SELECT * FROM borrow";

			$query = mysqli_query($conn, $sql);
			$counter = 1;
			while ($row = mysqli_fetch_array($query)) {

			?>
				<tbody>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo $row['bookName']; ?></td>
						<td><?php echo $row['memberName']; ?></td>
						<td><?php echo $row['matricNo']; ?></td>
					</tr>
				</tbody>
			<?php }

			?>
		</table>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript">
		</script>
		</body>

		</html>