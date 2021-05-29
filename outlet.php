

<!DOCTYPE html>
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<h2>Outlet Locater</h2>

		<form>
			<label>Outlet Name:</label>
			<input type="text" id="outname" name="outname"><br><br>
			<label>Outlet Address:</label>
			<input type="text" id="address" name="address"><br><br>
			<label>Outlet No. Phone:</label>
			<input type="text" id="phone" name="phone"><br><br>
			<input type="submit" onclick="outlet_function();return false;" value="Submit">
		</form>

		<script>
		function outlet_function(){
			var outname = document.getElementById("outname").value;
			var address = document.getElementById("address").value;
			var phone = document.getElementById("phone").value;

			$.ajax({
				type: "POST",
				url: "ajax_outlet.php",
				data: {
					'outname' : outname,
					'address' : address,
				'phone' : phone},
				dataType: "text",
				success: function(data){
					if(data == 'success'){
						alert("add success");
						location.href = "outlet.php";
						}else if(data == 'fail'){
						alert("fail");
					}
				}
			});
			return false;
		}
	</script>
</body>
</html>
