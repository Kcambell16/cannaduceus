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

<!-- footer inverse --->
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
