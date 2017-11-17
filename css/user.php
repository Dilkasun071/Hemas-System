<?php require_once('inc/connection.php'); ?>
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

	$user_list = '';

	// getting the list of users
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
	$users = mysqli_query($connection, $query);

	verify_query($users);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cstyle%3E%0A%09%09.container%20%7B%0A%09%09%09font-family%3A%20'Noto%20Sans'%2C%20sans-serif%3B%0A%09%09%09margin-top%3A%2080px%3B%0A%09%09%7D%0A%09%09th%20%7B%0A%09%09%09height%3A%2030px%3B%0A%09%09%09text-align%3A%20center%3B%0A%09%09%09font-weight%3A%20700%3B%0A%09%09%7D%0A%09%09td%20%7B%0A%09%09%09height%3A%20100px%3B%0A%09%09%7D%0A%09%09.today%20%7B%0A%09%09%09background%3A%20orange%3B%0A%09%09%7D%0A%09%09th%3Anth-of-type(7)%2Ctd%3Anth-of-type(7)%20%7B%0A%09%09%09color%3A%20blue%3B%0A%09%09%7D%0A%09%09th%3Anth-of-type(1)%2Ctd%3Anth-of-type(1)%20%7B%0A%09%09%09color%3A%20red%3B%0A%09%09%7D%0A%09%3C%2Fstyle%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="&lt;style&gt;" title="&lt;style&gt;" />

	<script type="text/JavaScript" src="js/jquery.js"></script>
    <script type="text/JavaScript" src="js/jsUser.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/mainWebcam.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    

</head>
     

