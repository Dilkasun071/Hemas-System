<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
					 
	$billNo = $_POST["id1"];
	$sql ="SELECT * FROM `orderitem` WHERE `c_bill` = '$billNo';";
	$sql1 ="SELECT * FROM `order` WHERE `cb_bill` = '$billNo';";
	$sql2 ="SELECT * FROM `bill` WHERE `cl_bill` = '$billNo';";
	$sql3 ="SELECT * FROM `customer` WHERE `cg_bill` = '$billNo';";
	$result = mysqli_query($connection,$sql);
	$result1 = mysqli_query($connection,$sql1);
	$result2 = mysqli_query($connection,$sql2);
	$result3 = mysqli_query($connection,$sql3);
	$output =  "<table border=1 class="."table table-condensed".">";
	$output .= "<tr>";
	$output .= "<th>Poruwa</th><th>Setty</th><th>Package</th><th>Table</th><th>K,kala</th>";
	$output .= "<th>K,bath</th><th>DryIce</th><th>Wine</th><th>Car</th><th>Description</th>";
	$output .= "<th>Hotel</th><th>E.Date</th><th>Event</th><th>Name</th><th>Address</th><th>Mobile</th><th>Home</th><th>Total</th><th>advance</th><th>Balance</th>";
	$output .= "<tr>";
	if ($row = mysqli_fetch_array($result)) {
		
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
	}
	if ($row1 = mysqli_fetch_array($result1)) {
		$output .= "<td>".$row1['cb_hotel']."</td>";
		$output .= "<td>".$row1['cb_odate']."</td>";
		$output .= "<td>".$row1['c_event']."</td>";	
	}
	if ($row = mysqli_fetch_array($result3)) {
		$output .= "<td>".$row['cg_name']."</td>";
		$output .= "<td>".$row['cg_address']."</td>";
		$output .= "<td>".$row['cg_mobile']."</td>";
		$output .= "<td>".$row['cg_home']."</td>";	
	}
	if ($row = mysqli_fetch_array($result2)) {
		$output .= "<td>".$row['cl_total']."</td>";
		$output .= "<td>".$row['cl_advance']."</td>";
		$output .= "<td>".$row['cl_balance']."</td>";	
	}
	$output .= "</tr>";
	$output .= "</table>";
	echo $output;
		
?>
				