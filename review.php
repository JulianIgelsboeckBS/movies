<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review | Review</title>
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
						<span>Movie Review</span>
					</div>

					<div class="filters">
						<select name="#" id="#" placeholder="Choose Category">
							<option value="#">Action</option>
							<option value="#">Drama</option>
							<option value="#">Fantasy</option>
							<option value="#">Horror</option>
							<option value="#">Adventure</option>
						</select>
						<select name="#" id="#">
							<option value="#">2012</option>
							<option value="#">2013</option>
							<option value="#">2014</option>
						</select>
					</div>
					<div class="movie-list">
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Maleficient</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-4.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">The adventure of Tintin</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-5.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Hobbit</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-6.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Exists</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-1.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Drive hard</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-2.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Robocop</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-7.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Life of Pi</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-8.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">The Colony</a></div>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
						</div>
					</div> <!-- .movie-list -->

					<div class="pagination">
						<a href="#" class="page-number prev"><i class="fa fa-angle-left"></i></a>
						<span class="page-number current">1</span>
						<a href="#" class="page-number">2</a>
						<a href="#" class="page-number">3</a>
						<a href="#" class="page-number">4</a>
						<a href="#" class="page-number">5</a>
						<a href="#" class="page-number next"><i class="fa fa-angle-right"></i></a>
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
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>

</body>

</html>