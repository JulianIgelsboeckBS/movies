<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

	<title>Movie Review | Add Movie</title>
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
						<span>Join Us</span>
					</div>


					<!-- <div class="container mt-5"> -->
					<form action="/add_movie" method="post" enctype="multipart/form-data">

						<div class="mb-3">
							<label for="title" class="form-label">Titel:</label>
							<input type="text" class="form-control" id="title" name="title" required>
						</div>

						<div class="mb-3">
							<label for="original_title" class="form-label">Originaltitel:</label>
							<input type="text" class="form-control" id="original_title" name="original_title">
						</div>

						<div class="mb-3">
							<label for="genre" class="form-label">Genre:</label>
							<input type="text" class="form-control" id="genre" name="genre" required>
						</div>

						<div class="mb-3">
							<label for="release_year" class="form-label">Erscheinungsjahr:</label>
							<input type="number" class="form-control" id="release_year" name="release_year" required>
						</div>

						<div class="mb-3">
							<label for="duration" class="form-label">Dauer (in Minuten):</label>
							<input type="number" class="form-control" id="duration" name="duration" required>
						</div>

						<div class="mb-3">
							<label for="plot" class="form-label">Handlung:</label>
							<textarea class="form-control" id="plot" name="plot" rows="4" required></textarea>
						</div>

						<div class="mb-3">
							<label for="cast" class="form-label">Besetzung:</label>
							<textarea class="form-control" id="cast" name="cast" rows="2" required></textarea>
						</div>

						<div class="mb-3">
							<label for="director" class="form-label">Regie:</label>
							<input type="text" class="form-control" id="director" name="director" required>
						</div>

						<div class="mb-3">
							<label for="poster" class="form-label">Poster hochladen:</label>
							<input type="file" class="form-control" id="poster" name="poster" accept="image/*" required>
						</div>

						<div class="mb-3">
							<label for="trailer" class="form-label">Trailer-Link (YouTube o.ä.):</label>
							<input type="url" class="form-control" id="trailer" name="trailer" required>
						</div>

						<div class="mb-3">
							<label for="availability" class="form-label">Verfügbarkeit auf Streaming-Diensten:</label>
							<textarea class="form-control" id="availability" name="availability" rows="2"
								placeholder="z.B. Netflix, Amazon Prime" required></textarea>
						</div>

						<button type="submit" class="btn btn-primary">Film anlegen</button>
					</form>
					<!-- </div> -->

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