<?php
session_start();
$user=$_SESSION['userid'];
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `appointment` WHERE userid='$user' AND CONCAT( `sno`, `userid`, `docid`, `specialization`, `disease`, `appointmentdate`, `appointmenttime`, `consultancyfees`, `userstatus`, `doctorstatus`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `appointment` where userid='$user' ";
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
    <h1 style="color:#009879;">YOUR APPOINTMENT DETAILS</h1><br>
	
	<form action="" method="POST" autocomplete="off"> 
        <div class="search-box">
            <input class="search-txt" type="text" name="valueToSearch" placeholder="Value To Search">
            <input class="search-btn" type="submit"  name="search" value="SEARCH">
        </div>
<br>
   <table class="content-table table">
        <thead>
        <tr>
        <th>USER ID</th>   
        <th>SPECIALIZATION</th>   
        <th>DOCTOR ID</th>   
        <th>DISEASE</th>   
        <th>APPOINTMENT DATE</th>   
        <th>APPOINTMENT TIME</th>   
        <th>CONSULTANCY FEES</th>   
        <th>YOUR STATUS</th>      
        <th>ACTION</th>   
        </tr>
		</thead>
	</form>
 <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
       
        <tr>
            
            <td><?php echo $row['userid'] ?></td>
            <td><?php echo $row['specialization'] ?></td>
            <td><?php echo $row['docid'] ?></td>
            <td><?php echo $row['disease'] ?></td>
            <td><?php echo $row['appointmentdate'] ?></td>
            <td><?php echo $row['appointmenttime'] ?></td>
            <td><?php echo $row['consultancyfees'] ?></td>
			<td> 
		<?php
		           if(($row['userstatus']==1) && ($row['doctorstatus']==1) && ($row['action']==0))  
                    {
                      echo "Active";
					  
                    }
					 if(($row['userstatus']==1) && ($row['doctorstatus']==1) && ($row['action']==1))  
                    {
                      echo "Your Appointment accepted <br>wait for the Presciption";
					  
                    }
                    if(($row['userstatus']==0) && ($row['doctorstatus']==1)&& ($row['action']==0))  
                    {
                      echo "Cancelled by Yourself";
                    }

                    if(($row['userstatus']==1) && ($row['doctorstatus']==0)&&($row['action']==0))  
                    {
                      echo "Cancelled By the Doctor";
                    }
					
                      ?> 
        </td>
		
			<td>
			 <form method="POST" action="pat-appointstatus.php">
			 <input type='hidden' name='SNo' value="<?php echo $row['sno'] ?>"/>
			 <?php
			 if(($row['userstatus']==1) && ($row['doctorstatus']==1)&& ($row['action']==0))  
                    {
                        echo "<input class='btn btn-danger' type='submit' name='cancel' onclick='return checkcancel()' value='Cancel'/>";
					}
					?>
			</form>
            </td>
		
			</tr>
         
		

<?php endwhile;?>
        </table>
		        <script>
	function checkcancel(){
		return confirm('Are You Sure You Want Cancel Your Appointment');
	}
	</script>
</body>
</html>