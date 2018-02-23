<?php
	require_once('inc/connection.php');
	if (isset($_POST['wadd'])) {
		
		$wdate = $_POST['w_date'];
		$wname = $_POST['w_name'];
		$waddress = $_POST['w_address'];
		$wmphone = $_POST['w_mphone'];
		$widnum = $_POST['w_idnum'];
		$whphone = $_POST['w_hphone'];
		$wphoto = $_POST['w_photo'];
		$wmname = $_POST['w_mname'];
		$wmno = $_POST['w_mno'];
		$wfname = $_POST['w_fname'];
		$wfno = $_POST['w_fno'];


	//move_uploaded_file ($_FILES['cg_photo'] ['tmp_name'],"img_cus/{$_FILES['cg_photo'] ['name']}");
	
	//$work = "INSERT INTO `worker` (`wdate`, `wname`, `wadd`, `wpm`, `wid`, `wph`, `wphto`, `wmname`, `wmph`, `wfname`, `wfph`) VALUES ('2011-11-01', '13', '13', '13', '13', '13', '13', '13', '13', '13', '13');";
	$work = "INSERT INTO `worker` (`wdate`, `wname`, `wadd`, `wpm`, `wid`, `wph`, `wphto`, `wmname`, `wmph`, `wfname`, `wfph`) VALUES ('$wdate', '$wname', '$waddress', '$wmphone', '$widnum', '$whphone', '1', '$wmname', '$wmno', '$wfname', '$wfno');";
	$workadd = mysqli_query($connection,$work);

	if($workadd){
		echo "Work Add<br>";
	}else{
		echo "unable Add<br>";
	}
	header('Location: user.php');
} 
		
?>