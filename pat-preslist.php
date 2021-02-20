<?php
session_start();
$userid=$_SESSION['userid'];
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `prescription` WHERE userid='$userid' AND CONCAT( `sno`, `docid`, `userid`, `disease`, `medicine`, `meet`, `message`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `prescription` where userid='$userid' ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "hms");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

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
</head>
<body>
     <!-- Back Navigation -->
	<nav class="navbar navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="patsignin.php"><i class="fas fa-backward"></i> Back</a>
    </nav>
    <h1 style="color:#009879;">PRESCRIPTION DETAILS</h1><br>
	
	<form action="" method="POST" autocomplete="off"> 
        <div class="search-box">
            <input class="search-txt" type="text" name="valueToSearch" placeholder="Value To Search">
            <input class="search-btn" type="submit"  name="search" value="SEARCH">
        </div>
</form>
   <table class="content-table table">
        <thead>
        <tr>   
        <th>FULLNAME</th>    
        <th>USERID</th>    
        <th>DOCTORID</th>    
        <th>DISEASE</th>   
        <th>MEDICINE</th>   
        <th>MEETING</th>   
        <th>CURE</th>     
        <th>FEES</th>     
        <th>PAYMENTSTATUS</th>     
        <th>ACTION</th>     
        </tr>
		</thead>
	
 <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
       
        <tr>
            
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['userid'] ?></td>
            <td><?php echo $row['docid'] ?></td>
            <td><?php echo $row['disease'] ?></td>
            <td><?php echo $row['medicine'] ?></td>
            <td><?php echo $row['meet'] ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['cfees'] ?></td>
			<td>
			<?php
			 if(($row['status']==1))  {
				 echo "Paid";
			 }
			 else {
				 echo "Pending";
			 }
			 ?>
			</td>
			<td>
			   <form method="POST" action='pdf.php'>
			   <input type='hidden' name='fullname' value='<?php echo $row['fullname'] ?>'/>
			   <input type='hidden' name='userid' value='<?php echo $row['userid'] ?>'/>
			   <input type='hidden' name='gen' value='<?php echo $row['gender'] ?>'/>
			   <input type='hidden' name='mobile' value='<?php echo $row['mobile'] ?>'/>
			   <input type='hidden' name='appointdate' value='<?php echo $row['adate'] ?>'/>
			   <input type='hidden' name='appointtime' value='<?php echo $row['atime'] ?>'/>
			   <input type='hidden' name='mail' value='<?php echo $row['mailid'] ?>'/>
			   <input type='hidden' name='docid' value='<?php echo $row['docid'] ?>'/>
			   <input type='hidden' name='disease' value='<?php echo $row['disease'] ?>'/>
			   <input type='hidden' name='medicine' value='<?php echo $row['medicine'] ?>'/>
			   <input type='hidden' name='message' value='<?php echo $row['message'] ?>'/>
			   <input type='hidden' name='meeting' value='<?php echo $row['meet'] ?>'/>
			   <input type='hidden' name='fees' value='<?php echo $row['cfees'] ?>'/>
			        <?php
					if(($row['status']==1))  {
                        echo "<input id='btn' class='btn btn-primary' type='submit' style='outline:none' name='pay'  value='Download Prescription' onclick='return genereatepdf();'/>";
			 }?>
			 </form>
			   <form method="POST" action='paybill.php'>
			   <input type='hidden' name='SNo' value='<?php echo $row['sno'] ?>'/>
			 <?php
					 if(($row['status']==0))  {
                        echo "<input class='btn btn-primary' type='submit' style='outline:none' name='pay'  value='Pay Bill' onclick='return bill();'/>";
        		    }
					?>
				</form>
			</td>
	    </tr>
         
		

<?php endwhile;?>
        </table>
		<script>
		function genereatepdf(){
			return confirm('Are You Sure You Want To Download The Prescription');
		}
		function bill(){
			return confirm('Are You Sure You Want To Pay The Bill');
		}

		</script>
</body>
</html>