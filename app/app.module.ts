import {NgModule} from "@angular/core";
import {BrowserModule} from "@angular/platform-browser";
import {FormsModule} from "@angular/forms";
import {HttpModule} from "@angular/http";
import {AppComponent} from "./app.component";
import {allAppComponents, appRoutingProviders, routing} from "./app.routes";
import { AgmCoreModule } from 'angular2-google-maps/core';

const moduleDeclarations = [AppComponent];

@NgModule({
	imports:      [BrowserModule, FormsModule, HttpModule, routing, AgmCoreModule.forRoot({
		apiKey: 'AIzaSyCgfh9-g1KsIZeuXd1HsJutdkvKaUzgUoc'
	})],
	declarations: [...moduleDeclarations, ...allAppComponents],
	bootstrap:    [AppComponent],
	providers:    [appRoutingProviders]
})

export class AppModule {}