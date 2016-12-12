$(document).ready(function() {

	/**
	 * Make the tiles square
	 **/
	var tileWidth = $(".tile").css("width");
	$(".tile").innerHeight(tileWidth);

});

var dispensaries = [
	['Organtica', 35.109704, -106.598914, 2 ]
	['Med Zen', 35.078967, -106.599227, 1 ]


];

var map = new google.maps.Map(document.getElementById('map'), {
	center: {lat: 35.0853, lng: -106.6056},
	zoom: 6
	mapTypeId: google.maps.MapTypeId, ROADMAP
});

var infoWindow = new google.maps.InfoWindow();

var marker, i;

for (i = 0; i < dispensaries.length; i++) {
	marker = new google.maps.Marker({
		position: new google.maps.LatLng(dispensaries[i][1], dispensaries[i][2]),
		map: map
	});

	google.maps.event.addListener(marker, 'click', (function(marker, i) {
		return function() {
			infoWindow.setContent(dispensaries[i][0]);
			infoWindow.open(map, marker);
		}
	})(marker, i));
}

	/*var organticaMarker = new google.maps.Marker({
		position: {lat: 35.109704, lng: -106.598914 },
		map: map
	});
	var medZenMarker = new google.maps.Marker({
		position: {lat: 35.078967, lng: -106.599227 },
		map: map
	});
}*/


