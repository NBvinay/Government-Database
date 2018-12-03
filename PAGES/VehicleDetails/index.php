<?php

include("../../includes/config.php");
  
    // session_destroy(); 

    if(isset($_SESSION['adminLoggedIn'])) 
    {

      $userLoggedIn = $_SESSION['adminLoggedIn'];
      // echo $userLoggedIn;
    }
    else
    {
      // route back user to the registration page
      header("Location:/DigiLibrary/adminLogin.php");
    }
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
      $wheelCount = $_POST['wheelCount'];
      $DL_no = $_POST['DL_no'];
      $reg_no = $_POST['reg_no'];
      $ins_no = $_POST['ins_no'];
      $flag = 1;

      foreach ($DL_no as $key => $value) 
      { 
        // $count = $count +1;
        if (!($wheelCount[$key]== NULL || $DL_no[$key]== NULL || $reg_no[$key]== NULL || $ins_no[$key]== NULL || $adharNumber==NULL))
        {
         
          mysqli_query($con , "INSERT INTO `vehicle_details` (`Aadhar Number`, `WheelNumber`, `Registration Number`, `DL Number`, `Insurance Number`) VALUES ('$adharNumber', '$wheelCount[$key]', '$reg_no[$key]', '$DL_no[$key]', '$ins_no[$key]');");
          $flag = 0;
          
        }
        
        
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
  <title>Insert Vehicle Details </title>
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
          <h1><b><b><div style="color:white;">Insert Vehicle Details</div></b></b></h1>
          
          <form action="index.php" method="POST">

                <div class="field-wrap">
                      <label>
                            Aadhar Number<span class="req">*</span>
                      </label>
                  <input type="text"required autocomplete="off" name="adharNumber" />
                </div>



                <button class="add_field_button" style="border-radius: 35%;background-color: #35e8b7; height: 35px "><b><b> +</b></b></button>
                

                <div class="input_fields_wrap">    
                   <div>

                         <div class="field-wrap">
                              <label>
                                     2/4 wheeler ?<span class="req">*</span>
                              </label>
                              <input type="text" required autocomplete="off" name="wheelCount[]" />
                        </div>
                        
                              

                                  
                        <div class="field-wrap">
                              <label>
                                   Registration Number<span class="req">*</span>
                              </label>
                              <input type="text"required autocomplete="off" name="reg_no[]" />
                        </div>
                      
                      <div class="field-wrap">
                                  <label>
                                         DL Number<span class="req">*</span>
                                  </label>
                              <input type="text"required autocomplete="off" id="DL_no[]" name="DL_no[]" />
                        </div>
                      <div class="field-wrap">
                                <label>
                                       Insurance Number<span class="req">*</span>
                                </label>
                            <input type="text"required autocomplete="off" name="ins_no[]" />


                      </div>
                    
                    </div>
                </div>
            
               
                <button type="submit" class="button button-block" id="submit" name="submit"/>Submit Details</button>




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
            $(wrapper).append('<div><button class="remove_field" style="background-color:#ff5230;"><b><b> -</b></b></button><div class="field-wrap"><input type="text"required autocomplete="off" placeholder=" 2/4 wheeler ?" name="wheelCount[]"/> </div> <div class="field-wrap"><input type="text"required autocomplete="off" placeholder= "Registration Number" name="reg_no[]"/> </div> <div class="field-wrap">         <input type="text"required autocomplete="off" placeholder=" DL Number" name="DL_no[]"/></div><input type="text"required autocomplete="off" placeholder=" Insurance Number" name="ins_no[]"/> <br><br><br></div> </div> '); //add input box
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
