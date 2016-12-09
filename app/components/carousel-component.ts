/// <reference path="jquery.d.ts"/>
/// <reference path="boot-component.ts"/>

import {Component} from '@angular/core';
import {Http} from '@angular/http';

@Component({
	selector: "carousel",
	templateUrl: 'carousel.html'
})

export class CarouselComponent {
	private start = false;
	urls = [];
	constructor(http: Http) {
		http.get('/getcarousel')
			.subscribe(res => this.startCarousel(res.json()));
	}

	startCarousel(urls: string[]) {
		this.urls = urls;
		$('.carousel').carousel();
	}

	isActive(url: string) {
		return url === this.urls[0];
	}
}