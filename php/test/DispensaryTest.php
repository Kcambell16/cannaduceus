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
require_once (dirname(__DIR__) . "/classes/autoload.php");


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
	 * Dispensary City
	 * @var string $VALID_DISPENSARYCITY2
	 **/
	protected $VALID_DISPENSARYCITY2 = "Jungle Jam";

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

	/**
	 *  test inserting a dispensary, editing it and then updating it
	 *
	 **/
	public function testUpdateDispensary(){
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary");

		//create a new Dispensary and insert into mySQL
		$dispensary = new Dispensary(null, $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTATE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE);

		$dispensary->insert($this->getPDO());

		// edit the Dispensary and update it in mySQL
		$dispensary->setDispensaryCity($this->VALID_DISPENSARYCITY2);
		$dispensary->update($this->getPDO());


		//grab the data from mySQL and enforce the fields match our expectations
		$pdoDispensary = Dispensary::getDispensaryByDispensaryId($this->getPDO(), $dispensary->getDispensaryId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensary"));
		$this->assertEquals($pdoDispensary->getDispensaryId(), $dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensary->getDispensaryAttention(), $dispensary->getDispensaryAttention());
		$this->assertEquals($pdoDispensary->getDispensaryCity(), $this->VALID_DISPENSARYCITY2);
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
	 * test updating a Dispensary that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidDispensary() {
		//create a Dispensary, try to update it without actually updating it and watch it fail
		$dispensary = new Dispensary(null, $this->dispensary->getDispensaryId(), $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYCITY2, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE, $this->VALID_DISPENSARYSTATE);
		$dispensary->update($this->getPDO());
	}

/**
 * test creating a Dispensary and then deleting it
 **/
public function testDeleteValidDispenary() {
	// count the number of rows and save it for later
	$numRows = $this->getConnection()->getRowCount("dispensary");

	// create a new Dispensary and insert to into mySQL
	$dispensary = new Dispensary(null, $this->profile->getProfileId(), $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYCITY2, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE, $this->VALID_DISPENSARYSTATE);
	$dispensary->insert($this->getPDO());

	// delete the Dispensary from mySQL
	$this->assertEquals($numRows + 1, $this-$this->getConnection()->getRowCount("dispensary"));
	$dispensary->delete($this->getPDO());

	// grab the data from mySQL and enforce the Dispensary does not exist
	$pdoDispensary = Dispensary::getDispenaryByDispenaryId($this->getPDO(), $dispensary->getDispensaryId());
	$this->assertNull($pdoDispensary);
	$this->assertEquals($numRows, $this->getConnection()->getRowCount("dispensary"));
}

	/**
	 * test deleting a Dispensary that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidDispenary() {
		// create a Dispensary and try to delete it without actually inserting it
		$dispensary = new Dispensary(null, $this->dispensary->getDispensaryId(), $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYCITY2, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE, $this->VALID_DISPENSARYSTATE);
		$dispensary->delete($this->getPDO());
	}

	/**
	 * test grabbing a Dispensary Name by dispensary name
	 **/
	public function testGetValidDispenaryByDispensaryName() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("name");

		// create a new Dispensary and insert to into mySQL
		$dispensary = new Dispensary(null, $this->dispensary->getDispensaryId(), $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYCITY2, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE, $this->VALID_DISPENSARYSTATE);
		$dispensary->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Dispensary::getDispensaryByDispensaryName($this->getPDO(), $dispensary->getDispensaryName());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("name"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesof("Edu\\cnm\\cannaduceus\\Dispensary", $results);

		// grab the result from the array and validate it
		$pdoDispensary = $results[0];
		$this->assertEquals($pdoDispensary->getDispensaryId(), $this->dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensary->getDispensaryName(), $this->VALID_DISPENSARYNAME);
	}
	/**
	 * test grabbing a Dispensary Attention by content that does not exist
	 **/
	public function testGetInvalidDispensaryByDispensaryName() {
		// grab a dispensary by searching for content that does not exist
		$dispensary = Dispensary::getDispensaryByDispensaryName($this->getPDO(), "where it at tho");
		$this->assertCount(0, $dispensary);
	}

	/**
	 * test grabbing all Dispensaries
	 **/
	public function testGetAllValidDispensaries() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("get all");

		// create a new Dispensaries and insert to into mySQL
		$dispensary = new Dispensary(null, $this->dispensary->getDispensaryId(),  $this->VALID_DISPENSARYATTENTION, $this->VALID_DISPENSARYCITY, $this->VALID_DISPENSARYCITY2, $this->VALID_DISPENSARYEMAIL, $this->VALID_DISPENSARYNAME, $this->VALID_DISPENSARYPHONE, $this->VALID_DISPENSARYSTREET1, $this->VALID_DISPENSARYSTREET2, $this->VALID_DISPENSARYURL, $this->VALID_DISPENSARYZIPCODE, $this->VALID_DISPENSARYSTATE);
		$dispensary->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Dispensary::getAllDispensaries($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("all high"));
		$this->assertContainsOnlyInstanceof("Edu\\cnm\\cannaduceus\\Dispensary", $results);

		// grab the result from the array and validate it
		$pdoDispensary = $results[0];
		$this->assertEquals($pdoDispensary->getDispensaryId(), $dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensary->getDispensaryName(), $this->VALID_D);
	}
}
