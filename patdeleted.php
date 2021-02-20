<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hms');

$userid=$_POST['userid'];

if (isset($_POST['userid']))
{
	$query="DELETE FROM pattable WHERE userid='$userid'";
	$data=mysqli_query($con,$query);
	
    

if($data)
{
	
	echo"<script>window.alert('RECORD IS DELETED FROM DATABASE')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/patientdelete.php">
	<?php
}
else
{
 echo"<script>window.alert('FAILED TO DELETED THE RECORD FROM DATABASE')</script>";	
}
}
?>