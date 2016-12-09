<?php

require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Cannaduceus\DispensaryLeafRating;

/**
 * api for Dispensary Leaf Rating class
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 */

//check the session status.  If it is not active, start the session
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
	//grab the mySQL DataBase Connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/cannaduceus.ini");

	//determines which HTTP Method needs to be processed and stores the result in $method.
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//stores the Primary Key for the GET, DELETE, and PUT methods in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered.

	$id = //grab user's profile id from session here
	$dispensaryId = filter_input(INPUT_GET, "dispensaryId", FILTER_VALIDATE_INT);
	$profileId = filter_input(INPUT_GET, "profileId", FILTER_VALIDATE_INT);
	$dispensaryLeafRatingRating = filter_input(INPUT_GET, "leafRatingRating", FILTER_VALIDATE_INT);

	// For PUT or POST requests, be sure user is logged in
	//if(($method === "POST") && (empty($_SESSION["profile"] === true))) {
		//throw(new InvalidArgumentException("Please Log In or SIgn Up", 401));
	//}

	//Here, we determine if the request received is a GET request
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		// handle GET request - if id is present, that dispensary is present, that dispensary is returned, otherwise all dispensaries are returned

		//here, we determine if a Key was sent in the URL by checking $dispensaryLeafRatingRating. If so, we pull the requested dispensaryLeafRating by dispensaryLeafRatingRating from the DataBase and store it in $dispensaryLeafRating
		if((empty($dispensaryId) === false) && (empty($profileId) === false)) {
			$dispensaryLeafRating = DispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingDispensaryIdAndDispensaryLeafRatingProfileId($pdo, $dispensaryId, $profileId);
			if($dispensaryLeafRating !== null) {
				$reply->data = $dispensaryLeafRating;
			}
		} elseif((empty($dispensaryId) === false) && (empty($profileId) === false)) {
			$dispensaryLeafRating = DispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingDispensaryId($pdo, $dispensaryId);
			if($dispensaryLeafRating !== null) {
				$reply->data = $dispensaryLeafRating;
			}
			// get by dispensaryId

		} elseif((empty($dispensaryId) === false) && (empty($profileId) === false)) {
			$dispensaryLeafRating = DispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingProfileId($pdo,$profileId);
			if($dispensaryLeafRating !== null) {
				$reply->data = $dispensaryLeafRating;
			}
			//get by profile id

		} elseif((empty($dispensaryId) === false) && (empty($profileId) === false )) {
			$dispensaryLeafRating = DispensaryLeafRating::getDispensaryLeafRatingsByDispensaryLeafRatingRating($pdo, $dispensaryLeafRatingRating);
			if($dispensaryLeafRating !== null) {
				$reply->data = $dispensaryLeafRating;
			}
			//get by rating

		} else {
			throw(new \InvalidArgumentException("Why You No Have Data???"));
			//throw exception - Y U no have data?
		}

	} else if($method === "POST") {

		verifyXsrf();
		$requestContent = file_get_contents("php://input");
		//Retrieves the JSON package that the front end sent, and stores it in $requestContent. Here we are using file_get_contents("php://input") to get the request from the front ent.  file_get_contents() is a PHP function that reads a file into a string.  The argument for the function, here, is "php://input". This is a read only stream that allows raw data to be read from the front end request which is, in this case, a JSON package

		$requestObject = json_decode($requestContent);
		//This line then decodes the JSON package and stores that result in $requestObject

		//Here we check to make sure that there is content for the dispensaryLeafRating.  If $requestObject->dispensaryLeafRatingRating is empty an exception is thrown.  The PUT method will use the new content to UPDATE an existing dispensaryLeafRating and the POST method will use the content to create a new dispensaryLeafRating
		if(empty($requestObject->dispensaryLeafRatingRating) === true) {
			throw(new \InvalidArgumentException("Dispensary hasn't been smoked yet", 405));
		}

		//check if dispensaryId is available
		if(empty($requestObject->dispensaryLeafRatingDispensaryId) === true) {
			throw(new \InvalidArgumentException("Y U no have Dispensary?", 405));
		}

		//create new dispensaryLeafRating
		$dispensaryLeafRating = new DispensaryLeafRating($requestObject->dispensaryLeafRatingRaitng, $requestObject->dispensaryLeafDispensaryId, $requestObject->dispensaryLeafProfileId);
		$dispensaryLeafRating->insert($pdo);

		$dispensaryLeafRating->setDispensaryLeafRatingRating($requestObject->dispensaryLeafRatingRating);
		$dispensaryLeafRating->setDispensaryLeafRatingDispensaryId($requestObject->dispensaryLeafRatingDispensaryId);
		$dispensaryLeafRating->setDispensaryLeafRatingProfileId($requestObject->profileId->$id);
		//set dispensaryId
		//set profileId to $id

		//create new dispensaryLeafRating
		$dispensaryLeafRating = new DispensaryLeafRating();

		//calls the dispensaryLeafRatingRating UPDATE function and updates the Database
		$dispensaryLeafRating->insert($pdo);

		//stores the "DispensaryLeafRating updated OK" message in the $reply->message state variable
		$reply->message = "Dispensary Rating Created OK";


	} else {
		throw (new InvalidArgumentException("Invalid HTTP Method Request", 405));
		//if the method request is not GET, PUT, or POST an exception is thrown
	}
	//update reply with exception information
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
	$reply->trace = $exception->getTraceAsString();
} catch(TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}
//In these lines, the Exceptions are caught and the $reply object is updated with the data from the caught exception. Note that $reply->status will be updated with the correct code in the case of an Exception

header("Content-type: application/json");
//sets up the response header
if($reply->data === null) {
	unset($reply->data);
}

echo json_encode($reply);
//finally - JSON encodes the $reply object and sends it back to the front end.