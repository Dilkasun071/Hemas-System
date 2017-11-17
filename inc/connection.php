<?php 
	//dilkasun071

	//Edit this----------
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'Ale96Ale';
	$dbname = 'hemasdb'; 
	
	$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	}

?>