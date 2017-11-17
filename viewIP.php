<?php require_once('inc/connection.php'); ?>
<?php
	$billNo = $_POST["id97"];
	$sql ="SELECT * FROM `poruwa_parts` WHERE `name` = '$billNo'";
	$result = mysqli_query($connection,$sql);
	$output =  "<table border=1 >";
	$output .= "<tr>";
	$output .= "<th>Poruwa</th><th>Roof</th><th>Column</th><th>Flower</th><th>Side</th>";
	$output .= "<th>Kalas</th><th>Base</th><th>Stair</th><th>Stair Main</th><th>Sadhakada</th><th>Cuirton</th>";
	if ($row = mysqli_fetch_array($result)){
		$output .= "<tr>";
		$output .= "<td>".$row['name']."</td>";
		$output .= "<td>".$row['poruwa_roof']."</td>";
		$output .= "<td>".$row['poruwa_column']."</td>";
		$output .= "<td>".$row['poruwa_flower']."</td>";
		$output .= "<td>".$row['poruwa_side']."</td>";
		$output .= "<td>".$row['poruwa_kalas']."</td>";
		$output .= "<td>".$row['poruwa_base']."</td>";
		$output .= "<td>".$row['poruwa_stair2']."</td>";
		$output .= "<td>".$row['poruwa_mstair']."</td>";
		$output .= "<td>".$row['poruwa_sadakada']."</td>";
		$output .= "<td>".$row['poruwa_curton']."</td>";
		$output .= "</tr>";
	}
	$output .= "</table>";
	echo $output;
?>
				