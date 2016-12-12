import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service"; // ask about this not sure
import {StrainFavorite} from "../classes/strainFavorite";
// import {Status} from "../classes/status"; commented this out make sure we ask about this dec 12
@Injectable()
export class StrainFavoriteService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private strainFavoriteUrl = "api/strainFavorite/";

	getStrainFavoriteByStrainFavoriteProfileId(profileId:number) : Observable<StrainFavorite[]> {
		return(this.http.get(this.strainFavoriteUrl + profileId) // ask about what goes in the returns dec 12
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainFavoriteByStrainFavoriteStrainId(strainId:number) : Observable<StrainFavorite[]> {
		return(this.http.get(this.strainFavoriteUrl + strainId)
			.map(this.extractData)
			.catch(this.handleError));
	}
	getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId(profileId:number) : Observable<StrainFavorite[]> {
		return(this.http.get(this.strainFavoriteUrl + profileId)
			.map(this.extractData)
			.catch(this.handleError));
	}
}
