<?php

// grab the project test parameters
require_once("CannaduceusTest.php");
require_once(dirname(__DIR__) . "/classes/strainLeafRating.php");

//class being tested
require_once(dirname(__DIR__). "../php/classes/autoload.php");

/**
 * Full PHPUnit test for the strainLeafRating class
 *
 * This is a complete PHPUnit test of the strainLeafRating class.
 * *All* mySQL/PDO enabled methods are tested for both valid and invalid inputs
 *
 * @see \Edu\Cnm\Cannaduceus\strainLeafRating
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 */
class strainLeafRating extends \Edu\Cnm\Cannaduceus\Test\CannaduceusTest  {
	/**
	 * valid strain leaf rating rating 0
	 * @var int $VALID_strainLEAFRATINGRATING0
	 */
	protected $VALID_STRAINLEAFRATINGRATING0 = 0;

	/**
	 * invalid strain leaf rating rating 0
	 * @var int $INVALID_strainLEAFRATINGRATING0
	 */
	protected $INVALID_strainLEAFRATINGRATING0 = "A";

	protected $strain;
	protected $profile;



	/**
	 * create dependent objects before running each test
	 */
	public final function setUp(){
		//run the default setUp() method first
		parent::setup();

		//create and insert a strain and profile to own the rating
		$this->strain = new strain(null, "Couch Lock", "Sativa", "100%", "0.2%", "A potent sativa with uplifting effects"); $this->$this->strainId0->insert($this->getPDO());

		$password = "UpInSmoke";
		$salt = bin2hex(random_bytes(16));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144);

		$this->profile = new profile(null, "Tomas Baker", "Baker420@420.com", $hash, $salt, "activation");
		$this->$this->profileId0->insert($this->getPDO());

	}//create strain Id and profile Id

	/**
	 * test inserting a valid strain leaf rating and verify that the actual mySQL data matches
	 */
	public function testValidStrainLeafRating(){
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert it into mySQL
		$strainLeafRating = new strainLeafRating($this->profile->getProfileId(), $this->strain->getstrainId());
		$strainLeafRating->insert($this->getPDO());

		//grab the data from mySQL and enfore the fields match our expectations
		$pdostrainLeafRating = strainLeafRating::getstrainLeafRatingBystrainLeafRatingRating($this->getPDO(), $this->strain->getstrainId(), $this->profile->getProfileId());
		$this->assertEquals($numRows =1, $this->getConnection()->getRowCount("strainLeafRatingRating"));
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingstrainId(), $this->strain->getstrainId());
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingProfileId(), $this->profile->getProfileId());

	}

	/**
	 * test creating a strainLeafRating that makes no sense
	 *
	 * @expectedException \TypeError
	 */
	public function testInsertingInvalidstrainLeafRating(){
		//create a strainLeafRating without foreign keys and watch it fail
		$strainLeafRating = new strainLeafRating(null, null, null);
	}

	/**
	 * test creating a strainLeafRating and deleting it
	 */
	public function testDeleteValidstrainLeafRating() {
		//count the number of rows and save for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new strainLeafRating($this->strain->getstrainId(), $this->profile->getProfileId();
		$strainLeafRating->insert($this->getPDO());

		//delete the strainLeafRating from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$strainLeafRating->delete($this->getPDO());

		//grab the data from mySQL and enforce the strainLeafRating does not exist
		$pdostrainLeafRating = strainLeafRating::getstrainLeafRatingBystrainLeafRatingstrainIdAndstrainLeafRatingProfileId($this->getPDO(), $this->profile->getProfileId(); $this->strain->getstrainId();
		$this->assertNull($pdostrainLeafRating);
		$this->asserEquals($numRows, $this->getConnection()->getRowCount("strainLeafRating"));

	}


	/**
	 * test inserting a strainLeafRating and retrieving it from mySQL
	 */
	public function testGetstrainLeafRatingBystrainIdAndProfileId() {
		//count the number of rows and save for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new strainLeafRating($this->strain->getstrainId(), $this->profile->getProfileId();
		$strainLeafRating->insert($this->getPDO());

		// retrieve the data from mySQL and enforce the fields watch our expectations
		$pdostrainLeafRating = $strainLeafRating::getstrainLeafRatingBystrainIdAndProfileId($this->getPDO(), $this->strain->getstrainId(), $this->profile->getProfileId());
		$this->asserEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingstrainId(),$this->strain->getstrainId());
		$this->assertEquals($pdoProfileLeafRating->getstrainLeafRatingProfileId(), $this->profile->getProfileId());
	}

	/**
	 * test grabbing a strainLeafRating that does not exist
	 **/
	public function testGetInvalidstrainLeafRatingBystraindAndProfileId() {
		// grab a strain leaf strain id and profile id that exceeds the maximum allowable strain id and profile id
		$strainLeafRating = strainLeafRating::testGetstrainLeafRatingBystrainIdAndProfileId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY, \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertNull($strainLeafRating);
	}
	/**
	 * test grabbing a strainLeafRating by strain id
	 **/
	public function testGetValidDispensensaryLeafRatingBystrainId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");
		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new strainLeafRating($this->strain->getstrainId(), $this->profile->getProfileId();
		$strainLeafRating->insert($this->getPDO());
		// grab the data from mySQL and enforce the fields match our expectations
		$results = strainLeafRating::testGetValidDispensensaryLeafRatingBystrainId($this->getPDO(), $this->strain->getstrainId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\strainLeafRating", $results);
		// grab the result from the array and validate it
		$pdostrainLeafRating = $results[0];
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingstrainId(), $this->strain->getstrainId());
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingstrainId(), $this->profile->getProfileId());
	}

	/**
	 * test grabbing a strainLeafRating by a strain id that does not exist
	 **/
	public function testGetInvalidstrainLeafRating() {
		// grab a strain id that exceeds the maximum allowable strain id
		$strainLeafRating = strainLeafRating::getstrainLeafRatingBystrainLeafRatingstrainId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertCount(0, $strainLeafRating);
	}
	/**
	 * test grabbing a strainLeafRating by profile id
	 **/
	public function testGetValidstrainLeafRatingByProfileId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new strainLeafRating($this->strain->getstrainId(), $this->profile->getProfileId();
		$strainLeafRating->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = strainLeafRating::getstrainLeafRatingBystrainLeafRatingProfileId($this->getPDO(), $this->profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\strainLeafRating", $results);

		// grab the result from the array and validate it
		$pdostrainLeafRating = $results[0];
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdostrainLeafRating->getstrainLeafRatingstrainId(), $this->strainLeafRating->getstrainId());

	}

	/**
	 * test grabbing a strainLeafRating by a profile id that does not exist
	 **/
	public function testGetInvalidstrainLeafRatingByProfileId() {
		// grab a strainLeafRating id that exceeds the maximum allowable profile id
		$strainLeafRating = strainLeafRating::getstrainLeafRatingBystrainLeafRatingProfileId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertCount(0, $strainLeafRating);
	}

}
