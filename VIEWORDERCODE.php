















	    			<div id="orderv1">
						<input type="Date" name="ovdate" id="ovdate"><input type="submit" name="ovdate1submit" id="ovdate1submit">
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
							$("#ovdate1submit").click(function(){
								$('#orderv1,#orderv2').show();
    							$('#orderv3').hide();
							});
						});
					</script>
					<div id="orderv2" style="display: none;">
						<form action="#" method="POST">
							<input type="checkbox" name="ch1"><input type="checkbox" name="ch2"><input type="checkbox" name="ch3">
							<input type="checkbox" name="ch4"><input type="checkbox" name="ch5"><input type="checkbox" name="ch6">
							<input type="checkbox" name="ch7"><input type="checkbox" name="ch8"><input type="checkbox" name="ch9">
							<input type="checkbox" name="ch10"><input type="checkbox" name="ch11"><input type="checkbox" name="ch12">
							<input type="checkbox" name="ch13"><input type="checkbox" name="ch14"><input type="checkbox" name="ch15">
							<input type="checkbox" name="ch16"><input type="checkbox" name="ch17"><input type="checkbox" name="ch18">
							<input type="checkbox" name="ch19"><input type="checkbox" name="ch20"><input type="checkbox" name="ch21">
							<input type="checkbox" name="ch22"><input type="checkbox" name="ch23"><input type="checkbox" name="ch24">
							<input type="checkbox" name="ch25"><input type="checkbox" name="ch26"><input type="checkbox" name="ch27">
							<input type="checkbox" name="ch28"><input type="checkbox" name="ch29"><input type="checkbox" name="ch30">
						</form>
					</div>
					<div id="orderv3" style="display: none;">
						
					</div>