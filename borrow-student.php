<?php
session_start();
include "includes/header.php";
?>
<div class="container">
	<?php include "includes/nav2.php"; ?>
	<div class="alert alert-warning w-100 text-center my-3">
		<span class="glyphicon glyphicon-book"></span>
		<strong>Borrow Books</strong>
	</div>
</div>
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<div class="row">
			</div>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>ID</th>
				<th>BOOK</th>
				<th>AVAILABLE</th>
				<th>BORROW</th>
			</tr>
			</thead>
			<?php
			$sql = "SELECT * FROM books";
			$query = mysqli_query($conn, $sql);
			$counter = 1;
			while ($row = mysqli_fetch_array($query)) {
				$_SESSION['book_Title'] = $row['bookTitle'];
			?>
				<tbody>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo $row['bookTitle']; ?></td>
						<td><?php echo $row['available']; ?></td>
						<td>
							<?php
							if ($row['available'] == "YES") {
							?>
								<a href="lend-student.php?bid=<?php echo $row['bookId'] ?>" id="show" class="btn btn-success">
									Borrow Now
								</a>
							<?php
							} else {
							?>
								<button" class="btn btn-danger">Not Available</button>
							<?php
							}
							?>
						</td>
					</tr>
				</tbody>
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