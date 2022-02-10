<?php
session_start();
/*		 
Author:Keith Davidson 00252500
Date: March 2021
Purpose: Delete Customer 
*/
  include '../../Group/db.inc.php'; 

date_default_timezone_set('UTC');
$dbDate = date("Y-m-d", strtotime($_POST['amenddob']));//to match date format in database

/*----counter to check for Query returns-----------*/
$dontDelete = 0;
/*-----------------------Query Account Tables for Customers with Accounts --------------------*/
$sql = "select * from LoanAccount WHERE deleted = 0 and `CustomerID`= '$_POST[delid]'";
$sql_2 = "select * from CurrentAccount WHERE deleted = 0 and `CustomerID`= '$_POST[delid]'";
$sql_3 = "select * from DepositAccount WHERE deleted = 0 and `CustomerID`= '$_POST[delid]'";

if(!$result = mysqli_query($con,$sql))
{
    die('Error in quering the database' . mysqli_error($con));
}
elseif($result = mysqli_query($con,$sql))
{
	$num_rows = mysqli_num_rows($result);
	if ($num_rows > 0)
	{
		$dontDelete++;
	}
}

if(!$result_2 = mysqli_query($con,$sql_2))
{
    die('Error in quering the database 2' . mysqli_error($con));
}
elseif($result_2 = mysqli_query($con,$sql_2))
{
	$num_rows = mysqli_num_rows($result_2);
	if ($num_rows > 0)
	{
		$dontDelete++;
	}
}

if(!$result_3 = mysqli_query($con,$sql_3))
{
    die('Error in quering the database' . mysqli_error($con));
}
elseif($result_3 = mysqli_query($con,$sql_3))
{
	$num_rows = mysqli_num_rows($result_3);
	if ($num_rows > 0)
	{
		$dontDelete++;
	}
}
/*---------------If $dontDelete is more than Zero Customer has Account and Should Not be Deleted-------*/
if($dontDelete > 0)
{
	
	echo "DONT DELETE CUSTOMER! They Have an Open Account!";
}
else
{
	// Set session variables
$_SESSION["CustomerID"] = $_POST['delid'];
$_SESSION["FirstName"] = $_POST['delfirstname'];
$_SESSION["LastName"] = $_POST['dellastname'];

	header('Location: DeleteCustomer.html.php');
	echo " CUSTOMER DELETED...........";
	
	$delCust = "update Customer set DeletedFlag = 1 where `CustomerID`= '$_POST[delid]'";

	if(!$result = mysqli_query($con,$delCust))
	{
    	die('Error in quering the database' . mysqli_error($con));
	}
}



mysqli_close ($con);

?>


<form action="DeleteCustomer.html.php" method="POST">
<input type="submit" value="Return to Previos Screen">
</form>


