<?php
/*		 
Author:Keith Davidson 00252500
Date: March 2021
Purpose: Delete Customer
*/
include '../../Group/db.inc.php';


/*Queries To The Database*/

$sqlLoanAccounts = "SELECT * FROM  LoanAccount inner join Customer on Customer.CustomerID = LoanAccount.CustomerID where LoanAccount.deleted= 0";
$sqlCurrentAccounts = "SELECT * FROM CurrentAccount  inner join Customer on Customer.CustomerID = CurrentAccount.CustomerID where CurrentAccount.deleted = 0";
$sqlDepositAccounts = "SELECT * FROM DepositAccount inner join Customer on Customer.CustomerID = DepositAccount.CustomerID where DepositAccount.deleted = 0";
$sqlCustomers = "SELECT * FROM Customer WHERE DeletedFlag = 0";
$resultsLoan = mysqli_query($con,$sqlLoanAccounts);
$resultsCurrentAccount = mysqli_query($con,$sqlCurrentAccounts);
$resutltsDepositAccount = mysqli_query($con,$sqlDepositAccounts);
$resultCustomer = mysqli_query($con,$sqlCustomers);

$count=0;


echo "<br><select size=2  name='listbox[]' id='listbox'   onclick='populate()' class='input'>";

echo "<option>Select Account..</option>";
while ($row = mysqli_fetch_array($resultsLoan)) {
	$accountNum = $row['AccountNo'];
    $customerNum = $row['CustomerID'];
	
	 $fname=$row['FirstName'];
    $sname=$row['LastName'];
	$address=$row['Address'];
	 $dateofBirth=$row['DOB'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
	$phone=$row['PhoneNum'];
	$occ=$row['Occupation'];
	$accType=$row['AccountType'];
	$beforeBalance = $row['Balance'];
	$count++;
    $allText= "$customerNum|$fname|$sname|$address|$dob|$phone|$occ|$accType|$beforeBalance";
	echo "<option display='none'  class='custLodge' id='details' value = '$allText'>$fname $sname - $accountNum </option>";
}


while ($row = mysqli_fetch_array($resultsCurrentAccount)) {
	$accountNum = $row['AccountNo'];
    $customerNum = $row['CustomerID'];
	 $fname=$row['FirstName'];
    $sname=$row['LastName'];
	$address=$row['Address'];
	 $dateofBirth=$row['DOB'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
	$phone=$row['PhoneNum'];
	$occ=$row['Occupation'];
	$accType = $row['AccountType'];
	$beforeBalance = $row['Balance'];
	$count++;
	 $allText= "$customerNum|$fname|$sname|$address|$dob|$phone|$occ|$accType|$beforeBalance";
	echo "<option display='none' class='custLodge'  id='details' value = '$allText'> $fname $sname - $accountNum  </option>";
}
while ($row = mysqli_fetch_array($resutltsDepositAccount)) {
	$accountNum = $row['AccountNo'];
    $customerNum = $row['CustomerID'];
	 $fname=$row['FirstName'];
    $sname=$row['LastName'];
	$address=$row['Address'];
	 $dateofBirth=$row['DOB'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
	$phone=$row['PhoneNum'];
	$occ=$row['Occupation'];
	$accType = $row['AccountType'];
	$beforeBalance = $row['Balance'];
	$count++;
    $allText= "$customerNum|$fname|$sname|$address|$dob|$phone|$occ|$accType|$beforeBalance";
	echo "<option display='none' class='custLodge'  id='details' value = '$allText'> $fname $sname - $accountNum </option>";
}
while ($row = mysqli_fetch_array($resultCustomer)) {
	
    $customerNum = $row['CustomerID'];
	 $fname=$row['FirstName'];
    $sname=$row['LastName'];
	$address=$row['Address'];
	 $dateofBirth=$row['DOB'];
    $dob = date_create($row['dob']);
    $dob = date_format($dob,"Y-m-d");
	$phone=$row['PhoneNum'];
	
	 $allText= "$customerNum|$fname|$sname|$address|$dob|$phone|$occ";
	echo "<option display='none' class='custLodge'  id='details' value = '$allText'> $fname $sname </option>";
}
echo count;
echo "</select>";
mysqli_close($con);
?>
