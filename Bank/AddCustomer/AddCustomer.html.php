  <!DOCTYPE html>
    <html>
        <head>
<!-----------		 
Author:Keith Davidson 00252500
Date: March 2021
Purpose: Add Customer 

--------------->
            <meta charset="UTF-8">
            <title>Add Customer</title>
			
           
         
            
     <link rel="stylesheet" href="../../Group/style.css">
      
    </head>
    <?php include '../../Group/db.inc.php'; ?>
	
  
      
        
    <body>
		
		<div id="main">
			<div class="formContainer">
        <h1>Register Customer</h1>
				
    <form name="form" action="customerInsert.php" method="post">
                 <fieldset>
					 <legend>Personal Details</legend> 
                    <div class="inputbox">
                        <label for="firstname">First Name : </label>
                        <input type="text" name="firstname" class="input" id="firstname" placeholder="firstname" required/>
                    </div>
                    <div class="inputbox">
                        <label for="lastname">Last Name : </label>
                        <input type="text" name="lastname" class="input" id="lastname" placeholder=" last name"required/>
                    </div>
                    <div class="inputbox">
                        <label for="address">Address: </label>
                        <input type="text" name="address" class="input" id="address" placeholder=" address "required/>
                    </div>
                    <div class="inputbox">
                        <label for="dob">Date of Birth :  </label>
                        <input type="date" name="dob" class="input" id="dob" placeholder="Date of Birth" required />
                    </div>
					 <div class="inputbox">
                        <label for="guarantor">Guarantor : </label>
                        <input type="text" name="guarantor" class="input" id="guarantor" placeholder=" Guarantor "/>
                    </div>	
                    <div class="inputbox">
                        <label for="phone">Phone Number:    Format xxx-xxx-xxxx</label>
                        <input type="tel" pattern="^\d{3}-\d{3}-\d{4}$" name="phone" class="input" id="phone"  placeholder=" Phone Number "/>
                    </div>
                    <div class="inputbox">
                        <label for="occupation">Occupation : </label>
                        <input type="text" name="occupation" class="input" id="occupation" placeholder=" Occupation "required/>
                    </div>
                    <div class="inputbox">
                        <label for="salary">Salary : </label>
                        <input type="text" name="salary" class="input" id="salary" placeholder=" Salary "required/>
                    </div>
                    <div class="inputbox">
                        <label for="email">E-mail: </label>
                        <input type="email" name="email" class="input" id="email1" oninput="setEmailConfirmValidity();" placeholder=" Email" required />
                    </div>
                    <div class="inputbox">
                        <label for="email">Confirm E-mail: </label>
                        <input type="email" name="email" class="input" id="email2" oninput="setEmailConfirmValidity();" placeholder=" Email"  required/>
                    </div>
                   
                    
                    
                    </fieldset>
                   
                    <input type="submit" value="Send Form"> 
                    <br/>
                    <input type="submit" value="Clear Form">
                    
                   
                    
                  </form>
				</div>
               </div>
                  <script>
                      function setEmailConfirmValidity(str) {
                        const email1 = document.getElementById('email1');
                        const email2 = document.getElementById('email2');
                
                        if (email1.value === email2.value) {
                            email2.setCustomValidity('');
                        } else {
                            email2.setCustomValidity('Emails must match');
                        }
                        console.log('email2 customError ', document.getElementById('email2').validity.customError);
                        console.log('email2 validationMessage ', document.getElementById('email2').validationMessage);
                    }
                  </script>
 			
    </body>
</html>