import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {dispensaryfavorite} from "../classes/dispensaryfavorite";
import {Status} from "../classes/status";

@Injectable()
export class dispensaryfavoriteService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private dispensaruyUrl = "api/dispensaryfavorite/";

	deletedispensaryfavorite(dispensaryfavoriteId: number) : Observable<Status> {
		return(this.http.delete(this.dispensaryfavoriteUrl + dispensaryfavoriteId)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	getAlldispensaryfavorite() : Observable<dispensaryfavorite[]> {
		return(this.http.get(this.dispensaruyUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getdispensaryfavorite(dispensaryfavoriteId: number) : Observable<Dispensaryfavorite> {
		return(this.http.get(this.dispensaryfavoriteUrl + dispensaryfavoriteId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	createdispensaryfavorite(dispensaryfavorite: dispensaryfavorite) : Observable<Status> {
		return(this.http.post(this.dispenaryfavoriteUrl, dispensaryfavorite)
			.map(this.extractMessage)
			.catch(this.handleError));
	}

	editdispensaryfavorite(dispensaryfavorite: dispensaryfavorite) : Observable<Status> {
		return(this.http.put(this.dispensaryfavoriteUrl + dispensaryfavorite.dispensaryfavoriteId, dispensaryfavorite)
			.map(this.extractMessage)
			.catch(this.handleError));
	}
}