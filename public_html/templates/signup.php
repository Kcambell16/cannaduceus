<!-- -->
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-8 col-md-10 col-sm-offset-2 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Sign Up With Cannaduceus<small>It's free!</small></h3>
				</div>
				<div class="panel-body">
					<form #sighUpForm="ngForm" name="signUpForm" id="signUpForm" class="form-vertical well"
					(ngSubmit)="createProfile();">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group"
								[ngClass]="{'has-error': profileUserName.touched && profileUserName.invalid}">
									<input type="text" name="profileUserName" id="profileUserName" class="form-control input-sm" placeholder="Username" required [(ngModel)]="profile.profileUserName" #profileUserName="ngModel" maxlength="32">
								</div>
								<div [hidden]="profileUserName.valid || profileUserName.pristine"
									  class="alert-danger"
									  role="alert">
									<p *ngIf="profileUserName.errors?.required">UserName is required</p>
									<p *ngIf="profileUserName.errors?.maxlength">UserName is too long</p>
								</div>
							</div>
						</div>

						<div class="form-group"
							  [ngClass]="{'has-error': profileEmail.touched && profileEmail.invalid}">
							<input type="email" name="profileEmail" id="profileEmail" class="form-control input-sm" placeholder="Email Address" maxlength="128"
									 required [(ngModel)]="profile.profileEmail" #profileEmail="ngModel">
						</div>
						<div [hidden]="profileEmail.valid || profileEmail.pristine"
							  class="alert-danger"
							  role="alert">
							<p *ngIf="profileEmail.errors?.required">Email is required</p>
							<p *ngIf="profileEmail.errors?.maxlength">Email is too long</p>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group"
									  [ngClass]="{'has-error': password.touched && password.invalid}">
									<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password"
											 required [(ngModel)]="profile.password" #password="ngModel">
								</div>
								<div [hidden]="password.valid || password.pristine"
									  class="alert-danger"
									  role="alert">
									<p *ngIf="password.errors?.required">Password is required</p>

								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group"
									  [ngClass]="{'has-error': password_confirmation.touched && password_confirmation != profile.password}">
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
								</div>
								<div [hidden]="password_confirmation.valid || password_confirmation.pristine || password_confirmation == profile.password"
									  class="alert-danger"
									  role="alert">
									<p *ngIf="password_confirmation.errors?.required">Password is required</p>

								</div>
							</div>
						</div>

						<input type="submit" value="Sign Up" class="btn btn-info btn-block">

					</form>
				</div>
			</div>
		</div>
	</div>
</div>