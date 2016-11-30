<?php

require_once dirname(__DIR__, 3) . "/php/classes/autoloader.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Cannaduceus\Dispensary;

/**
 * * api for Dispensary class
 *
 * @author Kelly Campbell <kcampbell16@cnm.edu>
 **/


// Check the session status. If it is not active, start the session.
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

// prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
// Here we create a new stdClass named $reply. A stdClass is basically an empty bucket that we can use to store things in.
// We will use this object named $reply to store the results of the call to our API. The status 200 line adds a state variable to $reply called status and initializes it with the integer 200 (success code). The proceeding line adds a state variable to $reply called data. This is where the result of the API call will be stored. We will also update $reply->message as we proceed through the API.


try {
	//grab the mySQL DataBase connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/cannaduceus.ini");


	//determines which HTTP Method needs to be processed and stores the result in $method.
	$method = array_key_exists("HTTP_x_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//stores the Primary Key for the GET, DELETE, and PUT methods in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered.
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$dispensaryName = filter_input(INPUT_GET, "dispensaryName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	// Here, we determine if the request received is a GET request
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie("/");

		// handle GET request - if id is present, that tweet is present, that tweet is returned, otherwise all tweets are returned
		if(empty($id) === false) {
			$dispensary = Dispensary::getDispensaryByDispensaryId($pdo, $id);
			if($dispensary !== null) {
				$reply->data = $dispensary;
			}
		} elseif(empty($dispensaryName) === false) {
			$dispensary = Dispensary::getDispensariesByDispensaryName($pdo, $dispensaryName);
			if($dispensary !== null) {
				$reply->data = $dispensary;
			}
		} else {
			$dispensaries = Dispensary::getAllDispensaries($pdo);
			if($dispensaries !== null) {
				$reply->data = $dispensaries;
			}
		}
	} else{
		throw(new \InvalidArgumentException("Beat it!, kevin!", 405));
	}


	} catch (Exception $exception) {
		$reply->status = $exception->getCode();
		$reply->message = $exception->getMessage();
	} catch(TypeError $typeError) {
		$reply->status = $typeError->getCode();
		$reply->message = $typeError->getMessage();
	}

header("Content-type: application/json");
if($reply->data === null) {
	unset($reply->data);
}

// encode and return reply to front end caller
echo json_encode($reply);
