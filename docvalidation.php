<?php

session_start();


    
$con=mysqli_connect('localhost','root','');

mysqli_select_db($con,'hms');

$docid = $_POST['docid'];
$docpassword = $_POST['docpassword'];

$s = "select * from  doctable where docid='$docid' && password='$docpassword'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1)
{
    $_SESSION['docid']=$docid;
    header('location:docsignin.php');
}
else
{
    header('location:loginfail.html');
}


?>