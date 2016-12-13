import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {StrainComponent} from "./components/strain-component";
import {DispensaryComponent} from "./components/dispensary-component";
import {SignupComponent} from "./components/signup-component";
import {SigninComponent} from "./components/signin-component";

export const allAppComponents = [HomeComponent, StrainComponent, DispensaryComponent, SignupComponent, SigninComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "strain", component: StrainComponent},
	{path: "dispensary", component: DispensaryComponent},
	{path: "signup", component: SignupComponent},
	{path: "signin", component: SigninComponent},

];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);