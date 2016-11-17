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
require_once (dirname(__DIR__) . "classes/Dispensary.php");

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
	 * @char string $VALID_DISPENSARYSTATE
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
	protected $VALID_DISPENSARYSTREET2 = "Heaven Ave";

	/**
	 * Dispensary Url
	 * @var string $VALID_DISPENSARYURL
	 **/
	protected $VALID_DISPENSARYURL = "HowHigh.com";

	/**
	 * Dispensary Zip code
	 * @var int $VALID_DISPENSARYZIPCODE
	 **/
	protected $VALID_DISPENSARYZIPCODE = "90210";

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();
	}
	/**
	 * test inserting a valid Dispensary and verify that the actual mySQL data matches
	 **/
	public function testInsertValidDispensary() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary");

		//create a new Dispensary and insert into mySQL
		$dispenary = new Dispensary(null, $this->dispensary->getDispensaryId(), $this)
	}











}
