<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hms');

$sno=$_POST['sno'];

if (isset($_POST['sno']))
{
	$query="DELETE FROM prescription WHERE sno='$sno'";
	$data=mysqli_query($con,$query);
	
if($data)
{
	echo"<script>window.alert('RECORD IS DELETED FROM DATABASE')</script>";
?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/doc-preslist.php">
	<?php
}
else
{
 echo"<script>window.alert('FAILED TO DELETED THE RECORD FROM DATABASE')</script>";	
}
}
?>