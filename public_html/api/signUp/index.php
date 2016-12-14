<?php
require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/sendMail.php";
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
use Edu\Cnm\Cannaduceus;
/**
 * api for signup
 *
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 **/
//verify the session, start if not active
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
try {
	//grab the mySQL connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/cannaduceus.ini");
	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];
	$reply->method = $method;
	if($method === "POST") {
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);
		if(empty($requestObject->profileUserName) === true) {
			throw(new \InvalidArgumentException ("Must fill in profile name", 405));
		} else {
			$profileUserName = filter_var($requestObject->profileUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}
		if(empty($requestObject->profileEmail) === true) {
			throw(new \InvalidArgumentException ("Must enter a valid email address", 405));
		} else {
			$profileEmail = filter_var($requestObject->profileEmail, FILTER_SANITIZE_EMAIL);
		}
		if(empty($requestObject->password) === true) {
			throw(new \InvalidArgumentException ("Must input valid password", 405));
		} else {
			$password = filter_var($requestObject->password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		$salt = bin2hex(random_bytes(32));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144);
		$profileAccessLevel = 0;
		$profileActivation = bin2hex(random_bytes(16));
		$profile = new Cannaduceus\Profile(null, $profileUserName, $profileEmail,$hash, $salt, $profileActivation);
		$profile->insert($pdo);




		$messageSubject = "Cannaduceus Welcomes You! -- Account Activation";
		//building the activation link that can travel to another server and still work. This is the link that will be clicked to confirm the account.
		// FIXME: make sure URL is /public_html/php/api/activation/$activation
		//TODO:make sure the basepath is correct
		$basePath = dirname($_SERVER["SCRIPT_NAME"], 2);
		var_dump($basePath);
		$urlGlue = $basePath . "/activation/" . $profileActivation;
		$confirmLink = "https://" . $_SERVER["SERVER_NAME"] . $urlGlue;
		$message = <<<EOF
		<h2>Welcome to Cannaduceus.</h2>
<p>In order to start rating your favorite local dispensaries please visit the following URL to set a new password and complete the registration process: </p>
<p><a href="$confirmLink">$confirmLink</a></p>
EOF;
		$response = sendEmail($profileEmail, $profileUserName, $messageSubject, $message);
		if($response === "Email sent.") {
			$reply->message = "Sign up was successful, please check your email for activation message.";
		} else {
			throw(new InvalidArgumentException("Error sending email."));
		}



	} else{
		throw (new InvalidArgumentException("Invalid http request"));
	}

}catch(\Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
} catch(\TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}
header("Content-type: application/json");
echo json_encode($reply);
