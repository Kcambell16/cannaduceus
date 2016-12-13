import {Component, ViewChild, OnInit} from "@angular/core";
import {Router} from "@angular/router";
import {Status} from "../classes/status";
import {SignUpService} from "../services/signup-service";
import {Profile} from "../classes/profile";
@Component({
	templateUrl: "./templates/signup.php",
	selector: "signup-component"
})

export class SignUpComponent implements OnInit{
	@ViewChild("signUpForm") signUpForm : any;
	profile: Profile = new Profile (null, "", "", "", "", "");
	status: Status = null;


	constructor(private signupService: SignUpService, private router: Router){}


	ngOnInit(): void {
	}
	createProfile() : void {
		this.signupService.signUpUser(this.profile)
			.subscribe(status => {
				this.status = status;
				if(status.status === 200) {
					this.signUpForm.reset()
				}
			})
	}


	}

