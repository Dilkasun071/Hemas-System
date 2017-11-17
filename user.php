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
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UOR|Forum</title>
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
<link rel="shortcut icon" href="2.ico"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img src="images/uorlg1.png" style="width: 23px;"></a>
  <a class="navbar-brand" href="#">Hemas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>  
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    
  </div>
</nav> 
  
<div class="header">
  <br><br>
</div>


  <div class="row"  >
    <div class="col-sm-2">
      <div class="btn-group-vertical" style="width: 100%;">
      	<button type="button" class="btn btn-primary" id="TbO">Order</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bOA">Add</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bOV">View</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bOU">Update</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bOR">Remove</button>
        <button type="button" class="btn btn-primary" id="TbI">Item</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIA">Add</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIV">View</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIU">Updates</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIR">Remove</button>
        <button type="button" class="btn btn-primary" id="TbW">Worker</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bWA">Add</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bWV">View</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bWU">Updates</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bWR">Remove</button>
        <button type="button" class="btn btn-primary" id="TbIP">Item Parts</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIPA">Add</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIPV">View</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIPU">Updates</button>
        <button type="button" class="btn btn-primary" style="display: none;background-color: #121212;" id="bIPR">Remove</button>
        <script type="text/javascript">
        	$(document).ready(function(){
			    $('#TbO').mouseover(function(){
			    	//alert('TBO');
			        $('#bOA,#bOV,#bOU,#bOR').show();
			        $('#bIA,#bIV,#bIU,#bIR,#bWA,#bWV,#bWU,#bWR,#bIPA,#bIPV,#bIPU,#bIPR').hide();
			    });
			    $('#TbI').mouseover(function(){
			       // alert('TBO');
			        $('#bIA,#bIV,#bIU,#bIR').show();
			        $('#bOA,#bOV,#bOU,#bOR,#bWA,#bWV,#bWU,#bWR,#bIPA,#bIPV,#bIPU,#bIPR').hide();
			    });
			    $('#TbW').mouseover(function(){
			        //alert('TBO');
			        $('#bWA,#bWV,#bWU,#bWR').show();
			        $('#bOA,#bOV,#bOU,#bOR,#bIA,#bIV,#bIU,#bIR,#bIPA,#bIPV,#bIPU,#bIPR').hide();    
			    });
			    $('#TbIP').mouseover(function(){
			       // alert('TBO');
			        $('#bIPA,#bIPV,#bIPU,#bIPR').show();
			        $('#bOA,#bOV,#bOU,#bOR,#bIA,#bIV,#bIU,#bIR,#bWA,#bWV,#bWU,#bWR').hide();    
			    });
			});
        </script>
      </div> 
    </div>
  
  <div class="col-sm-6">
    <!--nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
    </nav -->
    <div id="OA" style="display: none"  class="form-group" >
	  				<form action="Order.php" method="post" enctype="multipart/form-data" class="form-control row" >
						<div  style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA1" >
							<h3>General Details</h3>
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
							<input type="text" name="cg_cusid" id="cg_cusid" class="form-control" placeholder="Bill Number"></br>
							Customer Photo</br>
							<input type="file" name="cg_photo" id="cg_photo" class="form-control" ></br>

							<input type="button" name="qwe" id="qwe" value="Back" class="btn btn-primary" style="float: left;" disabled>
							<input type="button" name="bOA1" id="bOA1" value="Next" class="btn btn-primary" style="float: right;">
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
						<div style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA2">
							<h3>Basic Order Details</h3>
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
							<input type="button" name="brOA2" id="brOA2" value="Back" class="btn btn-primary" style="float: left;">
							<input type="button" name="bOA2" id="bOA2" value="Next" class="btn btn-primary" style="float: right;">
						</div>
						<div style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA3" >
							<h3>Order Items Details</h3>
							<input type="button" name="pack" value = "Package" id="pack" class="form-control">
							<input type="button" name="nonpack" value = "Non-Package" id="nonpack" class="form-control"><br/>
							<!--Bill No:--><br/>
							<input type="hidden" name="c_bill" id="c_bill" class="form-control" ><br/>
							<div id="pack1" style="display: none;">
								Package:</br>
								<?php 
									$result = $connection->query("select * from pack");
							    ?>
							    <select name='packlist' id="packlist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
							    <?php
								    while ($row = $result->fetch_assoc()) {
		        						unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
							</div>
							<div id="pack2" style="display: none;">
								Poruwa:
								<?php 
									$result = $connection->query("select * from poruwa");
							    ?>
							    <select name='poruwalist' id="poruwalist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
							    <?php
								    while ($row = $result->fetch_assoc()) {
	    								unset($value,$id,$name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
								Setty:
								<?php 
									$result = $connection->query("select * from setty");
							    ?>
							    <select name='settylist' id="settylist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
							    <?php
								    while ($row = $result->fetch_assoc()) {
	  									unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";   
								?>
								Table:
								<?php 
									$result = $connection->query("select * from tables");
								?>
								<select name='tablelist' id="tablelist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
								<?php
								    while ($row = $result->fetch_assoc()) {
	                	                unset($value,$id, $name);
								        $value = $row['value'];
								        $id = $row['id'];
								        $name = $row['name']; 
								        echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
								    echo "</select>";    
								?>
								<br><br>
								<input type="checkbox" name="c_kirikala" value = "Kirikala" class="form-check-input form-control">Kirikala<br>
								<input type="checkbox" name="c_kiribath" value="Kiribath" class="form-check-input form-control">Kiribath<br>
								<input type="checkbox" name="c_dryice" value="Dryice" class="form-check-input form-control">Dry Ice<br>
								<input type="checkbox" name="c_wine"  value="Wine" class="form-check-input form-control">Wine<br>
								<input type="checkbox" name="c_car" value="Car" class="form-check-input form-control">Car<br>
							</div>	
								Bridemade Color:<br>
								<input type="hidden" name="c_color_id" id="c_color_id" class="form-control">
								<input type="file" name="c_color" class="form-control"></br>
								Description<br>
								<input type="text" size="50" maxlength="25" name="c_desc" class="form-control" /></br>
								<input type="button" name="brOA3" id="brOA3" value="Back" class="btn btn-primary" style="float: left;">
								<input type="button" name="bOA3" id="bOA3" value="Next" class="btn btn-primary" style="float: right;">
						</div>
						<div style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA4">
							<h3>Billing Details</h3>
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
							<input type="button" name="brOA4" id="brOA4" value="Back" class="btn btn-primary" style="float: left;">
							<input type="Submit" value="Finish" name="Finish" id="bOA4" class="btn btn-success" style="float: right;">
						</div>
					</form>
				</div>
				<!-- Order View  Start-->
				<div id="OV" style="display: none;padding: 20px 20px 20px 20px;width: 100%; " class="form-group">
					<form class="form-control row">
						<div style="padding: 20px 20px 20px 20px;">
						<h3>Order View</h3>
						
						<label class="form-check-label">
						    Selected by Date<input type="radio" name="radio0" value="" id="D" class="form-check-input form-control"> 
						</label>
						<label class="form-check-label">
						    Selected by Bill<input type="radio" name="radio0" value="" id="B" class="form-check-input form-control">    
						</label>
						
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
		      			<script type="text/javascript">
	      					
							$("#searchbillno").click(function(){
								var idd1 = $('#searchbill').val();
								var request12 = $.ajax({
									url: "Searchbilldata.php",
									method: "POST",
									data: { id1 : idd1 },
									dataType: "html"
								});
								
								request12.done(function( msg1 ) {
									$('#searchbilldiv').html(msg1);
								});
									 
								request12.fail(function( jqXHR, textStatus ) {
									alert( "Request failed: " + textStatus );
								});
							});
	      				</script>
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
					</form>
					
	   			</div>	
	   			<!-- Order Update -->
			    <div id="OU" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			    	
			     	<form action="update.php" method="POST" class="form-control row">
			     		<h3>Order Updates</h3>
						<label>Update Bill Number</label>
						<input type="text" name="Updatetxt"  id="Updatetxt" class="form-control">
						<input type="button" name="Updatebtn" value="Update" id="Updatebtn" class="form-control"><br>
					    <div  style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA11" >
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

							<br>
							<input type="button" name="ewq" id="ewq" value="Next" class="btn btn-primary" style="float: left;" disabled="">
							<input type="button" name="bOA11" id="bOA11" value="Next" class="btn btn-primary" style="float: right;">
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
						<div style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA22">
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
							<input type="button" name="brOA22" id="brOA22" value="Back" class="btn btn-primary" style="float: left;">
							<input type="button" name="bOA22" id="bOA22" value="Next" class="btn btn-primary" style="float: right;">
						</div>
						<div style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA33" >
							<legend>Order Items Details</legend>
							Bill No:<br/>
							<input type="text" name="uc_bill" id="uc_bill" class="form-control"><br/>
							<div id="pack1">
							  	Package:</br>
								<?php 
									$result = $connection->query("select * from pack");
								?>
								<select name='upacklist' id="upacklist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
							</div>
							<div id="pack2">
								Poruwa:
								<?php 
									$result = $connection->query("select * from poruwa");
								?>
								<select name='uporuwalist' id="uporuwalist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id,$name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";
								?>
								Setty:
								<?php 
									$result = $connection->query("select * from setty");
								?>
								<select name='usettylist' id="usettylist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";   
								?>
								Table:
								<?php 
									$result = $connection->query("select * from tables");
								?>
								<select name='utablelist' id="utablelist" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control">
								<?php
									while ($row = $result->fetch_assoc()) {
										unset($value,$id, $name);
										$value = $row['value'];
										$id = $row['id'];
										$name = $row['name']; 
										echo '<option value="'.$name.'" name="'.$id.'">'.$name.'</option>';
									}
									echo "</select>";    
								?><br><br>
								<input type="checkbox" name="uc_kirikala" value = "Kirikala" id="ucb1" class="form-check-input form-control">Kirikala
								<input type="checkbox" name="uc_kiribath" value="Kiribath" id="ucb2" class="form-check-input form-control">Kiribath
								<input type="checkbox" name="uc_dryice" value="Dryice" id="ucb3" class="form-check-input form-control">Dry Ice
								<input type="checkbox" name="uc_wine"  value="Wine" id="ucb4" class="form-check-input form-control">Wine
								<input type="checkbox" name="uc_car" value="Car" id="ucb5" class="form-check-input form-control">Car
							</div>	
							Bridemade Color:<br>
							<input type="file" name="uc_color" class="form-control"></br>
							Description<br><input type="text" size="50" maxlength="25" name="uc_desc" class="form-control" id="uc_desc"></br>
							<input type="button" name="brOA33" id="brOA33" value="Back" class="btn btn-primary" style="float: left;">
							<input type="button" name="bOA33" id="bOA33" value="Next" class="btn btn-primary" style="float: right;">
						</div>
						<div style="display: none;padding: 20px 20px 20px 20px;width: 100%; " id="OA44">
							<legend>Billing Details</legend>
							Bill No:<br/>
							<input type="text" name="ucl_bill" class="form-control" id="ucl_bill"><br/>
							Total Price:</br></br>
							<input type="text" name="ucl_total" id="ucl_total"  class="form-control"><br>
							Advance Price:</br>
							<input type="text" name="ucl_advance" id="ucl_advance" class="form-control"></br>
							Balance Price:</br>
							<input type="text" name="ucl_balance" id="ucl_balance" class="form-control"></br></br>
							<input type="button" name="brOA44" id="brOA44" value="Back" class="btn btn-primary" style="float: left;">
							<input type="Submit" value="Update" name="UFinish" id="bOA44" class="btn btn-success" style="float: right;">
						</div>
					</form>
					<script type="text/javascript">
												
						//Updates
					$(document).ready(function(){
						$("#Updatebtn").click(function(){
							$('#OU,#OA11').show();
						    $('#OV,#OR,#IA,#IV,#IU,#IR,#WA,#WV,#WU,#WR,#IPA,#IPV,#IPU,#IPR,#OA22,#OA33,#OA44').hide();
						    $('#bOA11').click(function(){
						        $('#OU,#OA22').show();
						        $('#OA11,#OA33,#OA44').hide();
						    });
						    $('#bOA22').click(function(){
						        $('#OU,#OA33').show();
						        $('#OA11,#OA22,#OA44').hide();
						    });
						    $('#bOA33').click(function(){
						        $('#OU,#OA44').show();
						        $('#OA11,#OA22,#OA33').hide();
						    });
						    $('#brOA22').click(function(){
						        $('#OU,#OA1').show();
						        $('#OA22,#OA33,#OA44').hide();
						    });
						    $('#brOA33').click(function(){
						        $('#OU,#OA22').show();
						        $('#OA11,#OA33,#OA44').hide();
						    });
						    $('#brOA44').click(function(){
						        $('#OU,#OA33').show();
						        $('#OA11,#OA22,#OA44').hide();
						    });
							var idd91 = $('#Updatetxt').val();
							var request91 = $.ajax({
								url: "Updateorder.php",
								method: "POST",
								data: { id91: idd91 },
								dataType: "html"
							});

							request91.done(function( msg91 ) {
								var ar1 = JSON.parse("[" + msg91 + "]");

								alert(ar1);
								$("#uc_bill").val(ar1[0][1]);
								if(ar1[0][7] == "1"){
									$('#ucb1').prop('checked', true);
								}
								if(ar1[0][8] == "1"){
									$('#ucb2').prop('checked', true);
								}
								if(ar1[0][9] == "1"){
									$('#ucb3').prop('checked', true);
								}
								if(ar1[0][10] == "1"){
									$('#ucb4').prop('checked', true);
								}
								if(ar1[0][11] == "1"){
									$('#ucb5').prop('checked', true);
								}
								$("#uc_desc").val(ar1[0][12]);
							});

							request91.fail(function( jqXHR, textStatus ) {
								alert( "Request failed: " + textStatus );
							});

							var idd92 = $('#Updatetxt').val();
						    var request92 = $.ajax({
						  		url: "Updateorder1.php",
						  		method: "POST",
						  		data: { id92: idd92 },
						  		dataType: "html"
							});
										
							request92.done(function( msg92 ) {
						 		var ar2 = JSON.parse("[" + msg92 + "]");
						 		alert(ar2);
						 		$("#ucg_bill").val(ar2[0][1]);
								$("#ucg_name").val(ar2[0][2]);
								$("#ucg_address").val(ar2[0][3]);
								$("#ucg_mobile").val(ar2[0][4]);
								$("#ucg_home").val(ar2[0][5]);
								
							});
											
							request92.fail(function( jqXHR, textStatus ) {
						  		alert( "Request failed: " + textStatus );
							});
							
							var idd93 = $('#Updatetxt').val();
						    var request93 = $.ajax({
						  		url: "Updateorder2.php",
						  		method: "POST",
						  		data: { id93: idd93 },
						  		dataType: "html"
							});
											
							request93.done(function( msg93 ) {
						 		var ar3 = JSON.parse("[" + msg93 + "]");
						 		alert(ar3);
						 		$("#ucb_bill").val(ar3[0][1]);
								$("#ucb_idate").val(ar3[0][2]);
								$("#ucb_hotel").val(ar3[0][3]);
								$("#ucb_odate").val(ar3[0][4]);
							});
											
							request93.fail(function( jqXHR, textStatus ) {
						  		alert( "Request failed: " + textStatus );
							});
							
							var idd94 = $('#Updatetxt').val();
						    var request94 = $.ajax({
						  		url: "Updateorder3.php",
						  		method: "POST",
						  		data: { id94: idd94 },
						  		dataType: "html"
							});
											
							request94.done(function( msg94 ) {
						 		var ar4 = JSON.parse("[" + msg94 + "]");
						 		alert(ar4);
						 		$("#ucl_bill").val(ar4[0][1]);
						 		$("#ucl_total").val(ar4[0][2]);
								$("#ucl_advance").val(ar4[0][3]);
								$("#ucl_balance").val(ar4[0][4]);
								
							});
											
							request94.fail(function( jqXHR, textStatus ) {
						  		alert( "Request failed: " + textStatus );
							});
						});	
						});	    
					</script>   
			    </div>
			     <div id="OR" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			    	
			     	<form action="removeOrder.php" method="POST" class="form-control row">
			     		<h3>Remove Order</h3>
			     		Enter Bill Number
			     		<input type="text" name="c_Rbill" id="c_Rbill" class="form-control"><br>
			      		<button type="submit" id="rem" name="rem" class="btn-danger btn">Remove</button>	
			     	</form>
			    </div>
			    <div id="IA" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
					  <div>
					  	<form action="addItem.php" method="POST" class="form-control row">
						<h3>Select Category</h3>
							<select name="c_category" class="form-control" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control" ></br>
								<option value="IPoruwa" id="IPoruwa" name="IPoruwa" selected >Poruwa</option>
								<option value="ISetty" id="ISetty" name="ISetty"> Setty Back</option>
								<option value="IPack" id="IPack" name="IPack">Package</option>
							</select></br>
							Enter Part Name:<br>
							<input type="text" name="c_partname" class="form-control" ><br>
							Enter Part Value :<br>
							<input type="text" name="c_partno" class="form-control"><br>
			      			<button id="itemadd" name="itemadd" type="submit" class="form-control">Select</button>	
					</div>  	  	
					</form>
			    </div>
			    <div id="IV" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			    	<div style="padding: 20px 20px 20px 20px;">
			    		<br>
			    		<form class="form-control row">
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
					</form>
				</div>
				<div id="IU" style="display: none;margin: 40px 40px 20px 20px;width: 150%; ">
					<label>Item Updates</label>
				</div>
				<div id="IR" style="display: none;margin: 40px 40px 20px 20px;width: 100%; ">
					<form action="removeItem.php" method="POST" class="form-control row">
					<select name="R_category" id="R_category" class="custom-select mb-2 mr-sm-2 mb-sm-0 form-control"></br>
						<option value="1" selected>Poruwa</option>
						<option value="2"> Setty Back</option>
						<option value="3">Package</option>
					</select></br>
			    	Enter Bill Number
			    	<input type="text" name="c_IRbill" id="c_IRbill" class="form-control"><br>
			    	<button type="submit" id="Irem" name="Irem" class="btn-danger btn">Remove</button>	
			    	</form>
				</div>
				<div id="WA" style="display: none;;margin: 40px 40px 20px 20px;width: 100%; ">
					<div style="padding: 20px 20px 20px 20px;" class="form-control row">
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
			    <div id="WV" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			      	<form class="form-control row"> 
			      		Enter Name:<br>
					<input type="text" name="w_Vname" id="w_Vname" class="form-control"><br>
			      	<button id="workview" name="workview" class="form-control">View</button><br>
					
					<div id="workV" style="overflow-x: scroll;margin: 20px 20px 20px 20px; ">
						
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
	
			      	</form>
					
			    </div>
			    <div id="WU" style="display: none;padding: 20px 20px 20px 20px;width: 100%; "><h3>Worker Update</h3><br>
			    	<form class="form-control row">
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
							<button type="submit" id="uwadd" name="uwadd" class="btn-primary">Finish</button>	
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
			    	<div style="padding: 20px 20px 20px 20px;">
					<form action="removeWork.php" method="POST" class="form-control row">
						Enter Name:<br>
						<input type="text" name="w_Rname" id="w_Rname" class="form-control"><br>
			    	  	<button type="submit" id="Wremove" name="Wremove" class="btn btn-danger">Remove</button><br>
					</form>
					</div>
			    </div>
			    <div id="IPA" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			    	<form action="addIP.php" method="POST" class="form-control row">
			    		<h3>Item Part Add</h3>
			    		<br>Part Name<input type="text" name="ipname" class="form-control">
			    		<br>Roof<input type="checkbox" name="iproof" class="form-control form-check-input">
			    		Column<input type="checkbox" name="icolumn" class="form-control form-check-input">
			    		Flower<input type="checkbox" name="iflower" class="form-control form-check-input"> 
			    		<br>Side<input type="checkbox" name="iside" class="form-control form-check-input">
			    		Kalas<input type="checkbox" name="ikalas" class="form-control form-check-input">
			    		Base<input type="checkbox" name="ibase" class="form-control form-check-input">
			    		<br>Stair<input type="checkbox" name="istair2" class="form-control form-check-input">
			    		Stair Main<input type="checkbox" name="istairm" class="form-control form-check-input">
			    		Sadhakada Pahana<input type="checkbox" name="isadakada" class="form-control form-check-input">
			    		<br>Cuirton<input type="checkbox" name="icuirton" class="form-control form-check-input"><br>
			    		<br><button type="submit" name="addIPbtn" id="addIPbtn" class="form-control">Add</button>
			    	</form>
			    </div>
			    <div id="IPV" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			    <br>
			    	<form class="form-control row">
			    	<h3>Item Part View</h3>
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
		   		</form>
			    </div>
			    <div id="IPU" style="display: none">
			    	<form class="form-control row">
			    	<h3>Item Part Update</h3><br>
			    	Enter Update Item Part Name:<br>
			    	<input type="text" name="uviewData" id="uviewData" class="form-control">
		      		<input type="button" value="View" name="uviewIPbtn" id="uviewIPbtn" class="form-control"><br>
			    	<div id="updateIPdiv">
			    		<br>
			    		<form action="updateIPart.php" method="POST">
			    			<br>Roof<input type="checkbox" name="uiproof" id="uiproof" class="form-control form-check-input">
			    			Column<input type="checkbox" name="uicolumn" id="uicolumn" class="form-control form-check-input">
			    			Flower<input type="checkbox" name="uiflower" id="uiflower" class="form-control form-check-input">  
			    			<br>Side<input type="checkbox" name="uiside" id="uiside" class="form-control form-check-input">
			    			Kalas<input type="checkbox" name="uikalas" id="uikalas" class="form-control form-check-input">
			    			Base<input type="checkbox" name="uibase" id="uibase" class="form-control form-check-input">
			    			<br>Stair<input type="checkbox" name="uistair2" id="uistair2" class="form-control form-check-input">
			    			Stair Main<input type="checkbox" name="uistairm" id="uistairm" class="form-control form-check-input">
			    			Sadhakada Pahana<input type="checkbox" name="uisadakada" id="uisadakada" class="form-control form-check-input">
			    			<br>Cuirton<input type="checkbox" name="uicuirton" id="uicuirton" class="form-control form-check-input"><br>
			    			<br><button type="submit" name="uaddIPbtn" id="uaddIPbtn" class="form-control">Add</button>	
			    		</form>
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
			    <div id="IPR" style="display: none">
			    	<br>
			    	<form action="removeIP.php" method="POST" class="form-control row">
						<h3>Item Part Remove</h3>
						Enter Item Part Name:<br>
						<input type="text" name="RIPname" id="RIPname" class="form-control"><br>
			    	  	<button type="submit" id="RIPnameB" name="RIPnameB" class="form-control">Remove</button><br>
					</form>
			    </div>
  </div>
  <div class="col-sm-4">
     <div class="card text-center">
      <div class="card-header">
        Updates
      </div>
      <div class="card-body">
        <h4 class="card-title">Special title treatment</h4>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
      <div class="card-body">
        <h4 class="card-title">Special title treatment</h4>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
      <div class="card-body">
        <h4 class="card-title">Special title treatment</h4>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div>

  </div>
</div>

</body>
</html>
