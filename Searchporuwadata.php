<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/CalenderCode.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
					 
	$billNo = $_POST["id5"];
	$sql ="SELECT * FROM `orderitem` WHERE c_poruwa like '$billNo'";
	$result = mysqli_query($connection,$sql);


	$output =  "<table border=1>";
	$output .= "<tr>";
	$output .= "<th>Poruwa</th><th>Setty</th><th>Package</th><th>Table</th><th>K,kala</th>";
	$output .= "<th>K,bath</th><th>DryIce</th><th>Wine</th><th>Car</th><th>Description</th>";
	if ($row = mysqli_fetch_array($result)) {
		$output .= "<tr>";
		$output .= "<td>".$row['c_poruwa']."</td>";
		$output .= "<td>".$row['c_setty']."</td>";
		$output .= "<td>".$row['c_pack']."</td>";
		$output .= "<td>".$row['c_table']."</td>";
		$output .= "<td>".$row['c_kirikala']."</td>";
		$output .= "<td>".$row['c_kiribath']."</td>";
		$output .= "<td>".$row['c_dryice']."</td>";
		$output .= "<td>".$row['c_wine']."</td>";
		$output .= "<td>".$row['c_car']."</td>";
		$output .= "<td>".$row['c_desc']."</td>";
		$output .= "</tr>";
	}
	$output .= "</table>";
	echo $output;
?>
				