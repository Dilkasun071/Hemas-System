<?php require_once('inc/connection.php');?>
<?php require_once('inc/CalenderCode.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
					 
	$billNo = $_POST["id4"];
	$sql ="SELECT * FROM `order` WHERE `cb_hotel`='$billNo'";
	$result = mysqli_query($connection,$sql);


	$output =  "<table border=1 >";
	$output .= "<tr>";
	$output .= "<th>Bill</th><th>Date</th><th>Hotel</th><th>Order Date</th><th>Event</th>";
	
	if ($row = mysqli_fetch_array($result)) {
		$output .= "<tr>";
		$output .= "<td>".$row['cb_bill']."</td>";
		$output .= "<td>".$row['cb_idate']."</td>";
		$output .= "<td>".$row['cb_hotel']."</td>";
		$output .= "<td>".$row['cb_odate']."</td>";
		$output .= "<td>".$row['c_event']."</td>";
		//$output .= "<td>".$row['cg_photo']."</td>";
		$output .= "</tr>";
	}
	$output .= "</table>";
	echo $output;
?>
				