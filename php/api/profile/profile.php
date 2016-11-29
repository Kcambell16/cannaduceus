<?php

require_once "autoloader.php";
require_once "/lib/xsrf.php";
require_once "/etc/apache2/cannaduceus/encrypted-config.php";

use Edu\Cnm\cannaduceus;

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
	$pdo = connectToEncryptedMySQL("/etc/apache2/cannaduceus/profile.ini");



	//determines which HTTP Method needs to be processed and stores the result in $method.
	$method = array_key_exists("HTTP_x_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//stores the Primary Key for the GET, DELETE, and PUT methods in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered.
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);



	//Here we check and make sure that we have the Primary Key for the DELETE and PUT requests. If the request is a PUT or DELETE and no key is present in $id, An Exception is thrown.
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}

// Here, we determine if the reques received is a GET request
if($method === "GET") {
	//set XSRF cookie
	setXsrfCookie("/");
	// handle GET request - if id is present, then profile is presant that profile  is returned,



	// Here, we determine if a Key was sent in the URL by checking $id. If so, we pull the requested Profile by Profile ID from the DataBase and store it in $profile.
	if(empty($profileId) === false) {
		$profile = Profile::getProfileByProfileId($pdo, $profileId);
		if($profile !== null) {
			$reply->data = $profile;
			// here we store the $profile in the $reply->data state variable
		}
	} else if(empty($profileUsername) === false) {
	$profile = Profile::getProfilebyProfileUserName($pdo, $profileId);
		if($profile !== null) {
			$reply->data = $profile;
		}
	} else if (empty($profileEmail) === false) {
		$profile = Profile::getProfileByProfileEmail($pdo, $profileId);
		if($profile !== null) {
			$reply->data = $profile;
		}
	}









	}
}





