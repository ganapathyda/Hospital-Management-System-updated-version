<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hms');

$sno=$_POST['Sno'];

if (isset($_POST['Sno']))
{
	$query="DELETE FROM appointment WHERE sno='$sno'";
	$data=mysqli_query($con,$query);
	
if($data)
{
	
	echo"<script>window.alert('RECORD IS DELETED FROM DATABASE')</script>";
?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/appointmentdetails.php">
	<?php
}
else
{
 echo"<script>window.alert('FAILED TO DELETED THE RECORD FROM DATABASE')</script>";	
 ?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/appointmentdetails.php">
	<?php
 
}
}
?>