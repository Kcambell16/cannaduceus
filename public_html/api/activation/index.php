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

		$emailActivationToken = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($emailActivationToken)) {
			throw(new \RangeException ("No ActivationToken Code"));
		}

		$Profile = Profile::getProfileByProfileActivationToken($pdo, $emailActivationToken);

		if(empty($Profile)) {
			throw(new \InvalidArgumentException ("no Profile for activation token"));
		}

		$Profile->setProfileActivationToken(null);
		$Profile->update($pdo);

		// ToDo header("Location: ../../../");  send t5o login add generic message Angular will handle this
	} else {
		throw(new \Exception("Invalid HTTP method"));
	}

} catch(Exception $exception) {

	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
	$reply->trace = $exception->getTraceAsString();

	header("Content-type: application/json");

	echo json_encode($reply);

} catch(\TypeError $typeError) {

	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
	$reply->trace = $typeError->getTraceAsString();

	header("Content-type: application/json");

	echo json_encode($reply);
}