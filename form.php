<?php include("connection.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type ="text/css" href="style.css">
<title>PHP CRUD OPERATIONS</title>
</head>
<body>
<div class ="container">
	<div class "title">
	    Registration form
	</div>
	<div class ="form">
  	  <div class ="input_field">
		<label>First Name</label>
		<input type="text" class ="input">
	  </div>
	  <div class ="input_field">
		<label>Last Name</label>
		<input type="text" class ="input">
	  </div>
	  <div class ="input_field">
		<label>Password</label>
		<input type="text" class ="input">
	  </div>
	  <div class ="input_field">
		<label>Gender</label>
		<div class ="custom_select">
			<select>
				<option>Select</option>
				<option>Male</option>
				<option>Female</option>
			</select>
		</div>
	  </div>
	  <div class ="input_field">
		<label>Email Address</label>
		<input type="text" class ="input">
	  </div>
	  <div class ="input_field">
		<label>Phone Number</label>
		<input type="text" class ="input">
	  </div>
	  <div class ="input_field">
		<label>Address</label>
		<textarea class="textarea"></textarea>
	  </div>
	  <!-- <div class="input_field terms">
	  	<label class="check"> <input type="checkbox">
	  		<span class ="checkmark"></span>
	  	</label>
	  	<p>Agree to terms and conditions</p> -->
	  <!-- </div> -->
	  <div class ="input_field">
		<input type="submit" value="Register" class ="btn">
	  </div>
	</div>
</div>
</body>
</html>
<?php 
if($_SERVER)["REQUEST_METHOD"]=="POST"){
	$data=$_REQUEST['First Name'];
	if()
}
