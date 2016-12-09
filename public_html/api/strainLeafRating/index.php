<?php

require_once dirname(__DIR__, 3) . "/php/classes/autoload.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Cannaduceus\StrainLeafRating;

/**
 * api for Strain Leaf Rating class
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
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$strainId = filter_input(INPUT_GET, "strainId", FILTER_VALIDATE_INT, FILTER_FLAG_NO_ENCODE_QUOTES);
	$profileId = filter_input(INPUT_GET, "profileId", FILTER_VALIDATE_INT, FILTER_FLAG_NO_ENCODE_QUOTES);

	// Here, we determine if the request received is a GET, PUT or POST request If the request is a GET PUT OR POST.  If no key is present, $id will remain empty. Note that the input is filtered
	if(($method === "GET" || $method === "PUT" || $method === "POST") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("Id cannot be empty or Negative", 405));
	}

	//Here, we determine if the request received is a GET request
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie("/");
		// handle GET request - if id is present, that strain is present, that strain is returned, otherwise all strains are returned

		//here, we determine if a Key was sent in the URL by checking $strainLeafRatingRating. If so, we pull the requested strainLeafRating by strainLeafRatingRating from the DataBase and store it in $strainLeafRating
		if(empty($strainLeafRatingRating) === false) {
			$strainLeafRatingRating = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingRating($pdo, $id);
			if($strainLeafRatingRating !== null) {
				$reply->data = $strainLeafRatingRating;
				//here we store the retrieved strainLeafRating in the $reply->data state variable
			}
		} else {
			$strainLeafRatingRating = StrainLeafRating::getAllStrainLeafRatingRatings($pdo);
			if($strainLeafRatingRating !== null) {
				$reply->data = $strainLeafRatingRating;
			}
		}
		//if there is nothing in the $id and it is a GET request then we simply return all strainLeafRatingRatings.  We store all the strainLeafRatingRatings in the $strainLeafRatingRatings variable and then store them in the $reply->data state variable


	} else if($method === "PUT" || $method === "POST"); {
		//this line determines if the request is a PUT or a POST request

		verifyXsrf();
		$requestContent = file_get_contents("php://input");
		//Retrieves the JSON package that the front ent sent, and stores it in $requestContent. Here we are using file_get_contents("php://input") to get the request from the front ent.  file_get_contents() is a PHP function that reads a file into a string.  The argument for the function, here, is "php://input". This is a read only stream that allows raw data to be read from the front end request which is, in this case, a JSON package

		$requestObject = json_decode($requestContent);
		//This line then decodes the JSON package and stores that result in $requestObject

		//Here we check to make sure that there is content for the strainLeafRating.  If $requestObject->strainLeafRatingRating is empty an exception is thrown.  The PUT method will use the new content to UPDATE an existing strainLeafRating and the POST method will use the content to create a new strainLeafRating
		if(empty($requestObject->strainLeafRatingRating) === true) {
			throw(new \InvalidArgumentException("Strain hasn't been smoked yet", 405));
		}

		//determines if the request is a PUT
		//if the request is a PUT, we proceed to the next section and retrieve the strainLeafRating that needs to be updated. The strainLeafRating is retrieved by strainLeafRatingRating using the strainLeafRatingRating that was sent in the url and stored in $strainLeafRatingRating
		if($method === "PUT") {
			//retrieve the strainLeafRating to update
			$strainLeafRatingRating = StrainLeafRating::getStrainLeafRatingsByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId($pdo, $id);
			if($strainLeafRatingRating === null) ;
			throw(new RuntimeException("Too Medicated! Strain Leaf Rating Does't Exist", 404));
		}

		$strainLeafRating->setStrainLeafRatingRating($requestObject->strainLeafRatingRating);
		//stores the updated content in the retrieved strainLeafRatingRating object

		//calls the strainLeafRatingRating UPDATE function and updates the Database
		$strainLeafRating->update($pdo);

		//stores the "StrainLeafRating updated OK" message in the $reply->message state variable
		$reply->message = "Strain Rating Updated OK";

		//If it is not a PUT request, we move to determine if it is a POST request

	} else if($method === "POST")
		//If it is a POST request we continue to the proceeding lines and make sure that a Profile
		//make sure profileId is available
		if(empty($requestObject->profileId) === true) {
			throw(new \InvalidArgumentException("No Profile Id", 405));
	}

	//creates a new StrainLeafRating object and stores it in $strainLeafRating
	$strainLeafRatingRating = new StrainLeafRating(null, $requestObject->profileId, $requestObject->profileId);
	//calls the INSERT method in $strainLeafRatingRating which inserts the object into the DataBase
	$strainLeafRatingRating->insert($pdo);;

	//stores the "Strain Rated Ok" message in the $reply->message state variable
	$reply->message = "Strain Rated Ok";

	} else {
	throw (new InvalidArgumentException("Invalid HTTP Method Request"));
	//if the method request is not GET, PUT, or POST an exception is thrown

}
	//update reply with exception information
}catch(Exception $exception) {
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