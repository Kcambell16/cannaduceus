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
		<title>Cannaduceus Dispensary page </title>

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
							<li><a routerLink="/signup">Signin</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<main>
				<router-outlet></router-outlet>
			</main>
		</header>
		<!-- Portfolio Item Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Med Zen
					<small>West side and Nob Hill locations!</small>
				</h1>
			</div>
		</div>
		<!-- /.row -->

		<!-- Portfolio Item Row -->
		<div class="row">

			<div class="col-md-8">
				<img class="img-responsive" src="images/medzen_sign.jpg" alt="">
			</div>

			<div class="col-md-4">
				<h3>Med Zen</h3>
				<p>Welcome to Medzen Services Inc., we are a licensed, non-profit medical cannabis producer with a convenient pickup location in the Rio Rancho/Albuquerque metro area. Here at Medzen Services, our main focus is to serve those patients in need, who are licensed by the New Mexico Department of Health Medical Cannabis Program. All of our medication is grown organically, without harmful pesticides.</p>
				<h3>Dispensary Info</h3>
				<ul>
					<li>Eddibles</li>
					<li>Indica, Sativa and Hybrid flowers</li>
					<li>Topicals and other methods of medicating</li>
					<li>Concentrates, both Co2 and BHO</li>
				</ul>
			</div>

		</div>
		<!-- /.row -->

		<!-- Related Projects Row -->
		<div class="row">

			<div class="col-lg-12">
				<h3 class="page-header">Featured Strains</h3>
			</div>

			<div class="col-sm-3 col-xs-6">
				<h2>Star Kush OG</h2>
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/organtica1.gif" alt="">
				</a>
			</div>

			<div class="col-sm-3 col-xs-6">
				<h2>Platnium Rider</h2>
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/platinum%20rider.gif" alt="">
				</a>
			</div>

			<div class="col-sm-3 col-xs-6">
				<h2>Hawaii 5-0</h2>
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/Hawaii%205-0.gif" alt="">
				</a>
			</div>

			<div class="col-sm-3 col-xs-6">
				<h2>Headband</h2>
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/headband.gif" alt="">
				</a>
			</div>

			<div>
			<h1>Current Menu</h1>
					<div id="grassMenu">
						<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">
							<img class="img-responsive" src="/app/images/grassMenu.png">
						</div>
						</div>
					</div>
			</div>

			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13060.444707699147!2d-106.5992402!3d35.0789548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4d976774ee601ff7!2sMedzen+Services!5e0!3m2!1sen!2sus!4v1481695831651" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

		</div>
		<!-- /.row -->

		<!-- strain info model ends here -->

		<!-- footer inverse --->
		<footer class="footer navbar-inverse">
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
