<!-- -->
<div class="jumbotron text-center">
	<h1> Find Your Prefect Strain</h1>
	<strong> Explore strains and their affects</strong>
</div>

<!-- strain pics -->
<div class="container">
	<div class="row">

		<div *ngFor="let strain of strains" class="col-xs-6 col-sm-2">
			<a href="images/berry-kush.jpeg" class="tile-link">
				<div class="tile">
					<div class="strain-type small">
						{{strain.strainType}}
					</div>
					<div class="strain-abbr-title text-center">
						<h3>{{strain.strainName}}</h3>
					</div>
					<div class="strain-name text-right small">
						{{strain.strainDescription}}
					</div>z
				</div>
			</a>
<!--		</div>-->

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

			<div *ngFor="let strainReview of strainReviews" class="col-md-3 col-sm-6 hero-feature">
				<div class="thumbnail">
					<img src="http://placehold.it/800x500" alt="">
					<div class="caption">
						<h3>strainName</h3>
						<p>{{strainReview.strainReviewTxt}}</p>
						<p>
							<a href="#" class="btn btn-default text-center">Review </a>
						</p>
					</div>
				</div>
			</div>
