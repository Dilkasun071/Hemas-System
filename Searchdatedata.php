<?php require_once('inc/connection.php');?>
<?php require_once('inc/CalenderCode.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
	$billNo = $_POST["id1001"];
	$sql ="SELECT * FROM `order` WHERE cb_odate like '$billNo'";
	//$count1 = "SELECT COUNT(`cb_odate`) from `order` where `cb_odate` = '$billNo'";
	//$count = mysqli_query($connection,$count1);
	$result = mysqli_query($connection,$sql);
	for ($i=0; $i < 4; $i++) { 
		if ($row = mysqli_fetch_array($result)) {
				$n[$i]= $row['cb_bill'];	
		}
	}	
	for ($i=0; $i < 4; $i++) { 
		$sql2 ="SELECT * FROM `orderitem` WHERE `c_bill` = '$n[$i]'";
		$sql3 ="SELECT * FROM `order` WHERE `cb_bill` = '$n[$i]'";
		$sql4 ="SELECT * FROM `bill` WHERE `cl_bill` = '$n[$i]'";
		$sql5 ="SELECT * FROM `customer` WHERE `cg_bill` = '$n[$i]'";

		
		$result = mysqli_query($connection,$sql2);
		$result1 = mysqli_query($connection,$sql3);
		$result2 = mysqli_query($connection,$sql4);
		$result3 = mysqli_query($connection,$sql5);
		$output =  "<table border=1 class="."table table-condensed".">";
		$output .= "<tr>";
		$output .= "<th>Poruwa</th><th>Setty</th><th>Package</th><th>Table</th><th>K,kala</th>";
		$output .= "<th>K,bath</th><th>DryIce</th><th>Wine</th><th>Car</th><th>Description</th>";
		$output .= "<th>Hotel</th><th>Date</th><th>Event</th><th>Name</th><th>Address</th><th>Mobile</th><th>Home</th><th>Total</th><th>advance</th><th>Balance</th>";
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

		if ($row = mysqli_fetch_array($result1)) {
			$output .= "<td>".$row['cb_hotel']."</td>";
			$output .= "<td>".$row['cb_odate']."</td>";
			$output .= "<td>".$row['c_event']."</td>";	
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
	}
	?>
						