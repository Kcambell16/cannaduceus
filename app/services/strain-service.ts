
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Strain} from "../classes/Strain";
import {Status} from "../classes/status";
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
	getStrainByStrainId() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainName() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainName)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainType() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainType)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainThc() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainThc)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainCbd() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainCbd)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainDescription() : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainDescription)
			.map(this.extractData)
			.catch(this.handleError));
	}
	createStrain(strain: Strain) : Observable<Status> {
		return(this.http.post(this.strainUrl,strain)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}
