<?php
require_once dirname(__DIR__, 3 ) . "/php/classes/autoload.php";
//require_once dirname(__DIR__, 3 ) . "/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Cannaduceus\DispensaryReview;

/**
 * * api for DispensaryReview class
 *
 * @author Hector Lozano <hlozano2@cnm.edu>
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


	//determines which HTTP Method was used.
	$method = array_key_exists("HTTP_x_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];
	$reply->method = $method;

	//stores the Primary Key for the GET, DELETE, and PUT methods in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered. Sanitize input.
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$dispensaryReviewProfileId = filter_input(INPUT_GET, "dispensaryReviewProfileId", FILTER_VALIDATE_INT);
	$dispensaryReviewDispensaryId = filter_input(INPUT_GET, "content", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);


	//Here we check and make sure that we have the Primary Key for the DELETE and PUT requests. If the request is a PUT or DELETE and no key is present in $id, An Exception is thrown.
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}


// Here, we determine if the request received is a GET request
	if($method === "GET") {
		//set XSRF cookie
	//	setXsrfCookie("/");
		// handle GET request - if id is present, that dispensaryReview is present, that dispensaryReview is returned, otherwise all dispensaryReviews are returned
	//$reply->message = 'inside get';

		// Here, we determine if a Key was sent in the URL by checking $id. If so, we pull the requested DispensaryReview by DispensaryReview ID from the DataBase and store it in $dispensaryReview.
		if(empty($dispensaryReviewId) === false) {
				$dispensaryReview = DispensaryReview::getDispensaryReviewByDispensaryReviewId($pdo, $id);
					if($dispensaryReview !== null) {
						$reply->data = $dispensaryReview;
					}
				} else if(empty($dispensaryReviewProfileId) === false) {
					$dispensaryReviews = DispensaryReview::getDispensaryReviewByDispensaryReviewProfileId($pdo, $id);
					if($dispensaryReviews !== null) {
						$reply->data = $dispensaryReviews;
					}

				} else if(empty($dispensaryReviewDispensaryId) === false) {
					$dispensaryReviews = DispensaryReview::getDispensaryReviewByDispensaryReviewDispensaryId($pdo, $id);
					if($dispensaryReviews !== null) {
						$reply->data = $dispensaryReviews;
					}
				} else {
					$dispensaryReviews = DispensaryReview::getAllDispensaryReviews($pdo);
					if($dispensaryReviews !== null) {
						$reply->data = $dispensaryReviews;
					}
				}
		} else if($method === "PUT" || $method === "POST") {

			verifyXsrf();
			$requestContent = file_get_contents("php://input");
			$requestObject = json_decode($requestContent);

			//make sure dispensaryReview content is available (required field)
			if(empty($requestObject->dispensaryReviewTxt) === true) {
				throw(new \InvalidArgumentException ("No content for Review.", 405));
			}

		}

	// update reply with exception information
} catch(Exception $exception) {
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