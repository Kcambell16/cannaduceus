import {Component, OnInit} from "@angular/core";
import {ActivatedRoute, Params} from "@angular/router";
import {DispensaryService} from "../services/dispensary-component";
import {Dispensary} from "../classes/dispensary";
import {Status} from "../classes/status";
import {Router} from "@angular/router";

@Component({
	templateUrl: "./templates/dispensary.php"
})

export class DispensaryComponent implements OnInit  {
	deleted: boolean = false;
	dispensary: Dispensary = new Dispensary(0, "", "", "");
	status: Status = null;

	constructor(private dispensaryService: DispensaryService, private route: ActivatedRoute) {}

	ngOnInit() : void {
		this.route.params.forEach((params : Params) => {
			let misquoteId = +params["dispensaryId"];
			this.dispensaryService.getDispensary(dispensaryId)
				.subscribe(Dispensary => this.dispensary = dispensary);
		});
}
	deleteDispensary() : void {
		this.dispensaryService.deleteDispensary(this.dispensary.DispensaryId)
			.subscribe(status => {
				this.deleted = true;
				this.status = status;
				this.dispensary = new Dispensary(0, "", "", "");
			});
	}
	editDispensary() : void {
		this.dispensaryService.editDispensary(this.dispensary)
			.subscribe(status => this.status = status);
	}
}
