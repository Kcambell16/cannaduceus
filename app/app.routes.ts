import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {ActivationComponent} from "./components/activation-component";
import {StrainComponent} from "./components/strain-component";
import {DispensaryComponent} from "./components/dispensary-component";
import {SignUpComponent} from "./components/signup-component";
import {SigninComponent} from "./components/signin-component";
import {StrainDetailComponent} from "./components/straindetail-component";
import {MedzenComponent} from "./components/medzen-component";
import {OrganticaComponent} from "./components/organtica-component";
import {UltrahealthComponent} from "./components/ultrahealth-component";
import {AmnesiaComponent} from "./components/amnesia-component";
import {DispensaryFavoriteComponent} from "./components/dispensaryfavorite-component";
import {DispensaryLeafRatingComponent} from "./components/dispensaryleafrating-component";
import {DispensaryReviewComponent} from "./components/dispensaryreview-component";
import {HighsignupComponent} from "./components/highsignup-component";

export const allAppComponents = [HomeComponent, ActivationComponent, StrainComponent, DispensaryComponent, SignUpComponent, SigninComponent, StrainDetailComponent, MedzenComponent, OrganticaComponent, UltrahealthComponent, AmnesiaComponent,DispensaryFavoriteComponent, DispensaryLeafRatingComponent,DispensaryReviewComponent,HighsignupComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "strain", component: StrainComponent},
	{path: "dispensary", component: DispensaryComponent},
	{path: "signup", component: SignUpComponent},
	{path: "signin", component: SigninComponent},
	{path: "straindetail", component: StrainDetailComponent},
	{path: "medzen", component: MedzenComponent},
	{path: "organtica", component: OrganticaComponent},
	{path: "ultrahealth", component: UltrahealthComponent},
	{path: "amnesia", component: AmnesiaComponent},
	{path: "highsignup", component: HighsignupComponent},

];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);