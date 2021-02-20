<?php

session_start();


    
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'hms');

$docid= $_POST['docid'];
$userid= $_POST['userid'];
$fname= $_POST['fname'];
$mail= $_POST['mail'];
$mobile= $_POST['mobile'];
$adate= $_POST['adate'];
$atime= $_POST['atime'];
$gender = $_POST['gender'];
$disease = $_POST['disease'];
$medicine = $_POST['medicine'];
$meet = $_POST['meet'];
$message = $_POST['message'];
$cfees = $_POST['cfees'];



$s = "select * from prescription";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if(isset($_POST['submit']))
{
    $reg="insert into prescription(docid,userid,fullname,mailid,mobile,adate,atime,gender,cfees,disease,medicine,meet,message,status) values ('$docid','$userid','$fname','$mail','$mobile','$adate','$atime','$gender','$cfees','$disease','$medicine','$meet','$message','0')";
    mysqli_query($con,$reg);
	echo "<script>window.alert('Prescription Successfully Sended')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/doc-preslist.php">
      <?php
	  
}
?>