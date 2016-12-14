<body>
	<!-- Portfolio Item Heading -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Amnesia</h1>
			</div>
		</div>
	</div>
	<!-- /.row -->

	<!-- Portfolio Item Row -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-8">
				<img class="img-responsive" src="../app/images/strains/AtFunkheader.jpeg" alt="Atf">
			</div>

			<div class="col-md-4">
				<h3>Amnesia</h3>
				<p>Amnesia is typically a sativa-dominant cannaibs strain with some variation between breeders. Skunk, Cinderella 99, and Jack Herer are some of Amnesia’s genetic forerunners, passing on uplifting, creative, and euphoric effects ideal for treating mood disorders. Growers should expect a 9-10 week flowering period with moderate yields. This strain normally has a high THC and low CBD profile and produces intense psychotropic effects that new consumers should be wary of.</p>
				<ul>
					<h4> Strain Attributes</h4>
					<li>Happy</li>
					<li>Relaxed</li>
					<li>Uplifted</li>
					<li>Euphoric</li>
					<li>Energetic/li>
				</ul>
			</div>

		</div>
	</div>
	<!-- /.row -->

	<!-- Related Projects Row -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-12">
				<h3 class="page-header">Amnesia</h3>
			</div>

			<div class="col-sm-3 col-xs-6">
				<a href="#">
					<img class="img-responsive portfolio-item" src="images/amnesia.jpeg" alt="amnesiapicture">
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

</body>