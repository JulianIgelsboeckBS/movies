<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review | Contact</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Loading main css file -->
	<link rel="stylesheet" href="style.css">
</head>


<body>


	<div id="site-content">
	<?php include __DIR__ . '/nav.php'; ?>
		<main class="main-content">
			<div class="container">
				<div class="page">
					<div class="breadcrumbs">
						<a href="index.html">Home</a>
						<span>Contact</span>
					</div>

					<div class="content">
						<div class="row">
							<div class="col-md-4">
								<h2>Contact</h2>
								<ul class="contact-detail">
									<li>
										<img src="images/icon-contact-map.png" alt="#">
										<address><span>Company name. INC</span> <br>550 Avenue Street, New york
										</address>
									</li>
									<li>
										<img src="images/icon-contact-phone.png" alt="">
										<a href="tel:1590912831">+1 590 912 831</a>
									</li>
									<li>
										<img src="images/icon-contact-message.png" alt="">
										<a href="mailto:contact@companyname.com">contact@companyname.com</a>
									</li>
								</ul>
								<div class="contact-form">
									<input type="text" class="name" placeholder="name...">
									<input type="text" class="email" placeholder="email...">
									<input type="text" class="website" placeholder="website...">
									<textarea class="message" placeholder="message..."></textarea>
									<input type="submit" value="Send Message ">

								</div>
							</div>
							<div class="col-md-7 col-md-offset-1">
								<div class="map"></div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .container -->
		</main>
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">About Us</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia
								nesciunt saepe cupiditate</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Recent Review</h3>
							<ul class="no-bullet">
								<li>Lorem ipsum dolor</li>
								<li>Sit amet consecture</li>
								<li>Dolorem respequem</li>
								<li>Invenore veritae</li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Help Center</h3>
							<ul class="no-bullet">
								<li>Lorem ipsum dolor</li>
								<li>Sit amet consecture</li>
								<li>Dolorem respequem</li>
								<li>Invenore veritae</li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Join Us</h3>
							<ul class="no-bullet">
								<li>Lorem ipsum dolor</li>
								<li>Sit amet consecture</li>
								<li>Dolorem respequem</li>
								<li>Invenore veritae</li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Social Media</h3>
							<ul class="no-bullet">
								<li>Facebook</li>
								<li>Twitter</li>
								<li>Google+</li>
								<li>Pinterest</li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Newsletter</h3>
							<form action="#" class="subscribe-form">
								<input type="text" placeholder="Email Address">
							</form>
						</div>
					</div>
				</div> <!-- .row -->

				<div class="colophon">Copyright 2014 Company name, Designed by Themezy. All rights reserved</div>
			</div> <!-- .container -->

		</footer>
	</div>
	<!-- Default snippet for navigation -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>