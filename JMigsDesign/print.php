<!DOCTYPE html>

<html>
	<head>
		
				
		<!-- Website Title & Description for Search Engine purposes -->
		<title></title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="css/styles.css" rel="stylesheet"
				  		
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="js/modernizr-2.6.2.min.js"></script>

		<!-- FancyBox -->
		
		<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen">
		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen">
		
		<!-- Font Awesome -->
		<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="font-awesome-4.3.0/css/font-awesome.min.css">

		
	</head>
	<body>
		
	<?php
	if ($_POST["submit"]) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Contact Form'; 
		$to = 'jmiggs20@aol.com'; 
		$subject = 'Message from Contact';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
	if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
		if (mail ($to, $subject, $body, $from)) {
			$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
		} else {
			$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
		}
	}
		}
?>		
	<div class="container">
		
		<div class="navbar navbar-custom navbar-fixed-top">
			<div class="container">
				
				<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				
				
				<a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="JMIGSDESIGN"></a>
				
				<div class="nav-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="index.php">Home</a>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio<strong class="caret"></strong></a>
								
							<ul class="dropdown-menu">
								<li>
									<a href="print.php">Print Design</a>
								</li>
								
								<li>
									<a href="web.php">Web Design</a>
								</li>
								
							</ul><!-- end dropdown-menu -->
						</li>
						
						<li><a href="clients.php">Clients</a></li>				
						</ul><!-- end nav -->
					
					<ul class="nav navbar-nav pull-right hidden-sm">
						<li><a href="http://facebook.com/jmigsdesign" target="_blank"><span class="fa fa-facebook-official fa-lg"></span></a></li>
						<li><a href="http://instagram.com/jmigsdesign" target="_blank"><span class="fa fa-instagram fa-lg"></span></a></li>
						<li><a href="https://twitter.com/jmigsdesign" target="_blank"><span class="fa fa-twitter fa-lg"></span></a></li>
						<li><a href="https://www.linkedin.com/in/jeremymiragliotta" target="_blank"><span class="fa fa-linkedin-square fa-lg"></span></a></li>
						<a href="#myModal" role="button" class="btn btn-contact pull-left" data-toggle="modal">Contact Me</a>	
					</ul><!-- end nav pull-right -->
					
				</div><!-- end nav-collapse -->
				
			</div><!-- end container -->
		</div><!-- End navbar -->
		
				<div class="modal fade" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button class="close" data-dismiss="modal">&times;</button>
												
												<h4 class="modal-title">Send Jeremy a message!</h4>
											</div><!-- end modal-header -->
											<div class="modal-body">
												<h4>Let Me Know What You Think!</h4>
												
												<p>Comments or Critiques - please feel free!  Interested in talking about working together on your project? Let me know! I will reply as soon as I can! </p>
																						
												<hr>
												
												<form class="form-horizontal">
													<div class="form-group">
														<label class="col-sm-2 control-label" for="inputName">Name</label>
														<div class="col-sm-10">
															<input class="form-control" id="inputName" name="name" placeholder="Name" type="text" value="<?php echo htmlspecialchars($_POST['name']); ?>">
															<?php echo "<p class='text-danger'>$errName</p>";?>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-sm-2 control-label" for="inputEmail">Email</label>
														<div class="col-sm-10">
															<input class="form-control" id="inputEmail" name="email" placeholder="example@domain.com" type="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
															<?php echo "<p class='text-danger'>$errEmail</p>";?>
														</div>
													</div>
													
													<div class="form-group">
														<label class="col-sm-2 control-label" for="inputMessage">Message</label>
														<div class="col-sm-10">
															<textarea class="form-control" id="inputMessage" name="message" placeholder="What's On Your Mind?" rows="4"><?php echo htmlspecialchars($_POST['message']);?></textarea>
															<?php echo "<p class='text-danger'>$errMessage</p>";?>
														</div>
													</div>

													<div class="form-group">
														<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
														<div class="col-sm-10">
														<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
														<?php echo "<p class='text-danger'>$errHuman</p>";?>
														</div>
    												</div>		
													
													<div class="form-group">
														<div class="col-sm-12">
														<input id="submit" name="submit" type="submit" value="Send" class="btn btn-success pull-right">
	        											</div>
    												</div>
    												
    												<div class="form-group">
												        <div class="col-sm-10 col-sm-offset-2">
												            <?php echo $result; ?>
												        </div>
												    </div>
												</form>
											</div><!-- end modal-body -->
										</div><!-- end modal-content -->
									</div><!-- end modal-dialog -->
								</div><!-- end myModal -->

		
		<header id="myHeader">
			<div class="item" id="print">
			</div><!-- end print -->
		</header><!-- end myHeader-->

				<!-- Visible on Small Devices-->
				
				<div class="row" id="feature">
					<div class="col-sm-12">
					<div class="panel socialbar visible-sm">
						<ul>
							<li class="list-inline"><a href="http://facebook.com/jmigsdesign" target="_blank"><span class="fa fa-facebook-official fa-lg"></span></a></li>
							<li class="list-inline"><a href="http://instagram.com/jmigsdesign" target="_blank"><span class="fa fa-instagram fa-lg"></span></a></li>
							<li class="list-inline"><a href="https://twitter.com/jmigsdesign" target="_blank"><span class="fa fa-twitter fa-lg"></span></a></li>
							<li class="list-inline"><a href="https://www.linkedin.com/in/jeremymiragliotta" target="_blank"><span class="fa fa-linkedin-square fa-lg"></span></a></li>
						</ul>
					</div>	<!--- end visible-sml -->
					</div> <!--- end col-sm-12 -->
				</div><!-- feature -->

		<hr class="hidden-sm">
		
	<!-- ---------------------------  ROW 1  -------------------------- -->	 
						
	<div class="row" id="gallery"> 
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"> NIS Opening Day Poster</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/nisopeningday.jpg"><img src="images/gallery/nisopeningday_thumb.jpg" alt="Opening Day Softball Tournament"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end col-sm-4 -->	
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"> GSR Feel The Love 5K Ad</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/feelthelove.jpg"><img src="images/gallery/feelthelove_thumb.jpg" alt="Feel The Love 5K Poster"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end col-sm-4 -->
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Nugent's Logo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/nugents.jpg"><img src="images/gallery/nugents_thumb.jpg" alt="Nugent's Prime Meat Market Logo"></a>		
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		
						

	</div><!-- END ROW 1 -->	
	
	<!-- ---------------------------  ROW 2  -------------------------- -->	 
	
	<div class="row" id="gallery">
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">BehindThePlates Logo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/behindtheplates.jpg"><img src="images/gallery/behindtheplates_thumb.jpg" alt="Behind The Plates Logo and Business Card"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"> NIS Paintball Ad</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/nispaintball.jpg"><img src="images/gallery/nispaintball_thumb.jpg" alt="No Idea Sports Paintball Ad"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		
			
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">NIS Flag Day Ad</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/flagday.jpg"><img src="images/gallery/flagday_thumb.jpg" alt="No Idea Sports Flag Day Ad"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		

	</div><!--- End ROW 2 -->				
	
	<!-- ---------------------------  ROW 3  -------------------------- -->	 
		 
	<div class="row" id="gallery"> 
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">GardenStateRaces Logo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/gardenstateraces.jpg"><img src="images/gallery/gardenstateraces_thumb.jpg" alt="Garden State Races Logo"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">NIS Poster</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/nisposter.jpg"><img src="images/gallery/nisposter_thumb.jpg" alt="No Idea Sports Poster"></a>				
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		
			
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">GreatToBeMe Logo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/greattobeme.jpg"><img src="images/gallery/greattobeme_thumb.jpg" alt="Events By: Great To Be Me Logo"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		

	</div><!--- END ROW 3 -->
				
