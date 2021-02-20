<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hms');

$docid=$_POST['docid'];

if (isset($_POST['docid']))
{
	$query="DELETE FROM doctable WHERE docid='$docid'";
	$data=mysqli_query($con,$query);
	
if($data)
{
	
	echo"<script>window.alert('RECORD IS DELETED FROM DATABASE')</script>";
?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/doctordelete.php">
	<?php
}
else
{
 echo"<script>window.alert('FAILED TO DELETED THE RECORD FROM DATABASE')</script>";	
}
}
?>