import {Component, OnInit} from "@angular/core";
import {ActivatedRoute, Params} from "@angular/router";
import {Status} from "../classes/status";
import {ActivationService} from "../services/activation-service";

@Component({
	templateUrl: "./templates/home.php",
	selector: "activation-component"
})

export class ActivationComponent implements OnInit{
	status: Status = null;


	constructor(private activationService: ActivationService, private route: ActivatedRoute){}


	ngOnInit(): void {
		this.route.params
			.switchMap((params : Params) => this.activationService.getProfileByProfileActivation(params['activation']))
			.subscribe(status => {
					this.status = status;
			});



	}

}