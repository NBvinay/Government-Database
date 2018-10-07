<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true)
	{
		echo "login was successful";
		$_SESSION['userLoggedIn'] = $username;
		header("Location:PAGES\UserView\index.php");
	}

}
?>