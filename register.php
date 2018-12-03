<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name)
	 {
		if(isset($_POST[$name])) 
		{
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Welcome to digiLocker!</title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="css/style-login.css"> 

</head>
<body>


<div><a href="http://localhost/DigiLibrary/adminLogin.php" style="background-color: green;"><p><button class="w3-button w3-teal" style="margin-left: 90%">Admin Login</button></p> </a></div>
	<div id="inputContainer" class="form">

		<ul class="tab-group">
	        <li class="tab"><a href="#signup">Sign Up</a></li>
	        <li class="tab active"><a href="#login">Log In</a></li>
       </ul>

        <div class="tab-content">

        	<!-- LOGIN FORM -->

      		<div id="login"> 
	      		<h1>Login to your account</h1>	
				<form id="loginForm" action="register.php" method="POST" >
					
					<?php echo $account->getError(Constants::$loginFailed); ?><br>
					
					<div class="field-wrap">
						<label for="loginUsername">Username<span class="req">*</span></label>
                   	
						<input id="loginUsername" name="loginUsername" type="text" placeholder="                                        e.g. Vinay" required autocomplete="false" >
					</div>
					<div class="field-wrap">
						<label for="loginPassword">Password<span class="req">*</span></label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="                                        Your password" required autocomplete="off">
					</div>
						<button type="submit" name="loginButton"  class="button button-block" style="cursor: pointer ">LOG IN</button>
					
					
				</form>
		   </div>
		
			<!-- REGISTER Form start -->

			<div id="signup">   
            <h1>Create your free account</h1>
					<form id="registerForm" action="register.php" method="POST">
						
						 <!-- ADHAR NUMBER -->
						<div class="field-wrap">	 
							<?php echo $account->getError(Constants::$adharNumberWrong); ?>
							<?php echo $account->getError(Constants::$adharTaken); ?> 
							<label for="adhNo"></label>
							<input id="adhNo" name="adhNo" type="text"  value="<?php getInputValue('adhNo') ?>" placeholder="Adhar Number           e.g. 1234567890" required>
						</div>	


						<!-- userName (FULL NAME) -->
						 <div class="field-wrap">	 
							<?php echo $account->getError(Constants::$usernameCharacters); ?>
							<?php echo $account->getError(Constants::$usernameTaken); ?> 
							<label for="username"></label>
							<input id="username" name="username" type="text"  value="<?php getInputValue('username') ?>" placeholder="Full name  e.g. Vinay" required>
						</div>
						<!-- Fathers name and Mothers Name -->
						<div class="top-row">
								<div class="field-wrap">
									<?php echo $account->getError(Constants::$fatherNameCharacters); ?> 
									<label for="fatherName"></label>
									<input id="fatherName" name="fatherName" type="text"  value="<?php getInputValue('fatherName') ?>"  required placeholder="Father's Name">
								</div>

								<div class="field-wrap">
									<?php echo $account->getError(Constants::$motherNameCharacters); ?>
									<label for="motherName"></label>
									<input id="motherName" name="motherName" type="text"  value="<?php getInputValue('motherName') ?>" required  placeholder="Mother's Name">
								</div>
						</div>
						<!-- DOB -->
						<div class="field-wrap">
							<div style="color: #dbdbdb;font-size: 20px">Date of Birth</div>
							<label for="dob" style=""></label>
							<input id="dob" name="dob" type="Date" placeholder="Date Of birth (yyyy-mm-dd)" value="<?php getInputValue('dob') ?>" required>
						</div>

						<!-- Gender -->
						<br>

						<div class="field-wrap">
							<label for="gender" style=""></label>
							<input id="gender" name="gender" type="text" placeholder="Gender(enter as m/f/o)" value="<?php getInputValue('gender') ?>" required>
						</div>

						<!-- Email ID -->
						<div class="field-wrap">
							<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
							<?php echo $account->getError(Constants::$emailInvalid); ?>
							<?php echo $account->getError(Constants::$emailTaken); ?>
							<label for="email"></label>
							<input id="email" name="email" type="email" placeholder="Email ID  e.g. Vinay@gmail.com" value="<?php getInputValue('email') ?>" required>
						</div>

						<!-- Confirm Email ID -->
						<div class="field-wrap">
							<label for="email2" style=""></label>
							<input id="email2" name="email2" type="email" placeholder="Confirm Email ID e.g. Vinay@gmail.com" value="<?php getInputValue('email2') ?>" required>
						</div>

						<!-- Address -->
						<div class="field-wrap">
							<label for="address" style=""></label>
							<input id="address" name="address" type="text" placeholder="Present Address" value="<?php getInputValue('address') ?>" required> 
						</div>

						<!-- Qualification -->
						<div class="field-wrap">
							<label for="qualification" style=""></label>
							<input id="qualification" name="qualification" type="text" placeholder="Qualification" value="<?php getInputValue('qualification') ?>" required>
						</div>

						<!-- Password -->
						<div class="field-wrap">
							<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
							<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
							<?php echo $account->getError(Constants::$passwordCharacters); ?>
							<label for="password"></label>
							<input id="password" name="password" type="password" placeholder="Your password" required>
						</div>

						<!-- Confirm Password -->
						<div class="field-wrap">
							<label for="password2"></label>
							<input id="password2" name="password2" type="password" placeholder="Confirm password" required>
						
						</div>


						<!-- SUBMIT BOTTON -->
						<button type="submit" name="registerButton" class="button button-block" style="cursor: pointer">SIGN UP(REGISTER)</button>
					</form>
				</div>
		</div>
	</div>  


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/login-js.js"></script>



</body>
</html>