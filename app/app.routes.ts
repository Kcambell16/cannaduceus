import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {StrainComponent} from "./components/strain-component";
import {DispensaryComponent} from "./components/dispensary-component";
import {SignupComponent} from "./components/signup-component";
import {SigninComponent} from "./components/signin-component";
import {ActivationComponent} from "./components/activation-component";
import {StrainFavoriteComponent} from "./components/strainfavorite-component";
import {DispensaryFavoriteComponent} from "./components/dispensaryfavorite-component";


export const allAppComponents = [HomeComponent, StrainComponent, DispensaryComponent, SignupComponent, SigninComponent, ActivationComponent, StrainFavoriteComponent, DispensaryFavoriteComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "strain", component: StrainComponent},
	{path: "dispensary", component: DispensaryComponent},
	{path: "singup", component: SignupComponent},
	{path: "signin", component: SigninComponent},
	{path: "activation", component: ActivationComponent}

];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);