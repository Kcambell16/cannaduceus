import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {StrainComponent} from "./components/strain-component";
import {DispensaryComponent} from "./components/dispensary-component";

export const allAppComponents = [HomeComponent, StrainComponent, DispensaryComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "strain", component: StrainComponent},
	{path: "dispensary", component: DispensaryComponent},
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);