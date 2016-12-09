<?php
require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";


use Edu\Cnm\Cannaduceus\StrainFavorite;

/**
 * * api for strainFavorite class
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


	//Here we check and make sure that we have the Primary Key for the DELETE and PUT requests. If the request is a PUT or DELETE and no key is present in $id, An Exception is thrown.
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}
	// Here, we determine if the request received is a GET request
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie("/");
		// handle GET request - if id is present, that dispensaryFavorite is present, that dispensaryFavorite is returned, otherwise all dispensaryFavorites are returned


		// Here, we determine if a Key was sent in the URL by checking $id. If so, we pull the requested dispensaryFavorite by dispensaryFavorite ID from the DataBase and store it in $strainFavorite.
		if(empty($strainFavoriteProfileId) === false) {
			$strainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteProfileId($pdo, $profileId);
			if($strainFavorite !== null) {
				$reply->data = $strainFavorite;
				// Here, we store the retrieved dispensaryFavorite in the $reply->data state variable.
			}
		} else if(empty($strainFavoriteProfileId)) {
			$strainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId($pdo, $id, $strainFavorite);
			if($strainFavorite !== null) {
				$reply->data = $strainFavorite;
			}
		} else if(empty($strainFavoriteProfileId)) {
			$strainFavorite = StrainFavorite::getStrainFavoriteByProfileId($pdo, $profileId);
			if($strainFavorite !== null) {
				$reply->data = $strainFavorite;
			}
		} else if(empty($strainFavoriteProfileId( $strainFavoriteStrainId)));
		$strainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteStrainId($pdo, $profileId, $strainId, $strainFavorite);
		if($strainFavorite !== null) {
			$reply->data = $strainFavorite;
		}
	} else if($method === "PUT" || $method === "POST") {

		verifyXSRF();
		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestObject);

		//make sure tweet content is available (required field)
		if(empty($requestObject->strainFavorite) === true) {
			throw(new \InvalidArgumentException ("no Favorite added", 405));
		}
		//  make sure profileId is available
		if(empty($requestObject->profileId) === true) {
			throw(new \InvalidArgumentException ("No Profile ID.", 405));
		}
	} else if($method === "POST") {
		// create a new favorite and insert into the database
		$strainFavorite = new StrainFavorite(null, $requestObject->profileId, $requestObject->strainFavorite, null);
		$strainFavorite->insert($pdo);
		// update dat reply
		$reply->message = "favorite has been created";
	}



}		// update reply with exception information
catch(Exception $exception) {
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