import {Component, OnInit, ViewChild} from "@angular/core";
import {ActivatedRoute, Params} from "@angular/router";
import {DispensaryService} from "../services/dispensary-services";
import {DispensaryFavoriteService} from "../services/dispensaryfavorite-service";
import {Dispensary} from "../classes/dispensary";
import {DispensaryFavorite} from "../classes/dispensaryFavorite";
import {Status} from "../classes/status";



@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryFavoriteComponent  implements OnInit {
	@ViewChild("dispensaryFavoriteForm") dispensaryFavoriteForm : any;
	dispensaryFavorites: DispensaryFavorite[] = [];
	dispensaryFavorite: DispensaryFavorite = new DispensaryFavorite (null, "","",null,""); // not sure why new is throwing a error
	dispensaries: Dispensary[] = [];
	dispensary: Dispensary = new Dispensary (null, "","","","","");
	status: Status = null;

	constructor(
		private dispensaryFavoriteService: DispensaryFavoriteService,
		private dispensaryService: DispensaryService,
		private activatedRoute:ActivatedRoute
	) {}

	ngOnInit() : void {
		this.reloadDispensaryFavorites();
	}

	reloadDispensaryFavorites() : void {
		this.dispensaryFavoriteService.getAllDispensaryFavorites() // if we dont have a get all strain Favorites then do we need this? or what would it be changed to? dec 12
			.subscribe(dispensaryFavorites => {
				this.dispensaryFavorites = dispensaryFavorites;
				this.dispensaryFavoriteService.getDispensaryFavoriteByDispensaryFavoriteDispensaryIdAndDispensaryFavoriteProfileId(this.ge)
					.subscribe(dispensaries => this.dispensaries=dispensaries);
			});
	}

	// createStrainFavorite() : void {
	// 	this.strainService.createStrainFavorite(this.strain)
	// 		.subscribe(status => {
	// 			this.status = status;
	// 			if(status.apiStatus === 200) {
	// 				this.reloadStrainFavorites();
	// 				this.strainFavoriteForm.reset();
	// 			}
	// 		});

	//}
}
