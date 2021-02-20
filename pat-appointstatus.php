<?php

$con=mysqli_connect('localhost','root','','hms');
 $Sno = (isset($_POST['SNo']) ? $_POST['SNo'] : 'error');
if(isset($_POST['cancel']))
{
	$reg="update  appointment set userstatus='0' where sno='$Sno'";
    $data=mysqli_query($con,$reg);
  if($data)
{
	
	echo"<script>window.alert('Your Appointment Has Been Successfully Canceled')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/pat-appointdetails.php">
	<?php

}
else
{
 echo"<script>window.alert('Failed to Cancel Your Appointment ')</script>";
 ?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/pat-appointdetails.php">
	<?php

}
	
}
?>