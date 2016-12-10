import {Component, OnInit, ViewChild} from "@angular/core";
import {DispensaryService} from "../services/dispensary-services";
import {Dispensary} from "../classes/dispensary";
import {Router} from "@angular/router";

@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryComponent  implements OnInit {@ViewChild("dispensaryForm") dispensaryForm : any;
	dispensary: Dispensary[] = [];

	constructor(private dispensaryService: DispensaryService, private router: Router) {}

	ngOnInit() : void {
		this.reloadDispensaries();
	}

	reloadDispensaries() : void {
		this.dispensaryService.getAllDispensaries()
			.subscribe(dispensaries => this.dispensary = dispensaries);
	}
}

