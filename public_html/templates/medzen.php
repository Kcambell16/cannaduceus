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

	<div id="googleMap">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13060.444707699147!2d-106.5992402!3d35.0789548!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4d976774ee601ff7!2sMedzen+Services!5e0!3m2!1sen!2sus!4v1481695831651" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

</div>
<!-- /.row -->

<!-- strain info model ends here -->
