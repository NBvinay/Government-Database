
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>User View</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Fullscreen Slit Slider with CSS3 and jQuery" />
        <meta name="keywords" content="slit slider, plugin, css3, transitions, jquery, fullscreen, autoplay" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>

		  
  
  
		<<!-- noscript> 
			<link rel="stylesheet" type="text/css" href="css/styleNoJS.css" />
		</noscript> -->
    </head>
    <body >
        
        <div class="container demo-1" style="height: 150%">
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				
					<div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" 					data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-color:lightgrey;">
							<div style="background-color:;	
											max-width: 82%;
											margin-left: 9%;
											align-items: center;
											
											display:flex;
										    flex-direction: row;
										    flex-wrap: wrap;
										    justify-content: center;
										    align-items: center;" >
								<div style="background-color:;border-style: ;">
									<h2 style="color:black;font-weight: bold;"><u>Personal Information</u></h2><br><br>
									<div style="margin-left: 41.5%;padding-bottom: 50px; ">
										<img src = "face.png" style="max-height: 100px" border="1">
									</div>	

								</div>
								<?php

								  $con = mysqli_connect("localhost", "root", "", "govtdb");
								 
								  if(mysqli_connect_errno()) 
								  {
								    echo "Failed to connect: " . mysqli_connect_errno();
								  }

								  	$sql = "SELECT `Aadhar Number`, `Password`, `Full Name`, `Father's Name`, `Mother's Name`, `DOB`, `Gender`, `Email-id`, `Present Address`, `Qualifications` FROM `personal_info` WHERE `Aadhar Number`='123';" ;

									$result = mysqli_query($con ,$sql);

									if(mysqli_num_rows($result)>0)
									{
										
										while ($row = mysqli_fetch_row($result))
										 {
										 	
											?>
													<div class="container">
													  <h3 style="font-size: 20px;margin-left: 50px"><?php echo "Welcome ","$row[2]","," ?></h3>
													  <br>
													<h3 style="margin-left: 50px"> Here are your details:</h3> <br>
													    
													  <table  style="background-color:;
																							  position: relative;
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
							</div>
						</div>
					</div>



















					<!-- Property Details -->


					<div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div style="background-color:;	
											max-width: 82%;
											margin-left: 9%;
											align-items: center;
											
											display:flex;
										    flex-direction: row;
										    flex-wrap: wrap;
										    justify-content: center;
										    align-items: center;" >
								<div style="background-color:;border-style: ;">
									<h2 style="color:black;font-weight: bold;"><u>Property Information</u></h2><br><br>
									<div style="margin-left: 41.5%;padding-bottom: 50px; ">
										<img src = "face.png" style="max-height: 100px" border="1">
									</div>	

								</div>
								<?php

								  $con = mysqli_connect("localhost", "root", "", "govtdb");
								 
								  if(mysqli_connect_errno()) 
								  {
								    echo "Failed to connect: " . mysqli_connect_errno();
								  }

								  	$sql = "SELECT * FROM `property_details` WHERE  `Aadhar Number`='234';" ;

									$result = mysqli_query($con ,$sql);
									$count = 1;
									if(mysqli_num_rows($result)>0)
									{
										
									?>
											<div class="container">
													  <h3 style="font-size: 20px;margin-left: 50px"><?php echo "Welcome " ?></h3>
													  <br>
													  <h3 style="margin-left: 50px"> Here are your Property details:</h3> <br>
													    
													 
													</div>

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
																	 
																  	 height: 75px;
																	 padding-left:0%;
																	 color:black;
																	 text-align: left;">
													    
													     <tr>
													         <th>Property Registration Number</th>
													         <td style="padding-left: 10px;"><?php echo "$row[1]" ?></td>
													    </tr>
													    
													     <tr>
													         <th>Property Katha Number</th>
													         <td style="padding-left: 10px;"><?php echo "$row[2]" ?></td>
													     </tr>
													   							    
													     <tr>
													         <th>Address oF property</th>
													         <td style="padding-left: 10px;"><?php echo "$row[4]" ?></td>
													     </tr>

													     

													     
													  </table>
													</div>
											<?php
										}
									}

											?>
							</div>
						</div>
					</div>
					


















					<div class="sl-slide bg-4" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco" data-icon="I"></div>
							<h2>Donna nobis pacem</h2>
							<blockquote><p>The human body has no more need for cows' milk than it does for dogs' milk, horses' milk, or giraffes' milk.</p><cite>Michael Klaper M.D.</cite></blockquote>
						</div>
					</div>
					
					<div class="sl-slide bg-5" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
						<div class="sl-slide-inner">
							<div class="deco" data-icon="t"></div>
							<h2>Acta Non Verba</h2>
							<blockquote><p>I think if you want to eat more meat you should kill it yourself and eat it raw so that you are not blinded by the hypocrisy of having it processed for you.</p><cite>Margi Clarke</cite></blockquote>
						</div>
					</div>
				</div><!-- /sl-slider -->
				
				<nav id="nav-arrows" class="nav-arrows">
					<span class="nav-arrow-prev">Previous</span>
					<span class="nav-arrow-next">Next</span>
				</nav>

				<nav id="nav-dots" class="nav-dots">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</nav>

			</div><!-- /slider-wrapper -->

        </div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
		<script type="text/javascript" src="js/jquery.slitslider.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ),
						$nav = $( '#nav-dots > span' ),
						slitslider = $( '#slider' ).slitslider( {
							onBeforeChange : function( slide, pos ) {

								$nav.removeClass( 'nav-dot-current' );
								$nav.eq( pos ).addClass( 'nav-dot-current' );

							}
						} ),

						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':last' ).on( 'click', function() {

								slitslider.next();
								return false;

							} );

							$navArrows.children( ':first' ).on( 'click', function() {
								
								slitslider.previous();
								return false;

							} );

							$nav.each( function( i ) {
							
								$( this ).on( 'click', function( event ) {
									
									var $dot = $( this );
									
									if( !slitslider.isActive() ) {

										$nav.removeClass( 'nav-dot-current' );
										$dot.addClass( 'nav-dot-current' );
									
									}
									
									slitslider.jump( i + 1 );
									return false;
								
								} );
								
							} );

						};

						return { init : init };

				})();

				Page.init();

				/**
				 * Notes: 
				 * 
				 * example how to add items:
				 */

				/*
				
				var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
				
				// call the plugin's add method
				ss.add($items);

				*/
			
			});
		</script>
	</body>
</html>