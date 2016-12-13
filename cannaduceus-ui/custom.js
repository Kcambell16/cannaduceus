$(document).ready(function() {

	/**
	 * Make the tiles square
	 **/
	var tileWidth = $(".tile").css("width");
	$(".tile").innerHeight(tileWidth);

});


/*var locations = [
	['Organtica', 35.109704, -106.598914, 2],
	['Med Zen', 35.078967, -106.599227, 1]
];

var map = new google.maps.Map(document.getElementById('map'), {
	zoom: 6,
	center: new google.maps.LatLng(35.0853, -106.6056),
	mapTypeId: google.maps.MapTypeId.ROADMAP
});

var infoWindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < locations.length; i++) {
	marker = new google.maps.Marker({
		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		map: map
	});

	google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
			infoWindow.setContent(locations[i][0]);
			infoWindow.open(map, marker);
		}
	})(marker, i));
}*/

function initMap() {
	var newMexico = {lat: 35.0853, lng: -106.6056};
	var map = new google.maps.Map(document.getElementById('map'), {
		center: newMexico,
		zoom: 6
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.078967, lng: -106.599227},
		map: map,
		label: 'A',
		title: 'Organtica'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.080607, lng: -106.608882},
		map: map,
		label: 'B'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.145105, lng: -106.694324},
		map: map,
		label: 'C'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.109554, lng: -106.561824},
		map: map,
		label: 'D'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.317779, lng: -106.553026},
		map: map,
		label: 'E'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.659752, lng: -105.968863},
		map: map,
		label: 'F'
	});

	var marker = new google.maps.Marker({
		position: {lat: 32.739090, lng: -103.128047},
		map: map,
		label: 'G'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.212677, lng: -106.698600},
		map: map,
		label: 'H'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.109704, lng: -106.598914},
		map: map,
		label: 'I'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.662924, lng: -105.961594},
		map: map,
		label: 'J'
	});

	var marker = new google.maps.Marker({
		position: {lat: 36.383583, lng: -105.586163},
		map: map,
		label: 'K'
	});

	var marker = new google.maps.Marker({
		position: {lat: 36.004142, lng: -106.064051},
		map: map,
		label: 'L'
	});

	var marker = new google.maps.Marker({
		position: {lat: 35.593476, lng: -105.214103},
		map: map,
		label: 'M'
	});
}


