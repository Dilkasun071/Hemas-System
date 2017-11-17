<?php

require_once('inc/connection.php'); 


if(isset($_POST['addIPbtn'])){

	$ipname = $_POST['ipname'];
	$iproof = 0;
	if(isset($_POST['iproof'])){
		$iproof =1;
	}
	$icolumn = 0;
	if(isset($_POST['icolumn'])){
		$icolumn = 1;
	}
	$iflower = 0;
	if(isset($_POST['iflower'])){
		$iflower = 1;
	}
	$iside = 0;
	if(isset($_POST['iside'])){
		$iside = 1;
	}
	$ikalas = 0;
	if(isset($_POST['ikalas'])){
		$ikalas = 1;
	}
	$ibase = 0;
	if(isset($_POST['ibase'])){
		$ibase =1;
	}
	$istair2 = 0;
	if(isset($_POST['istair2'])){
		$istair2 = 1;
	}
	$istairm = 0;
	if(isset($_POST['istairm'])){
		$istairm = 1;
	}
	$isadakada = 0;
	if(isset($_POST['isadakada'])){
		$isadakada = 1;
	}
	$icuirton = 0;
	if(isset($_POST['icuirton'])){
		$icuirton = 1;
	}
	
	$billl = "INSERT INTO `poruwa_parts` (`name`, `poruwa_roof`, `poruwa_column`, `poruwa_flower`, `poruwa_side`, `poruwa_kalas`, `poruwa_base`, `poruwa_stair2`, `poruwa_mstair`, `poruwa_sadakada`, `poruwa_curton`) VALUES ('$ipname', '$iproof', '$icolumn', '$iflower', '$iside', '$ikalas', '$ibase', '$istair2', '$istairm', '$isadakada', '$icuirton');";
	$OrderQ = mysqli_query($connection,$billl);
	if ($OrderQ) {
		echo "done";
	}else{
		echo "not done";
	}


} 


?>
