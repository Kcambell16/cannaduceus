<?php
/**
 * Created by PhpStorm.
 * User: Kcampbell
 * Date: 11/11/16
 * Time: 6:45 PM
 */

namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Dispensary};

//grabs the project parameters
require_once ("CannaduceusTest.php");

//grabs the class being tested
require_once (dirname(__DIR__) . "/public_html/php/classes/autoload.php");

/**
 * Full PHPUnit test for the Profile class
 * all MySQL/PDO enabled methods are tested for both invalid and valid inputs in this test
 * @see Dispensary
 * @author Kelly Campbell <kcampbell16@cnm.edu>
 **/

class DispensaryTest extends CannaduceusTest {
	/**
	 * Dispensary City
	 * @var string $VALID_DISPENSARYCITY
	 **/
	protected $VALID_DISPENSARYCITY = "Space Jam";

	/**
	 * Dispensary email
	 * @var string $VALID_DISPENSARYEMAIL
	 **/
	protected $VALID_DISPENSARYEMAIL = "Stayhigh@gmail.com";

	/**
	 * Dispensary Name
	 * @var string $VALID_DISPENSARYNAME
	 **/
	protected $VALID_DISPENSARYNAME = "Blue Kush Dispensary";

	/**
	 * Dispensary Phone
	 * @var int $VALID_DISPENSARYPHONE
	 **/
	protected $VALID_DISPENSARYPHONE = "5057829444";

	/**
	 * Dispensaries by state
	 * @var string $VALID_DISPENSARYSTATE
	 **/
	protected $VALID_DISPENSARYSTATE = "HI";

	/**
	 * Dispensary Street1
	 * @var string $VALID_DISPENSARYSTREET1
	 **/
	protected $VALID_DISPENSARYSTREET1 = "Blue Haze Blvd";

	/**
	 * Dispensary Street2
	 * @var string $VALID_DISPENSARYSTREET2
	 **/
	protected $VALID_DISPENSARYNAME = " Blue Kush Dispensary";





}