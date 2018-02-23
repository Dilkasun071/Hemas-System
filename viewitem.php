<?php 
	require_once('inc/connection.php');
	//$k = 1;
	$d = $_POST["id661"][0];
	//if(isset($_POST['IVBtn'])){
		$n = $_POST["id661"][1];
		if ($n == "1") {
			$sql1 = "SELECT name,value FROM `poruwa` WHERE `name` = '$d';";	
		}elseif ($n =="2") {
			$sql1 = "SELECT name,value FROM `pack` WHERE `name` = '$d';";	
		}elseif ($n == "3") {
			$sql1 = "SELECT name,value FROM `setty` WHERE `name` = '$d';";
		}else{
			echo "error";
	//		$k = 0;
		}	
	//}
	//if($k ==1){
		
	//$sql1 = "SELECT name,value FROM `poruwa` WHERE `name` = '$d';";
	$result = mysqli_query($connection,$sql1);
	$output = "<table border=1 class="."table table-condensed".">";
	$output .="<tr>";	
	$output .="<th>"."Name"."</th>";
	$output .="<th>"."Value"."</th>";
	$output .= "</tr>";

	//$i = 0;
		while($row = mysqli_fetch_assoc($result)){

			$output .= "<tr>";	
			$output .="<td>".$row['name']."</td>";
			$output .="<td>".$row['value']."</td>";
			$m = $row['name'];
			//$output .="<td>"."<Button id=d1 name =$m>"."Delete "."</Button>"."</td>";
			//$output .="<td>"."<Button id=u1 name =$m>"."Updates "."</Button>"."</td>";
			$output .="</tr>";
			
		}
		$output .="</table>";
		echo $output;	
	//}
	
	/*if ($_POST["dname1"]) {
		if ($n == 1) {
			$sql2 = "DELETE FROM `pack` WHERE `name` = '$d';";	
		}elseif ($n ==2) {
			$sql2 = "DELETE FROM `pack` WHERE `name` = 'F';";	
		}elseif ($n ==3) {
			$sql2 = "DELETE FROM `pack` WHERE `name` = '$d';";	
		}else{

		}
	}
	if ($_POST["uname1"]) {
		/*
		if ($n == 1) {
			$sql3 = "UPDATE name,value FROM `setty` WHERE `name` = '$d';";	
		}elseif ($n ==2) {
			$sql3 = "UPDATE name,value FROM `poruwa` WHERE `name` = 'F';";	
		}elseif ($n ==3) {
			$sql3 = "UPDATE name,value FROM `pack` WHERE `name` = '$d';";	
		}else{

		}
	
	}*/
	//$result = mysqli_query($connection,$sql2);	
?>
