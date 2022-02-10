<?php
/*		 
Author:Keith Davidson 00252500
Date: March 2021
Purpose: Amend/View Customer 
*/
  include '../../Group/db.inc.php'; 

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amenddob']));//to match date format in database

$sql = "UPDATE Customer SET FirstName = '$_POST[amendfirstname]',
        LastName = '$_POST[amendlastname]',Address = '$_POST[amendaddress]',DOB = '$dbDate',Guarantor = '$_POST[amendguarantor]',PhoneNum = '$_POST[amendphone]',Occupation = '$_POST[amendoccupation]',Salary = '$_POST[amendsalary]',Email = '$_POST[amendemail]'
         WHERE CustomerID = '$_POST[amendid]'";

if(!mysqli_query($con,$sql))
{
    echo "Error " . mysql_error();
}        
else
{
    if(mysqli_affected_rows($con) != 0)
    {
        echo mysqli_affected_rows($con) . " record(s) updated <br>";
        echo "Customer ID " . $_POST['amendid'] . ", " . $_POST['amendfirstname'] . " " . $_POST['amendlastname'] . " has been updated";
    }
    else
    {
        echo "No records changed";
    }
     
}
mysqli_close($con);
?>
<form action="AmendViewCustomer.html.php" method="POST">
<input type="submit" value="Return to Previos Screen">
</form>