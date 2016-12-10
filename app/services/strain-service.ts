
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Strain} from "../classes/Strain";

@Injectable()
export class StrainService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private strainUrl = "api/strain/";

	getAllStrains() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}
}