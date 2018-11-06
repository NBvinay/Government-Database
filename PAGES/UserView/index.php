<?php
include("../../includes/config.php");


session_destroy(); 

if(isset($_SESSION['userLoggedIn'])) 
{
	$userLoggedIn = $_SESSION['userLoggedIn'];
	echo $userLoggedIn;
}
else
{
	// route back user to the registration page
	header("Location:/DigiLibrary/register.php");
}

?>



<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>User View</title>
		<meta name="description" content="Blueprint: Horizontal Slide Out Menu" />
		<meta name="keywords" content="horizontal, slide out, menu, navigation, responsive, javascript, images, grid" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>Digi Locker <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1>User View Page</h1>
				<nav>
					<a href="/DigiLibrary/index.php" class="bp-icon bp-icon-prev" data-info="LOGOUT"><span>LOGOUT</span></a>
					
				</nav>
			</header>	
			<div class="main">
				<nav class="cbp-hsmenu-wrapper" id="cbp-hsmenu-wrapper">
					<div class="cbp-hsinner">
						<ul class="cbp-hsmenu">
							<li>
								<a href="#">Personal Information</a>
								<ul class="cbp-hssubmenu">
				
								<?php

									$con = mysqli_connect("localhost", "root", "", "govtdb");

									if(mysqli_connect_errno()) 
									{
									echo "Failed to connect: " . mysqli_connect_errno();
									}

									$sql = "SELECT `Aadhar Number`, `Password`, `Full Name`, `Father's Name`, `Mother's Name`, `DOB`, `Gender`, `Email-id`, `Present Address`, `Qualifications` FROM `personal_info` WHERE `Aadhar Number`='$userLoggedIn';" ;

									$result = mysqli_query($con ,$sql);

									if(mysqli_num_rows($result)>0)
									{
										
										while ($row = mysqli_fetch_row($result))
										{
										 	
								?>
											<div class="container" style="background-color: ">
												<h3 style="font-size: 20px; position: relative;color: black;margin-left: 50px"><?php echo "Welcome ","$row[2]","," ?></h3>
												<br><br><br>
												<table  style="background-color:;
															   
															   width: 80%;
														  	   height: 190px;
															   margin: 10px;
															   padding-left:0%;
															   color:black;">

													<tr>
														<th>E-mail ID</th>
														<td><?php echo "$row[7]" ?></td>
													</tr>

													<tr>
														<th>Father's Name</th>
														<td><?php echo "$row[3]" ?></td>
													</tr>

													<tr>
														<th>Mother's Name</th>
														<td><?php echo "$row[4]" ?></td>
													</tr>

													<tr>
														<th>DOB(y-m-d)</th>
														<td><?php echo "$row[5]" ?></td>
													</tr>

													<tr>
														<th>Qualification</th>
														<td><?php echo "$row[9]" ?></td>
													</tr>
													<tr>
														<th>Address</th>
														<td><?php echo "$row[8]" ?></td>
													</tr>
												</table>
											</div>
								<?php
										}
									}

								?>

								</ul>
							</li>




							<li>
								<a href="#">Property Details</a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<?php

								  // $con = mysqli_connect("localhost", "root", "", "govtdb");
								 
								  // if(mysqli_connect_errno()) 
								  // {
								  //   echo "Failed to connect: " . mysqli_connect_errno();
								  // }

								  	$sql = "SELECT * FROM `property_details` WHERE  `Aadhar Number`='$userLoggedIn';" ;

									$result = mysqli_query($con ,$sql);
									$count = 1;
									if(mysqli_num_rows($result)>0)
									{
										
									?>
								
									  <h3 style="font-size: 20px; position: fixed;color: black;margin-left: 50px">Your property details:</h3>
									  <br><br><br><br><br>
						
									<?php	
										while ($row = mysqli_fetch_row($result))
										 {
										 	echo "<b><u>Property $count</b></u>";
										 	$count++;
										 	echo "<br>";
										 	echo "<br>";

										 	
									?>
									<div class="container" style="margin-left:450px;">
									  
									    
									  <table  style="background-color:;
									  				 position: relative;
													 margin-left: 120px;
												  	 height: 75px;
													 padding-left:0%;
													 color:black;
													 text-align: left;">
									    
									     <tr>
									         <th>Property Registration Number<t></th>
									         <td style="padding-left: 100px;"><?php echo "$row[1]" ?></td>
									    </tr>
									    
									     <tr>
									         <th>Property Katha Number</th>
									         <td style="padding-left: 100px;"><?php echo "$row[2]" ?></td>
									     </tr>
									   							    
									     <tr>
									         <th>Address of property</th>
									         <td style="padding-left: 100px;"><?php echo "$row[4]" ?></td>
									     </tr>

									     

									     
									  </table>
									</div>
									<?php
										}
									}

									?>
								</ul>
							</li>








							<li>

								<a href="#">Vehicle Details</a>
								<ul class="cbp-hssubmenu cbp-hssub-rows">
									<?php
								  	$sql = "SELECT * FROM `vehicle_details` WHERE  `Aadhar Number`='$userLoggedIn';" ;
									$result = mysqli_query($con ,$sql);
									$count = 1;
									if(mysqli_num_rows($result)>0)
									{
										
									?>
								
									  <h3 style="font-size: 20px; position: fixed;color: black;margin-left: 50px">Your vehicle details:</h3>
									  <br><br><br><br><br>
						
									<?php	
										while ($row = mysqli_fetch_row($result))
										 {
										 	echo "<b><u>Vehicle $count</b></u>";
										 	$count++;
										 	echo "<br>";
										 	echo "<br>";

										 	
									?>
									<div class="container" style="margin-left:450px;">
									  
									    
									  <table  style="background-color:;
									  				 position: relative;
													 margin-left: 120px;
												  	 height: 75px;
													 padding-left:0%;
													 color:black;
													 text-align: left;">
									    
									     <tr>
									         <th>2/4 wheel vehicle<t></th>
									         <td style="padding-left: 100px;"><?php echo "$row[1]" ?></td>
									    </tr>
									    
									     <tr>
									         <th>Vehicle Registration Number</th>
									         <td style="padding-left: 100px;"><?php echo "$row[2]" ?></td>
									     </tr>
									   							    
									     <tr>
									         <th>Driver DL number</th>
									         <td style="padding-left: 100px;"><?php echo "$row[3]" ?></td>
									     </tr>
									     <tr>
									         <th>Vehicle Insurance Number</th>
									         <td style="padding-left: 100px;"><?php echo "$row[4]" ?></td>
									     </tr>

									     

									     
									  </table>
									</div>
									<?php
										}
									}

									?>
								</ul>
								
							</li>





							<li>

								<a href="#">Tax Details</a>
								
								
							</li>

							
							
							
					
					</div>
				</nav>
			</div>
		</div>
		<script src="js/cbpHorizontalSlideOutMenu.min.js"></script>
		<script>
			var menu = new cbpHorizontalSlideOutMenu( document.getElementById( 'cbp-hsmenu-wrapper' ) );
		</script>
	</body>
</html>
