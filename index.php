<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/head.php'; ?>

<body>
	<div id="site-content">
		<?php include __DIR__ . '/nav.php'; ?>

		<body>
			<main class="main-content">
				<div class="container">

					<div class="page">
						<div class="breadcrumbs">
							<a href="index.html">Home</a>
							<span>Movie Review</span>
						</div>

						<!-- <div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-bs-toggle="collapse" href="#collapse1">Collapsible list group</a>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapse">
									<ul class="list-group">
										<li class="list-group-item"><select class="col-md-auto" id="select">
												<option value="" selected>Kategorie</option>
												<option value="Action">Action</option>
												<option value="Drama">Drama</option>
												<option value="Fantasy">Fantasy</option>

											</select></li>
										<li class="list-group-item">Two</li>
										<li class="list-group-item">Three</li>
									</ul>
									<div class="panel-footer">Footer</div>
								</div>
							</div>
						</div> -->

						<form>
							<button type="button" class="btn mb-2" id="disableFilter" data-toggle="collapse"
								data-target="#output">Filter ausblenden</button>
							<div class="filters" id="filters">
								<select class="col-md-auto" id="select">
									<option value="" selected>Kategorie</option>
									<option value="Action">Action</option>
									<option value="Drama">Drama</option>
									<option value="Fantasy">Fantasy</option>

								</select>
								<select class="col-md-auto" id="select">
									<option value="" selected>Jahr</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
								</select>
								<select class="col-md-auto" id="select">
									<option value="" selected>Bewertung</option>
									<option value="Top">Top</option>
									<option value="Sehr Gut">Sehr Gut</option>
									<option value="Gut">Gut</option>
								</select>
								<select class="col-md-auto" id="select">
									<option value="" selected>Streamingdienst</option>
									<option value="Netflix">Netflix</option>
									<option value="Amazon">Amazon Prime</option>
									<option value="Sky">Sky</option>
								</select>
							</div>
						</form>
						<p id="output"></p>

					</div>
					<div>
						<p> </p>
					</div>




					<div class="movie-list by-2">
						<!-- <div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Maleficient</a></div>
							<p>Kurzbeschreibung....
								<li>Jahr</li>
								<li>Bewertung</li>
							</p>
						</div>
						<div class="movie">
							<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
							<div class="movie-title"><a href="single.php">Meopoldi</a></div>
							<p>Kurzbeschreibung....
								<li>Jahr</li>
								<li>Bewertung</li>
							</p>
							</div>
							<div class="movie">
								<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
								<div class="movie-title"><a href="single.php">Napeoleoni</a></div>
								<p>Kurzbeschreibung....
									<li>Jahr</li>
									<li>Bewertung</li>
								</p>
								</div>
								<div class="movie">
									<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
									<div class="movie-title"><a href="single.php">Jerkules</a></div>
									<p>Kurzbeschreibung....
										<li>Jahr</li>
										<li>Bewertung</li>
									</p>
								</div>
									<div class="movie">
										<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
										<div class="movie-title"><a href="single.php">Brazan</a></div>
										<p>Kurzbeschreibung....
											<li>Jahr</li>
											<li>Bewertung</li>
										</p>
									</div>

										<div class="movie">
											<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
											<div class="movie-title"><a href="single.php">Bokemon</a></div>
											<p>Kurzbeschreibung....
												<li>Jahr</li>
												<li>Bewertung</li>
											</p>
											</div> -->


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
					</div>


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







	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
	<script src="disableFilter.js"></script>

</body>

</html>