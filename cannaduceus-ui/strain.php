<!DOCTYPE html>
<html>
	<head>
		<!-- The 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- FontAwesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

		<!-- Our Custom CSS -->
		<link rel="stylesheet" href="style.css" type="text/css">

		<!-- jQuery (required for Bootstap's JS plugins) -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- Custom JavaScript -->
		<script src="js/custom.js" type="text/javascript"></script>

		<title>Strain</title>
	</head>

	<body>
		<header>
			<!-- navbar --->
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" >
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" routerLink="">Cannaduceus</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a routerLink="">Home</a></li>
							<li><a routerLink="/strain">Strain</a></li>
							<li><a routerLink="/dispensary">Dispensary</a></li>
							<li><a routerLink="/signup">Signin</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<main>
				<router-outlet></router-outlet>
			</main>
		</header>

		<!-- jumbotron ---->
		<div class="jumbotron text-center">
			<h1> Find Your Prefect Strain</h1>
			<strong> Explore strains and their affects</strong>
		</div>

		<!-- strain pics -->
		<div class="container">
			<div class="row">

				<div class="col-xs-6 col-sm-2">
					<a href="images/berry-kush.jpeg" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				</div>
			</div>


		<div class="container">
			<div class="row">

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

			</div>
		</div>


		<div class="container">
			<div class="row">

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-2">
					<a href="#" class="tile-link">
						<div class="tile">
							<div class="strain-type small">
								Hybrid
							</div>
							<div class="strain-abbr-title text-center">
								<h3>Chz</h3>
							</div>
							<div class="strain-name text-right small">
								Cheezy
							</div>
						</div>
					</a>
				</div>

			</div>
		</div>
		<!-- strain info model ends here -->

		<!-- review section -->
		<!-- Title -->
		<div class="row">
			<div class="col-lg-12">
				<h3>Strain Review</h3>
			</div>
		</div>
		<!-- /.row -->

		<!-- Page Features -->
		<div class="row text-center">

			<div class="col-md-3 col-sm-6 hero-feature">
				<div class="thumbnail">
					<img src="images/alaskan-thunder-funk.jpeg" alt="bubba-kush">
					<div class="caption">
						<h3>Alaskan Thunder Funk</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<p>
							<a href="#" class="btn btn-default text-center">Review </a>
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 hero-feature">
				<div class="thumbnail">
					<img src="images/amnesia.jpeg" alt="amnesia">
					<div class="caption">
						<h3>Amnesia</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<p>
							<a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 hero-feature">
				<div class="thumbnail">
					<img src="images/banana-split.jpeg" alt="banana-split">
					<div class="caption">
						<h3>Banana Split</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<p>
							<a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 hero-feature">
				<div class="thumbnail">
					<img src="images/berry-kush.jpeg" alt="berry-kush">
					<div class="caption">
						<h3>Berry Kush</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<p>
							<a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
						</p>
					</div>
				</div>
			</div>

			<div class="row text-center">

				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<img src="images/bewitched.jpeg" alt="bewitched">
						<div class="caption">
							<h3>Bewitched</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p>
								<a href="#" class="btn btn-default text-center">Review </a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<img src="images/bubba-kush.jpeg" alt="bubba-kush">
						<div class="caption">
							<h3>Bubba Kush</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p>
								<a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<img src="images/buddha-tahoe.jpeg" alt="buddha-tahoe">
						<div class="caption">
							<h3>Buddha Tahoe</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p>
								<a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
							</p>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<img src="images/catarac-kush.jpeg" alt="catarac-kush">
						<div class="caption">
							<h3>Catarac Kush</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<p>
								<a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
							</p>
						</div>
					</div>
				</div>


		</div>
		<!-- /.row -->

		<!-- footer inverse --->
		<footer class="footer navbar-inverse navbar-bottom">
			<div class="container">
				<div class="row">
					<!-- contact section in footer-->
					<div class="col-xs-12 col-md-6">
						<a src="/cannaduceus-ui/images/cannaduceus-logo.png" alt="logo"></a>
						<h4> Contact Us</h4>
						<p>Email: Admin@Cannaduceus.com</p>
						<p>Phone: 1(800)555-5555</p>
						<p href="url...">Privacy Policy</p>
						<p href="rul...."> Terms of Use</p>
					</div>
					<div class="col-xs-12 col-md-6">
						<strong>Company</strong>
						<p>About Us</p>
						<p>Careers</p>
						<h4>Connect with Cannaduceus</h4>
						<a class="btn btn-social-icon btn-twitter">
							<span class="fa fa-twitter"> Twitter</span>
						</a>
						<a class="btn btn-social-icon btn-facebook">
							<span class="fa fa-facebook"> Facebook</span>
						</a>
						<a class="btn btn-social-icon btn-instagram">
							<span class="fa fa-instagram"> Instagram</span>
						</a>
						<!-- for additional info if needed-->
					</div>
					<div class="col-xs-6 col-sm-4">
					</div>
				</div>
			</div>
		</footer>
		<!-- end of sticky footer -->



	</body>
	</html>