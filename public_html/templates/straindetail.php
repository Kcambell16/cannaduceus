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
					<a class="navbar-brand" routerLink="">Cannaduceus - Organtica</a>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Organtica
					<small>Premiere Organic Cannabis</small>
				</h1>
			</div>
		</div>
	</div>
	<!-- /.row -->

	<!-- Portfolio Item Row -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-8">
				<img class="img-responsive" src="images/organticaMain.png" alt="Organtica">
			</div>

			<div class="col-md-4">
				<h3>Organtica</h3>
				<p>As one of the new dispensaries licensed by the state in 2015 we are the new kid on the block but our experience goes well farther.  We carry some of New Mexico's best premium organic cannabis products.</p> </h3>
				<ul>
					<li>Lorem Ipsum</li>
					<li>Dolor Sit Amet</li>
					<li>Consectetur</li>
					<li>Adipiscing Elit</li>
				</ul>
			</div>

		</div>
	</div>
	<!-- /.row -->

	<!-- Related Projects Row -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-12">
				<h3 class="page-header">Organtica</h3>
			</div>

			<div class="col-sm-3 col-xs-6">
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/organtica1.gif" alt="">
				</a>
			</div>

			<div class="col-sm-3 col-xs-6">
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/platinum%20rider.gif" alt="">
				</a>
			</div>

			<div class="col-sm-3 col-xs-6">
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/Hawaii%205-0.gif" alt="">
				</a>
			</div>

			<div class="col-sm-3 col-xs-6">
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/headband.gif" alt="">
				</a>
			</div>

		</div>
	</div>
	<!-- /.row -->

	<!-- accordion -->

	<!-- Collapse accordion every time dropdown is shown -->

	<script>
		$('.dropdown-accordion').on('show.bs.dropdown', function (event) {
			var accordion = $(this).find($(this).data('accordion'));
			accordion.find('.panel-collapse.in').collapse('hide');
		});

		// Prevent dropdown to be closed when we click on an accordion link
		$('.dropdown-accordion').on('click', 'a[data-toggle="collapse"]', function (event) {
			event.preventDefault();
			event.stopPropagation();
			$($(this).data('parent')).find('.panel-collapse.in').collapse('hide');
			$($(this).attr('href')).collapse('show');
		})</script>

	<div class="dropdown dropdown-accordion text-center" data-accordion="#accordion">
		<a data-toggle="dropdown" href="#" class="btn btn-primary btn-lg">Menu<span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li>
				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									<a href="#"><img class="img-responsive" src="../app/images/grassMenu.png"></a>
								</a>
							</h4>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>

	<!-- strain info model ends here -->

	<!-- googleMap-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.8804942765364!2d-106.60115114915507!3d35.10969488023496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87227494a7677495%3A0x8cee4797537a1b28!2sOrgantica!5e0!3m2!1sen!2sus!4v1481733456314" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>

	<!-- footer inverse --->
	<footer id="footerText">
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
			</div>
		</div>
	</footer>
	<!-- end of sticky footer -->



</body>