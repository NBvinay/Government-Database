<?php
	class Account
	 {

		private $con;
		private $errorArray;

		public function __construct($con) 
		{
			$this->con = $con;
			$this->errorArray = array();
		}



		public function login($un, $pw)
		{

			// $pw = md5($pw);

			$query = mysqli_query($this->con, "SELECT * FROM `personal_info` WHERE `Full Name`='$un' AND `Password`='$pw';");

			echo "login query worked";

			if(mysqli_num_rows($query) == 1)
			{
				echo "login query worked2";
				return true;
			}
			else 
			{
				array_push($this->errorArray, Constants::$loginFailed);
				return false;
			}

		}


	// ($adharNumber,$username, $fatherName, $motherName, $email, $email2, $password, $password2,$gender,$dob,$qualification,$address)
		public function register($an,$un, $fn, $mn, $em, $em2, $pw, $pw2,$gnd,$dob,$qual,$address) 
		{
			$this->validateAdharNumber($an);
			$this->validateUsername($un);
			$this->validatefatherName($fn);
			$this->validatemotherName($mn);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);
			

			if(empty($this->errorArray) == true)
			{
				//Insert into db
				return $this->insertUserDetails($an,$pw,$un,$fn,$mn,$dob,$gnd,$em,$address,$qual);
			}
			else 
			{
				return false;
			}

		}

		public function getError($error) 
		{
			if(!in_array($error, $this->errorArray)) 
			{
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}




		private function insertUserDetails($an,$pw,$un,$fn,$mn,$dob,$gnd,$em,$address,$qual) 
		{
			$encryptedPw = md5($pw);
			$date = date("Y-m-d",strtotime($dob));
			echo $an," ",$pw," ",$encryptedPw," ",$un," ",$fn," ",$mn," ",$dob," ",$date," ",$gnd," ",$em," ",$address," ",$qual," ";
			
 		
 			$result = mysqli_query($this->con, "INSERT INTO `personal_info` (`Aadhar Number`, `Password`, `Full Name`, `Father's Name`, `Mother's Name`, `DOB`, `Gender`, `Email-id`, `Present Address`, `Qualifications`) VALUES ('$an','$encryptedPw','$un','$fn','$mn','$date','$gnd','$em','$address','$qual');");
			

			if(!($result))
			{
				echo "some error";
			}

			return $result;
		}




















		private function validateAdharNumber($an) 
		{
			if(strlen($an) <=1 ) 
			{
				array_push($this->errorArray, Constants::$adharNumberWrong);
				return;
			}

			$chechAdhar = mysqli_query($this->con, "SELECT 	`Aadhar Number` FROM `personal_info` WHERE `Aadhar Number`='$an'");
			if(mysqli_num_rows($chechAdhar) != 0)
			{
				array_push($this->errorArray, Constants::$adharTaken);
				return;
			}
		}

		private function validateUsername($un) 
		{

			if(strlen($un) > 25 || strlen($un) < 5) 
			{
				array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}

			$checkUsernameQuery = mysqli_query($this->con, "SELECT `Full Name` FROM `personal_info` WHERE `Full Name`='$un';");
			if(mysqli_num_rows($checkUsernameQuery) != 0)
			{
				array_push($this->errorArray, Constants::$usernameTaken);
				return;
			}

		}

		private function validatefatherName($fn) 
		{
			if(strlen($fn) > 25 || strlen($fn) < 2) 
			{
				array_push($this->errorArray, Constants::$fatherNameCharacters);
				return;
			}
		}

		private function validatemotherName($mn) 
		{
			if(strlen($mn) > 25 || strlen($mn) < 2) {
				array_push($this->errorArray, Constants::$motherNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) 
		{
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			$checkEmailQuery = mysqli_query($this->con, "SELECT `Email-id` FROM `personal_info` WHERE `Email-id`='$em';");
			
			
			if(mysqli_num_rows($checkEmailQuery) != 0) 
			{
				array_push($this->errorArray, Constants::$emailTaken);
				return;
			}

		}

		private function validatePasswords($pw, $pw2) 
		{
			
			if($pw != $pw2) 
			{
				array_push($this->errorArray, Constants::$passwordsDoNoMatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) 
			{
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) 
			{
				array_push($this->errorArray, Constants::$passwordCharacters);
				return;
			}

		}


	}
?>