//Item View
//Item Parts View
//$(document).ready(function(){
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
//});
//Order View
$("#searchdateno").click(function(){
	var idd3 = $('#searchdate').val();
	var request11 = $.ajax({
		url: "Searchdatedata.php",
  		method: "POST",
  		data: { id3 : idd3 },
  		dataType: "html"
	});
	request11.done(function( msg3 ) {
		$('#searchdatediv').html(msg3);
	});
	request11.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
});


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
	
$("#searchnameno").click(function(){
	var idd1 = $('#searchname').val();
	var request13 = $.ajax({
		url: "Searchnamedata.php",
		method: "POST",
		data: { id2 : idd1 },
		dataType: "html"
	});
		 
	request13.done(function( msg2 ) {
		$('#searchnamediv').html(msg2);
	});

	request13.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
});

$("#searchhotelno").click(function(){
	var idd4 = $('#searchhotel').val();
	var request14 = $.ajax({
		url: "Searchhoteldata.php",
		method: "POST",
		data: { id4 : idd4 },
		dataType: "html"
	});
	 
	request14.done(function( msg4 ) {
		$('#searchhoteldiv').html(msg4);
	});
		 
	request14.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
});
$("#searchporuwano").click(function(){
	var idd5 = $('#searchporuwa').val();
	var request125 = $.ajax({
		url: "Searchporuwadata.php",
		method: "POST",
		data: { id5: idd5 },
		dataType: "html"
	});
	 
	request125.done(function( msg4 ) {
		$('#searchporuwadiv').html(msg4);
	});
		 
	request125.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
});

$("#searchsettyno").click(function(){
	var idd6 = $('#searchsetty').val();
	var request16 = $.ajax({
		url: "Searchsettydata.php",
		method: "POST",
		data: { id6: idd6 },
		dataType: "html"
	});
		 
	request16.done(function( msg4 ) {
		$('#searchsettydiv').html(msg4);
	});
	 
	request16.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
});

//Remove
$("#bOA2").click(function(){
	var idd13 = $('#c_Rbill').val();
	var request23 = $.ajax({
		url: "removeOrder.php",
		method: "POST",
		data: { id13: idd13 },
		dataType: "html"
	});
		 
	request23.done(function( msg4 ) {
		$('#removeOrder').html(msg4);
	});
	 
	request23.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
});

/*$(document).ready(function(){
	$("#Updatebtn").click(function(){
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

	});
});*/