<?php require_once('inc/connection.php'); ?>
<?php session_start(); ?>
<?php require_once('inc/functions.php'); ?>
<?php
if(isset($_POST['Wremove'])){
	$billNo = $_POST["w_Rname"];
	$sql1 ="DELETE FROM `worker` WHERE `wname` = '$billNo';";
	$result= mysqli_query($connection,$sql1);
	echo "done";
		
}



?>