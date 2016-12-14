import {NgModule} from "@angular/core";
import {BrowserModule} from "@angular/platform-browser";
import {FormsModule} from "@angular/forms";
import {HttpModule} from "@angular/http";
import {AppComponent} from "./app.component";
import {allAppComponents, appRoutingProviders, routing} from "./app.routes";
// import { AgmCoreModule } from 'angular2-google-maps/core';

import {SignUpService} from "./services/signup-service";
import {ActivationService} from "./services/activation-service";
import {DispensaryService} from "./services/dispensary-service";
import {DispensaryFavoriteService} from "./services/dispensaryfavorite-service";
import {DispensaryLeafRatingService} from "./services/dispensaryleafrating-service";
import {DispensaryReviewService} from "./services/dispensaryreview-service";
import {StrainService} from "./services/strain-service";
import {StrainFavoriteService} from "./services/strainfavorite-service";
import {StrainLeafRatingService} from "./services/strainleafrating-service";
import {StrainReviewService} from "./services/strainreview-service";


const moduleDeclarations = [AppComponent];

@NgModule({
	imports:      [BrowserModule, FormsModule, HttpModule, routing, /*AgmCoreModule.forRoot({
		apiKey: 'AIzaSyCgfh9-g1KsIZeuXd1HsJutdkvKaUzgUoc'
	})*/],
	declarations: [...moduleDeclarations, ...allAppComponents],
	bootstrap:    [AppComponent],
	providers:    [appRoutingProviders, SignUpService, ActivationService, DispensaryService, DispensaryFavoriteService, DispensaryLeafRatingService, DispensaryReviewService, StrainService, StrainFavoriteService, StrainLeafRatingService, StrainReviewService]
})

export class AppModule {}