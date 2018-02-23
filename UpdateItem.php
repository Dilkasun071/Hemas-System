<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
	if(isset($_POST['addIUp'])){
		$a1 = $_POST['uc_category'];
		$a2 = $_POST['uc_partname'];
		$a3 = $_POST['UIShowValue']; 
			if ($a1 == "IPoruwa") {
				$sql1 = "UPDATE `poruwa` SET `value`= '1' WHERE `name` = '$a2' ";
			}elseif ($a1 == "ISetty") {
				$sql1 = "UPDATE `setty` SET `value`= '$a3' WHERE `name` = '$a2' ";	
			}elseif ($a1 == "IPack") {
				$sql1 = "UPDATE `pack` SET `value`= '$a3' WHERE `name` = '$a2' ";
			}else{
				echo "error";
			}
		$Updatec = mysqli_query($connection,$sql1);
		header('Location: user.php');
	}
?>