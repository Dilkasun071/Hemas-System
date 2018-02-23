<?php require_once('inc/connection.php'); ?>
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
	if(isset($_POST['searchdateB'])){
	$date = $_POST['searchdate'];
	$query = "SELECT * from `order` WHERE `cb_idate` = '$date';";
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result)){
		echo $row['cb_idate'];
	}
}
?>