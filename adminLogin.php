<?php

include("includes/config.php");
if(isset($_POST['loginButton'])) 
{

	$name=$_POST['loginUsername'];
	$password=$_POST['loginPassword'];


	
	if($name == 'property' && $password == 'password')
	{
		$_SESSION['adminLoggedIn'] = $name;
		header("Location:PAGES\PropertyDetails\index.php");
		
	}

	if($name == 'vehicle' && $password == 'password')
	{
		$_SESSION['adminLoggedIn'] = $name;
		header("Location:PAGES\VehicleDetails\index.php");
		
	}

	if($name == 'employment' && $password == 'password')
	{
		$_SESSION['adminLoggedIn'] = $name;
		header("Location:PAGES\EmploymentDetails\index.php");
	}





}



?>






<html>
<head>
	<title>Welcome to digiLocker!</title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style-login.css"> 

</head>
<body>

	<div id="inputContainer" class="form">
      	
      		<div id="login"> 
	      		<h1>
	      			<b>Login to your branch</b>
	      		</h1>	
				<form id="loginForm" action="adminLogin.php" method="POST" >
					
					
					
					<div class="field-wrap">
						<label for="loginUsername">Department Name<span class="req">*</span></label>
                   		<input id="loginUsername" name="loginUsername" type="text" placeholder="                                        e.g. Property" required autocomplete="false" >
					</div>
					<div class="field-wrap">
						<label for="loginPassword">Password<span class="req">*</span></label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="                                        Your password" required autocomplete="off">
					</div>
						<button type="submit" name="loginButton"  class="button button-block" style="cursor: pointer ">LOG IN</button>
					
					
				</form>
		   </div>
		
	
		</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/login-js.js"></script>



</body>
</html>

