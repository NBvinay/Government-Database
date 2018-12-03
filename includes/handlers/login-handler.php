<?php
if(isset($_POST['loginButton'])) 
{
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$con = mysqli_connect("localhost", "root", "", "govtdb");
	$res=mysqli_query($con,"SELECT `Aadhar Number` FROM `personal_info` WHERE `Full Name`='$username';");
	$row = mysqli_fetch_row($res);
	
	$adharNo=$row[0];


	$result = $account->login($username, $password);

	if($result == true)
	{
		echo "login was successful";
		$_SESSION['userLoggedIn'] = $adharNo;
		header("Location:PAGES\UserView\index.php");
	}

}
?>