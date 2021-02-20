<?php 
session_start();
$con=mysqli_connect('localhost','root','','hms');
 $Sno = (isset($_POST['SNo']) ? $_POST['SNo'] : 'error');
//$name=$_SESSION['name'];

if(isset($_POST['pay']))
{
       $query="UPDATE prescription SET status =true WHERE sno='$Sno'";
       echo "<script>window.alert('Payment Successfull')</script>";
	   ?>
	   <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/pat-preslist.php">
	   <?php

   }
 else
   { 
       $query="UPDATE prescription SET status =false WHERE sno='$Sno'";
        echo "<script>window.alert('Payment Failed')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/pat-preslist.php">
		<?php
   }
  

mysqli_query($con,$query);
?>