<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
	if(isset($_POST['UFinish'])){
		$ucg_bill = $_POST['ucg_bill'];
		$ucg_name = $_POST['ucg_name'];
		$ucg_address = $_POST['ucg_address'];
		$ucg_mobile = $_POST['ucg_mobile'];
		$ucg_home = $_POST['ucg_home'];
		$ucg_photo = $_POST['ucg_photo'];


	$ucb_bill = $_POST['ucb_bill'];
	$ucb_idate = $_POST['ucb_idate'];
	$uc_event = $_POST['uc_event'];
	$ucb_hotel = $_POST['ucb_hotel'];
	$ucb_odate = $_POST['ucb_odate'];

	$uc_bill = $_POST['uc_bill'];
	$uc_poruwa = $_POST['uporuwalist'];
	$uc_setty = $_POST['usettylist'];
	$uc_pack = $_POST['upacklist'];
	$uc_table = $_POST['utablelist'];
	$uc_kirikala = 0;
	if(isset($_POST['uc_kirikala'])){
		$uc_kirikala =1;
	}
	$uc_kiribath = 0;
	if(isset($_POST['uc_kiribath'])){
		$uc_kiribath = 1;
	}
	$uc_dryice = 0;
	if(isset($_POST['uc_dryice'])){
		$uc_dryice = 1;
	}
	$uc_wine = 0;
	if(isset($_POST['uc_wine'])){
		$uc_wine = 1;
	}
	$uc_car = 0;
	if(isset($_POST['uc_car'])){
		$uc_car = 1;
	}
	$uc_color = $_POST['uc_color'];
	$uc_desc = $_POST['uc_desc'];

	$ucl_bill = $_POST['ucl_bill'];
	$ucl_total = $_POST['ucl_total'];
	$ucl_advance = $_POST['ucl_advance'];
	$ucl_balance = $_POST['ucl_balance'];

	
	$c = "UPDATE `customer` SET `cg_name`='$ucg_name',`cg_address`='$ucg_address',`cg_mobile`='$ucg_mobile',`cg_home`='$ucg_home' WHERE `cg_bill`='$ucg_bill';";
	$b = "UPDATE `bill` SET `cl_total`='$ucl_total',`cl_advance`='$ucl_advance',`cl_balance`='$ucl_balance' WHERE `cl_bill`='$ucl_bill';";

	$o = "UPDATE `order` SET `cb_idate`='$ucb_idate',`cb_hotel`='$ucb_hotel',`cb_odate`='$ucb_odate',`c_event`='$c_event' WHERE `cb_bill`='$ucb_bill';";
	
	$or = "UPDATE `orderitem` SET `c_poruwa`='$uc_poruwa',`c_setty`='$uc_setty',`c_pack`='$uc_pack',`c_table`='$uc_table',`c_kirikala`='$uc_kirikala',`c_kiribath`='$uc_kiribath',`c_dryice`='$uc_dryice',`c_wine`='$uc_wine',`c_car`='$uc_car',`c_desc`='$uc_desc' WHERE `c_bill`='$uc_bill';";
	$Updatec = mysqli_query($connection,$c);
	$Updateb = mysqli_query($connection,$b);
	$Updateo = mysqli_query($connection,$o);
	$Updateor = mysqli_query($connection,$or);
/*	
	if($Updatec){
		echo "DONE! c";
	}else{
		echo "Not Done! c";
	}
	if($Updateb){
		echo "DONE! b";
	}else{
		echo "Not Done! b";
	}
	if($Updateo){
		echo "DONE! o";
	}else{
		echo "Not Done! o";
	}
	if($Updateor){
		echo "DONE! or";
	}else{
		echo "Not Done! or";
	}*/
	header('Location: user.php');


}
?>