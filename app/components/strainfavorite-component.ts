import {Component, OnInit, ViewChild} from "@angular/core";
import {ActivatedRoute, Params} from "@angular/router";
import {StrainService} from "../services/strain-service";
import {StrainFavoriteService} from "../services/strainfavorite-service";
import {Strain} from "../classes/strain";
import {Status} from "../classes/status";
import {StrainFavorite} from "../classes/strainFavorite";

@Component({
	templateUrl: "./templates/strain.php"
})

export class StrainFavoriteComponent  implements OnInit {
	@ViewChild("strainFavoriteForm") strainFavoriteForm : any;
	strainFavorites: StrainFavorite[] = [];
	strainFavorite: StrainFavorite = new StrainFavorite (null, "","",null,""); // not sure why new is throwing a error
	strains: Strain[] = [];
	strain: Strain = new Strain (null, "","","","","");
	// strainReview: StrainReview = new StrainReview (null, "", "", null,""); do i have to have strain Reviews in here too?
	status: Status = null;

	constructor(
		private strainFavoriteService: StrainFavoriteService,
		private strainService: StrainService,
		private activatedRoute:ActivatedRoute
	) {}

	ngOnInit() : void {
		this.reloadStrainFavorites();
	}

	// reloadStrainFavorites() : void {
	// 	this.strainFavoriteService.getAllStrainFavorites() // if we don't have a get all strain Favorites then do we need this? or what would it be changed to? dec 12
	// 		.subscribe(strainFavorites => {
	// 			this.strainFavorites = strainFavorites;
	// 			this.strainFavoriteService.getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId(this.strain.strainId.profile.profileId)
	// 				.subscribe(strains => this.strains=strains);
	// 		});
	// }

	reloadStrainFavorites() : void {
		this.activatedRoute.params
			.switchMap((params : Params) => this.strainService.getStrainByStrainId(+params["strainId"]))
			.subscribe(strains => {
				this.strains = strains;

				this.strainFavoriteService.getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId(this.strain.strainId.profile.profileId)
					.subscribe(strainFavorites => this.strainFavorites = strainFavorites);

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


