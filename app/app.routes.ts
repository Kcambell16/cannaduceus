import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {StrainComponent} from "./components/strain-component";

export const allAppComponents = [HomeComponent, StrainComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "strain", component: StrainComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);