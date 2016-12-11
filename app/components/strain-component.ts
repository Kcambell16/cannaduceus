import {Component, OnInit, ViewChild} from "@angular/core";
import {StrainService} from "../services/strain-service";
import {Strain} from "../classes/strain";
import {Router} from "@angular/router";
import {Status} from "../classes/status";

@Component({
	templateUrl: "./templates/strain.php"
})

export class StrainComponent  implements OnInit {
	@ViewChild("strainForm") strainForm : any;
	strains: Strain[] = [];
	strain: Strain = new Strain (null, "","","","","");
	status: Status = null;

	constructor(
		private strainService: StrainService,
		private router: Router
	) {}

	ngOnInit() : void {
		this.reloadStrains();
	}

	reloadStrains() : void {
		this.strainService.getAllStrains()
			.subscribe(strains => this.strains = strains);
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
