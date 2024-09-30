<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review | Contact</title>
    <?php include __DIR__ . '/head.php'; ?>
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
        <?php include __DIR__ . '/footer.php'; ?>

	</div>
	<!-- Default snippet for navigation -->



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>