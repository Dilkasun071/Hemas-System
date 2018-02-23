<?php 
	require_once('inc/connection.php');
	//$k = 1;
		$d = $_POST["id1001"][0];
		//if(isset($_POST['IVBtn'])){
		$n = $_POST["id1001"][1];
		if ($n == "IPoruwa") {
			$sql1 = "SELECT name,value FROM `poruwa` WHERE `name` = '$d'";	
		}elseif ($n =="ISetty") {
			$sql1 = "SELECT name,value FROM `pack` WHERE `name` = '$d'";	
		}elseif ($n == "IPack") {
			$sql1 = "SELECT name,value FROM `setty` WHERE `name` = '$d'";
		}else{
			echo "error";
		}
		$result2 = mysqli_query($connection,$sql1);
		$out = array();
		if ($row = mysqli_fetch_array($result2)) {
			for($i = 0; $i < 3;$i++){
				array_push($out,$row[$i]);
			}
		}


		echo json_encode($out);

	?>