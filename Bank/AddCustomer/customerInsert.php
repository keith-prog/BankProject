<?php
/*		 
Author:Keith Davidson 00252500
Date: March 2021
Purpose: Add Customer 
*/
include '../../Group/db.inc.php';
date_default_timezone_set("UTC");
echo "The details sent down are : <br>";


echo "First Name is : " . $_POST['firstname'] . "<br>";
echo "Surname is : " . $_POST['lastname'] . "<br>";
echo "Address is : " . $_POST['address'] . "<br>";

$date = date_create($_POST['dob']);

echo "Date of Birth is : " . date_format($date,"d/m/Y") . "<br>";
echo "Phone Number is : " . $_POST['phone'] . "<br>";
echo "Occupation is : " . $_POST['occupation'] . "<br>";
echo "Salary is : " . $_POST['salary'] . "<br>";
echo "Email address is : " . $_POST['email'] . "<br>";

        // Get  Maxcustomerid and create largestCustomerID
        //create newCustomerID with largestCustomerID + 1
        $sql = "select MAX(CustomerID) as 'largestCustomerID' from Customer";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$newCustomerID = $row['largestCustomerID'] + 1;

$sql = "INSERT INTO `Customer`(`CustomerID`,`FirstName`, `LastName`,`Address`, `DOB`,`Guarantor`,`PhoneNum`,`Occupation`,`Salary`,`Email`) VALUES ('$newCustomerID','$_POST[firstname]','
$_POST[lastname]',' $_POST[address]',' $_POST[dob]',' $_POST[guarantor]','$_POST[phone]',' $_POST[occupation]',' $_POST[salary]','$_POST[email]')";

 if(!mysqli_query($con,$sql))
 {
     die("An Error in the SQL Query : " . mysqli_error($con));
 }
 echo "<br> A record has been added for " . $_POST['firstname'] . " " . $_POST['lastname'] . ". Customer ID : " . $newCustomerID;
  mysqli_close($con);
  ?>
  <form action="AddCustomer.html.php" method="POST">
      <br>
      <input type="submit" value="Return to insert Page/">
</form>    