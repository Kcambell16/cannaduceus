import {Component, OnInit, ViewChild} from "@angular/core";
import {DispensaryLeafRatingService} from "../services/dispensaryleafrating-service";
import {DispensaryService} from "../services/dispensary-service";
import {DispensaryLeafRating} from "../classes/dispensaryLeafRating";
import {Dispensary} from "../classes/dispensary";
import {Router} from "@angular/router";
import {Status} from "../classes/status";

@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryLeafRatingComponent  implements OnInit {
	@ViewChild("dispensaryLeafRatingForm") dispensaryLeafRatingForm : any;
	dispensaryLeafRatings: DispensaryLeafRating[] = [];
	dispensaryLeafRating: DispensaryLeafRating = new DispensaryLeafRating (null,null); // not to sure why new is throwing a error ask about this tomorrow dec 12
	dispensaries: Dispensary[] = [];
	dispensary:Dispensary = new Dispensary(null, "", "", "", "", "", "", "", "", "", "", "", "", "");
	status: Status = null;

	constructor(
		private dispensaryLeafRatingService: DispensaryLeafRatingService,
		private dispensaryService: DispensaryService,
		private router: Router
	) {}

	ngOnInit() : void {
		this.reloadDispensaryLeafRatings();
	}

	reloadDispensaryLeafRatings() : void {
		this.dispensaryLeafRatingService.getAllDispensaryLeafRatings()
			.subscribe(dispensaryLeafRatings => {    // once again ask about these
				this.dispensaryLeafRatings = dispensaryLeafRatings;
				this.dispensaryService.getDispensaryByDispensaryId(this.dispensaryLeafRating.$dispensaryLeafRatingRating)
					.subscribe(dispensaries => this.dispensaries=dispensaries);
			});
	}
}
//Written by Nathan Sanchez @nsanchez121@cnm.edu