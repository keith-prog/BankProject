				
				
/*----------------This Function Populates The Text Fields of The Form--------------------*/
function populate()
{
    var sel = document.getElementById("listbox");
    var result;
    result = sel.options[sel.selectedIndex].value;
    var personalDetails = result.split('|')
   
    document.getElementById("delid").value=personalDetails[0];
    document.getElementById("delfirstname").value=personalDetails[1];
    document.getElementById("dellastname").value=personalDetails[2];
    document.getElementById("deladdress").value=personalDetails[3];
    document.getElementById("deldob").value=personalDetails[4];
    
     document.getElementById("delphone").value=personalDetails[5];
    document.getElementById("deloccupation").value=personalDetails[6];
    
    
}

/*------------------------This Function Confirm Changes and Locks Text Fields From Change------------*/
function confirmCheck()
{
    var response;
    response = confirm('Are you sure you want to Delete This Customer?');
    if(response)
    {
        document.getElementById("delid").disabled = false;
        document.getElementById("delfirstname").disabled = false;
        document.getElementById("dellastname").disabled = false;
         document.getElementById("deladdress").disabled = false;
        document.getElementById("deldob").disabled = false;			
     document.getElementById("delphone").disabled = false;
    document.getElementById("deloccupation").disabled = false;

        
        return true;
    }
    else
    {
        populate();
        toggleLock();
        return false;
    }
}
            /*This Function Fills in Select Customer/Account Text Field When the First Few Letters match That of any existing Customers, Referenced from  https://www.w3schools.com/howto/howto_js_filter_lists.asp
            */

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
