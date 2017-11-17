

<?php

require_once('inc/connection.php'); 



if(isset($_POST['Finish'])){

	$cg_bill = $_POST['cg_bill'];
	$cg_name = $_POST['cg_name'];
	$cg_address = $_POST['cg_address'];
	$cg_mobile = $_POST['cg_mobile'];
	$cg_home = $_POST['cg_home'];
	$cg_photo = $_POST['cg_photo'];


	$cb_bill = $_POST['cb_bill'];
	$cb_idate = $_POST['cb_idate'];
	$c_event = $_POST['c_event'];
	$cb_hotel = $_POST['cb_hotel'];
	$cb_odate = $_POST['cb_odate'];

	$c_bill = $_POST['c_bill'];
	$c_poruwa = $_POST['poruwalist'];
	$c_setty = $_POST['settylist'];
	$c_pack = $_POST['packlist'];
	$c_table = $_POST['tablelist'];
	$c_kirikala = 0;
	if(isset($_POST['c_kirikala'])){
		$c_kirikala =1;
	}
	$c_kiribath = 0;
	if(isset($_POST['c_kiribath'])){
		$c_kiribath = 1;
	}
	$c_dryice = 0;
	if(isset($_POST['c_dryice'])){
		$c_dryice = 1;
	}
	$c_wine = 0;
	if(isset($_POST['c_wine'])){
		$c_wine = 1;
	}
	$c_car = 0;
	if(isset($_POST['c_car'])){
		$c_car = 1;
	}
	$c_desc = $_POST['c_desc'];
	$cl_bill = $_POST['cl_bill'];
	$cl_total = $_POST['cl_total'];
	$cl_advance = $_POST['cl_advance'];
	$cl_balance = $_POST['cl_balance'];
	$cus = "INSERT INTO `customer` (`cg_bill`, `cg_name`, `cg_address`, `cg_mobile`, `cg_home`) VALUES ('$cg_bill', '$cg_name','$cg_address', '$cg_mobile', '$cg_home')";
	$Ordercus = mysqli_query($connection,$cus);
	
	$bil = "INSERT INTO `order` (`cb_bill`,`cb_idate`, `cb_hotel`, `cb_odate`, `c_event`) VALUES ('$cb_bill', '$cb_idate', '$cb_hotel', '$cb_odate', '$c_event')";
	$Orderbil = mysqli_query($connection,$bil);

	//$bilitem = "INSERT INTO `orderitem` (`c_bill`, `c_poruwa`, `c_setty`, `c_pack`, `c_table`, `c_kirikala`, `c_kiribath`, `c_dryice`, `c_wine`, `c_car`,  `c_desc`) VALUES ('$c_bill', '$c_poruwa', '$c_setty', '$c_pack', '$c_table', '$c_kirikala', '$c_kiribath', '$c_dryice', '$c_wine', '$c_car', '$c_desc');";
	$bilitem = "INSERT INTO `orderitem` (`c_bill`, `c_poruwa`, `c_setty`, `c_pack`, `c_table`, `c_kirikala`, `c_kiribath`, `c_dryice`, `c_wine`, `c_car`, `c_desc`) VALUES ('$c_bill',
	'$c_poruwa','$c_setty', '$c_pack', '$c_table', '$c_kirikala', '$c_kiribath', '$c_dryice', '$c_wine', '$c_car', '$c_desc');";
	$Orderbilitem = mysqli_query($connection,$bilitem);

	$billl = "INSERT INTO `bill` (`cl_bill`, `cl_total`, `cl_advance`, `cl_balance`) VALUES ( '$cl_bill', '$cl_total', '$cl_advance', '$cl_balance');";
	$OrderQ = mysqli_query($connection,$billl);
	/*if($Ordercus){
		echo "customer<br>";
	}else{
		echo "unable customer<br>";
	}
	if($Orderbil){
		echo "order<br>";
	}else{
		echo "unable order<br>";
	}
	if($Orderbilitem){
		echo "order item<br>";
	}else{
		echo "unable order item<br>";
	}
	if($OrderQ){
		echo "bill<br>";
	}else{
		echo "unable bill<br>";
	}*/
} 
$file_name = $_FILES['cg_photo']['name'];
$file_type = $_FILES['cg_photo']['type'];
$file_size = $_FILES['cg_photo']['size'];
$tmp_name = $_FILES['cg_photo']['tmp_name'];

$upload_to = 'img_cus/';
move_uploaded_file($tmp_name,$upload_to.$file_name);

$cus_id = $_POST['cg_cusid'];
$img = $_FILES['cg_photo'];
$qry = "INSERT INTO images(cus_id,img) VALUES('$cus_id','$img')";
$result = mysqli_query($connection,$qry);
if ($result) {
	echo "done";
}else{
  	echo "not done";
}

$file_name1 = $_FILES['c_color']['name'];
$file_type1 = $_FILES['c_color']['type'];
$file_size1 = $_FILES['c_color']['size'];
$tmp_name1 = $_FILES['c_color']['tmp_name'];

$upload_to1 = 'img_color/';
move_uploaded_file($tmp_name1,$upload_to1.$file_name1);

$cus_id1 = $_POST['c_color_id'];
$img1 = $_FILES['c_color'];
$qry1 = "INSERT INTO images2(img_id,photo) VALUES('$cus_id1','$img1')";
$result1 = mysqli_query($connection,$qry1);
if ($result1) {
	echo "done";
}else{
  	echo "not done";
}
header('Location: user.php');

?>
