<?php require_once('inc/connection.php'); ?>
<?php session_start(); ?>
<?php require_once('inc/functions.php'); ?>
<?php
if(isset($_POST['Irem'])){
	$billNo = $_POST["c_IRbill"];
	$n = $_POST["R_category"];
	//echo $n;
		if ($n == "1") {
			$sql1 ="DELETE FROM `poruwa` WHERE `name` = '$billNo';";$result= mysqli_query($connection,$sql1);echo "done1";
		}elseif ($n =="2") {
			$sql1 ="DELETE FROM `setty` WHERE `name` = '$billNo';";$result= mysqli_query($connection,$sql1);echo "done2";
		}elseif ($n == "3") {
			$sql1 ="DELETE FROM `pack` WHERE `name` = '$billNo';";$result= mysqli_query($connection,$sql1);echo "done3";
		}else{
			echo "error";
	//		$k = 0;
		}
}



?>