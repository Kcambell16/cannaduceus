import {Component, OnInit, ViewChild} from "@angular/core";
import {ActivatedRoute, Params} from "@angular/router";
import {StrainService} from "../services/strain-service";
import {StrainReviewService} from "../services/strainreview-service";
import {Strain} from "../classes/strain";
import {Status} from "../classes/status";
import {StrainReview} from "../classes/strainReview";

@Component({
	templateUrl: "./templates/strain.php"
})

export class StrainComponent  implements OnInit {
	@ViewChild("strainForm") strainForm : any;
	strains: Strain[] = [];
	strain: Strain = new Strain (null, "","","","","");
	strainReviews: StrainReview[] = [];
	strainReview: StrainReview = new StrainReview (null, "", "", null,"");
	status: Status = null;

	constructor(
		private strainService: StrainService,
		private strainReviewService: StrainReviewService,
		private activatedRoute:ActivatedRoute
	) {}

	ngOnInit() : void {
		this.reloadStrains();
	}

	reloadStrains() : void {
		this.activatedRoute.params
			.switchMap((params : Params) => this.strainService.getStrainByStrainId(+params["strainId"]))
			.subscribe(strains => {
				this.strains = strains;

				this.strainReviewService.getStrainReviewByStrainReviewStrainId(this.strain.strainId)
					.subscribe(strainReviews => this.strainReviews = strainReviews);

			});

	}

	// createStrain() : void {
	// 	this.strainService.createStrain(this.strain)
	// 		.subscribe(status => {
	// 			this.status = status;
	// 			if(status.apiStatus === 200) {
	// 				this.reloadStrains();
	// 				this.strainForm.reset();
	// 			}
	// 		});

	//}
}
