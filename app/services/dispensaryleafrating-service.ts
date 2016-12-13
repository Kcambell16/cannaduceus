import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {DispensaryLeafRating} from "../classes/dispensaryLeafRating";
import {Status} from "../classes/status";
@Injectable()
export class DispensaryLeafRatingService extends BaseService {
	constructor(protected http:Http) {
		super(http);
	}

	private dispensaryLeafRatingUrl = "api/dispensaryLeafRating/";

	getDispensaryLeafRatingsByDispensaryLeafRatingRating(dispensaryLeafRatingRating:number):Observable<DispensaryLeafRating[]> {
		return (this.http.get(this.dispensaryLeafRatingUrl + dispensaryLeafRatingRating)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getDispensaryLeafRatingByDispensaryLeafRatingDispensaryId(dispensaryLeafRatingDispensaryId:number):Observable<DispensaryLeafRating[]> {
		return (this.http.get(this.dispensaryLeafRatingUrl + dispensaryLeafRatingDispensaryId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getDispensaryLeafRatingByDispensaryLeafRatingProfileId(dispensaryLeafRatingProfileId:number):Observable<DispensaryLeafRating[]> {
		return (this.http.get(this.dispensaryLeafRatingUrl + dispensaryLeafRatingProfileId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getDispensaryLeafRatingByDispensaryLeafRatingDispensaryIdAndDispensaryLeafRatingProfileId(dispensaryLeafRatingProfileId:number):Observable<DispensaryLeafRating[]> {
		return (this.http.get(this.dispensaryLeafRatingUrl + dispensaryLeafRatingProfileId)
			.map(this.extractData)
			.catch(this.handleError));
	}

}
//Written by Nathan Sanchez @nsanchez121@cnm.edu
