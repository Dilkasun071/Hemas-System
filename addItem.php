<?php 
	require_once('inc/connection.php');
	if(isset($_POST['itemadd'])){
		$n = $_POST['c_category'];
		$partname = $_POST['c_partname'];
		$partvalue = $_POST['c_partno'];
		echo $n."<br>";
		if($n == "IPoruwa"){
			$sql ="INSERT INTO `poruwa` (`name`,`value`) VALUES ('$partname', '$partvalue');";
			$result = mysqli_query($connection,$sql);
		}	
		if($n == "ISetty") {
			$sql1 ="INSERT INTO `setty` (`name`,`value`) VALUES ('$partname', '$partvalue');";
			$result1 = mysqli_query($connection,$sql1);
		}
		if($n == "IPack") {
			$sql2 ="INSERT INTO `pack` (`name`,`value`) VALUES ('$partname', '$partvalue');";
			$result2 = mysqli_query($connection,$sql2);			
		}
		if($result) {
			echo "Added Poruwa Item";
		}
		elseif($result1){
			echo "Added Setty Item";
		}
		elseif ($result2) {
			echo "Added Package Item";
		}
		else{
			echo "Not Done";
		}
	}
?>