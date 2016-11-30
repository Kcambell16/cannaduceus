<?php
require_once dirname(__DIR__, 3) . "/php/classes/autoloader.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
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