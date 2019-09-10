<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#c0392b">
    <p><div></div></p><img width="20%" src="uploads\logo1.PNG"/>
    <img height=auto width="59%" src="uploads\logo3.PNG"/><img heigth="40px"width="20%" src="uploads\vvitlogo.png"/></div></p>
	<div id="main-wrapper" height="60%">
		<img width="40%" src="uploads\logo3.PNG"/>
		<form class="myform" action="show.php" method="post" >
		<label><b>Faculty Id:</b></label><br>
			<input name="fid" type="text" class="inputvalues" placeholder="your id" required/>
		<h3>Enter From And To Dates Of Leave</h3>
			<label><b>From Date:</b></label><br>
			<input name="fd" type="date" class="inputvalues" placeholder="from date" required/><br>
			<label><b>To Date:</b></label><br>
			<input name="td" type="date" class="inputvalues" placeholder="To date" required/><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Submit"/><br>
		</form>
		</div>
		<div id="main-wrapper" height="60%">
		<form class="myform" action="tt.php" method="post" >
		<label><b>Faculty Id:</b></label><br>
			<input name="fid" type="text" class="inputvalues" placeholder="Faculty id" required/>
			<input name="tt_btn" type="submit" id="signup_btn" value="Get Time Table"/><br>
		<br><br><a href="table.php",target="_blank">Enter your time table</a><br><br>
		<a href="register.php",target="_blank">New user? Register Here</a>
		</div>
</body>
</html>