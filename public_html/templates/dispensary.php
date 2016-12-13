<div>This is the Dispensary view</div>



<!-- Portfolio Item Row -->
<div *ngFor="let dispensary of dispensaries" class="row">

	<div class="col-md-8">
		<img class="img-responsive" [src]="'images/dispensary/dispensary-' + dispensary.dispensaryId" alt="">
	</div>

	<div class="col-md-4">
		<h3>{{ dispensary.dispensaryName }}</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
		<h3>Dispensary Info</h3>
		<ul>
			<li>Lorem Ipsum</li>
			<li>Dolor Sit Amet</li>
			<li>Consectetur</li>
			<li>Adipiscing Elit</li>
		</ul>
	</div>

</div>
<!-- /.row -->
