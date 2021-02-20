<?php

$conn= mysqli_connect("localhost", "root", "","hms");
if (!$conn) {
	exit("Sorry, Connection error..");
}

$val= $_GET["value"];

$val_M = mysqli_real_escape_string($conn, $val);

$sql="SELECT docid FROM doctable WHERE specilaization='$val_M'";
$result= mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {

	echo "<select style='padding: 14px 0;margin: 5px 0;border-left: 0;border-top:0;border-right: 0;border-bottom: 1px solid #999;outline: none; background: transparent;width:280px;'name='doc'>";
        echo "<option style='width:280px;' disabled selected>--SELECT DOCTORS--</option>";
	while ($rows= mysqli_fetch_assoc($result)) {
	echo "<option style='width:280px;'  >".$rows["docid"]."</option>";
	}
	
	echo "</select>";
	
} else {
	echo "<select style='padding: 14px 0;margin: 5px 0;border-left: 0;border-top:0;border-right: 0;border-bottom: 1px solid #999;outline: none; 
	background: transparent;width:280px;'>
			<option style='width:280px;'>--NO DOCTORS--</option>
		</select>";
}


?>



