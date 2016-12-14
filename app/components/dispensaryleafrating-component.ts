import {Component, OnInit, ViewChild} from "@angular/core";
import {DispensaryLeafRatingService} from "../services/dispensaryleafrating-service";
import {DispensaryService} from "../services/dispensary-service";
import {DispensaryLeafRating} from "../classes/dispensaryLeafRating";
import {Dispensary} from "../classes/dispensary";
import {Router, Params, ActivatedRoute} from "@angular/router";
import {Status} from "../classes/status";
import 'rxjs/add/operator/switchMap';

@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryLeafRatingComponent  implements OnInit {
	@ViewChild("dispensaryLeafRatingForm") dispensaryLeafRatingForm : any;
	dispensaryLeafRatings: DispensaryLeafRating[] = [];
	dispensaryLeafRating: DispensaryLeafRating = new DispensaryLeafRating (null, null, null); // not to sure why new is throwing a error ask about this tomorrow dec 12
	dispensaries: Dispensary[] = [];
	dispensary:Dispensary = new Dispensary(null, "", "", "", "", "", "", "", "", "", "", "", "", "");
	status: Status = null;

	constructor(
		private dispensaryLeafRatingService: DispensaryLeafRatingService,
		private dispensaryService: DispensaryService,
		private router: Router,
		private activatedRoute: ActivatedRoute
	) {}

	ngOnInit() : void {
		this.reloadDispensaryLeafRatings();
	}

	reloadDispensaryLeafRatings() : void {
		this.activatedRoute.params
			.switchMap((params : Params) => this.dispensaryLeafRatingService.getDispensaryLeafRatingByDispensaryLeafRatingDispensaryId(+params["leafRatingDispensaryId"]))
				.subscribe(dispensaryLeafRatings => {    // once again ask about these
					this.dispensaryLeafRatings = dispensaryLeafRatings;
					this.dispensaryService.getDispensaryByDispensaryId(this.dispensaryLeafRating.$dispensaryLeafRatingRating)
						.subscribe(dispensaries => this.dispensaries = dispensaries);
				});
	}
}
/**Written by Nathan Sanchez @nsanchez121@cnm.edu*/