<body style="background-color: #cccccc;">
    <div class="container" style="max-width: 100%;margin: 0px auto 0px auto;position: relative;">
	  <div class="row">
  			<div class="col-3 col-md-3 ">
  			<!-- Start button Panel-->
  			<link rel="stylesheet" type="text/css" href="naviside.css">
  			<ul id="menu" style="background-color: #cccccc;">
			<li>
				<a href="#"><h3>Order</h3></a>
				<ul>
					<li id="bOA">
						<a href="#">Add</a>
					</li>
					<li id="bOV">
						<a href="#">View</a>
					</li>
					<li id="bOU">
						<a href="#">Updates</a>
					</li>
					<li id="bOR">
						<a href="#">Remove</a>
					</li>
				</ul>
				
			<li>
			<li>
				<a href="#"><h3>Item</h3></a>
				<ul>
					<li id="bIA">
						<a href="#">Add</a>
					</li>
					<li id="bIV">
						<a href="#">View</a>
					</li>
					<li id="bIU">
						<a href="#">Updates</a>
					</li>
					<li id="bIR">
						<a href="#">Remove</a>
					</li>
				</ul>
			<li>
			<li>
				<a href="#"><h3>Worker</h3></a>
				<ul>
					<li id="bWA">
						<a href="#">Add</a>
					</li>
					<li id="bWV">
						<a href="#">View</a>
					</li>
					<li id="bWU">
						<a href="#">Updates</a>
					</li>
					<li id="bWR">
						<a href="#">Remove</a>
					</li>
				</ul>
			<li>
			<li>
				<a href="#"><h3>Item Parts</h3></a>
				<ul>
					<li id="bIPA">
						<a href="#">Add</a>
					</li>
					<li id="bIPV">
						<a href="#">View</a>
					</li>
					<li id="bIPU">
						<a href="#">Updates</a>
					</li>
					<li id="bIPR">
						<a href="#">Remove</a>
					</li>
				</ul>
			<li>
		</ul>
  				<!--div class="btn-group-vertical btn-group-lg" role="group" aria-label="Button group with nested dropdown" style="width: 100%;background-color: #BEBEBE;">
				<button type="button" class="btn info" id="click" >Today Work</button>
				<button type="button" class="btn info" >Hemas Home</button>
				<div class="btn-group btn-group-lg"  role="group">
					<button id="btnGroupDrop1"   class="btn btn-secondary dropdown-toggle" style="background-color: #0000ff;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order</button>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					    <a class="dropdown-item" href="#" id="bOA">Add</a>
					    <a class="dropdown-item" href="#" id="bOV">View</a>
					    <a class="dropdown-menupdown-item" href="#" id="bOU">Update</a>
					    <a class="dropdown-item" href="#" id="bOR">Remove</a>
					</div>
				</div>
				<div class="btn-group btn-group-lg" role="group">
					<button id="btnGroupDrop1"   class="btn btn-secondary dropdown-toggle" style="background-color: #0040ff;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Item</button>
				    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
			            <a class="dropdown-item" href="#" id="bIA">Add</a>
					    <a class="dropdown-item" href="#" id="bIV">View</a>
					    <a class="dropdown-item" href="#" id="bIU">Update</a>
					    <a class="dropdown-item" href="#" id="bIR">Remove</a>
					</div>
				</div>
				<div class="btn-group btn-group-lg" role="group">
					<button id="btnGroupDrop1" class="btn btn-secondary dropdown-toggle" style="background-color: #0080ff;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Workers</button>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					    <a class="dropdown-item" href="#" id="bWA">Add</a>
					    <a class="dropdown-item" href="#" id="bWV">View</a>
					    <a class="dropdown-item" href="#" id="bWU">Update</a>
					    <a class="dropdown-item" href="#" id="bWR">Remove</a>
					</div>
				</div>
				<div class="btn-group btn-group-lg" role="group">
					<button id="btnGroupDrop1"class="btn btn-secondary dropdown-toggle" style="background-color: #00bfff;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Item Part</button>
					<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					    <a class="dropdown-item" href="#" id="bIPA">Add</a>
					    <a class="dropdown-item" href="#" id="bIPV">View</a>
					    <a class="dropdown-item" href="#" id="bIPU">Update</a>
					    <a class="dropdown-item" href="#" id="bIPR">Remove</a>
					</div>
				</div>
				</div-->
			</div>
			<!-- End button Panel-->
			<div class="col-6 col-md-6">
				<div id="OA" style="display: none"  class="row align-items-center">
	  				<form action="Order.php" method="post" enctype="multipart/form-data">
						<div  style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA1" >
							<legend>General Details</legend>
							Bill No:<br/>
							<input type="text" name="cg_bill" id="cg_bill" class="form-control" placeholder="Bill Number"><br/>
							Customer Name:<br/>
							<input type="text" name="cg_name" id="cg_name" class="form-control" placeholder="Customer Name"><br/>
							Customer Address:<br/>
							<input type="text" name="cg_address" id="cg_address" class="form-control" placeholder="Customer Address"><br/>
							Customer Mobile Number:<br/>
							<input type="text" name="cg_mobile" class="form-control" placeholder="Mobile Number"></br>
							Customer Home Number:<br/>
							<input type="text" name="cg_home" class="form-control" placeholder="Home Number"></br>
							Customer photo id:<br>
							<input type="text" name="cg_cusid" id="cg_cusid" class="form-control" placeholder="Bill Number">
							Customer Photo
							<input type="file" name="cg_photo" id="cg_photo" class="form-control" >
							<input type="button" name="bOA1" id="bOA1" value="Next" class="form-control">
							<script type="text/javascript">
								$(document).ready(function(){
									$("#bOA1").click(function () {
										var bill = $('#cg_bill').val();
										$("#cb_bill").val(bill);
										$("#c_bill").val(bill);
									    $("#cl_bill").val(bill);
									    $("#cg_cusid").val(bill);
									    $("#c_color_id").val(bill);
									});
								});
							</script>		
						</div>
						<div style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA2">
							<legend>Basic Order Details</legend>
							<!--Bill No:--><br/>
							<input type="hidden" name="cb_bill" id="cb_bill" class="form-control"><br/>
							Today Date:<br/>
							<input type="date" name="cb_idate" class="form-control"><br/>
							Event:
							<select name="c_event" class="form-control" id="c_event"></br>
								<option value="Wedding" selected>Wedding</option>
								<option value="HomeComing" >HomeComing</option>
								<option value="Engagement" >Engagement</option>
								<option value="Other" >Other</option>
							</select></br>
							Location name:<br/>
							<input type="text" name="cb_hotel" class="form-control"><br/>
							Order Date:<br>
							<input type="date" name="cb_odate" class="form-control">
							<input type="button" name="brOA2" id="brOA2" value="Back" class="form-control">
							<input type="button" name="bOA2" id="bOA2" value="Next" class="form-control">
						</div>
						<div style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA3" >
							<legend>Order Items Details</legend>
							<input type="button" name="pack" value = "Package" id="pack" class="form-control">
							<input type="button" name="nonpack" value = "Non-Package" id="nonpack" class="form-control"><br/>
							<!--Bill No:--><br/>
							<input type="hidden" name="c_bill" id="c_bill" class="form-control" ><br/>
							<div id="pack1" style="display: none;">
								Package:</br>
								<?php 
									$result = $connection->query("select * from pack");
							    ?>
							    <select name='packlist' id="packlist">
							    <?php
								    while ($row = $result->fetch_assoc()) {
		        						unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
							</div>
							<div id="pack2" style="display: none;">
								Poruwa:
								<?php 
									$result = $connection->query("select * from poruwa");
							    ?>
							    <select name='poruwalist' id="poruwalist">
							    <?php
								    while ($row = $result->fetch_assoc()) {
	    								unset($value,$id,$name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
								Setty:
								<?php 
									$result = $connection->query("select * from setty");
							    ?>
							    <select name='settylist' id="settylist">
							    <?php
								    while ($row = $result->fetch_assoc()) {
	  									unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";   
								?>
								Table:
								<?php 
									$result = $connection->query("select * from tables");
								?>
								<select name='tablelist' id="tablelist">
								<?php
								    while ($row = $result->fetch_assoc()) {
	                	                unset($value,$id, $name);
								        $value = $row['value'];
								        $id = $row['id'];
								        $name = $row['name']; 
								        echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
								    echo "</select>";    
								?>
								<br><br>
								<input type="checkbox" name="c_kirikala" value = "Kirikala">Kirikala
								<input type="checkbox" name="c_kiribath" value="Kiribath">Kiribath
								<input type="checkbox" name="c_dryice" value="Dryice">Dry Ice
								<input type="checkbox" name="c_wine"  value="Wine">Wine
								<input type="checkbox" name="c_car" value="Car">Car
							</div>	
								Bridemade Color:<br>
								<input type="hidden" name="c_color_id" id="c_color_id" class="form-control">
								<input type="file" name="c_color" class="form-control"></br>
								Description<br>
								<input type="text" size="50" maxlength="25" name="c_desc" class="form-control" /></br>
								<input type="button" name="brOA3" id="brOA3" value="Back" class="form-control">
								<input type="button" name="bOA3" id="bOA3" value="Next" class="form-control">
						</div>
						<div style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA4">
							<legend>Billing Details</legend>
							<!--Bill No:--><br/>
							<input type="hidden" name="cl_bill" class="form-control" id="cl_bill"><br/>
							<script type="text/javascript">
								$(document).ready(function(){
									$("#bOA3").click(function () {
										var p1 = $('#packlist').val();
										var p2 = $('#poruwalist').val();
										var p3 = $('#settylist').val();
										var p4 = $('#tablelist').val();
										var t = parseInt(p1)+parseInt(p2)+parseInt(p3)+parseInt(p4);
										$("#cl_total").val(t);
									});
								});
							</script>
							Total Price:</br>
							<input type="text" name="cl_total" id="cl_total"  class="form-control"><br>
							Advance Price:</br>
							<input type="text" name="cl_advance" class="form-control"></br>
							
							Balance Price:</br>
							<input type="text" name="cl_balance" class="form-control"></br></br>
							<input type="button" name="brOA4" id="brOA4" value="Back" class="form-control">
							<input type="Submit" value="Finish" name="Finish" id="bOA4" class="form-control">
							<?php
								
								?>
							
						</div>
					</form>
				</div>
				<!-- Order View  Start-->
				<div id="OV" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">
					<div style="padding: 20px 20px 20px 20px;">
						<h3>Order View</h3>
						<label>Selected by Date</label><input type="radio" name="radio0" value="" id="D" class="form-control"></br>
						<input type="radio" name="radio0" value="" id="B" class="form-control">Selected by Bill</br>
						<!--input type="radio" name="radio0" value="" id="N">Selected by Name</br>
						<input type="radio" name="radio0" value="" id="H">Selected by Hotel</br>
						<input type="radio" name="radio0" value="" id="P">Selected by Poruwa</br>
						<input type="radio" name="radio0" value="" id="S">Selected by SettyBack</br>
						<input type="radio" name="radio0" value="" id="DR">Selected by Date Range</br -->
						</br>
					</div>
					<div id="D1" style="display: none;"><h2>Selected By Date</h2><br>
						<label>Select Date Number</label>
					
		      				<input type="date" name="searchdate" id="searchdate" class="form-control">
		      				<input type="button" value="search" name="searchdateno" id="searchdateno" class="form-control"><br>
		   			
	      				<div id="searchdatediv" style="overflow-x: scroll;"></div>
			      	</div>
			      	<div id="B1" style="display: none;"><h2>Selected By Bill</h2>
						<label>Select Bill Number</label>
					
			      			<input type="text" name="searchbill" id="searchbill" class="form-control">
			      			<input type="button" value="search" name="searchbillno" id="searchbillno" class="form-control"><br>		
			      	
		      			<div id="searchbilldiv" style="overflow-x: scroll;"></div>
		      		</div>
		      		<div id="N1" style="display: none;"><h2>Selected By Name</h2>
				   	
			      			<input type="text" name="searchname" id="searchname" class="form-control">
			      			<input type="button" value="search" name="searchnameno" id="searchnameno" class="form-control"><br>
			      	
		      			<div id="searchnamediv" style="overflow-x: scroll;"></div>
		      		</div>
		      		<div id="H1" style="display: none;"><h2>Selected By Hotel</h2>
						<label>Select Hotel Name</label>
					
			      			<input type="text" name="searchhotel" id="searchhotel" class="form-control">
			      			<input type="button" value="search" name="searchhotelno" id="searchhotelno" class="form-control"><br>
			     	
			     		<div id="searchhoteldiv" style="overflow-x: scroll;"></div>
		      		</div>
			      	<div id="P1" style="display: none;"><h2>Selected By Poruwa</h2>
						<label>Select Poruwa</label>
					
			   			<input type="text" name="searchporuwa" id="searchporuwa" class="form-control">
			   			<input type="button" value="search" name="searchporuwano" id="searchporuwano" class="form-control"><br>
					
			      		<div id="searchporuwadiv" style="overflow-x: scroll;"></div>
					</div>
			      	<div id="S1" style="display: none;"><h2>Selected By Setty Back</h2>
						<label>Select Setty Back</label>
			      	
			      			<input type="text" name="searchsetty" id="searchsetty" class="form-control">
			      			<input type="button" value="search" name="searchsettyno" id="searchsettyno" class="form-control"><br>
			       	
			       		<div id="searchsettydiv" style="overflow-x: scroll;"></div>
			      	</div>
			      	<div id="DR1" style="display: none;"><h2>Selected By Data Range</h2><br>
						<input type="date" name="c_from" class="form-control">  
	    				<input type="date" name="c_to" class="form-control">
	    			</div><br/><br/>
	   			</div>	
	   			<!-- Order Update -->
			    <div id="OU" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">
			    	<h3>Order Updates</h3>
			     	<form action="update.php" method="POST" >
						<label>Update Bill Number</label>
						<input type="text" name="Updatetxt"  id="Updatetxt" class="form-control">
						<input type="button" name="Updatebtn" value="Update" id="Updatebtn" class="form-control"><br>
					    <div  style="display: none; background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA11" >
						 	<legend>General Details</legend>
							Bill No:<br/>
							<input type="text" name="ucg_bill" id="ucg_bill" class="form-control"><br/>
							Customer Name:<br/>
							<input type="text" name="ucg_name" id="ucg_name" class="form-control"><br/>
							Customer Address:<br/>
							<input type="text" name="ucg_address" id="ucg_address" class="form-control"><br/>
							Customer Mobile Number:  <br/>
							<input type="text" name="ucg_mobile" id="ucg_mobile" class="form-control"></br>
							Customer Home Number:  <br/>
							<input type="text" name="ucg_home" id="ucg_home" class="form-control"></br>
							Customer photo id:<br>
							<input type="text" name="ucg_cusid" id="ucg_cusid" class="form-control">
							Customer Photo
							<input type="file" name="ucg_photo" id="ucg_photo">
							<input type="button" name="bOA11" id="bOA11" value="Next" class="form-control">
							<script type="text/javascript">
								$(document).ready(function(){
									$("#bOA1").click(function () {
										var bill = $('#cg_bill').val();
										$("#cb_bill").val(bill);
										$("#c_bill").val(bill);
										$("#cl_bill").val(bill);
									});

								});


							</script>		
						</div>
						<div style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA22">
							<legend>Basic Order Details</legend>
							Bill No:<br/>
							<input type="text" name="ucb_bill" id="ucb_bill" class="form-control"><br/>
							Date:<br/>
							<input type="date" name="ucb_idate" id="ucb_idate" class="form-control"><br/>
							Event:
							<select name="uc_event" class="form-control" id="uc_event"></br>
								<option value="W" selected>Wedding</option>
								<option value="H" >HomeComing</option>
								<option value="E" >Engagement</option>
								<option value="O" >Other</option>
							</select></br>
							Location name:<br/>
							<input type="text" name="ucb_hotel" id="ucb_hotel" class="form-control"><br/>
							Order Date:<br/>
							<input type="date" name="ucb_odate" id="ucb_odate" class="form-control">
							<input type="button" name="brOA22" id="brOA22" value="Back" class="form-control">
							<input type="button" name="bOA22" id="bOA22" value="Next" class="form-control">
						</div>
						<div style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA33" >
							<legend>Order Items Details</legend>
							Bill No:<br/>
							<input type="text" name="uc_bill" id="uc_bill" class="form-control"><br/>
							<div id="pack1">
							  	Package:</br>
								<?php 
									$result = $connection->query("select * from pack");
								?>
								<select name='upacklist' id="upacklist">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
							</div>
							<div id="pack2">
								Poruwa:
								<?php 
									$result = $connection->query("select * from poruwa");
								?>
								<select name='uporuwalist' id="uporuwalist">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id,$name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
								Setty:
								<?php 
									$result = $connection->query("select * from setty");
								?>
								<select name='usettylist' id="usettylist">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";   
								?>
								Table:
								<?php 
									$result = $connection->query("select * from tables");
								?>
								<select name='utablelist' id="utablelist">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$value.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";    
								?><br><br>
								<input type="checkbox" name="uc_kirikala" value = "Kirikala" id="ucb1">Kirikala
								<input type="checkbox" name="uc_kiribath" value="Kiribath" id="ucb2">Kiribath
								<input type="checkbox" name="uc_dryice" value="Dryice" id="ucb3">Dry Ice
								<input type="checkbox" name="uc_wine"  value="Wine" id="ucb4">Wine
								<input type="checkbox" name="uc_car" value="Car" id="ucb5">Car
							</div>	
							Bridemade Color:<br>
							<input type="file" name="uc_color" class="form-control"></br>
							Description<br><input type="text" size="50" maxlength="25" name="uc_desc" class="form-control" id="uc_desc"></br>
							<input type="button" name="brOA33" id="brOA33" value="Back" class="form-control">
							<input type="button" name="bOA33" id="bOA33" value="Next" class="form-control">
						</div>
						<div style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; " id="OA44">
							<legend>Billing Details</legend>
							Bill No:<br/>
							<input type="text" name="ucl_bill" class="form-control" id="ucl_bill"><br/>
							<script type="text/javascript">
								$(document).ready(function(){
									$("#bOA3").click(function () {
										var p1 = $('#packlist').val();
										var p2 = $('#poruwalist').val();
										var p3 = $('#settylist').val();
										var p4 = $('#tablelist').val();
										var t = parseInt(p1)+parseInt(p2)+parseInt(p3)+parseInt(p4);
										$("#cl_total").val(t);
									});
								});
							</script>
							Total Price:</br></br>
							<input type="text" name="ucl_total" id="ucl_total"  class="form-control"><br>
							Advance Price:</br>
							<input type="text" name="ucl_advance" id="ucl_advance" class="form-control"></br>
							Balance Price:</br>
							<input type="text" name="ucl_balance" id="ucl_balance" class="form-control"></br></br>
							<input type="button" name="brOA44" id="brOA44" value="Back" class="form-control">
							<input type="Submit" value="Finish" name="UFinish" id="bOA44" class="form-control">
						</div>
					</form>   
			    </div>
			    <div id="OR" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">
			    	<h3>Remove Order</h3>
			     	<form action="removeOrder.php" method="POST">
			     		Enter Bill Number
			     		<input type="text" name="c_Rbill" id="c_Rbill" class="form-control"><br>
			      		<button type="submit" id="rem" name="rem" class="form-control">Remove</button>	
			     	</form>
			    
			    <div id="IA" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 150%; ">
					  <div>
						<h3>Select Category</h3>
						
			      		<form action="addItem.php" method="POST">
							<select name="c_category" class="form-control"></br>
								<option value="IPoruwa" id="IPoruwa" name="IPoruwa" selected >Poruwa</option>
								<option value="ISetty" id="ISetty" name="ISetty"> Setty Back</option>
								<option value="IPack" id="IPack" name="IPack">Package</option>
							</select></br>
							Enter Part Name:<br>
							<input type="text" name="c_partname" class="form-control" ><br>
							Enter Part Value :<br>
							<input type="text" name="c_partno" class="form-control"><br>
			      			<button id="itemadd" name="itemadd" type="submit" class="form-control">Select</button>	
						</form>
					</div>  	  	
				
			    </div></div>
			    <div id="IV" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">
			    	<div style="padding: 20px 20px 20px 20px;">
			    		<br>
			    		<h3>Item Views</h3>
						<select name="v_category" id="v_category" class="form-control"></br>
							<option value="1"  selected>Poruwa</option>
							<option value="3" > Setty Back</option>
							<option value="2" >Package</option>
						</select></br>	
						Enter Part Num :<br>
						<input type="text" id="IVi"  name="IVi" class="form-control"><br>
			      		<input type="button" id="IVBtn" name="IVBtn" value="View" class="form-control"><br>
					<div id="VItem" style="overflow-x: scroll;margin: 20px 20px 20px 20px;"></div>
					<script type="text/javascript">
						$("#IVBtn").click(function(){
							var idd661 = $('#IVi').val();
							var idd662 = $('#v_category').val();
							var lol = [idd661,idd662];
							var request661 = $.ajax({
								url: "viewitem.php",
						  		method: "POST",
						  		data: { id661 : lol },
						  		dataType: "html"
							});
							request661.done(function( msg113 ) {
								$('#VItem').html(msg113);
							});
							request661.fail(function( jqXHR, textStatus ) {
								alert( "Request failed: " + textStatus );
							});
						});
					</script>
					</div>
				</div>
				<div id="IU" style="display: none;background-color: #cccccc;margin: 40px 40px 20px 20px;width: 150%; ">
					<label>Item Updates</label>
				</div>
				<div id="IR" style="display: none;background-color: #cccccc;margin: 40px 40px 20px 20px;width: 100%; ">
					<form action="removeItem.php" method="POST">
					<select name="R_category" id="R_category" class="form-control"></br>
						<option value="1" selected>Poruwa</option>
						<option value="2"> Setty Back</option>
						<option value="3">Package</option>
					</select></br>
			    	Enter Bill Number
			    	<input type="text" name="c_IRbill" id="c_IRbill" class="form-control"><br>
			    	<button type="submit" id="Irem" name="Irem" class="form-control">Remove</button>	
			    	</form>
				</div>
				<div id="WA" style="display: none;background-color: #cccccc;margin: 40px 40px 20px 20px;width: 100%; ">
					<div style="padding: 20px 20px 20px 20px;">
						<form action="workeradd.php" method="POST">
						<legend>General Details</legend>
						Date:<br/>
						<input type="date" name="w_date" class="form-control"><br/>
						Worker Name:<br/>
						<input type="text" name="w_name" class="form-control"><br/>
						Worker Address:<br/>
						<input type="text" name="w_address" class="form-control"><br/>
						Worker Mobile Number:  <br/> 
						<input type="text" name="w_mphone" class="form-control"></br>
						Worker id Number:  <br/> 
						<input type="text" name="w_idnum" class="form-control"></br>
						Worker Home Number:  <br/> 
						<input type="text" name="w_hphone" class="form-control"></br>
						Worker Photo:<br> 
						<input type="file" name="w_photo" class="form-control"></br>
						Worker's Mother's Name:<br/>
						<input type="text" name="w_mname" class="form-control"><br/>
						Worker's Mother's Phone Number:<br/>
						<input type="text" name="w_mno" class="form-control"><br/>
						Worker's Father's Name:<br/>
						<input type="text" name="w_fname" class="form-control"><br/>
						Worker's Father's Phone Number:<br/>
						<input type="text" name="w_fno" class="form-control"><br/>
						</pre>
						<button type="submit" id="wadd" name="wadd" class="form-control">Finish</button>	
					</form>
					
					</div>
				</div>				 			
			    <div id="WV" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">
			      	
					Enter Name:<br>
					<input type="text" name="w_Vname" id="w_Vname" class="form-control"><br>
			      	<button id="workview" name="workview" class="form-control">View</button><br>
					
					<div id="workV" style="overflow-x: scroll;margin: 20px 20px 20px 20px;width: 100%; ">
						
					</div>
					<script type="text/javascript">
						$("#workview").click(function(){
							var idd671 = $('#w_Vname').val();
							var request671 = $.ajax({
								url: "viewwork.php",
						  		method: "POST",
						  		data: { id671 : idd671 },
						  		dataType: "html"
							});
							request671.done(function( msg113 ) {
								$('#workV').html(msg113);
							});
							request671.fail(function( jqXHR, textStatus ) {
								alert( "Request failed: " + textStatus );
							});
						});
					</script>

			    </div>
			    <div id="WU" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; "><h3>Worker Update</h3><br>
			    	<div  id="wup">
			    	Worker Name
			    	<input type="text" name="Updatework" id="Updatework" class="form-control">
			    	<input type="button" name="Updateworkbtn" id="Updateworkbtn" value="Update" class="form-control">
					<div id="Updatework">
						<form action="workerUpdate.php" method="POST">
							<legend>General Details</legend>
							Date:<br/>
							<input type="date" name="uw_date" id="uw_date" class="form-control"><br/>
							Worker Name:<br/>
							<input type="text" name="uw_name" id="uw_name" class="form-control"><br/>
							Worker Address:<br/>
							<input type="text" name="uw_address" id="uw_address" class="form-control"><br/>
							Worker Mobile Number:  <br/> 
							<input type="text" name="uw_mphone" id="uw_mphone" class="form-control"></br>
							Worker id Number:  <br/> 
							<input type="text" name="uw_idnum" id="uw_idnum" class="form-control"></br>
							Worker Home Number:  <br/> 
							<input type="text" name="uw_hphone" id="uw_hphone" class="form-control"></br>
							Worker Photo:<br> 
							<input type="file" name="uw_photo" id="uw_photo" class="form-control"></br>
							Worker's Mother's Name:<br/>
							<input type="text" name="uw_mname" id="uw_mname" class="form-control"><br/>
							Worker's Mother's Phone Number:<br/>
							<input type="text" name="uw_mno" id="uw_mno" class="form-control"><br/>
							Worker's Father's Name:<br/>
							<input type="text" name="uw_fname" id="uw_fname" class="form-control"><br/>
							Worker's Father's Phone Number:<br/>
							<input type="text" name="uw_fno" id="uw_fno" class="form-control"><br/>
							</pre>
							<button type="submit" id="uwadd" name="uwadd" class="form-control">Finish</button>	
						</form>	
					</div>
					
					</div>
					<script type="text/javascript">
					$(document).ready(function(){	

						$("#Updateworkbtn").click(function(){
						$('#Updatework').show();
    					
						var idd95 = $('#Updatework').val();
					
						    var request95 = $.ajax({
						  		url: "Updateorder4.php",
						  		method: "POST",
						  		data: { id95: idd95 },
						  		dataType: "html"
							});				
							request95.done(function( msg95 ) {
						 		var ar5 = JSON.parse("[" + msg95 + "]");
						 		//alert(ar5[0][8]);alert(ar5[0][9]);alert(ar5[0][10]);alert(ar5[0][11]);
						 		$("#uw_date").val(ar5[0][1]);
								$("#uw_name").val(ar5[0][2]);
								$("#uw_address").val(ar5[0][3]);
								$("#uw_mphone").val(ar5[0][4]);
								$("#uw_idnum").val(ar5[0][5]);
								$("#uw_hphone").val(ar5[0][6]);
								//$("#uw_photo").val(ar5[0][7]);
								$("#uw_mname").val(ar5[0][8]);
								$("#uw_mno").val(ar5[0][9]);
								$("#uw_fname").val(ar5[0][10]);
								$("#uw_fno").val(ar5[0][11]);
							});
							});	
						});	    
					</script>
			    </div>
			    <div id="WR" style="display: none">
			    	<div style="background-color: #cccccc;padding: 20px 20px 20px 20px;">
					<form action="removeWork.php" method="POST">
						Enter Name:<br>
						<input type="text" name="w_Rname" id="w_Rname" class="form-control"><br>
			    	  	<button type="submit" id="Wremove" name="Wremove" class="form-control">Remove</button><br>
					</form>
					</div>
			    </div>
			    <div id="IPA" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">Item Part Add
			    	<form action="addIP.php" method="POST">
			    		<br>Part Name<input type="text" name="ipname" class="form-control">
			    		<br>Roof<input type="checkbox" name="iproof" class="form-control">
			    		Column<input type="checkbox" name="icolumn" class="form-control">
			    		Flower<input type="checkbox" name="iflower" class="form-control"> 
			    		<br>Side<input type="checkbox" name="iside" class="form-control">
			    		Kalas<input type="checkbox" name="ikalas" class="form-control">
			    		Base<input type="checkbox" name="ibase" class="form-control">
			    		<br>Stair<input type="checkbox" name="istair2" class="form-control">
			    		Stair Main<input type="checkbox" name="istairm" class="form-control">
			    		Sadhakada Pahana<input type="checkbox" name="isadakada" class="form-control">
			    		<br>Cuirton<input type="checkbox" name="icuirton" class="form-control">
			    		<br><button type="submit" name="addIPbtn" id="addIPbtn" class="form-control">Add</button>
			    	</form>
			    </div>
			    <div id="IPV" style="display: none;background-color: #cccccc;padding: 20px 20px 20px 20px;width: 100%; ">Item Part View
			    <br>
		      		<input type="text" name="viewData" id="viewData" class="form-control">
		      		<input type="button" value="View" name="viewIPbtn" id="viewIPbtn" class="form-control"><br>
		   			<div id="ViewIPDiv" style="overflow-x: scroll;"></div>
		   			<script type="text/javascript">
		   				$("#viewIPbtn").click(function(){
							var idd97 = $('#viewData').val();
							var request97 = $.ajax({
								url: "viewIP.php",
						  		method: "POST",
						  		data: { id97 : idd97 },
						  		dataType: "html"
							});
							request97.done(function( msg97 ) {
								$('#ViewIPDiv').html(msg97);
							});
							request97.fail(function( jqXHR, textStatus ) {
								alert( "Request failed: " + textStatus );
							});
						});
		   			</script>
			    </div>
			    <div id="IPU" style="display: none">Item Part Update<br>
			    	Enter Update Item Part Name:<br>
			    	<input type="text" name="uviewData" id="uviewData" class="form-control">
		      		<input type="button" value="View" name="uviewIPbtn" id="uviewIPbtn" class="form-control"><br>
			    	<div id="updateIPdiv">
			    		<br>
			    		<form action="updateIPart.php" method="POST">
			    			<br>Roof<input type="checkbox" name="uiproof" id="uiproof" class="form-control">
			    			Column<input type="checkbox" name="uicolumn" id="uicolumn" class="form-control">
			    			Flower<input type="checkbox" name="uiflower" id="uiflower" class="form-control">  
			    			<br>Side<input type="checkbox" name="uiside" id="uiside" class="form-control">
			    			Kalas<input type="checkbox" name="uikalas" id="uikalas" class="form-control">
			    			Base<input type="checkbox" name="uibase" id="uibase" class="form-control">
			    			<br>Stair<input type="checkbox" name="uistair2" id="uistair2" class="form-control">
			    			Stair Main<input type="checkbox" name="uistairm" id="uistairm" class="form-control">
			    			Sadhakada Pahana<input type="checkbox" name="uisadakada" id="uisadakada" class="form-control">
			    			<br>Cuirton<input type="checkbox" name="uicuirton" id="uicuirton" class="form-control">
			    			<br><button type="submit" name="uaddIPbtn" id="uaddIPbtn">Add</button>	
			    		</form>
			    		
			    	</div>
			    		
			    <script type="text/javascript">
					$(document).ready(function(){	
						
						$("#uviewIPbtn").click(function(){
						var idd98 = $('#uviewData').val();
					
						    var request98 = $.ajax({
						  		url: "UpdateIP.php",
						  		method: "POST",
						  		data: { id98: idd98 },
						  		dataType: "html"
							});				
							request98.done(function( msg98 ) {
						 		var ar6 = JSON.parse("[" + msg98 + "]");
						 		alert(ar6);
						 		$("#uipname").val(ar6[0][1]);
						 		if(ar6[0][2] == "1"){
									$('#uiproof').prop('checked', true);
								}
								if(ar6[0][3] == "1"){
									$('#uicolumn').prop('checked', true);
								}
								if(ar6[0][4] == "1"){
									$('#uiflower').prop('checked', true);
								}
								if(ar6[0][5] == "1"){
									$('#uiside').prop('checked', true);
								}
								if(ar6[0][6] == "1"){
									$('#uikalas').prop('checked', true);
								}
								if(ar6[0][7] == "1"){
									$('#uibase').prop('checked', true);
								}
								if(ar6[0][8] == "1"){
									$('#uistair2').prop('checked', true);
								}
								if(ar6[0][9] == "1"){
									$('#uistairm').prop('checked', true);
								}
								if(ar6[0][10] == "1"){
									$('#uisadakada').prop('checked', true);
								}
								if(ar6[0][11] == "1"){
									$('#uicuirton').prop('checked', true);
								}
								});
							});	
						});	    
					</script>
			    </div>
			    <div id="IPR" style="display: none">Item Part Remove
			    	<br>
			    	<form action="removeIP.php" method="POST">
						Enter Item Part Name:<br>
						<input type="text" name="RIPname" id="RIPname" class="form-control"><br>
			    	  	<button type="submit" id="RIPnameB" name="RIPnameB" class="form-control">Remove</button><br>
					</form>
			    </div>
	  			
			</div>
  			<div class="col-3 col-md-3" style="background-color: #BEBEBE;"">
  			<!-- Notification Panel -->
			    <div class="panel panel-default">
			    	<div class="panel-heading">
					    <h3 class="panel-title" style="font-color:while;">Upcoming 10 Work</h3>
					</div>
					<div class="panel-body">
						<div class="alert alert-success">
					        <strong class="default"><i class="fa fa-road">
					        	<?php  
					        		$sql = "SELECT c_desc from `orderitem` where `c_bill` = 1";
					        		$result = mysqli_query($connection,$sql);
					        		while($row = mysqli_fetch_assoc($result)) {
											$out = $row['c_desc'];
										}
									
									echo $out;
					        	?>
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						</div>
						<div class="alert alert-success">
						    <strong class="default"><i class="fa fa-user"><?php  
					        		$sql = "SELECT c_desc from `orderitem` where `c_bill` = 1";
					        		$result = mysqli_query($connection,$sql);
					        		while($row = mysqli_fetch_assoc($result)) {
											$out = $row['c_desc'];
										}
									
									echo $out;
					        	?>
						    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						</div>
						<div class="alert alert-success">
						    <strong class="default"><i class="fa fa-envelope-o"><?php  
					        		$sql = "SELECT c_desc from `orderitem` where `c_bill` = 1";
					        		$result = mysqli_query($connection,$sql);
					        		while($row = mysqli_fetch_assoc($result)) {
											$out = $row['c_desc'];
										}
									
									echo $out;
					        	?>
						    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						</div>
						<div class="alert alert-success">
						    <strong class="default"><i class="fa fa-hdd-o"><?php  
					        		$sql = "SELECT c_desc from `orderitem` where `c_bill` = 1";
					        		$result = mysqli_query($connection,$sql);
					        		while($row = mysqli_fetch_assoc($result)) {
											$out = $row['c_desc'];
										}
									
									echo $out;
					        	?>
						    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						</div>
						<div class="alert alert-success">
						    <strong class="default"><i class="fa fa-money"><?php  
					        		$sql = "SELECT c_desc from `orderitem` where `c_bill` = 1";
					        		$result = mysqli_query($connection,$sql);
					        		while($row = mysqli_fetch_assoc($result)) {
											$out = $row['c_desc'];
										}
									
									echo $out;
					        	?>
						    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						</div>
					</div>
				</div>
			<!-- Notification Panel -->
			</div>
		</div>
	</div>

	<script type="text/javascript" src="ajaxFunction.js"></script>
</body>
</html>
<?php mysqli_close($connection); ?>