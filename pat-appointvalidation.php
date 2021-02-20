<?php

session_start(); 
$user=$_SESSION['userid'];
$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'hms');



if(isset($_POST['submit']))
{

$userid= $user;
$spec = $_POST['spec'];
$docid = $_POST['doc'];
$dis = $_POST['dis'];
$fees = $_POST['fees'];
$date = $_POST['date'];
$time = $_POST['time'];



$s = "select * from appointment";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);


    
    $reg="insert into appointment(userid,specialization,docid,disease,consultancyfees,appointmentdate,appointmenttime,userstatus,doctorstatus,action) values ('$userid','$spec','$docid','$dis','$fees','$date','$time','1','1','0')";
    mysqli_query($con,$reg);

	echo '<script>alert("Your Appointment successfull wait for the doctor responce")</script>';
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/pat-appointdetails.php">
	<?php
}
?>