<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

	$user_list = '';

	// getting the list of users
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
	$users = mysqli_query($connection, $query);

	verify_query($users);
 ?>