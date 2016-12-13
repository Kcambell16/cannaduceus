<!-- jumbotron-->
<div class="container">
	<div class="jumbotron">
		<h1>Following the green trail just got easier.....</h1>
		<h2>Cannaduceus </h2>
		<p> The missing link, connecting the patient and the dispensary</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Sign in </a></p>
	</div>
</div>

<!-- Google API -->
<div class="jumbotron">
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