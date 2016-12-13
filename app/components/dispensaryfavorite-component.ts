import {Component, OnInit, ViewChild} from "@angular/core";
import {ActivatedRoute, Params} from "@angular/router";
import {DispensaryService} from "../services/dispensary-service";
import {DispensaryFavoriteService} from "../services/dispensaryfavorite-service";
import {Dispensary} from "../classes/dispensary";
import {Status} from "../classes/status";
import {DispensaryFavorite} from "../classes/dispensaryFavorite";




@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryFavoriteComponent  implements OnInit {
	@ViewChild("dispensaryFavoriteForm") dispensaryFavoriteForm:any;
	dispensaryFavorites:DispensaryFavorite[] = [];
	dispensaryFavorite:DispensaryFavorite = new DispensaryFavorite(null, null); // not sure why new is throwing a error
	dispensaries:Dispensary[] = [];
	dispensary:Dispensary = new Dispensary(null, "", "", "", "", "", "", "", "", "", "", "", "", "");
	status:Status = null;

	constructor(private dispensaryFavoriteService:DispensaryFavoriteService,
					private dispensaryService:DispensaryService,
					private activatedRoute:ActivatedRoute) {
	}

	ngOnInit():void {
		this.reloadDispensaryFavorites();
	}

	reloadDispensaryFavorites():void {
		this.activatedRoute.params
			.switchMap((params:Params) => this.dispensaryService.getDispensaryByDispensaryId(+params["dispensaryId"])) // ask about this for sure! dec 12
			.subscribe(dispensaries => {
				this.dispensaries = dispensaries;

				this.dispensaryFavoriteService.getDispensaryFavoriteByDispensaryFavoriteDispensaryIdAndDispensaryFavoriteProfileId(this.dispensary.dispensaryId)
					.subscribe(dispensaryFavorites => this.dispensaryFavorites = dispensaryFavorites);

			});
	}
}
//Written by Nathan Sanchez @nsanchez121@cnm.edu
