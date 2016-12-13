import {Component, OnInit, ViewChild} from "@angular/core";
import {StrainLeafRatingService} from "../services/strainleafrating-service";
import {StrainService} from "../services/strain-service";
import {StrainLeafRating} from "../classes/strainLeafRating";
import {Strain} from "../classes/strain";
import {Router, Params, ActivatedRoute} from "@angular/router";
import {Status} from "../classes/status";
import 'rxjs/add/operator/switchMap';

@Component({
	templateUrl: "./templates/strain.php"
})

export class StrainLeafRatingComponent  implements OnInit {
	@ViewChild("strainLeafRatingForm") strainLeafRatingForm : any;
	strainLeafRatings: StrainLeafRating[] = [];
	strainLeafRating: StrainLeafRating = new StrainLeafRating (null, null, null); // not to sure why new is throwing a error ask about this tomorrow dec 12
	strains: Strain[] = [];
	strain: Strain = new Strain(null, "", "", "", "", "");
	status: Status = null;

	constructor(
		private strainLeafRatingService: StrainLeafRatingService,
		private strainService: StrainService,
		private router: Router,
		private activatedRoute: ActivatedRoute
	) {}

	ngOnInit() : void {
		this.reloadStrainLeafRatings();
	}

	reloadStrainLeafRatings() : void {
		this.activatedRoute.params
			.switchMap((params : Params) => this.strainLeafRatingService.getStrainLeafRatingByStrainLeafRatingStrainId(+params["leafRatingDispensaryId"]))
			.subscribe(strainLeafRatings => {    // once again ask about these
				this.strainLeafRatings = strainLeafRatings;
				this.strainService.getStrainByStrainId(this.strainLeafRating.$strainLeafRatingRating)
					.subscribe(strains => this.strains = strains);
			});
	}
}
//Written by Nathan Sanchez @nsanchez121@cnm.edu
