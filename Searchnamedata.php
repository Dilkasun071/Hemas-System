<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/CalenderCode.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
					 
	$billNo = $_POST["id2"];
	$sql ="SELECT * FROM `customer` WHERE `cg_name` like '$billNo'";
	$result = mysqli_query($connection,$sql);


	$output =  "<table border=1 >";
	$output .= "<tr>";
	$output .= "<th>Bill</th><th>Name</th><th>Address</th><th>Mobile</th><th>Home</th><th>Photo</th>";
	
	if ($row = mysqli_fetch_array($result)) {
		$output .= "<tr>";
		$output .= "<td>".$row['cg_bill']."</td>";
		$output .= "<td>".$row['cg_name']."</td>";
		$output .= "<td>".$row['cg_address']."</td>";
		$output .= "<td>".$row['cg_mobile']."</td>";
		$output .= "<td>".$row['cg_home']."</td>";
		$output .= "<td>".$row['cg_photo']."</td>";
		$output .= "</tr>";
	}
	$output .= "</table>";
	echo $output;
?>
				