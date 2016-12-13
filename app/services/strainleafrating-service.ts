import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {StrainLeafRating} from "../classes/strainLeafRating";
import {Status} from "../classes/status";
@Injectable()
export class StrainLeafRatingService extends BaseService {
	constructor(protected http:Http) {
		super(http);
	}

	private strainLeafRatingUrl = "api/strainLeafRating/";

	getStrainLeafRatingsByStrainLeafRatingRating(strainLeafRatingRating:number):Observable<StrainLeafRating[]> {
		return (this.http.get(this.strainLeafRatingUrl + strainLeafRatingRating)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainLeafRatingByStrainLeafRatingStrainId(strainLeafRatingDispensaryId:number):Observable<StrainLeafRating[]> {
		return (this.http.get(this.strainLeafRatingUrl + strainLeafRatingDispensaryId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainLeafRatingByStrainLeafRatingProfileId(strainLeafRatingProfileId:number):Observable<StrainLeafRating[]> {
		return (this.http.get(this.strainLeafRatingUrl + strainLeafRatingProfileId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId(strainLeafRatingProfileId:number):Observable<StrainLeafRating[]> {
		return (this.http.get(this.strainLeafRatingUrl + strainLeafRatingProfileId)
			.map(this.extractData)
			.catch(this.handleError));
	}

}