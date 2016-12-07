<?php
//namespace
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Profile, Strain, StrainLeafRating};

// grab the project test parameters
require_once("CannaduceusTest.php");

//class being tested
require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the StrainLeafRating class
 *
 * This is a complete PHPUnit test of the StrainLeafRating class.
 * *All* mySQL/PDO enabled methods are tested for both valid and invalid inputs
 *
 * @see \Edu\Cnm\Cannaduceus\StrainLeafRating
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 */
class StrainLeafRatingTest extends \Edu\Cnm\Cannaduceus\Test\CannaduceusTest {
	/**
	 * valid strain leaf rating rating 0
	 * @var int $VALID_STRAINLEAFRATINGRATING0
	 */
	protected $VALID_STRAINLEAFRATINGRATING0 = 1;

	/**
	 * valid strain leaf rating rating 1
	 * @var int $VALID_STRAINLEAFRATINGRATING1
	 */
	protected $VALID_STRAINLEAFRATINGRATING1 = 4;

	/**
	 * invalid strain leaf rating rating 0
	 * @var int $INVALID_STRAINLEAFRATINGRATING0
	 */
	protected $INVALID_STRAINLEAFRATINGRATING0 = "A";

	protected $strain;

	protected $profile;

	/**
	 * create dependent objects before running each test
	 */
	public final function setUp() {
		//run the default setUp() method first
		parent::setUp();

		//create and insert a strain and profile to own the rating
		$this->strain = new Strain(null, "AK-47", "Indica", 24, 0.4, "strong high with uplifting effects");
		$this->strain->insert($this->getPDO());

		$password = "UpInSmoke";
		$salt = bin2hex(random_bytes(32));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144, 128);
		$activation = bin2hex(random_bytes(16));

