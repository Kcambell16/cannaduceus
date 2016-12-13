import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service"; // ask about this not sure
import {DispensaryFavorite} from "../classes/dispensaryFavorite";
// import {Status} from "../classes/status"; commented this out make sure we ask about this dec 12
@Injectable()
export class DispensaryFavoriteService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private dispensaryFavoriteUrl = "api/dispensaryFavorite/";

	getDispensaryFavoriteByDispensaryFavoriteProfileId(profileId:number) : Observable<DispensaryFavorite[]> {
		return(this.http.get(this.dispensaryFavoriteUrl + profileId) // ask about what goes in the returns dec 12
			.map(this.extractData)
			.catch(this.handleError));
	}
	getDispensaryFavoriteByDispensaryFavoriteDispensaryId(dispensaryId:number) : Observable<DispensaryFavorite[]> {
		return(this.http.get(this.dispensaryFavoriteUrl + dispensaryId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getDispensaryFavoriteByDispensaryFavoriteDispensaryIdAndDispensaryFavoriteProfileId(profileId:number) : Observable<DispensaryFavorite[]> {
		return(this.http.get(this.dispensaryFavoriteUrl + profileId)
			.map(this.extractData)
			.catch(this.handleError));
	}
}
//Written by Nathan Sanchez @nsanchez121@cnm.edu