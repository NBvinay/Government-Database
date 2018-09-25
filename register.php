<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
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

		<ul class="tab-group">
	        <li class="tab"><a href="#signup">Sign Up</a></li>
	        <li class="tab active"><a href="#login">Log In</a></li>
       </ul>

        <div class="tab-content">
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
						<button type="submit" name="loginButton"  class="button button-block">LOG IN</button>
					
					
				</form>
		   </div>
		
			<!-- register Form start -->

			<div id="signup">   
            <h1>Create your free account</h1>
					<form id="registerForm" action="register.php" method="POST">
						
						 
						 <div class="field-wrap">	 
							<?php echo $account->getError(Constants::$usernameCharacters); ?>
							<?php echo $account->getError(Constants::$usernameTaken); ?> 
							<label for="username">Username<span class="req">*</span></label>
							<input id="username" name="username" type="text"  value="<?php getInputValue('username') ?>" placeholder="                                        e.g. Vinay" required>
						</div>
						<div class="top-row">
								<div class="field-wrap">
									<?php echo $account->getError(Constants::$firstNameCharacters); ?> 
									<label for="firstName">First name<span class="req">*</span></label>
									<input id="firstName" name="firstName" type="text"  value="<?php getInputValue('firstName') ?>"  required placeholder="                     e.g. Vinay">
								</div>

								<div class="field-wrap">
									<?php echo $account->getError(Constants::$lastNameCharacters); ?>
									<label for="lastName">Last name<span class="req">*</span></label>
									<input id="lastName" name="lastName" type="text"  value="<?php getInputValue('lastName') ?>" required  placeholder="                     e.g. NB">
								</div>
						</div>

						<div class="field-wrap">
							<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
							<?php echo $account->getError(Constants::$emailInvalid); ?>
							<?php echo $account->getError(Constants::$emailTaken); ?>
							<label for="email">Email<span class="req">*</span></label>
							<input id="email" name="email" type="email" placeholder="                                        e.g. Vinay@gmail.com" value="<?php getInputValue('email') ?>" required>
						</div>
						<div class="field-wrap">
							<label for="email2" style="">Confirm email<span class="req">*</span></label>
							<input id="email2" name="email2" type="email" placeholder="                                        e.g. Vinay@gmail.com" value="<?php getInputValue('email2') ?>" required>
						</div>
						<div class="field-wrap">
							<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
							<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
							<?php echo $account->getError(Constants::$passwordCharacters); ?>
							<label for="password">Password<span class="req">*</span></label>
							<input id="password" name="password" type="password" placeholder="                                        Your password" required>
						</div>
						<div class="field-wrap">
							<label for="password2">Confirm password<span class="req">*</span></label>
							<input id="password2" name="password2" type="password" placeholder="                                        Your password" required>
						
						</div>
						<button type="submit" name="registerButton"  class="button button-block">SIGN UP(REGISTER)</button>
						
					</form>
				</div>


		</div>
	</div>  


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/login-js.js"></script>



</body>
</html>