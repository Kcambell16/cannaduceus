<?php
//namespace
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Dispensary, Profile};

// grab the project test parameters
require_once("CannaduceusTest.php");

//class being tested
require_once(dirname(__DIR__). "/classes/autoload.php");

/**
 * Full PHPUnit test for the dispensaryLeafRating class
 *
 * This is a complete PHPUnit test of the dispensaryLeafRating class.
 * *All* mySQL/PDO enabled methods are tested for both valid and invalid inputs
 *
 * @see \Edu\Cnm\Cannaduceus\dispensaryLeafRating
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 */
class dispensaryLeafRating extends \Edu\Cnm\Cannaduceus\Test\CannaduceusTest  {
	/**
	 * valid dispensary leaf rating rating 0
	 * @var int $VALID_DISPENSARYLEAFRATINGRATING0
	 */
	protected $VALID_DISPENSARYLEAFRATINGRATING0 = 0;

	/**
	 * invalid dispensary leaf rating rating 0
	 * @var int $INVALID_DISPENSARYLEAFRATINGRATING0
	 */
	protected $INVALID_DISPENSARYLEAFRATINGRATING0 = "A";

	protected $dispensary;
	protected $profile;



	/**
	 * create dependent objects before running each test
	 */
	public final function setUp(){
		//run the default setUp() method first
		parent::setup();

		//create and insert a dispensary and profile to own the rating
		$dispensary = new dispensary(null, "Betty Baker", "Albuquerque", "420Betty@google.com", "A Good Plant", "420-420-4200", "NM", "420 Blaze It Dr. NE", null, "that-fire.com", "87420"); $this->$this->dispensaryId0->insert($this->getPDO());

		$password = "UpInSmoke";
		$salt = bin2hex(random_bytes(16));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144);

