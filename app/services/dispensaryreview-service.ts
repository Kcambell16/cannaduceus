import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {DispensaryReview} from "../classes/dispensaryReview";
import {Status} from "../classes/status";
@Injectable()
export class DispensaryReviewService extends BaseService {
	constructor(protected http:Http) {
		super(http);
	}

	private dispensaryReviewUrl = "api/dispensaryReview/";

	getDispensaryReviewsByDispensaryReviewId(dispensaryReviewId:number):Observable<DispensaryReview[]> {
		return (this.http.get(this.dispensaryReviewUrl + dispensaryReviewId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getDispensaryReviewsByDispensaryReviewProfileId(dispensaryReviewProfileId:number):Observable<DispensaryReview[]> {
		return (this.http.get(this.dispensaryReviewUrl + dispensaryReviewProfileId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getDispensaryReviewsByDispensaryReviewDispensaryId(dispensaryReviewDispensaryId:number):Observable<DispensaryReview[]> {
		return (this.http.get(this.dispensaryReviewUrl + dispensaryReviewDispensaryId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getDispensaryReviewByDispensaryReviewTxt(dispensaryReviewTxt:number):Observable<DispensaryReview[]> {
		return (this.http.get(this.dispensaryReviewUrl + dispensaryReviewTxt)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getAllDispensaryReviews(dispensaryReviewDateTime:Date):Observable<DispensaryReview[]> {
		return (this.http.get(this.dispensaryReviewUrl + dispensaryReviewDateTime)
			.map(this.extractData)
			.catch(this.handleError));
	}
}
//Written by Nathan Sanchez @nsanchez121@cnm.edu