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
      $doj1 = date("Y-m-d",strtotime($doj));
      $dor1 = date("Y-m-d",strtotime($dor));
      
         
 
        
        if (!($companyName== NULL || $job== NULL || $salary== NULL || $doj== NULL ||$status== NULL ||$dor== NULL || $adharNumber==NULL))
        {
         
          

		      $res=mysqli_query($con,"INSERT INTO `employment details` (`Aadhar Number`,`Company Name`,`Job`,`Salary`,`Date_of_joining`,`Status`,`Date of resignation/retirement`,`IncomeTax`) VALUES ('$adharNumber', '$companyName','$job', '$salary', '$doj1', '$status', '$dor1',0);");
          $flag = 0;
          mysqli_query($con,"CALL IncTax('$adharNumber','$salary');");
          
          
        }

        if(!$res)
        {
          echo "failed to insert";
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
  <a href="updateEmployee.php" class="w3-bar-item w3-button"><h2>Update Data</h2></a>
  <a href="DeleteEmployee.php" class="w3-bar-item w3-button"><h2>Delete Data</h2></a>
    <a href="/DigiLibrary/adminLogin.php" class="w3-bar-item w3-button"><h2>Log Out</h2></a>
</div>

<!-- Page Content -->
<div>
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_open()">☰  Menu</button>
</div>


<div class="form">
      
      
      
      <div class="tab-content">   
          <h1><b><b><div style="color:white;">Insert Employment Details</div></b></b></h1>
          
          <form action="index.php" method="POST">

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
                                  
                                        <div style="color: white"> Date of Joining:</div>
                                  
                              <input type="Date" required autocomplete="off" name="doj"/>


                        </div>
  					  
  					            <div class="field-wrap">
                                <label>
                                     Status<span class="req">*</span>
                                </label>
                                <input type="text"required autocomplete="off" name="status"/>
                          </div>
                      
  					             <div class="field-wrap">
                                <div style="color: white"> Date of Retirement:</div>
                                <input type="date"required autocomplete="off" name="dor"/>
                          </div>
                    </div>
                </div>
                <button type="submit" class="button button-block" name="submit" />Submit Details</button>
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
