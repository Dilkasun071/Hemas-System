<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
	if(isset($_POST['uwadd'])){

	$uw_date = $_POST['uw_date'];
	$uw_name = $_POST['uw_name'];
	$uw_address = $_POST['uw_address'];
	$uw_mphone = $_POST['uw_mphone'];
	$uw_idnum = $_POST['uw_idnum'];

	$uw_hphone = $_POST['uw_hphone'];
	$uw_photo = $_POST['uw_photo'];
	$uw_mname = $_POST['uw_mname'];
	$uw_mno = $_POST['uw_mno'];
	$uw_fname = $_POST['uw_fname'];
	$uw_fno = $_POST['uw_fno'];
	
	$c = "UPDATE `worker` SET `wdate`='$uw_date',`wadd`='$uw_address',`wpm`='$uw_mphone',`wid`='$uw_idnum',`wph`='$uw_hphone',`wphto`='1',`wmname`='$uw_mname',`wmph`='$uw_mno',`wfname`='$uw_fname',`wfph`='$uw_fno' WHERE `wname`='$uw_name';";

	$Updatec = mysqli_query($connection,$c);
	
	if($Updatec){
		echo "DONE! ";
	}else{
		echo "Not Done!";
	}


}
?>