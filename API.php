<?php 
	session_start();

	$url = 'localhost';
	$database = 'collectorsedition';
	$username = 'root';
	$password = '';

	$update = false;

	$conn = mysqli_connect($url, $username, $password, $database);

	$result = $conn->query("SELECT * FROM categories WHERE UserID=$_SESSION[UserID]") or die($conn->error());

	$label = '';

	$edit = false;

	if(!$conn){
		die($conn->connect_error);
	}

	if(isset($_POST['save-category'])){

		var_dump($_POST);
		$label = $_POST['category_name'];
		$label = addslashes($label);
		$category = $_POST['category_name'];
		$category = preg_replace('/\s+/', '', $category);
		$category = strtolower($category);
		$category = addslashes($category);

		$conn->query("INSERT INTO categories (Category, Label, UserID) VALUES('$category', '$label', '$_SESSION[UserID]')") or die($conn->error);

		header("location: category.php");
	}

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$conn->query("DELETE FROM categories WHERE CategoryID=$id") or die($conn->error());

		header("location: category.php");
	}

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update = true;
		$result = $conn->query("SELECT * FROM categories WHERE CategoryID=$id") or die($conn->error());
/*
		if ($result->num_rows){
        	$row = $result->fetch_array();
        	$label = $row['Label'];
        }
        */
	}

	if(isset($_POST['update'])){
		$id = $_POST['item-id'];
		$label = $_POST['edit_category'];
		$label = addslashes($label);
		$category = $_POST['edit_category'];
		$category = preg_replace('/\s+/', '', $category);
		$category = strtolower($category);
		$category = addslashes($category);
		$conn->query("UPDATE categories SET Category='$category', Label='$label' WHERE CategoryID=$id") or die($conn->error);

		header("location: category.php");
	}
?>