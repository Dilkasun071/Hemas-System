<?php require_once('inc/connection.php'); ?>
<?php session_start(); ?>
<?php require_once('inc/functions.php'); ?>
<?php
if(isset($_POST['RIPnameB'])){
	$billNo = $_POST["RIPname"];
	$sql1 ="DELETE FROM `poruwa_parts` WHERE `name` = '$billNo';";
	$result= mysqli_query($connection,$sql1);
	echo "done";
		
}



?>