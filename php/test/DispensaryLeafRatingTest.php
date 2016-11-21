<?php

// grab the project test parameters
require_once("CannaduceusTest.php");
require_once(dirname(__DIR__) . "/classes/DispensaryLeafRating.php");

//class being tested
require_once(dirname(__DIR__). "../php/classes/autoload.php");

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
		$this->dispensary = new dispensary(null, "Betty Baker", "Albuquerque", "420Betty@google.com", "A Good Plant", "420-420-4200", "NM", "420 Blaze It Dr. NE", null, "that-fire.com", "87420"); $this->$this->dispensaryId0->insert($this->getPDO());

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
		$dispensaryLeafRating = new dispensaryLeafRating($this->dispensary->getDispensaryId(), $this->profile->getProfileId();
		$dispensaryLeafRating->insert($this->getPDO());

		//delete the dispensaryLeafRating from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryLeafRating"));
		$dispensaryLeafRating->delete($this->getPDO());

		//grab the data from mySQL and enforce the dispensaryLeafRating does not exist
		$pdoDispensaryLeafRating = dispensaryLeafRating::getDispensaryLeafRatingByDispensaryLeafRatingDispensaryIdAndDispensaryLeafRatingProfileId($this->getPDO(), $this->profile->getProfileId(); $this->dispensary->getDispensaryId();
		$this->assertNull($pdoDispensaryLeafRating);
		$this->asserEquals($numRows, $this->getConnection()->getRowCount("dispensaryLeafRating"));

	}

	/**
}
