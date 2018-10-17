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
  if(isset($_POST['submit1']))
  {
      $adharNumber = $_POST['adharNumber'];
      $dor = $_POST['dor'];
      $dor = date("Y-m-d",strtotime($dor));
       
        
        if (!( $dor== NULL || $adharNumber==NULL))
        {
         

		  mysqli_query($con , "UPDATE `employment details` SET `Date of resignation/retirement` = '$dor' WHERE `employment details`.`Aadhar Number` = '$adharNumber';");
          $flag = 0;
          
        }
        
        
      
      if($flag == 1)
      {
        echo "Please enter all the details correctly";
      }
      $flag = 1;
    
  }
  
    if(isset($_POST['submit2']))
  {
      $adharNumber = $_POST['adharNumber'];
      $job = $_POST['job'];
       
        
        if (!( $job== NULL || $adharNumber==NULL))
        {
         
         
		  mysqli_query($con , "UPDATE `employment details` SET `Job` = '$job' WHERE  `employment details`.`Aadhar Number` = '$adharNumber';");
          $flag = 0;
          
        }
        
        
      
      if($flag == 1)
      {
        echo "Please enter all the details correctly";
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
  <title>Update Employment Details </title>
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
</div>

<!-- Page Content -->
<div>
  <button class="w3-button w3-grey w3-xlarge" onclick="w3_open()">☰  Menu</button>
</div>



  <div class="form">
      
      
      
      <div class="tab-content">   
          <h1><b><b><div style="color:white;">Update Employment Details</div></b></b></h1>
          
          <form action="updateEmployee.php" method="post">
                <div class="input_fields_wrap">    
						
                         <div class="field-wrap">
							<label>
								Aadhar Number<span class="req">*</span>
							</label>
							<input type="text"required autocomplete="off" name="adharNumber"/>
						 </div> 
						 
						 
                         <div class="field-wrap">
                             
                                     <div style="color: white">New Date of Resignation/Retirement:</div>
                              
                              <input type="Date"autocomplete="off" name="dor"/>
                        </div>
                           
				</div>
              <button type="submit" class="button button-block" id="submit1" name="submit1"/>Update Date</button>
			  </br></br>
				<div class="field-wrap">
                              <label>
                                    New Job/ Position<span class="req"></span>
                              </label>
                              <input type="text"autocomplete="off" name="job"/>
                 </div>
				<button type="submit" class="button button-block" id="submit2" name="submit2"/>Update Job Position</button>
			</form>
        </div>
      </div>  

        
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
