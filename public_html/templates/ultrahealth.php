<!-- Portfolio Item Heading -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Ultrahealth
				<small>Most locations in the state!</small>
			</h1>
		</div>
	</div>
</div>
<!-- /.row -->

<!-- Portfolio Item Row -->
<div class="container-fluid">
	<div class="row">

		<div class="col-md-8">
			<img class="img-responsive" src="app/images/dispensaries/ultraHealth.png" alt="Ultra Health">
		</div>

		<div class="col-md-4">
			<h3>Ultrahealth</h3>
			<p>One of New Mexico's biggest medical cannabis producers.  We offer some of the finest strains and products found anywhere!</p>
			<h3>We Offer</h3>
			<ul>
				<li>100% Organic Cannabis</li>
				<li>Top of the line topicals</li>
				<li>Concentrates both Co2 and BHO</li>
				<li>Wide Variety of Edibles</li>
			</ul>
		</div>

	</div>
</div>
<!-- /.row -->

<!-- Related Projects Row -->
<div class="container-fluid">
	<div class="row">

		<div class="col-lg-12">
			<h3 class="page-header">Featured Strains</h3>
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
	$('.dropdown-accordion').on('show.bs.dropdown', function(event) {
		var accordion = $(this).find($(this).data('accordion'));
		accordion.find('.panel-collapse.in').collapse('hide');
	});

	// Prevent dropdown to be closed when we click on an accordion link
	$('.dropdown-accordion').on('click', 'a[data-toggle="collapse"]', function(event) {
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
			<iframe
				src="https://www.google.com/maps/embed/v1/search
  ?key=AIzaSyAggJGtnaPOqmXKhXTpI7okrUu1KK4-4_Y
  &q=Ultrahealth+New+Mexico"
				width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>