<?php
session_start(); 
$user=$_SESSION['userid'];
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
        body{
            background-color: #009879;
            margin:0;
	        padding:0;
	        font-family: sans-serif;
        }
        .signup-menu{
            background-color:#009879;
            height:100%;
            width:100%;
        }
        .signup-formbox{
            font-family: sans-serif;
            height: 720px;
            width: 430px;
            position: relative;
            margin: 6% auto;
            background: #fff;
            padding: 5px;
            border-radius: 20px;
            box-shadow: 0 0 20px 9px #ff61241f;
        }

        #signup-btn{
            top:0;
            left:0;
            position: absolute;
            width: 100px;
            height:100%;
            background: linear-gradient(to right,#009879,#32CD32);
            border-radius:30px;
            transition: .5s;
        }
        .signup-input-group{
            top:100px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .signup-input-field{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-left: 0;
            border-top:0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none; 
            background: transparent;
        }
        .signup-submit-btn{
            width: 85%;
            padding: 5px 30px;
            cursor: pointer;
            display: block;
            margin:auto;
            background: linear-gradient(to right,#009879,#32CD32);
            border: 0;
            outline: none;
            border-radius: 30px;
        }
        .signup-avatar{
            width:110px;
		    height:110px;
		    border-radius:50%;
		    position:absolute;
		    top:-55px;
		    left:160px;
        }
        .signup-form-header{
            color:#009879;
            font-size:40px;
            font-weight: bold;
            margin-top:40px;
        }

        h1{
            font-family: sans-serif;
            color:#009FFD;
        }

        #register1{
            left: 60px;
        }
        .eye{
            position: absolute;	
            margin-top: 10px;
            margin-left:270px;
            cursor:pointer;
        }
        #hide1{
            display: none;
        }
        #hide3{
            display:none;
        }
        h1{
            font-family: sans-serif;
            color: #009FFD;
        }

    </style>