		$this->profile = new profile(null, "Tomas Baker", "Baker420@420.com", $hash, $salt, "activation");
		$this->$this->profileId0->insert($this->getPDO());

	}//create dispensary Id and profile Id

	/**
	 * test inserting a valid dispensary leaf rating and verify that the actual mySQL data matches
	 */
	public function testValidDispensaryLeafRating(){
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensaryLeafRating");

		//create a new dispensaryLeafRating and insert it into mySQL
		$dispensaryLeafRating = new dispensaryLeafRating($this->profile->getProfileId(), $this->dispensary->getDispensaryId());
		$dispensaryLeafRating->insert($this->getPDO());

		//grab the data from mySQL and enfore the fields match our expectations
		$pdoDispensaryLeafRating = dispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingRating($this->getPDO(), $this->dispensary->getDispensaryId(), $this->profile->getProfileId());
		$this->assertEquals($numRows =1, $this->getConnection()->getRowCount("dispensaryLeafRatingRating"));
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingDispensaryId(), $this->dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingProfileId(), $this->profile->getProfileId());

	}

	/**
	 * test creating a dispensaryLeafRating that makes no sense
	 *
	 * @expectedException \TypeError
	 */
	public function testInsertingInvalidDispensaryLeafRating(){
		//create a dispensaryLeafRating without foreign keys and watch it fail
		$dispensaryLeafRating = new dispensaryLeafRating(null, null, null);
	}

	/**
	 * test creating a dispensaryLeafRating and deleting it
	 */
	public function testDeleteValidDispensaryLeafRating() {
		//count the number of rows and save for later
		$numRows = $this->getConnection()->getRowCount("dispensaryLeafRating");

		//create a new dispensaryLeafRating and insert into mySQL
		$dispensaryLeafRating = new dispensaryLeafRating($this->dispensary->getDispensaryId(), $this->profile->getProfileId());
		$dispensaryLeafRating->insert($this->getPDO());

		//delete the dispensaryLeafRating from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryLeafRating"));
		$dispensaryLeafRating->delete($this->getPDO());

		//grab the data from mySQL and enforce the dispensaryLeafRating does not exist
		$pdoDispensaryLeafRating = dispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingDispensaryIdAndDispensaryLeafRatingProfileId();
		$this->getPDO();
		$this->profile->getProfileId(); $this->dispensary->getDispensaryId();
		$this->assertNull($pdoDispensaryLeafRating);
		$this->asserEquals($numRows, $this->getConnection()->getRowCount("dispensaryLeafRating"));

	}


	/**
	 * test inserting a dispensaryLeafRating and retrieving it from mySQL
	 */
	public function testGetDispensaryLeafRatingByDispensaryIdAndProfileId() {
	//count the number of rows and save for later
		$numRows = $this->getConnection()->getRowCount("dispensaryLeafRating");

		//create a new dispensaryLeafRating and insert into mySQL
		$dispensaryLeafRating = new dispensaryLeafRating($this->dispensary->getDispensaryId(), $this->profile->getProfileId());
		$dispensaryLeafRating->insert($this->getPDO());

		// retrieve the data from mySQL and enforce the fields watch our expectations
		$pdoDispensaryLeafRating = $dispensaryLeafRating::getDispensaryLeafRatingByDispensaryIdAndProfileId($this->getPDO(), $this->dispensary->getDispensaryId(), $this->profile->getProfileId());
		$this->asserEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryLeafRating"));
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingDispensaryId(),$this->dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingProfileId(), $this->profile->getProfileId());
	}

	/**
	 * test grabbing a dispensaryLeafRating that does not exist
	 **/
	public function testGetInvalidDispensaryLeafRatingByDispensarydAndProfileId() {
		// grab a dispensary leaf dispensary id and profile id that exceeds the maximum allowable dispensary id and profile id
		$dispensaryLeafRating = dispensaryLeafRating::testGetDispensaryLeafRatingByDispensaryIdAndProfileId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY, \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertNull($dispensaryLeafRating);
	}
	/**
	 * test grabbing a dispensaryLeafRating by dispensary id
	 **/
	public function testGetValidDispensensaryLeafRatingByDispensaryId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensaryLeafRating");
		//create a new dispensaryLeafRating and insert into mySQL
		$dispensaryLeafRating = new dispensaryLeafRating($this->dispensary->getDispensaryId(), $this->profile->getProfileId());
		$dispensaryLeafRating->insert($this->getPDO());
		// grab the data from mySQL and enforce the fields match our expectations
		$results = dispensaryLeafRating::testGetValidDispensensaryLeafRatingByDispensaryId($this->getPDO(), $this->dispensary->getDispensaryId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\DispensaryLeafRating", $results);
		// grab the result from the array and validate it
		$pdoDispensaryLeafRating = $results[0];
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingDispensaryId(), $this->dispensary->getDispensaryId());
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingDispensaryId(), $this->profile->getProfileId());
	}

	/**
	 * test grabbing a dispensaryLeafRating by a dispensary id that does not exist
	 **/
	public function testGetInvalidDispensaryLeafRating() {
		// grab a dispensary id that exceeds the maximum allowable dispensary id
		$dispensaryLeafRating = dispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingDispensaryId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertCount(0, $dispensaryLeafRating);
	}
	/**
	 * test grabbing a dispensaryLeafRating by profile id
	 **/
	public function testGetValidDispensaryLeafRatingByProfileId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensaryLeafRating");

		//create a new dispensaryLeafRating and insert into mySQL
		$dispensaryLeafRating = new dispensaryLeafRating($this->dispensary->getDispensaryId(), $this->profile->getProfileId());
		$dispensaryLeafRating->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = dispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingProfileId($this->getPDO(), $this->profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\DispensaryLeafRating", $results);

		// grab the result from the array and validate it
		$pdoDispensaryLeafRating = $results[0];
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoDispensaryLeafRating->getDispensaryLeafRatingDispensaryId(), $this->dispensaryLeafRating->getDispensaryId());

	}

	/**
	 * test grabbing a dispensaryLeafRating by a profile id that does not exist
	 **/
	public function testGetInvalidDispensaryLeafRatingByProfileId() {
		// grab a dispensaryLeafRating id that exceeds the maximum allowable profile id
		$dispensaryLeafRating = DispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingProfileId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertCount(0, $dispensaryLeafRating);
	}

}
