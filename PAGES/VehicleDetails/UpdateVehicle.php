<?php

include("../../includes/config.php");
   
  $_SESSION['adminLoggedIn'] = 'property';


   $con = mysqli_connect("localhost", "root", "", "govtdb");
  if(mysqli_connect_errno()) 
  {
    echo "Failed to connect: " . mysqli_connect_errno();
  }
 
  if(isset($_POST['submit']))
  {
      $adharNumber = $_POST['adharNumber'];
      $regNo = $_POST['regNo'];
	  $insNo = $_POST['insNo'];
	  
       
        
        if (!( $insNo== NULL || $adharNumber==NULL || $regNo==NULL))
        {
         
          // Nigga Change acc to db
		  $res=mysqli_query($con ,"UPDATE `vehicle_details` SET `Insurance Number` = '$insNo' WHERE `Aadhar Number`= '$adharNumber' AND `Registration Number`= '$regNo';");
          $flag = 0;
          
        }
          
        
      
      if($flag == 1 || !$res)
      {
        echo "Please enter all the details correctly";
      }
      $flag = 1;
    
  }
?>



<!DOCTYPE html>
<html>
<title>Update Vehicle Details  </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Update Vehicle Details </title>
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
  <a href="/DigiLibrary/adminLogin.php" class="w3-bar-item w3-button"><h2>Log Out</h2></a>
</div>

<!-- Page Content -->
<div>
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_open()">☰  Menu</button>
</div>



  <div class="form">
      
      
      
      <div class="tab-content">   
          <h1><b><b><div style="color:white;">Update Vehicle Details</div></b></b></h1>
          
          <form action="updateVehicle.php" method="post">

                <div class="field-wrap">
                      <label>
                            Aadhar Number<span class="req">*</span>
                      </label>
                  <input type="text"required autocomplete="off" name="adharNumber" />
                </div>



                <!-- <button class="add_field_button" style="border-radius: 35%;background-color: #35e8b7; height: 35px "><b><b> +</b></b></button> -->
                

                <div class="input_fields_wrap">    
                   <div>

                         
                              

                                  
                        <div class="field-wrap">
                              <label>
                                   Registration Number<span class="req">*</span>
                              </label>
                              <input type="text"required autocomplete="off" name="regNo" />
                        </div>
                      
                     
                      <div class="field-wrap">
                                <label>
                                       Insurance Number<span class="req">*</span>
                                </label>
                            <input type="text"required autocomplete="off" name="insNo" />


                      </div>
                    
                    </div>
                </div>
              <button type="submit" class="button button-block" name="submit" />Update Details</button>
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
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
     
</body>
</html> 