<!-- ---------------------------  ROW 4  -------------------------- -->	 
	
	<div class="row" id="gallery">  

			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">JohnnieCocktail Logo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/johnniecocktail.jpg"><img src="images/gallery/johnniecocktail_thumb.jpg" alt="JohnnieCocktail.com Logo"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Live2BFit</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/live2bfit.jpg"><img src="images/gallery/live2bfit_thumb.jpg" alt="Live2BFit Newsletter Header"></a>				
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Field Day Header</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/fieldday.jpg"><img src="images/gallery/fieldday_thumb.jpg" alt="Field Day"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end col-sm-4 -->	
		

	</div>  <!-- END ROW 4 -->
	  		 
	<!-- ---------------------------  ROW 5 -------------------------- -->	 	 
		  
	 <div class="row" id="gallery">
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Mardi Gras Promo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/vandysmg.jpg"><img src="images/gallery/vandysmg_thumb.jpg" alt="Vanderbilts Mardi Gras Promotion"></a>				
					</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->
		
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">$3 Promo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/vandys3.jpg"><img src="images/gallery/vandys3_thumb.jpg" alt="Vanderbilt's Sports and Spirits Promotion"></a>				
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end end col-sm-4 -->		
			
			
		<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Oktoberfest Promo</h3>
				</div><!-- end panel-heading -->
				<div class="print-thumbnail">
					<a class="fancybox" rel="group" href="images/gallery/vandysoktoberfest.jpg"><img src="images/gallery/vandysoktoberfest_thumb.jpg" alt="Vanderbilts Oktoberfest Promotion"></a>
				</div><!-- end panel-thumbnail -->										
			</div><!-- end panel -->
		</div><!-- end col-sm-4 -->		

	</div>  <!-- END ROW 5 -->
  		 	
					
	<div class="row" id="bigCallout">
		<div class="col-sm-12">
			<div class="well">
				<div class="page-header">
					<h3>LOVE What You See? <small>I Would LOVE To Hear From You.</small></h3>
				</div><!-- end page-header -->
						
				<p>Please send me an email with what you think about my work! I would love and welcome all comments and critiques on my pieces, so don't be shy! Also feel free to share the love on your social media!</p>
				<br>
				<a href="#myModal" role="button" class="btn btn-contact-btm" data-toggle="modal">Contact Me</a>					
						
				<a href="http://www.facebook.com/sharer.php?u=http://www.jmigsdesign.com" target="_blank" type="button" class="btn btn-primary">Facebook</a>
						
				<a href="http://twitter.com/share?url=http://www.jmigsdesign.com&text=Check @JMIGSDESIGN Portfolio!" target="_blank" type="button" class="btn btn-info">Twitter</a> 
						
				<a href="https://plus.google.com/share?url=http://www.jmigsdesign.com" target="_blank" type="button" class="btn btn-danger">GooglePlus</a>	
			
			</div><!-- end well -->
		</div><!-- end col-sm-12 -->	
	</div><!-- End bigCallout -->
	
	
	
	</div> <!-- End container --> 
	
	
	
	<footer>
		<div class="container">
			<div class="row">
																
				<div class="col-sm-2 hidden-sm">
					<h6>Navigation</h6>
					<ul class="unstyled">
						<li><a href="index.php">Home</a></li>
						<li><a href="print.php">Print Design</a></li>
						<li><a href="web.php">Web Design</a></li>
						<li><a href="clients.php">Client Recommendations</a></li>
					</ul>
				</div><!-- end col-sm-2 -->
				
				<div class="col-sm-2 hidden-sm">
					<h6>Follow Me</h6>
					<ul class="unstyled">
						<li><a href="http://facebook.com/jmigsdesign">Facebook</a></li>
						<li><a href="http://instagram.com/jmigsdesign">Twitter</a></li>
						<li><a href="https://twitter.com/jmigsdesign">Instagram</a></li>
						<li><a href="https://www.linkedin.com/in/jeremymiragliotta">LinkedIn</a></li>
					</ul>
				</div><!-- end col-sm-2 -->
				
				<div class="col-sm-8">
					
				<h6 class="pull-right">&copy; 2015 Jeremy Miragliotta | JMigsDesign.com</h6>
				</div><!-- end col-sm-8 -->


			</div><!-- end row -->
		</div><!-- end container -->
	</footer><!-- End footer -->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="js/script.js"></script>
	
	<!-- FancyBox JS -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js"></script>
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
		
		$("#single_1").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });
	</script>
		
	</body>
</html>

