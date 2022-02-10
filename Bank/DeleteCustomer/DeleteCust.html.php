<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Delete Customer</title>
  <!-----------
       Author: Keith Davidson 00252500
       Date: March 2021
		Purpose: Delete Customer
        -->          
             <link rel="stylesheet" href="../../Group/style.css">
			<script src="Delete.js"></script>
        </head>
        <body>

            

         
			 <?php include '../../Group/navBar.php'; ?>
    	
            
		<div id="main">
			<div class="formContainer">
			<h1>Delete Customer</h1>
            <h4>Please select a customer you wish to delete</h4>
				<input type="text" name="searchCust" class="input" id="searchCust" onkeyup="filterFunction()" placeholder="Search for A Customer">
			<?php include 'listBox.php'; ?>
					
            <?php
						if(ISSET($_SESSION["CustomerID"])){ echo "<h1 class='myMessage' style='color:red;'>Record deleted for " .
						$_SESSION["FirstName"] . " " . $_SESSION["LastName"] . "</h1>" ; }
						session_destroy();
                    ?>
			
			
            <form name="myForm" action="DeleteCustomer.php" onsubmit="return confirmCheck()" method="post">
                    <fieldset>
                        <legend>Personal Details</legend>
                    <div class="inputbox">
                        <label for="delid">Customer ID : </label>
                        <input type="text" name="delid" class="input" id="delid" placeholder="Customer Number"  readonly>
                    </div>   
                    <div class="inputbox">
                        <label for="delfirstname">First Name : </label>
                        <input type="text" name="delfirstname" class="input" id="delfirstname" placeholder="FirstName" readonly>
                    </div>
                    <div class="inputbox">
                        <label for="dellastname">Last Name : </label>
                        <input type="text" name="dellastname" class="input" id="dellastname" placeholder="LastName" readonly>
                    </div>
					<div class="inputbox">
                        <label for="deladdress">Address : </label>
                        <input type="text" name="deladdress" class="input" id="deladdress" placeholder="Address" readonly>
                    </div>	
                    <div class="inputbox">
                        <label for="amenddob">Date of Birth :  </label>
                        <input type="date" name="deldob" class="input" id="deldob" placeholder="Date Of Birth" readonly>
                    </div>
					
                    <div class="inputbox">
                        <label for="phone">Phone: </label>
                        <input type="tel" pattern="(?:([0-9]{3})|\d{3}[- ]?\d{3}[- ]?\d{4}" name="delphone" placeholder="Phone Number" class="input" id="delphone" readonly>
                    </div>
                    <div class="inputbox">
                        <label for="deloccupation">Occupation : </label>
                        <input type="text" name="deloccupation" class="input" id="deloccupation" placeholder="Occupation" readonly>
                    </div>
                   
                    <input type="submit" id="submit1" value="Delete Records"> 
                   
                    
                   
                    </fieldset>
                  </form> 
				
				</div>
			</div>
 
            
        </body>
    </html>
