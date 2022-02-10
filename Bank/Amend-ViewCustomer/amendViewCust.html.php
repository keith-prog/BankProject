<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Amend/View Customer</title>
  <!-----------
       Author: Keith Davidson 00252500
       Date: March 2021
		Purpose: Amend/View Customer
        -->          
             <link rel="stylesheet" href="../../Group/style.css">
        </head>
        <body>

            

         
			 <?php include '../../Group/navBar.php'; ?>
    	
            
		<div id="main">
			<div class="formContainer">
			<h1>Amend/View a Person</h1>
            <h4>Please select a person then click the amend button if you wish to update</h4>
				<input type="text" name="searchCust" class="input" id="searchCust" onkeyup="filterFunction()" placeholder="Search for A Customer">
			<?php include 'listBox.php'; ?>
					<script>
                function populate()
                {
                    var sel = document.getElementById("listbox");
                    var result;
                    result = sel.options[sel.selectedIndex].value;
                    var personalDetails = result.split('|')
                   
                    document.getElementById("amendid").value=personalDetails[0];
                    document.getElementById("amendfirstname").value=personalDetails[1];
                    document.getElementById("amendlastname").value=personalDetails[2];
					document.getElementById("amendaddress").value=personalDetails[3];
                    document.getElementById("amenddob").value=personalDetails[4];
					 document.getElementById("amendguarantor").value=personalDetails[5];
					 document.getElementById("amendphone").value=personalDetails[6];
					document.getElementById("amendoccupation").value=personalDetails[7];
					document.getElementById("amendsalary").value=personalDetails[8];
					document.getElementById("amendemail").value=personalDetails[9];
					
                }
                function toggleLock()
                {
                    if(document.getElementById("amendViewbutton").value == "Amend Details")
                    {
                        document.getElementById("amendfirstname").disabled = false;
                        document.getElementById("amendlastname").disabled = false;
						document.getElementById("amendaddress").disabled = false;
                        document.getElementById("amenddob").disabled = false;
						document.getElementById("amendguarantor").disabled = false;
					 document.getElementById("amendphone").disabled = false;
					document.getElementById("amendoccupation").disabled = false;
					document.getElementById("amendsalary").disabled = false;
						document.getElementById("amendemail").disabled = false;
                        document.getElementById("amendViewbutton").value = "View Details";
                    }
                    else
                    {
                        document.getElementById("amendfirstname").disabled = true; 
                        document.getElementById("amendlastname").disabled = true;
						document.getElementById("amendaddress").disabled = true;
                        document.getElementById("amenddob").disabled = true;
						document.getElementById("amendguarantor").disabled = true;
					 document.getElementById("amendphone").disabled = true;
					document.getElementById("amendoccupation").disabled = true;
					document.getElementById("amendsalary").disabled = true;
						document.getElementById("amendemail").disabled = true;
                        document.getElementById("amendViewbutton").value = "Amend Details";
                    }
                }
                function confirmCheck()
                {
                    var response;
                    response = confirm('Are you sure you want to save these changes?');
                    if(response)
                    {
                        document.getElementById("amendid").disabled = false;
                        document.getElementById("amendfirstname").disabled = false;
                        document.getElementById("amendlastname").disabled = false;
						 document.getElementById("amendaddress").disabled = false;
                        document.getElementById("amenddob").disabled = false;
						document.getElementById("amendguarantor").disabled = false;
					 document.getElementById("amendphone").disabled = false;
					document.getElementById("amendoccupation").disabled = false;
					document.getElementById("amendsalary").disabled = false;
					document.getElementById("amendemail").disabled = false;	
						
                        return true;
                    }
                    else
                    {
                        populate();
                        toggleLock();
                        return false;
                    }
                }
						/*This Function Fills in Select Customer/Account Text Field When the First Few Letters match That of any existing Customers*/
function filterFunction() {
					var input, filter,list;
					input = document.getElementById('searchCust');
					filter = input.value.toUpperCase();
					 list = document.getElementsByTagName('option');
					 
					for (i = 0; i < list.length; i++) {
					  txtValue = list[i].textContent || list[i].innertext;
					  if (txtValue.toUpperCase().indexOf(filter) > -1) {
						list[i].style.display = "";
					  } else {
						list[i].style.display = "none";
					  }
					}
				 }	 
  
            </script>
            <p id="display"></p>
			
            <input type="button" value="Amend Details" id="amendViewbutton" onclick="toggleLock()">
			
            <form name="myForm" action="AmendViewCustomer.php" onsubmit="return confirmCheck()" method="post">
                    <fieldset>
                        <legend>Personal Details</legend>
                    <div class="inputbox">
                        <label for="amendid">Customer ID : </label>
                        <input type="text" name="amendid" class="input" id="amendid"  disabled>
                    </div>   
                    <div class="inputbox">
                        <label for="amendfirstname">First Name : </label>
                        <input type="text" name="amendfirstname" class="input" id="amendfirstname" placeholder="FirstName" disabled>
                    </div>
                    <div class="inputbox">
                        <label for="amendlastname">Last Name : </label>
                        <input type="text" name="amendlastname" class="input" id="amendlastname" placeholder="LastName" disabled>
                    </div>
					<div class="inputbox">
                        <label for="address">Address : </label>
                        <input type="text" name="amendaddress" class="input" id="amendaddress" placeholder="Address" disabled>
                    </div>	
                    <div class="inputbox">
                        <label for="amenddob">Date of Birth :  </label>
                        <input type="date" name="amenddob" class="input" id="amenddob" placeholder="Date Of Birth" disabled>
                    </div>
					<div class="inputbox">
                        <label for="guarantor">Guarantor : </label>
                        <input type="text" name="amendguarantor" class="input" id="amendguarantor"  placeholder="Guarantor" disabled>
                    </div>	
                    <div class="inputbox">
                        <label for="phone">Phone: </label>
                        <input type="tel" pattern="(?:([0-9]{3})|\d{3}[- ]?\d{3}[- ]?\d{4}" name="amendphone" placeholder="Phone Number" class="input" id="amendphone" disabled>
                    </div>
                    <div class="inputbox">
                        <label for="occupation">Occupation : </label>
                        <input type="text" name="amendoccupation" class="input" id="amendoccupation" placeholder="Occupation" disabled>
                    </div>
                    <div class="inputbox">
                        <label for="salary">Salary : </label>
                        <input type="text" name="amendsalary" class="input" id="amendsalary" placeholder="Salary"  disabled>
                    </div>
                    <div class="inputbox">
                        <label for="email">E-mail: </label>
                        <input type="email" name="amendemail" class="input" id="amendemail" placeholder="Email"  disabled >
                    </div>
                     </fieldset>
                   
                    <input type="submit" value="Upate Records"> 
                   
                    
                   
                    
                  </form> 
				</div>
			</div>
 
            
        </body>
    </html>
