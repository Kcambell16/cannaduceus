<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="UTF-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			<meta name="viewport" content="width=device-width, initial-scale=1" />

			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Font Awesome -->
			<link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />

			<!-- Custom CSS Goes HERE -->
			<link rel="stylesheet" href="css/styles.css" type="text/css">

			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->

			<!-- jQuery - required for Bootstrap Components -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<title>Cannaduceus Home page </title>
		</head>

	<body>
		<header>
	<!-- navbar --->
	<nav class="navbar navbar-default navbar-inverse" >
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
					<li><a routerLink="/signup">Signup</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<main>
		<router-outlet></router-outlet>
	</main>
		</header>

	<!-- jumbotron-->
		<div class="container">
	<div class="jumbotron">
		<h1>Following the green trail just got easier.....</h1>
			<h2>Cannaduceus </h2>
		<p> The missing link, connecting the patient and the dispensary</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Sign in </a></p>
	</div>
			<!-- modal sign in ( how do i link my log in sign in to this modal)
			<!-- BEGIN # BOOTSNIP INFO -->
			<div class="container">
				<div class="row">
					<p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Open Login Modal</a></p>
				</div>
			</div>
			<!-- END # BOOTSNIP INFO -->

			<!-- BEGIN # MODAL LOGIN -->
			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" align="center">
							<img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</button>
						</div>

						<!-- Begin # DIV Form -->
						<div id="div-forms">

							<!-- Begin # Login Form -->
							<form id="login-form">
								<div class="modal-body">
									<div id="div-login-msg">
										<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
										<span id="text-login-msg">Type your username and password.</span>
									</div>
									<input id="login_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
									<input id="login_password" class="form-control" type="password" placeholder="Password" required>
									<div class="checkbox">
										<label>
											<input type="checkbox"> Remember me
										</label>
									</div>
								</div>
								<div class="modal-footer">
									<div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
									</div>
									<div>
										<button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
										<button id="login_register_btn" type="button" class="btn btn-link">Register</button>
									</div>
								</div>
							</form>
							<!-- End # Login Form -->

							<!-- Begin | Lost Password Form -->
							<form id="lost-form" style="display:none;">
								<div class="modal-body">
									<div id="div-lost-msg">
										<div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
										<span id="text-lost-msg">Type your e-mail.</span>
									</div>
									<input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
								</div>
								<div class="modal-footer">
									<div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
									</div>
									<div>
										<button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
										<button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
									</div>
								</div>
							</form>
							<!-- End | Lost Password Form -->

							<!-- Begin | Register Form -->
							<form id="register-form" style="display:none;">
								<div class="modal-body">
									<div id="div-register-msg">
										<div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
										<span id="text-register-msg">Register an account.</span>
									</div>
									<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
									<input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
									<input id="register_password" class="form-control" type="password" placeholder="Password" required>
								</div>
								<div class="modal-footer">
									<div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
									</div>
									<div>
										<button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
										<button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
									</div>
								</div>
							</form>
							<!-- End | Register Form -->

						</div>
						<!-- End # DIV Form -->

					</div>
				</div>
			</div>
			<!-- END # MODAL LOGIN -->

	</div>
		<!-- google api start -->
		<h3>Locate Dispensary</h3>
		<div id="map"></div>
		<script>
			function initMap() {
				var uluru = {lat: -25.363, lng: 131.044};
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 4,
					center: uluru
				});
				var marker = new google.maps.Marker({
					position: uluru,
					map: map
				});
			}
		</script>
		<script async defer
				  src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
		</script>
		</div>
<!-- end google api--->
		<!-- Featured dispensaries here using bootstrap carousel -->
			<carousel>
				<div id="carousel-generic" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div *ngFor="let url of urls" class="item" [ngClass]="{active: isActive(url)}">
							<img src="{{url}}" alt="{{url}}">
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</carousel>

			<!-- Insert all needed scripts here -->
			<script>
				System.import('carousel.js');
			</script>

		<!-- Google API -->
		<div class="well well-lg">
			<style>
				#map {
					height: 400px;
					width: 100%;
				}
			</style>

			<h3>Locate Dispensary</h3>
			<div id="map"></div>
			<script>
				function initMap() {
					var uluru = {lat: -25.363, lng: 131.044};
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 4,
						center: uluru
					});
					var marker = new google.maps.Marker({
						position: uluru,
						map: map
					});
				}
			</script>
			<script async defer
					  src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
			</script>
		</div>
		<!-- google api start -->


		<!-- sticky footer inverse --->
		<footer class="footer navbar-inverse navbar-fixed-bottom">
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
