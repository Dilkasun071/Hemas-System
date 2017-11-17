<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
					 
	$billNo = $_POST['id91'];
	//$billNo = 1;
	//alert('Hello');
	$sql2 ="SELECT * FROM `orderitem` WHERE `c_bill` = '$billNo';";
	$result2 = mysqli_query($connection,$sql2);
	$out = array();
	if ($row = mysqli_fetch_array($result2)) {
		for($i = 0; $i < 13;$i++){
			array_push($out,$row[$i]);
		}
	}


	echo json_encode($out);
	/*for($i = 0; $i < 12;$i++){
		echo $out[$i];
	}*/

?>
				