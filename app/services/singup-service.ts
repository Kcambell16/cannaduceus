import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Dispensary} from "../classes/dispensary";

@Injectable()
export class DispensaryService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private dispensaryUrl = "api/signUp/";
}
