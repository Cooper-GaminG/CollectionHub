<?php 
	include 'API.php';

	// check if user is logged in, if not then redirect to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	    header("location: login.php");
	    exit;
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<form action="API.php" method="POST">
					<div class="form-group">
						<label>Add Category</label>
						<input type="text" name="category_name" class="form-control" required>
					</div>
					<div>
						<button type="submit" class="btn btn-primary" name="save-category">Add</button>
						<a href="welcome.php" class="btn btn-danger">Back</a>
					</div>
				</form>
			</div>
			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>Your Categories</th>
							<th></th>
						</tr>
					</thead>
					<?php 
					while ($row = $result->fetch_assoc()): ?>
						<tr>
							<?php if ($update == true): ?>
								<form name="Edit-Form" method="post" action="API.php">
									<input type="hidden" name="item-id" value="<?php echo $row['CategoryID'] ?>">
									<td><input type="text" name="edit_category" value="<?php echo $row['Label']; ?>"></td>
									<td>
										<a href="category.php" class="btn btn-danger">Cancel</a>
										<button type="submit" class="btn btn-info" name="update">Confirm</button>
									</td>
								</form>
							<?php else: ?>
								<td><?php echo $row['Label'];?></td>
								<td>
									<a href="API.php?delete=<?php echo $row['CategoryID']; ?>" class="btn btn-danger" name="delete">Delete</a>
									<a href="category.php?edit=<?php echo $row['CategoryID']; ?>" name="edit" class="btn btn-info">Edit</a>
								</td>
							<?php endif; ?>
						</tr>
					<?php endwhile; ?>
				</table>
			</div>
		</div>
	</body>
</html>