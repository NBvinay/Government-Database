<?php
   $con = mysqli_connect("localhost", "root", "", "govtdb");

  if(mysqli_connect_errno()) 
  {
    echo "Failed to connect: " . mysqli_connect_errno();
  }

  if(isset($_SESSION['userLoggedIn'])) 
  {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  }
  else
  {
    // route back user to the registration page
    // header("Location: register.php");
  }

  if(isset($_POST['submit']))
  {
      $adharNumber = $_POST['adharNumber'];
      $companyName = $_POST['companyName'];
      $job = $_POST['job'];
      $salary = $_POST['salary'];
      $doj = $_POST['doj'];
	  $status = $_POST['status'];
	  $dor = $_POST['dor'];
      $flag = 1;
 
        
        if (!($companyName== NULL || $job== NULL || $salary== NULL || $doj== NULL ||$status== NULL ||$dor== NULL || $adharNumber==NULL))
        {
         
          // Nigga Change acc to db
		  //mysqli_query($con , "INSERT INTO `employment_details` (`Aadhar Number`, `Company Name`, `Job`, `Salary`, `Date_of_joining`, `Status`, `Date of resignation/retirement`) VALUES ('$adharNumber', '$companyName', '$job', '$salary', '$doj', '$status', '$dor');");
          $flag = 0;
          
        }
        
        
      
      if($flag == 1)
      {
        echo "Please enter all the vehicle details correctly";
      }
      $flag = 1;

    
  }
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Insert Employment Details </title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button"><h2>Insert Data</h2></a>
  <a href="updateVehicle.php" class="w3-bar-item w3-button"><h2>Update Data</h2></a>
  <a href="DeleteVehicle.php" class="w3-bar-item w3-button"><h2>Delete Data</h2></a>
</div>

<!-- Page Content -->
<div>
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_open()">☰  Menu</button>
</div>


<div class="form">
      
      
      
      <div class="tab-content">   
          <h1><b><b><div style="color:white;">Insert Employment Details</div></b></b></h1>
          
          <form action="/" method="post">

                <div class="field-wrap">
                      <label>
                            Aadhar Number<span class="req">*</span>
                      </label>
                  <input type="text"required autocomplete="off" name="adharNumber"/>
                </div>
				
				
				
				<div class="field-wrap">
                                  <label>
                                        Company Name<span class="req">*</span>
                                  </label>
                              <input type="text"required autocomplete="off" name="companyName"/>
                </div>



                
                

                <div class="input_fields_wrap">    
                   <div>

                         <div class="field-wrap">
                              <label>
                                     Job<span class="req">*</span>
                              </label>
                              <input type="text"required autocomplete="off" name="job"/>
                        </div>
                        
                              

                                  
                        <div class="field-wrap">
                              <label>
                                   Salary<span class="req">*</span>
                              </label>
                              <input type="Number"required autocomplete="off" name="salary"/>
                        </div>
                      
                      
                      <div class="field-wrap">
                                <label>
                                       Date of Joining(YYYY/MM/DD)<span class="req">*</span>
                                </label>
                            <input type="text"required autocomplete="off" name="doj"/>


                      </div>
					  
					  <div class="field-wrap">
                              <label>
                                   Status<span class="req">*</span>
                              </label>
                              <input type="text"required autocomplete="off" name="status"/>
                        </div>
                    
					<div class="field-wrap">
                              <label>
                                   Date of Resignation/Retirement(YYYY/MM/DD)<span class="req"></span>
                              </label>
                              <input type="text"required autocomplete="off" name="dor"/>
                        </div>
                    </div>
                </div>
            
                
                <button type="submit" class="button button-block"/>Submit Details</button>




          </form>

        </div>
      </div>
        <script>

</script>
        
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>




</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js">  </script>
    
  
<script>
  $(document).ready(function() 
  {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
  
  
   $(add_button).click(function(e)
   { //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
  
         //text box increment
            $(wrapper).append('<div><button class="remove_field" style="background-color:#ff5230;"><b><b> -</b></b></button><div class="field-wrap"><input type="text"required autocomplete="off" placeholder=" 2/4 wheeler ?"/> </div> <div class="field-wrap"><input type="text"required autocomplete="off" placeholder= "Registration Number"/> </div> <div class="field-wrap"><input type="text"required autocomplete="off" placeholder=" Insurance Number"/> <br><br><br></div> </div> '); //add input box
            x++; 
    }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
       
    e.preventDefault(); 
    $(this).parent('div').remove(); 
    x--;
    })
});
  
</script>



<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