		$this->profile = new Profile(null, "Tomas Baker", "Baker420@420.com", $hash, $salt, $activation);
		$this->profile->insert($this->getPDO());

	}//create strain Id and profile Id

	/**
	 * test inserting a valid strain leaf rating and verify that the actual mySQL data matches
	 */
	public function testInsertValidStrainLeafRating() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert it into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$pdoStrainLeafRating =
			StrainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId(
				$this->getPDO(),
				$strainLeafRating->getStrainLeafRatingStrainId(),
				$strainLeafRating->getStrainLeafRatingProfileId());

		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingStrainId(),
			$this->strain->getStrainId());
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingProfileId(), $this->profile->getProfileId());
	}

	/**
	 * test creating a strainLeafRating that makes no sense
	 *
	 * @expectedException \TypeError
	 */
	public function testInsertingInvalidStrainLeafRating() {
		//create a strainLeafRating without foreign keys and watch it fail
		$strainLeafRating = new StrainLeafRating(null, null, null);
	}

	/**
	 * test inserting a strainLeafRating, editing it and then updating it
	 */
	public function testUpdateStrainLeafRating() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert it into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());

		//edit the strain and update it in mySQL
		$strainLeafRating->setStrainLeafRatingRating($this->VALID_STRAINLEAFRATINGRATING0);
		$strainLeafRating->setStrainLeafRatingStrainId($this->strain->getStrainId());
		$strainLeafRating->setStrainLeafRatingProfileId($this->profile->getProfileId());
		$strainLeafRating->update($this->getPDO());

		// retrieve the data from mySQL and enforce the fields watch our expectations
		$pdoStrainLeafRating = $strainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId($this->getPDO(), $this->strain->getStrainId(), $this->profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingStrainId(), $this->strain->getStrainId());
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingProfileId(), $this->profile->getProfileId());

	}

	/**
	 * test creating a strainLeafRating and deleting it
	 */
	public function testDeleteValidStrainLeafRating() {
		//count the number of rows and save for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());

		//delete the strainLeafRating from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$strainLeafRating->delete($this->getPDO());

		//grab the data from mySQL and enforce the strainLeafRating does not exist
		$pdoStrainLeafRating = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId($this->getPDO(),
			$this->profile->getProfileId(),
			$this->strain->getStrainId());

		$this->assertNull($pdoStrainLeafRating);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("strainLeafRating"));

	}


	/**
	 * test inserting a strainLeafRating and retrieving it from mySQL
	 */
	public function testGetStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId() {
		//count the number of rows and save for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());

		// retrieve the data from mySQL and enforce the fields watch our expectations
		$pdoStrainLeafRating = $strainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId($this->getPDO(), $this->strain->getStrainId(), $this->profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingStrainId(), $this->strain->getStrainId());
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingProfileId(), $this->profile->getProfileId());
	}

	/**
	 * test grabbing a strainLeafRating that does not exist
	 **/
	public function testGetInvalidStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId() {
		// grab a strain leaf strain id and profile id that exceeds the maximum allowable strain id and profile id
		$strainLeafRating = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY, \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertNull($strainLeafRating);
	}

	/**
	 * test grabbing a strainLeafRating by strain id
	 **/
	public function testGetValidDispensensaryLeafRatingByStrainId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");
		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());
		// grab the data from mySQL and enforce the fields match our expectations
		$results = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainId($this->getPDO(), $this->strain->getStrainId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\StrainLeafRating", $results);
		// grab the result from the array and validate it
		$pdoStrainLeafRating = $results[0];
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingStrainId(), $this->strain->getStrainId());
		$this->assertEquals($pdoStrainLeafRating->getstrainLeafRatingProfileId(), $this->profile->getProfileId());
	}

	/**
	 * test grabbing a strainLeafRating by a strain id that does not exist
	 **/
	public function testGetInvalidStrainLeafRating() {
		// grab a strain id that exceeds the maximum allowable strain id
		$strainLeafRating = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingStrainId($this->getPDO(), \Edu\Cnm\Cannaduceus\Test\CannaduceusTest::INVALID_KEY);
		$this->assertCount(0, $strainLeafRating);
	}

	/**
	 * test grabbing a strainLeafRating by profile id
	 **/
	public function testGetValidStrainLeafRatingByProfileId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingProfileId($this->getPDO(), $this->profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\StrainLeafRating", $results);

		// grab the result from the array and validate it
		$pdoStrainLeafRating = $results[0];
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingStrainId(), $this->strain->getstrainId());

	}

	/**
	 * test grabbing a strainLeafRating by a profile id that does not exist
	 **/
	public function testGetInvalidStrainLeafRatingByProfileId() {
		// grab a strainLeafRating id that exceeds the maximum allowable profile id
		$strainLeafRating = StrainLeafRating::getStrainLeafRatingByStrainLeafRatingProfileId($this->getPDO(), CannaduceusTest::INVALID_KEY);
		$this->assertCount(0, $strainLeafRating);
	}

	/**
	 * test grabbing a strainLeafRating by strainLeafRatingRating
	 */
	public function testGetStrainLeafRatingByStrainLeafRatingRating() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert into mySQL
		$strainLeafRating = new StrainLeafRating($this->VALID_STRAINLEAFRATINGRATING0, $this->strain->getStrainId(), $this->profile->getProfileId());
		$strainLeafRating->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = StrainLeafRating::getStrainLeafRatingsByStrainLeafRatingRating($this->getPDO(), $this->VALID_STRAINLEAFRATINGRATING0);
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainLeafRating"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\StrainLeafRating", $results);

		// grab the result from the array and validate it
		$pdoStrainLeafRating = $results[0];
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingRating(), $this->VALID_STRAINLEAFRATINGRATING0);
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoStrainLeafRating->getStrainLeafRatingStrainId(), $this->strain->getStrainId());
	}

	/**
	 * test grabbing a strainLeafRating by a strainLeafRatingRating that does not exist
	 **/
	public function testGetInvalidStrainLeafRatingByStrainLeafRatingRating() {
		// grab a strainLeafRating id that exceeds the maximum allowable profile id
		$strainLeafRating = StrainLeafRating::getStrainLeafRatingsByStrainLeafRatingRating($this->getPDO(), $this->VALID_STRAINLEAFRATINGRATING0);
		$this->assertCount(0, $strainLeafRating);
	}

}
