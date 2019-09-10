<?php
	require 'dbconfig/config.php';
?>
<html>
<head>
<style>
table
{
border-style:solid;
border-width:2px;
border-color:pink;
}
</style>
<link rel="stylesheet" href="css/style.css">
</head>
<body bgcolor="#EEFDEF">
<div id="main-wrapper" height="60%">
<table border="1" width="80%" height="30%" align="center">
<tr  align="center">
<th>day</th>
<th>first</th>
<th>second</th>
<th>third</th>
<th>fourth</th>
<th>fifth</th>
<th>sixth</th>
<th>seventh</th>
<th>eighth</th>
</tr>
<?php
			if(isset( $_POST['tt_btn'])){
			$fid=$_POST['fid'];
			$row="select  * from ftt where id='$fid'";
			$ac=mysqli_query($con,$row);
			$img="select target_file from fileuploadtable where id=$fid";
			$query=mysqli_query($con,$img);
			$image= mysqli_fetch_array($query,MYSQLI_NUM);
			echo "<h3>Id  " .$fid."</h3> ";
		    echo "<img  class='avatar' src='".$image[0]."'>";
			echo "<h1> Time Table</h1>";
			echo "<tr>";
			while($class=mysqli_fetch_array($ac,MYSQLI_NUM)){
				echo "<td>" .   Date("l",mktime(0,0,0,0,$class[0]-2,0)) . "</td>";
			for($i=2;$i<10;$i++){
			echo "<td>" . $class[$i] ."</td>";	
			}
			echo "</tr>";
			}
			echo "</table><br></div>";
			}
?>
</body>
</html>	