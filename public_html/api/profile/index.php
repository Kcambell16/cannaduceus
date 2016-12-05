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


	//Here we check and make sure that we have the Primary Key for the DELETE and PUT requests. If the request is a PUT or DELETE and no key is present in $id, An Exception is thrown.
	//if(($method === "DELETE" || $method === "PUT") && (empty($id) === true || $id < 0)) {
		//throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	//}

	if((empty($_SESSION["profile"]) === false) && (($_SESSION ["profile"]->getProfileId()) === $id)) {


// Here, we determine if the reques received is a GET request

		if($method === "GET") {
			//set XSRF cookie
			setXsrfCookie("/");

			// Here, we determine if a Key was sent in the URL by checking $id. If so, we pull the requested Profile by Profile ID from the DataBase and store it in $profile.
			if(empty($profileId) === false) {
				$profile = Profile::getProfileByProfileId($pdo, $id);
				if($profile !== null) {
					$reply->data = $profile;
					// here we store the $profile in the $reply->data state variable
				}
			} else if(empty($profileUsername) === false) {
				$profile = Profile::getProfileByProfileUserName($pdo, $id); // changed from id to profileUserName dec 5
				if($profile !== null) {
					$reply->data = $profile->toArray();
				}
			}
		}
	} elseif($method === "PUT") {
		verifyXsrf();
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

		// now retrieve the profile that will be updated in this PUT!
		$profile->setProfileId($requestObject->profileId);
		$profile->setProfileUserName($requestObject->profileUserName);
		$profile->setProfileEmail($requestObject->profileEmail);

		$profile->update($pdo);

		// Update dat reply message
		$reply->message = "The profile is updated";


		// determins if the request is a DELETE request.
	} else if($method === "DELETE") {
		verifyXsrf();

		// retrieve the Profile to be deleted
		$profile = Profile::getProfileByProfileId($pdo, $id);
		// If the request is DELETE, the requested profile is pulled from the database using the Key in $id and stored in $profile


		// make sure that the requested  is valid by checking to see if $profile is null.
		if($profile === null) {
			throw(new RuntimeException("Profile does not exist", 404));
		}


		// calls the DELETE method on the retrieved Profile. This deletes the profile from the database.
		$profile->delete($pdo);


		// stores the "profile deleted OK" message in the $reply->message state variable.
		$reply->message = "profile deleted OK";
	} else {
		throw (new InvalidArgumentException("Invalid HTTP Method Request", 405));
		// If the method request is not GET, PUT, POST, an exception is thrown
	}

	// update reply with exception information
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
	$reply->trace = $exception->getTraceAsString();
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






