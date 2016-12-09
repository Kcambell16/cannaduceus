import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {dispensaryleafrating} from "../classes/dispensaryleafrating";
import {Status} from "../classes/status";

@Injectable()
export class dispensaryleafratingService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private dispensaruyUrl = "api/dispensaryleafrating/";

	deletedispensaryleafrating(dispensaryleafratingId: number) : Observable<Status> {
		return(this.http.delete(this.dispensaryleafratingUrl + dispensaryleafratingId)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	getAlldispensaryleafrating() : Observable<dispensaryleafrating[]> {
		return(this.http.get(this.dispensaruyUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getdispensaryleafrating(dispensaryleafratingId: number) : Observable<dispensaryleafrating> {
		return(this.http.get(this.dispensaruyUrl + dispensaryleafratingId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	createdispensaryleafrating(dispensaryleafrating: dispensaryleafrating) : Observable<Status> {
		return(this.http.post(this.dispensaryleafratingUrl, dispensaryleafrating)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	editdispensaryleafrating(dispensaryleafrating: dispensaryleafrating) : Observable<Status> {
		return(this.http.put(this.dispensaryleafratingUrl + dispensaryleafrating.dispensaryleafratingId, dispensaryleafrating)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}