
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {StrainReview} from "../classes/strainReview";
import {Status} from "../classes/status";
@Injectable()
export class StrainReviewService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private strainReviewUrl = "api/strainReview/";

	getAllStrainReviews() : Observable<StrainReview[]> {
		return(this.http.get(this.strainReviewUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainReviewByStrainReviewId(strainReviewId:number) : Observable<StrainReview[]> {
		return(this.http.get(this.strainReviewUrl + strainReviewId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainReviewByStrainReviewProfileId(strainReviewProfileId:number) : Observable<StrainReview[]> {
		return(this.http.get(this.strainReviewUrl + strainReviewProfileId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainReviewByStrainReviewStrainId(strainReviewStrainId:number) : Observable<StrainReview[]> {
		return(this.http.get(this.strainReviewUrl + strainReviewStrainId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainReviewByStrainReviewDateTime(strainReviewDateTime:Date) : Observable<StrainReview[]> {
		return(this.http.get(this.strainReviewUrl + strainReviewDateTime)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainReviewByStrainReviewTxt(strainReviewStrainReviewTxt:string) : Observable<StrainReview[]> {
		return(this.http.get(this.strainReviewUrl + strainReviewStrainReviewTxt)
			.map(this.extractData)
			.catch(this.handleError));
	}
	createStrainReview(strainReview: StrainReview) : Observable<Status> {
		return(this.http.post(this.strainReviewUrl,strainReview)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}
