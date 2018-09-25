<?php
include("includes/config.php");

// session_destroy(); 

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else
{
	// route back user to the registration page
	// header("Location: register.php");
}

?>

<html>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700|Merriweather+Sans' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
<head>
	<title>Welcome to DigiLocker!</title>
</head>

<body class="extinguisher-transition">
<main class="cd-main-content">
	<div class="center">
		<h1>DigiLocker</h1>
		<a href="#modal-1" class="cd-btn cd-modal-trigger">About</a> <p><br>
		<a href="http://localhost/DigiLibrary/register.php" class="cd-btn ">Get Started</a>
	</div>
</main> <!-- .cd-main-content -->

<div class="cd-modal" id="modal-1">
	<div class="modal-content">
		<h2>What is DigiLocker</h2>
		
		<p>
			Targeted at the idea of paperless governance, DigiLocker is a platform for issuance and verification of documents & certificates in a digital way, thus eliminating the use of physical documents. Indian citizens who sign up for a DigiLocker account get a dedicated cloud storage space that is linked to their Aadhaar (UIDAI) number. Organizations that are registered with Digital Locker can push electronic copies of documents and certificates (e.g. driving license, Voter ID, School certificates) directly into citizens lockers. Citizens can also upload scanned copies of their legacy documents in their accounts. These legacy documents can be electronically signed using the eSign facility.
		</p>

		<p>
			The platform has the following benefits:
			Citizens can access their digital documents anytime, anywhere and share it online. This is convenient and time saving.
			It reduces the administrative overhead of Government departments by minimizing the use of paper.
			Digital Locker makes it easier to validate the authenticity of documents as they are issued directly by the registered issuers.
			Self-uploaded documents can be digitally signed using the eSign facility (which is similar to the process of self-attestation).
			The following are the key stakeholders in the DigiLocker system:
			Issuer: Entity issuing e-documents to individuals in a standard format and making them electronically available e.g. CBSE, Registrar Office, Income Tax department, etc.
			Requester: Entity requesting secure access to a particular e-document stored within a repository (e.g. University, Passport Office, Regional Transport Office, etc.)
			Resident: An individual who uses the Digital Locker service based on Aadhaar number.
			The main technology components of the DigiLocker system are:
			Repository: Collection of e-documents that is exposed via standard APIs for secure, real-time access.
			Access Gateway: Secure online mechanism for requesters to access e-documents from various repositories in real-time using URI (Uniform Resource Indicator).
			DigiLocker Portal: Dedicated cloud based personal storage space, linked to each resident’s Aadhaar for storing e-documents, or URIs of e-documents.
		</p>
	</div> <!-- .modal-content -->

	<a href="#0" class="modal-close">Close</a>
</div> <!-- .cd-modal -->


<!-- This is the Second Page/ Login or registration page -->

<div class="cd-modal" id="modal-2">
	<div class="modal-content">
		<h2>Login / SignUp Page</h2>
		
			
	</div> <!-- .modal-content -->

	<a href="#0" class="modal-close">Close</a>
</div> <!-- .cd-modal -->


<div class="cd-transition-layer" data-frame="25"> 
	<div class="bg-layer"></div>
</div> <!-- .cd-transition-layer -->

<script src="js/modernizr.js"></script> <!-- Modernizr -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-2.2.1-min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>

</html>