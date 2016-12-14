<body>
	<!-- Portfolio Item Heading -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Alaskan Thunder Funk</h1>
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
				<h3>Alaskan Thunder Funk</h3>
				<p>Alaskan Thunder Fuck (also referred to as ATF, Matanuska Thunder Fuck or Matanuska Tundra) is a legendary sativa-dominant strain originating in the Matanuska Valley area of Alaska.  According to the legend, it was originally a Northern California sativa crossed with a Russian ruderalis, but sometime in the late 70s it was crossed with Afghani genetics to make it heartier.  ATF usually presents large, beautifully frosted buds with incredibly strong odors of pine, lemon, menthol, and skunk.  Known for possessing a relaxing yet intensely euphoric high, it is also described as having a “creeper” effect as well as pronounced appetite enhancement.</p>
				<ul>
					<h4> Strain Attributes</h4>
					<li>Happy</li>
					<li>Euphoric</li>
					<li>Uplifted</li>
					<li>Energetic</li>
					<li>Relaxed</li>
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