<?php 
	require_once('inc/connection.php');
	//$k = 1;
	$d = $_POST["id671"];
	$sql1 = "SELECT wname,wdate,wpm,wph,wmph,wfph FROM `worker` WHERE `wname` = '$d';";	
	$result = mysqli_query($connection,$sql1);
	$output = "<table border=1 class="."table table-condensed".">";
	$output .="<tr>";	
	$output .="<th>"."Name"."</th>";
	$output .="<th>"."Date"."</th>";
	$output .="<th>"."Phone"."</th>";
	$output .="<th>"."Home"."</th>";
	$output .="<th>"."Mother Phone"."</th>";
	$output .="<th>"."Father Phone"."</th>";
	
	$output .= "</tr>";

	//$i = 0;
		while($row = mysqli_fetch_assoc($result)){

			$output .= "<tr>";	
			$output .="<td>".$row['wname']."</td>";
			$output .="<td>".$row['wdate']."</td>";
			$output .="<td>".$row['wpm']."</td>";
			$output .="<td>".$row['wph']."</td>";
			$output .="<td>".$row['wmph']."</td>";
			$output .="<td>".$row['wfph']."</td>";
			//$m = $row['wname'];
			//$output .="<td>"."<Button id=d1 name =$m>"."Delete "."</Button>"."</td>";
			//$output .="<td>"."<Button id=u1 name =$m>"."Updates "."</Button>"."</td>";
			$output .="</tr>";
			
		}
		$output .="</table>";
		echo $output;	

?>

