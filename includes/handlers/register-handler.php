<?php 

if(isset($_POST['registerButton'])) 
{
	//Register button was pressed
	$adharNumber = $_POST['adhNo'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$qualification = $_POST['qualification'];
	$address = $_POST['address'];
	$username = sanitizeFormUsername($_POST['username']);
	$fatherName = sanitizeFormUsername($_POST['fatherName']);
	$motherName = sanitizeFormUsername($_POST['motherName']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$wasSuccessful = $account->register($adharNumber,$username, $fatherName, $motherName, $email, $email2, $password, $password2,$gender,$dob,$qualification,$address);

	if($wasSuccessful == true) 
	{
		$_SESSION['userLoggedIn'] = $adharNumber;
		header("Location:PAGES\UserView\index.php");
	}

}


function sanitizeFormPassword($inputText) 
{
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText)
{
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) 
{
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}


?>