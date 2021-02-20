<?php

session_start();

header('locaion:sighup.html');
    
$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'hms');

$fullname= $_POST['fullname'];
$userid= $_POST['userid'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$password = $_POST['password'];
$cpassword=$_POST['cpassword'];
$gender = $_POST['gender'];
if($password != $cpassword){
  echo "<script>alert('password is mismatching.... please re-enter your password ');</script>";
  	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/signup.html">
      <?php
}
else{
$s = "select * from pattable where userid='$userid'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1)
{
   
	echo '<script>alert("username already taken")</script>';
		?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/signup.html">
      <?php
}
else
{
    $reg="insert into pattable(fullname,userid,email,phoneno, password,gender) values ('$fullname','$userid','$email','$phoneno','$password','$gender')";
    mysqli_query($con,$reg);
	echo '<script>alert("registration successfull")</script>';
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/hms-hospital/signin.html">
      <?php
}
}

?>