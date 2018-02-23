<?php require_once('inc/connection.php'); ?>
<?php
	$n = $_POST["id97"][1];
	$billNo = $_POST["id97"][0];
//	if ($n=="1") {
			$sql ="SELECT * FROM `poruwa_parts` WHERE `name` = '$billNo'";		
/*	}elseif ($n =="2") {
			$sql ="SELECT * FROM `setty_parts` WHERE `type` = '$billNo'";
	}elseif ($n =="3") {
			$sql ="SELECT * FROM `Pack_parts` WHERE `type` = '$billNo'";
	}
*/
	$result = mysqli_query($connection,$sql);
	$output =  "<table border=1 >";
	$output .= "<tr>";
//	if($n ==1){
	if ($row = mysqli_fetch_array($result)){
//		$output .= "<th>Poruwa</th><th>Roof</th><th>Column</th><th>Flower</th><th>Side</th>";
//		$output .= "<th>Kalas</th><th>Base</th><th>Stair</th><th>Stair Main</th><th>Sadhakada</th><th>Cuirton</th>";
		$output .= "<tr>";
		$output .= "<td>".$row['name']."</td>";
		$output .= "<td>".$row['poruwa_roof']."</td>";
		$output .= "<td>".$row['poruwa_column']."</td>";
		$output .= "<td>".$row['poruwa_flower']."</td>";
		$output .= "<td>".$row['poruwa_side']."</td>";
		$output .= "<td>".$row['poruwa_kalas']."</td>";
		$output .= "<td>".$row['poruwa_base']."</td>";
		$output .= "<td>".$row['poruwa_stair2']."</td>";
		$output .= "<td>".$row['poruwa_mstair']."</td>";
		$output .= "<td>".$row['poruwa_sadakada']."</td>";
		$output .= "<td>".$row['poruwa_curton']."</td>";
		$output .= "</tr>";
	}
//	}
//	if ($n == 2) {
	if ($row = mysqli_fetch_array($result)){
		$output .= "<tr>";
		$output .= "<td>".$row['type']."</td>";
		$output .= "<td>".$row['chair']."</td>";
		$output .= "<td>".$row['setty']."</td>";
		$output .= "</tr>";
	}
	
//	}
//	if($n ==3){
	if ($row = mysqli_fetch_array($result)){
		$output .= "<tr>";
		$output .= "<td>".$row['type']."</td>";
		$output .= "<td>".$row['poruwa']."</td>";
		$output .= "<td>".$row['setty']."</td>";
		$output .= "</tr>";
	}

	//item part add remove code
	 <div id="IPV" style="display: none;padding: 20px 20px 20px 20px;width: 100%; ">
			    <br>
			    	<select name="ipv_category" id="ipv_category" class="form-control"></br>
						<option value="1"  selected>Poruwa</option>
						<option value="3" > Setty Back</option>
						<option value="2" >Package</option>
					</select></br>	
					<form class="form-control row">
			    	<h3>Item Part View</h3>

		      		<input type="text" name="viewData" id="viewData" class="form-control">
		      		<input type="button" value="View" name="viewIPbtn" id="viewIPbtn" class="form-control"><br>
		   			<div id="ViewIPDiv" style="overflow-x: scroll;"></div>
		   			<script type="text/javascript">
		   				$("#viewIPbtn").click(function(){
							var idd97 = $('#viewData').val();
							var idd997 = $('#ipv_category').val();
							var lol3 = [idd97,idd997];
							var request97 = $.ajax({
								url: "viewIP.php",
						  		method: "POST",
						  		data: { id97 : lol3 },
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
			    			Roof<input type="checkbox" name="uiproof" id="uiproof" class="form-control form-check-input"><br>
			    			Column<input type="checkbox" name="uicolumn" id="uicolumn" class="form-control form-check-input"><br>
			    			Flower<input type="checkbox" name="uiflower" id="uiflower" class="form-control form-check-input"> <br> 
			    			Side<input type="checkbox" name="uiside" id="uiside" class="form-control form-check-input"><br>
			    			Kalas<input type="checkbox" name="uikalas" id="uikalas" class="form-control form-check-input"><br>
			    			Base<input type="checkbox" name="uibase" id="uibase" class="form-control form-check-input"><br>
			    			Stair<input type="checkbox" name="uistair2" id="uistair2" class="form-control form-check-input"><br>
			    			Stair Main<input type="checkbox" name="uistairm" id="uistairm" class="form-control form-check-input"><br>
			    			Sadhakada Pahana<input type="checkbox" name="uisadakada" id="uisadakada" class="form-control form-check-input"><br>
			    			Cuirton<input type="checkbox" name="uicuirton" id="uicuirton" class="form-control form-check-input"><br>
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
			   
	
//	}
	$output .= "</table>";
	echo $output;
?>
				