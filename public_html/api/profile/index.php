<?php

require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";


use Edu\Cnm\Cannaduceus\Profile;

/**
 * * api for profile class
 *
 * @author Nathan Sanchez <nsanchez121@cnm.com>
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
	$profileUserName = filter_input(INPUT_GET, "profileUserName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES); // added dec 5
	$profileEmail = filter_input(INPUT_GET, "profileEmail",FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);


	//Here we check and make sure that we have the Primary Key for the DELETE and PUT requests. If the request is a PUT or DELETE and no key is present in $id, An Exception is thrown.
//	if(($method === "PUT") && (empty($_SESSION ["profile"] === true))) {
//		throw(new RuntimeException("please log in!", 401));
//	}
//
//	if(($method === "PUT") && (($_SESSION ["profile"]->getProfileId()) !== $id) || $id <= 0) {
//		throw (new InvalidArgumentException("please log in!", 401));
//	}

// Here, we determine if the reques received is a GET request
	if($method === "GET") {
		//set dat XSRF cookie
		setXsrfCookie();

		// get a specific profile
		if(empty($id) === false) {
			$profile = Profile::getProfileByProfileId($pdo, $id);
			if($profile !== null) {
				$reply->data = $profile;
			}

		}elseif(empty($profileUserName) === false) {
			$profile = Profile::getProfileByProfileUserName($pdo, $profileUserName);
			if($profile !== null) {
				$reply->data = $profile;
			}
		}else if (empty($profileEmail) === false) {
			$profile = Profile::getProfileByProfileEmail($pdo, $profileEmail);
			if($profile !== null) {
				$reply->data = $profile;
			}
		}
	} else if($method === "PUT") {
		verifyXSRF(); //changed from function verifyXSRF(){}
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);

		// make sure that profileId is available!
		if(empty($requestObject->profileId) == true) {
			throw(new \InvalidArgumentException("no content for profile id", 405));
		}
		// make sure that the profileUserName is available!
		if(empty($requestObject->profileUserName) === true) {
			throw(new \InvalidArgumentException("no content for profile name", 405));
		}
		// make sure that the profileEmail is available!!
		if(empty($requestObject->profileEmail) === true) {
			throw(new \InvalidArgumentException("no content for profile email", 405));
		}
		$profile = Profile::getProfileByProfileId($pdo, $id);
		if(empty($profile) === true) {
			throw(new \InvalidArgumentException("profile not found:(", 404));
		}

		// now retrieve the profile that will be updated in this PUT!
		$profile->setProfileId($requestObject->profileId);
		$profile->setProfileUserName($requestObject->profileUserName);
		$profile->setProfileEmail($requestObject->profileEmail);

		$profile->update($pdo);

		// Update dat reply message
		$reply->message = "The profile is updated";


		// determines if the request is a DELETE request.
	} else {
		throw (new InvalidArgumentException("Invalid HTTP Method Request", 405));
		// If the method request is not GET, PUT, POST, an exception is thrown
	}

	// update reply with exception information
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
} catch(TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}
// In these lines, the Exceptions are caught and the $reply object is updated with the data from the caught exception. Note that $reply->status will be updated with the correct error code in the case of an Exception.
// Nathan's one cool dude

header("Content-type: application/json");
// sets up the response header.
if($reply->data === null) {
	unset($reply->data);
}
// encode and return reply to front end caller
echo json_encode($reply);

//works only after putting 683 at the end of the path
