import {Component} from "@angular/core";

@Component({
	// Update selector with YOUR_APP_NAME-app. This needs to match the custom tag in webpack/index.php
	selector: 'cannaduceus-app',

	// templateUrl path to your public_html/templates directory.
	templateUrl: './templates/cannaduceus-app.php'
})

export class AppComponent {
	navCollapse = true;
	title: string = 'angular2-google-maps project';
	lat: number = 35.0856004;
	lng: number = -106.6493274;

	toggleCollapse() {
		this.navCollapse = !this.navCollapse;
	}
}