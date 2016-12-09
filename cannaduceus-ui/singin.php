<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Font Awesome -->
		<link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" />

		<!-- Custom CSS Goes HERE -->
		<link rel="stylesheet" href="css/styles.css" type="text/css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery - required for Bootstrap Components -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<title>Cannaduceus Signing page </title>


		<!-- BEGIN # BOOTSNIP INFO -->
<div class="container">
	<div class="row">
		<h1 class="text-center">Modal Login with jQuery Effects</h1>
		<p class="text-center"><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Open Login Modal</a></p>
	</div>
</div>
<!-- END # BOOTSNIP INFO -->

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" align="center">
				<img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
			</div>

			<!-- Begin # DIV Form -->
			<div id="div-forms">

				<!-- Begin # Login Form -->
				<form id="login-form">
					<div class="modal-body">
						<div id="div-login-msg">
							<div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
							<span id="text-login-msg">Type your username and password.</span>
						</div>
						<input id="login_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
						<input id="login_password" class="form-control" type="password" placeholder="Password" required>
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
						</div>
						<div>
							<button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
							<button id="login_register_btn" type="button" class="btn btn-link">Register</button>
						</div>
					</div>
				</form>
				<!-- End # Login Form -->

				<!-- Begin | Lost Password Form -->
				<form id="lost-form" style="display:none;">
					<div class="modal-body">
						<div id="div-lost-msg">
							<div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
							<span id="text-lost-msg">Type your e-mail.</span>
						</div>
						<input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
					</div>
					<div class="modal-footer">
						<div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
						</div>
						<div>
							<button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
							<button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
						</div>
					</div>
				</form>
				<!-- End | Lost Password Form -->

				<!-- Begin | Register Form -->
				<form id="register-form" style="display:none;">
					<div class="modal-body">
						<div id="div-register-msg">
							<div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
							<span id="text-register-msg">Register an account.</span>
						</div>
						<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
						<input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
						<input id="register_password" class="form-control" type="password" placeholder="Password" required>
					</div>
					<div class="modal-footer">
						<div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
						</div>
						<div>
							<button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
							<button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
						</div>
					</div>
				</form>
				<!-- End | Register Form -->

			</div>
			<!-- End # DIV Form -->

		</div>
	</div>
</div>
<!-- END # MODAL LOGIN -->