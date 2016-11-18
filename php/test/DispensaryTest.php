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
	 * Dispensary Attention
	 * @var string $VALID_DISPENSARYATTENTION
	 **/
	protected $VALID_DISPENSARYATTENTION = "How hi";

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
		$dispensary = new Dispensary(null, $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTATE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE);

		$dispensary->insert($this->getPDO());



		//grab the data from mySQL and enforce the fileds match our expectations
		$pdoDispensary = Dispensary::getDispensaryByDispensaryId($this->getPDO(), $dispensary->getDispensaryId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensary"));
		$this->assertEquals($pdoDispensary->getDispensaryId(), $dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensary->getDispensaryAttention(), $dispensary->getDispensaryAttention());
		$this->assertEquals($pdoDispensary->getDispensaryCity(), $dispensary->getDispensaryCity());
		$this->assertEquals($pdoDispensary->getDispensaryEmail(), $dispensary->getDispensaryEmail());
		$this->assertEquals($pdoDispensary->getDispensaryName(), $dispensary->getDispensaryName());
		$this->assertEquals($pdoDispensary->getDispensaryPhone(), $dispensary->getDispensaryPhone());
		$this->assertEquals($pdoDispensary->getDispensaryState(), $dispensary->getDispensaryState());
		$this->assertEquals($pdoDispensary->getDispensaryStreet1(), $dispensary->getDispensaryStreet1());
		$this->assertEquals($pdoDispensary->getDispensaryStreet2(), $dispensary->getDispensaryStreet2());
		$this->assertEquals($pdoDispensary->getDispensaryUrl(), $dispensary->getDispensaryUrl());
		$this->assertEquals($pdoDispensary->getDispensaryZipCode(), $dispensary->getDispensaryZipCode());


	}

	/**
	 * test inserting a Dispensary, that already exist
	 *
	 * @expectedException \PDOException
	 *
	 **/
	public function testInsertInvalidDispensary(){

		$dispensary = new Dispensary(null, $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTATE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE);

		$dispensary->insert($this->getPDO());

		// insert again to see if fails
		$dispensary->insert($this->getPDO());

	}












}
