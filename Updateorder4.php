<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
					 
	$billNo = $_POST['id95'];
	alert('Hello');
	$sql2 ="SELECT * FROM `worker` WHERE `wname` = '$billNo';";//"SELECT * FROM `worker` WHERE `wname` = '$billNo'";
	$result2 = mysqli_query($connection,$sql2);
	$out = array();
	if ($row = mysqli_fetch_array($result2)) {
		for($i = 0; $i < 12;$i++){
			array_push($out,$row[$i]);
		}
	}


	echo json_encode($out);

?>
				