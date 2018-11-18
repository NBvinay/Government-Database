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

    if(mysqli_connect_errno()) 
    {
      echo "Failed to connect: " . mysqli_connect_errno();
    }

  
    if(isset($_POST['submit']))
    {
        $adharNumber = $_POST['adharNumber'];
        $katha = $_POST['ppt_katha'];
        $regNo = $_POST['ppt_regNo'];
        $area = $_POST['ppt_area'];
        $amount = $_POST['amount'];
        $postalAddress = $_POST['ppt_postalAddress'];
        
        $flag = 1;
        
        foreach ($katha as $key => $value) 
        { 
        	
          // $count = $count +1;
          if (!($katha[$key]== NULL ||  $area[$key]== NULL || $postalAddress[$key]== NULL || $regNo[$key]==NULL  ||  $amount[$key]== NULL)) 
          {
            $test = 10;
          
  		      mysqli_query($con , "INSERT INTO `property_details`(`Aadhar Number`, `ppt_regNo`, `Katha`, `Area`, `Postal Address`, `Amount`,`PropertyTax`) VALUES ('$adharNumber','$regNo[$key]', '$katha[$key]', '$area[$key]', '$postalAddress[$key]','$amount[$key]',0);");
            $tax_val_ref = mysqli_query($con , "SELECT `Value%` from tax_ref where Area='$area[$key]' ");

            $row=mysqli_fetch_row($tax_val_ref);
            if(!$row)
            {
              ?>
                <script >alert("enter proper area");</script>
              <?php
            }
            
            // echo "$row[0]";
            mysqli_query($con,"CALL PropTax('$adharNumber','$katha[$key]','$amount[$key]','$row[0]');");
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
  <title>Insert Property Details </title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">





   
<body>







   

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button"><h2>Insert Data</h2></a>
  <a href="updateProperty.php" class="w3-bar-item w3-button"><h2>Update Data</h2></a>
  <a href="propertyDelete.php" class="w3-bar-item w3-button"><h2>Delete Data</h2></a>
   <a href="/DigiLibrary/adminLogin.php" class="w3-bar-item w3-button"><h2>Log Out</h2></a>

</div>

<!-- Page Content -->
<div>
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_open()">☰  Menu</button>
</div>


<div class="form">
      

      <div class="tab-content">   
          <h1><b><b><div style="color:white;">Insert Property Details</div></b></b></h1>
          
          <form action="index.php" method="POST">

                <div class="field-wrap">
                      <label>
                            Aadhar Number<span class="req">*</span>
                      </label>
                  <input type="text"required autocomplete="off" name="adharNumber" />
                </div>

                <div class="input_fields_wrap">    
                   <div>
     
				<button class="add_field_button" style="border-radius: 35%;background-color: #35e8b7; height: 35px "><b><b> +</b></b></button>
                                  
                        <div class="field-wrap">
                              <label>
                                   Katha<span class="req">*</span>
                              </label>
                              <input type="text"required autocomplete="off" id="katha[]" name="ppt_katha[]" />
                        </div>

                        <div class="field-wrap">
                                  <label>
                                         Registration Number<span class="req">*</span>
                                  </label>
                              <input type="text"required autocomplete="off"  name="ppt_regNo[]" />
                        </div>
                      
                      <div class="field-wrap">
                                  <label>

                                         Area<span class="req">*</span>
                                  </label>
                              <input type="text"required autocomplete="off"  name="ppt_area[]" />
                        </div>

                      <div class="field-wrap">
                                <label>
                                       Postal Address<span class="req">*</span>
                                </label>
                            <input type="text"required autocomplete="off" name="ppt_postalAddress[]" />

                      </div>

                      <div class="field-wrap">
                                <label>
                                       Property Value<span class="req">*</span>
                                </label>
                            <input type="text"required autocomplete="off" name="amount[]" />

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
            $(wrapper).append('<div><button class="remove_field" style="background-color:#ff5230;"><b><b> -</b></b></button><div class="field-wrap"><input type="text"required autocomplete="off" placeholder=" Katha" name="ppt_katha[]"/> </div> <div class="field-wrap"><input type="text"required autocomplete="off"  name="ppt_regNo[]" placeholder="Registration Number" />  </div><div class="field-wrap"><input type="text"required autocomplete="off" placeholder= "Area" name="ppt_area[]"/> </div> <div class="field-wrap"><input type="text"required autocomplete="off" placeholder=" Postal Address" name="ppt_postalAddress[]"/></div><div class="field-wrap"><label>Property Value<span class="req">*</span></label><input type="Number"required autocomplete="off" name="amount[]" /></div> <br><br><br></div> </div> '); //add input box
            x++; 
    }
    });
   
    $(wrapper).on("click",".remove_field", function(e)
    { //user click on remove text
       
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