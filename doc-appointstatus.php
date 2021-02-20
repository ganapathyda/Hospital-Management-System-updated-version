<?php 
session_start();
$con=mysqli_connect('localhost','root','','hms');
 $Sno = (isset($_POST['SNo']) ? $_POST['SNo'] : 'error');
//$name=$_SESSION['name'];

if(isset($_POST['accept']))
{
       $query="UPDATE appointment SET action =true WHERE sno='$Sno'";
       echo "<script>window.alert('Appointment Accepted')</script>";
	   ?>
	   <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/doc-appointdetails.php">
	   <?php

   }
  if(isset($_POST['reject']))
   { 
       $query="UPDATE appointment SET doctorstatus =false WHERE sno='$Sno'";
        echo "<script>window.alert('Appointment Rejected')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/docappointdetails.php">
		<?php
   }
  

mysqli_query($con,$query);
?>