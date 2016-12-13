import {Component, OnInit, ViewChild} from "@angular/core";
import {StrainReviewService} from "../services/strainreview-service";
import {StrainService} from "../services/strain-service";
import {StrainReview} from "../classes/strainReview";
import {Strain} from "../classes/strain";
import {Router} from "@angular/router";
import {Status} from "../classes/status";

@Component({
	templateUrl: "./templates/strain.php"
})

export class StrainReviewComponent  implements OnInit {
	@ViewChild("strainReviewForm") strainReviewForm : any;
	strainReviews: StrainReview[] = [];
	strainReview: StrainReview = new StrainReview (null, "","",null,"");
	strains: Strain[] = [];
	status: Status = null;

	constructor(
		private strainReviewService: StrainReviewService,
		private strainService: StrainService,
		private router: Router
	) {}

	ngOnInit() : void {
		this.reloadStrainReviews();
	}

	reloadStrainReviews() : void {
		this.strainReviewService.getAllStrainReviews()
			.subscribe(strainReviews => {
				this.strainReviews = strainReviews;
				this.strainService.getStrainByStrainId(this.strainReview.strainReviewId)
					.subscribe(strains => this.strains=strains);
			});
	}

}
//Written by Nathan Sanchez @nsanchez121@cnm.edu