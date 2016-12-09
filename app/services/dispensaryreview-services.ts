import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {dispensary} from "../classes/dispensaryreview";
import {Status} from "../classes/status";

@Injectable()
export class DispensaryService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private dispensaruyUrl = "api/dispensaryreview/";

	deleteDispensaryReview(dispensaryreviewId: number) : Observable<Status> {
		return(this.http.delete(this.dispensaryReviewUrl + dispensaryreviewId)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	getAllDispensaryReview() : Observable<DispensaryReview[]> {
		return(this.http.get(this.dispensaryreviewUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getDispensaryReview(dispensaryreviewId: number) : Observable<DispensaryReview> {
		return(this.http.get(this.getAllDispensaryReview()Url + dispensaryreviewId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	createdispensaryreview(dispensaryreview: dispensaryreview) : Observable<Status> {
		return(this.http.post(this.dispensaryreviewUrl, dispensaryreview)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	editdispensaryreview(dispensaryreview: dispensaryreview) : Observable<Status> {
		return(this.http.put(this.dispensaryreviewUrl + dispensaryreview.dispensaryreviewId, dispensaryreview)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}