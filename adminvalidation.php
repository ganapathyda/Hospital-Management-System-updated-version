<?php
if(isset($_POST['submit']))
{
	
	$userid = $_POST['userid'];
	$password = $_POST['password'];

		if($userid=='admin' && $password=='admin@123')
		{
		   header('location:adminsignin.html');
		}
	    else
		{
			header('location:loginfail.html');
		}
}
		 
?>