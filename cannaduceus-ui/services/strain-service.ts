
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Strain} from "../classes/strain";
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
	getStrainByStrainId(strainId:number) : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainName(strainName:string) : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainName)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainType(strainType:string) : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainType)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainThc(strainThc:number) : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainThc)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainCbd(strainCbd:number) : Observable<Strain[]> {
		return(this.http.get(this.strainUrl + strainCbd)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainByStrainDescription(strainDescription:string) : Observable<Strain[]> {
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
