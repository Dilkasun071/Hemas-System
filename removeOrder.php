<?php require_once('inc/connection.php'); ?>
<?php session_start(); ?>
<?php require_once('inc/functions.php'); ?>
<?php
if(isset($_POST['rem'])){
	$billNo = $_POST["c_Rbill"];
	$sql ="DELETE FROM `customer` WHERE `cg_bill` = $billNo;";
	$sql1 ="DELETE FROM `orderitem` WHERE `c_bill` = $billNo;";
	$sql2 ="DELETE FROM `order` WHERE `cb_bill` = $billNo;";
	$sql3 ="DELETE FROM `bill` WHERE `cl_bill` = $billNo;";
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	$result2 = mysqli_query($connection,$sql2);
	$result3 = mysqli_query($connection,$sql3);

	if ($result) {
		echo "done";
	}else{
		echo "not done customer";
	}

	if ($result1) {
		echo "done";
	}
	else{
		echo "not done orderitem";	
	}
	if ($result2) {
		echo "done";
	}
	else{
		echo "not done order";	
	}
	if ($result3) {
		echo "done";
	}
	else{
		echo "not done bill";	
	}
	}



?>