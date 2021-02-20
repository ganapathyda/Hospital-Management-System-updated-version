<?php
session_start(); 
$docid=$_SESSION['docid'];
$userid = $_POST['id'] ;
$mail = $_POST['mail'] ;
$mobile = $_POST['no'] ;
$appointmentdate = $_POST['appointmentdate'] ;
$appointmenttime = $_POST['appointmenttime'] ;
$fullname = $_POST['name'] ;
$dis =  $_POST['di'];
$gen =  $_POST['gen'];
$fees=$_POST['cfees'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Care</title>

    <!-- Title icon -->
    <link rel="icon" href="assets/images&gif/others/logo.jpg">

    <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@700&display=swap" rel="stylesheet">    
    <!--Css Stylesheets-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/tables.css">
    <!--FontAwesome-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
    *{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family:sans-serif;
  }
  section{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #009879;
  }
  section .container{
    position: relative;
    min-width: 1100px;
    min-height: 650px;
    display: flex;
    z-index: 1000;
  }
  section .container .form
  {
    position: absolute;
    padding: 70px 50px;
    background: #fff;
    margin-left: 100px;
    padding-left: 50px;
    width: calc(100% - 150px);
    height: 100%;
    box-shadow: 0 50px 50px rgba(0,0,0,1.5);
    border-radius: 30px;
  }
  section .container .form h2{
    color: #0f3959;
    font-size: 24px;
    font-weight: 500;
  }
  section .container .form .formbox
  {
    position: relative;	
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    padding-top: 30px;
  }
  section .container .form .formbox .inputbox{
    position: relative;
    margin: 0 0 35px 0;
  }
  section .container .form .formbox .inputbox.w50{
    width: 47%;
  }
  section .container .form .formbox .inputbox.w100{
    width: 100%;
  }
  section .container .form .formbox .inputbox input,
  section .container .form .formbox .inputbox textarea{
    width: 100% !important;
    padding: 5px 0;
    resize: none;
    font-size: 18px;
    font-weight: 300;
    color: #333;
    border: none;
    border-bottom: 1px solid #777;
    outline: none;
  }
  section .container .form .formbox .inputbox textarea{
    min-height: 120px;
  }
  section .container .form .formbox .inputbox span{
    position: absolute;
    left: 0;
    padding: 5px 0;
    font-size: 18px;
    font-weight: 300;
    color: #333;
    transition: 0.3%;
    pointer-events: none;
  }
  section .container .form .formbox .inputbox input:focus ~ span,
  section .container .form .formbox .inputbox textarea:focus ~ span,
  section .container .form .formbox .inputbox input:valid ~ span,
  section .container .form .formbox .inputbox textarea:valid ~ span{
    transform: translateY(-20px);
    font-size: 12px;
    font-weight: 400;
    letter-spacing: 1px;
    color:#ff568c;
  }
  section .container .form .formbox .inputbox input[type="submit"]
  {
    border-radius: 30px;
    position: absolute;
    cursor: pointer;
    background: #009879;
    color:#fff;
    border: none;
    max-width: 150px;
    padding: 12px;
  }
  section .container .form .formbox .inputbox input[type="submit"]:hover{
    background:#ff568c;
  }
    </style>
    

</head>
<body>
     <!-- Back Navigation -->
	<nav class="navbar navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="doc-appointdetails.php"><i class="fas fa-backward"></i> Back</a>
    </nav>
    <section>
	<div class="container"> 
		<form action="prescription.php" method="post" autocomplete="off">
		<input type='hidden' name='fname' value='<?php echo $fullname; ?>'/>
		    <input type='hidden' name='mail' value='<?php echo $mail; ?>'/>
		    <input type='hidden' name='mobile' value='<?php echo $mobile; ?>'/>
		    <input type='hidden' name='adate' value='<?php echo $appointmentdate; ?>'/>
		    <input type='hidden' name='atime' value='<?php echo $appointmenttime; ?>'/>
		    <input type='hidden' name='cfees' value='<?php echo $fees; ?>'/>
		<div class="form">
		<h2 style="color:#009879;font-family:sofia;">Send The Prescription</h2>
			<div class="formbox">
			<div class="inputbox w50">
				<input type="text" name="docid" value="<?php echo $docid;?>" readonly>
				
			</div>
			<div class="inputbox w50">
				<input type="text" name="userid" value="<?php echo $userid;?>" readonly>
			</div>
			<div class="inputbox w50">
				<input type="text" name="disease" value="<?php echo $dis;?>" readonly>
			</div>
			<div class="inputbox w50">
				<input type="text" name="gender" value="<?php echo $gen;?>" readonly>
			</div>
			<div class="inputbox w50">
				<input type="text" name="medicine" required>
				<span>Medicine</span>
			</div>
			<div class="inputbox w50">
				<input type="text" name="meet" required>
				<span>Patient Need To Meet You Or Not</span>
			</div>
			<div class="inputbox w50">
				<input type="text" name="cfees" value="<?php echo $fees;?>" readonly>
			</div>
			<div class="inputbox w100">
				<textarea name="message" required></textarea>
				<span>Enter The Cure Here.....</span>
			</div>
			<div class="inputbox w50">
				<input type="submit" name="submit" value="Send">
			</div>
			</div>
		</div>
		</form>
		</div>
		</section>

</body>
</html>