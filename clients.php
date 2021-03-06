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
		<link href="css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		
		<!-- FancyBox -->
		
		<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen">
		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen">
		<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen">

		
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
												
												<h4 class="modal-title">Send me a message!</h4>
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
			<div class="item" id="client">
			</div><!-- end client --->
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
		
		<div class="row" id="features">
				
				<div class="col-sm-4 feature">
					<div class="panel panel-clients">
						<div class="panel-heading">
							<h2 class="panel-title">Project Details</h2>
						</div><!-- end panel-heading -->
						<dl class="dl-horizontal">
						  
						  <dt>Client:</dt>
						  <dd>Nugent's Prime Meat Market</dd>
						  <dt>Project:</dt>
						  <dd>Store Logo</dd>
						  <dt>Method:</dt>
						  <dd>Hand drawn. Digitized with Adobe Illustrator</dd>
						</dl>
							
						</ul>						
						<a id="single_1" href="images/gallery/nugents.jpg" class="btn btn-feature btn-block">View Design</a>
						<a href="http://www.nugentsprime.com" target="_blank" class="btn btn-feature btn-block">View Client Website</a>
					</div><!-- end panel -->
				</div><!-- end feature -->
			
		
				<div class="col-sm-8 feature">
					<div class="panel panel-clients">
						<div class="panel-heading">
							<h3 class="panel-title">Client Recommendation</h3>
						</div><!-- end panel-heading -->
						<p class="lead">"Jeremy helped us to create our own logo for Nugent's Prime Meat Market. Jeremy hand drew our "Beef" logo. Even though we changed our minds and direction a few times Jeremy happily applied the changes we suggested. He delivered our final logo on time, and below budget. I would highly recommend Jeremy for all of your design needs."</p>
						<div class="panel-footer"> - Tim Nugent of Nugent's Prime Meat Market</3></div>
					</div><!-- end panel -->
				</div><!-- end feature -->
		</div><!-- End features -->			
		
		<hr>
		
		<div class="row" id="features">
				
				<div class="col-sm-8 feature">
					<div class="panel panel-clients even">
						<div class="panel-heading">
							<h3 class="panel-title">Client Recommendation</h3>
						</div><!-- end panel-heading -->
						<p class="lead">A company's logo is a greeting card to their clientele. When choosing a graphic designer for my event planning company I immediately turned to Jeremy of JMigsDesign. Jeremy carefully listened to what I wanted my logo to "say" on behalf of my company and then professionally designed several options for me to review. He was courteous, detail oriented, goal focused and easy to work with. I would highly recommend his services to others and my company will definitely be using him again!</p>
						<div class="panel-footer"> - Carol Solomon of Events By: Great To Be Me</3></div>
					</div><!-- end panel -->
				</div><!-- end feature -->
				
				<div class="col-sm-4 feature">
					<div class="panel panel-clients even">
						<div class="panel-heading">
							<h2 class="panel-title">Project Details</h2>
						</div><!-- end panel-heading -->
						<dl class="dl-horizontal">
						  
						  <dt>Client:</dt>
						  <dd>Events By: Great To Be Me</dd>
						  <dt>Project:</dt>
						  <dd>Company Logo</dd>
						  <dt>Method:</dt>
						  <dd>Adobe Illustrator</dd>
						</dl>
							
						</ul>						
						<a id="single_1" href="images/gallery/greattobeme.jpg" class="btn btn-feature btn-block">View Design</a>
						<a href="http://www.eventsbygreattobeme.com" target="_blank" class="btn btn-feature btn-block">View Client Website</a>
					</div><!-- end panel -->
				</div><!-- end feature -->

		
			
		</div><!-- End features -->			
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			
		
		
			
		<hr class="hidden-sm">				
					
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

