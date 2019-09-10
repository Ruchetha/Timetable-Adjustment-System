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
			if(isset( $_POST['submit_btn'])){
			$fid=$_POST['fid'];
			$query="select * from fileuploadtable where id='$fid'";
			$run=mysqli_query($con,$query);
			if(mysqli_num_rows($run)>0){
			$slot="";
			$fdate=$_POST['fd'];
			$tdate=$_POST['td'];
			$fday = date('w', strtotime($fdate));
			$tday= date('w', strtotime($tdate));
			$date1 =strtotime($fdate);
			$date2 = strtotime($tdate);
			$days  = (($date2-$date1)/86400)+1;
			//if($days>6){$days=$days-intdiv($days,7);}
			$img="select target_file from fileuploadtable where id=$fid";
			$query=mysqli_query($con,$img);
			$image= mysqli_fetch_array($query,MYSQLI_NUM);
?>
			<div id="main-wrapper">
			<?php echo "<img  class='avatar' src='".$image[0]."'>";?>
			<br>your id   <?php echo $fid?>
			<br>you are taking <?php echo $days?>days of leave <br>
			<br>From <?php echo $fdate ." To ". $tdate?><br>
			</div>
<?php
			for( $i=0;$i<$days;$i++)
			{
				echo "<tr>";
				//if($fday=='0'){$fday++;}	
				if($fday=='7'){ $fday=0;}
				echo "<td>" .   Date("l",mktime(0,0,0,0,$fday-2,0)) . "</td>";
				
				$check="select UPPER(first) from ftt where id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$first="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and first='0' and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]') )";
				$first_run = mysqli_query($con,$first);
				while($row = mysqli_fetch_array($first_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot ."</td>";
				$slot="";}else{echo "<td>no class</td>";}
			
				$check="select UPPER(second) from ftt where id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$second="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and second='0' and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')  )";
				$second_run = mysqli_query($con,$second);
				while($row = mysqli_fetch_array($second_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot . "</td>";
				$slot="";}else{echo "<td>no class</td>";}
				
				$check="select UPPER(third) from ftt where  id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$third="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and third='0' and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')  )";
				$third_run = mysqli_query($con,$third);
				while($row = mysqli_fetch_array($third_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot. "</td>";
				$slot="";}
				else{echo "<td>no class</td>";}
				
				$check="select UPPER(fourth) from ftt where id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$fourth="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and fourth='0'  and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')   )";
				$fourth_run = mysqli_query($con,$fourth);
				while($row = mysqli_fetch_array($fourth_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot . "</td>";
				$slot="";}else{echo "<td>no class</td>";}
				
				$check="select UPPER(fifth) from ftt where id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$fifth="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and fifth='0'  and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')  )";
				$fifth_run = mysqli_query($con,$fifth);
				while($row = mysqli_fetch_array($fifth_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot . "</td>";
				$slot="";}else{echo "<td>no class</td>";}
				
				$check="select UPPER(sixth) from ftt where  id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$sixth="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and sixth='0'  and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')  )";
				$sixth_run = mysqli_query($con,$sixth);
				while($row = mysqli_fetch_array($sixth_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot . "</td>";
				$slot="";}else{echo "<td>no class</td>";}
				
				$check="select UPPER(seventh) from ftt where  id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$seventh="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and seventh='0'  and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')  )";
				$seventh_run = mysqli_query($con,$seventh);
				while($row = mysqli_fetch_array($seventh_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot . "</td>";
				$slot="";}else{echo "<td>no class</td>";}
				
				$check="select UPPER(eighth) from ftt where id='$fid' and day='$fday'";
				$ac=mysqli_query($con,$check);
				$class=mysqli_fetch_array($ac,MYSQLI_NUM);
				if(stristr($class[0],'LAB')){echo "<td>LAB</td>";}else if($class[0]!=0){
				$eighth="select id,username from fileuploadtable where id in (select id from ftt where id!='$fid' and day='$fday' and eighth='0' and id in (select fid from class where UPPER(c1)='$class[0]' or UPPER(c2)='$class[0]' or UPPER(c3)='$class[0]' or UPPER(c4)='$class[0]')   )";
				$eighth_run = mysqli_query($con,$eighth);
				while($row = mysqli_fetch_array($eighth_run,MYSQLI_NUM)){
				$slot.=$row[1].", ";}
				echo "<td>" . $slot . "</td>";
				$slot="";}else{echo "<td>no class</td>";}
				//echo $fday;
				$fday++;
						}
			 echo "</tr>";
	echo "</table>";
			}
			}
			?>			
</body>
</html>