<?php
/*		 
Author:Keith Davidson 00252500
Date: March 2021
Purpose: Admend/view Customer 
*/

include '../../Group/db.inc.php';

$sql = "SELECT * FROM Customer where DeletedFlag = 0";

if(!$result = mysqli_query($con,$sql))
{
    die('Error in quering the database' . mysqli_error($con));
}

echo "<br><select size=2 name='listbox[]' id='listbox'  onclick='populate()' class='input'>";

while ($row = mysqli_fetch_array($result))
{
    $id=$row['CustomerID'];
    $fname=$row['FirstName'];
    $sname=$row['LastName'];
	$address=$row['Address'];
    $dateofBirth=$row['DOB'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
	$guarantor=$row['Guarantor'];
	$phone=$row['PhoneNum'];
	$occ=$row['Occupation'];
	$salary=$row['Salary'];
	$email=$row['Email'];
	
    $allText =" $id|$fname|$sname|$address|$dob|$guarantor|$phone|$occ|$salary|$email";
    echo "<option value = '$allText'>$id - $fname $sname</option>";
}
echo "</select>";
mysqli_close($con);

?>