</head>
<body>
    <!-- Back Navigation -->
  	<nav class="navbar navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="patsignin.php"><i class="fas fa-backward"></i> Back</a>
    </nav>

        
    <div class="signup-menu">
		<div class="signup-formbox">
		    <center>
                <img src="assets/images&gif/others/book.png" class="signup-avatar">
                <h1 class="signup-form-header">APPOINTMENT</h1>
            </center>
		
            <form action="pat-appointvalidation.php" name="myform" method="post" id="register1" class="signup-input-group" autocomplete="off">
                <input type="text" name="userid" class="signup-input-field" value="<?php echo $user;?>" readonly />

                    <select name="spec" id="spec" class="signup-input-field"  onchange="myFunction(); my_fun(this.value);">
                            <option value="" disabled selected>--Select Specialization--</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="Orthopedic">Orthopedic</option>
                            <option value="Neurology">Neurology</option>
                            <option value="Physiotheraphy">Physiotheraphy</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Emergency">Emergency</option>
                    </select>
                        
                    <script  type="text/javascript" charset="utf-8" async defer>
                        function my_fun(str) {
                            console.log(str);
                            if (window.XMLHttpRequest) {
                                xmlhttp = new XMLHttpRequest();
                            }
                            else
                            {
                                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange= function(){
                            if (this.readyState==4 && this.status==200) {
                                document.getElementById('doctid').innerHTML = this.responseText;
                            }
                            }
                            xmlhttp.open("GET","helper.php?value="+str, true);
                            xmlhttp.send();

                        }
                </script><br>
                <div id="doctid">
                    <select  name="doc" class="signup-input-field">
                        <option value="" disabled selected>--Select Doctor--</option>
                    </select>
                </div>
                <input class="signup-input-field"  type="text" name="dis" placeholder="Disease(No.of.days)" required>
                <p style="font-family:sans-serif;font-size:12px;">Fees</p>
                <script>
                    function myFunction() {
                        var x = document.getElementById("spec");
                        var display=x.options[x.selectedIndex].value;
                        switch(display)
                        {
                            case 'Dermatology':
                                document.getElementById("fees").value='Rs 1000/-'; 
                                break ;
                            case 'Orthopedic':
                                document.getElementById('fees').value='Rs 1200/-';
                                break;
                            case 'Neurology':
                                document.getElementById('fees').value='Rs 1500/-';
                                break;
                            case 'Physiotheraphy':
                                document.getElementById('fees').value='Rs 2000/-';
                                break;
                            case 'Cardiology':
                                document.getElementById('fees').value='Rs 2000/-';
                                break;
                            case 'Emergency':
                                document.getElementById('fees').value='Rs 500/-';
                                break;
                        }
                        }
            </script>
            <input class="signup-input-field"  id="fees" name="fees"  type="text" readonly>
            <br><br>
            <p style="font-family:sans-serif;font-size:12px;">Appointment-date</p>
            <input class="signup-input-field" id="myinput1" name="date"  type="date" placeholder="Appointment-date" onchange="validatedate()" required>
            <br><br>
          
            <p style="font-family:sans-serif;font-size:12px;">Appointment-time</p>
            <select name="time" class="signup-input-field" id="apptime" required>
                <option value="" disabled selected>--Select Time--</option>
                <optgroup label="Dermatology">
                <option value="08:00:00">8:00 AM</option>
                <option value="10:00:00">10:00 AM</option>
                <option value="12:00:00"disabled>12:00 PM</option>
                <option value="14:00:00"disabled>2:00 PM</option>
                <option value="16:00:00">4:00 PM</option>
                </optgroup>
                <optgroup label="Orthopedic">
                <option value="08:00:00">8:00 AM</option>
                <option value="10:00:00">10:00 AM</option>
                <option value="12:00:00">12:00 PM</option>
                <option value="14:00:00"disabled>2:00 PM</option>
                <option value="16:00:00"disabled>4:00 PM</option>
                </optgroup>
                <optgroup label="Neurology">
                <option value="08:00:00"disabled>8:00 AM</option>
                <option value="10:00:00"disabled>10:00 AM</option>
                <option value="12:00:00"disabled>12:00 PM</option>
                <option value="14:00:00">2:00 PM</option>
                <option value="16:00:00">4:00 PM</option>
                </optgroup>
                <optgroup label="Physiotheraphy">
                <option value="08:00:00">8:00 AM</option>
                <option value="10:00:00">10:00 AM</option>
                <option value="12:00:00"disabled>12:00 PM</option>
                <option value="14:00:00"disabled>2:00 PM</option>
                <option value="16:00:00"disabled>4:00 PM</option>
                </optgroup>
                <optgroup label="Cardiology">
                <option value="08:00:00">8:00 AM</option>
                <option value="10:00:00"disabled>10:00 AM</option>
                <option value="12:00:00"disabled>12:00 PM</option>
                <option value="14:00:00"disabled>2:00 PM</option>
                <option value="16:00:00">4:00 PM</option>
                </optgroup>
                <optgroup label="Emergency">
                <option value="08:00:00">8:00 AM</option>
                <option value="10:00:00">10:00 AM</option>
                <option value="12:00:00">12:00 PM</option>
                <option value="14:00:00">2:00 PM</option>
                <option value="16:00:00">4:00 PM</option>
                </optgroup>
            </select><br><br><br>

            <center><button type="submit" name="submit" style="outline:none;"class="signup-submit-btn">Book</button></center>
       </form>
    </div>
</div>
    <script>
    function validatedate(){    
        today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //As January is 0.
        var yy = today.getFullYear();
        var  e = document.getElementById('myinput1');
        var  dateformat = e.value.split('-');
        var  cin=dateformat[2];
        var  cinmonth=dateformat[1];
        var  cinyear=dateformat[0];
        if (yy==cinyear && mm==cinmonth && dd<=cin) { 
            
        return true;

        }
        else if(mm<cinmonth ){
            return true;
        }
        else if(yy<cinyear){
            return true;
        }
        else {    
        alert("Please select valid appointment date from today");
        e.value ='';
        }    
    }
    </script>
</body>
</html>