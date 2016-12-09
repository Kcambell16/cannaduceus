import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {dispensary} from "../classes/dispensary";
import {Status} from "../classes/status";

@Injectable()
export class DispensaryService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private dispensaruyUrl = "api/dispensary/";

	deleteDispensary(dispensaryId: number) : Observable<Status> {
		return(this.http.delete(this.dispensaryUrl + dispensaryId)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	getAllDispensary() : Observable<Dispensary[]> {
		return(this.http.get(this.dispensaruyUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getDispensary(dispensaryId: number) : Observable<Dispennsary> {
		return(this.http.get(this.dispensaruyUrl + dispensaryId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	createdispensary(dispensary: dispensary) : Observable<Status> {
		return(this.http.post(this.dispensaryUrl, dispensary)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	editdispensary(dispensary: dispensary) : Observable<Status> {
		return(this.http.put(this.dispensaryUrl + dispensary.dispensaryId, dispensary)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}