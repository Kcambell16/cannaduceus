import {Component, OnInit, ViewChild} from "@angular/core";
import {DispensaryReviewService} from "../services/dispensaryreview-service";
import {DispensaryService} from "../services/dispensary-service";
import {DispensaryReview} from "../classes/dispensaryreview";
import {Dispensary} from "../classes/dispensary";
import {Router} from "@angular/router";
import {Status} from "../classes/status";

@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryReviewComponent  implements OnInit {
	@ViewChild("dispensaryReviewForm") dispensaryReviewForm : any;
	dispensaryReviews: DispensaryReview[] = [];
	dispensaryReview: DispensaryReview = new DispensaryReview (null,null); // not to sure why new is throwing a error ask about this tomorrow dec 12
	dispensaries: Dispensary[] = [];
	dispensary:Dispensary = new Dispensary(null, "", "", "", "", "", "", "", "", "", "", "", "", "");
	status: Status = null;

	constructor(
		private dispensaryReviewService: DispensaryReviewService,
		private dispensaryService: DispensaryService,
		private router: Router
	) {}

	ngOnInit() : void {
		this.reloadDispensaryReviews();
	}

	reloadDispensaryReviews() : void {
		this.dispensaryReviewService.getAllDispensaryReviews()
			.subscribe(dispensaryReviews => {    // once again ask about these
				this.dispensaryReviews = dispensaryReviews;
				this.dispensaryService.getDispensaryByDispensaryId(this.dispensaryReview.dispensaryReviewId)
					.subscribe(dispensaries => this.dispensaries=dispensaries);
			});
	}
	// createStrainReview() : void {
	// 	this.strainReviewService.createStrainReview(this.strainReview)
	// 		.subscribe(status => {
	// 			this.status = status;
	// 			if(status.apiStatus === 200) {
	// 				this.reloadStrainReviews();
	// 				this.strainReviewForm.reset();
	// 			}
	// 		}); add me on snapchat @lawnnome

	//}
}
