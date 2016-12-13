<?php

require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");
use Edu\Cnm\Cannaduceus\Profile;

/**
 * controller/api for activation token
 *
 * @author Kelly D Campbell
 */


//verify the xsrf challenge

if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

//prepare a empty reply

$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {

//Grab MySQL connection

	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/cannaduceus.ini");

//determine which http method was used

	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] :$_SERVER["REQUEST_METHOD"];

//handle REST calls, while allowing administrators to access database modifying methods

	if($method === "GET") {

//set Xsrf cookie

		setXsrfCookie("/");

//get the Sign Up based on the given field

		$profileActivationToken = filter_input(INPUT_GET, "profileActivationToken", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($profileActivationToken)) {
			throw(new \RangeException ("No ActivationToken Code"));
		}

		$profile = Profile::getProfileByProfileActivation($pdo, $profileActivationToken);

		if(empty($profile)) {
			throw(new \InvalidArgumentException ("no soup for you"));
		}

		$profile->setProfileActivation();
		$profile->update($pdo);
		$reply->message = "Your account is now activated. Welcome to Cannaduceus!";
		// ToDo header("Location: ../../../");  send t5o login add generic message Angular will handle this
	} else {
		throw(new \Exception("Invalid HTTP method"));
	}

} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
} catch(\TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}

header("Content-type: application/json");
echo json_encode($reply);
