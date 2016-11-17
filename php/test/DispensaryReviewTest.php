<?php
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Profile, Dispensary, DispensaryReview};

// grab the project test parameters
require_once("CannaduceusTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the DispensaryReview class
 *
 * This is a complete PHPUnit test of the DispensaryReview class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see DispensayReview
 * @author Hector Lozano <hlozano2@cnm.edu>
 **/
class DispensaryReviewTest extends CannaduceusTest {
	/**
	 * content of the DispensaryReview
	 * @var string $VALID_DISPENSARYREVIEWTXT
	 **/
	protected $VALID_DISPENSARYREVIEWTXT = "This dispensary sucks! They have horrible customer service!";

	/**
	 * timestamp of the DispensaryReview; this starts as null and is assigned later
	 * @var \DateTime $VALID_DISPENSARYREVIEWDATETIME
	 **/
	protected $VALID_DISPENSARYREVIEWDATETIME = null;

	/**
	 * Profile that created the DispensaryReview; this is for foreign key relations
	 * @var Profile profile
	 **/
	protected $profile = null;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		// create and insert a Profile to own the test DispensaryReview
		$this->profile = new Profile(null, "@phpunit", "test@phpunit.de", "+12125551212");
		$this->profile->insert($this->getPDO());
		// create and insert a Dispensary to own the test
		$this->dispensary = new Dispensary(null, "@phpunit", "test@phpunit.de", "+12125551212");
		$this->dispensary->insert($this->getPDO());

		// calculate the date (just use the time the unit test was setup...)
		$this->VALID_DISPENSARYREVIEWDATETIME = new \DateTime();
	}
	/**
	 * test inserting a valid DispensaryReview and verify that the actual mySQL data matches
	 **/
	public function testInsertValidDispensaryReview() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary review");

		// create a new DispensaryReview and insert to into mySQL
		$dispensaryReview = new DispensaryReview(null, $this->profile->getProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATETIME);
		$dispensaryReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoDispensaryReview = DispensaryReview::getDispensaryReviewstByDispensaryReviewId($this->getPDO(), $dispensaryReview->getDispensaryReviewId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensary review"));
		$this->assertEquals($pdoDispensaryReview->getProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewTxt(), $this->VALID_DISPENSARYREVIEWTXT);
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewDateTime(), $this->VALID_DISPENSARYREVIEWDATETIME);
	}

	/**
	 * test inserting a DispensaryReview that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidDispensaryReview() {
		// create a Tweet with a non null tweet id and watch it fail
		$dispensaryReview = new DispensayReview(CannaduceusTest::INVALID_KEY, $this->profile->getProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATETIME);
		$dispensaryReview->insert($this->getPDO());
	}

	/**
	 * test creating a DispensaryReview and then deleting it
	 **/
	public function testDeleteValidDispensaryReview() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensaryReview");

		// create a new DispensaryReview and insert to into mySQL
		$dispensaryReview = new DispensaryReview(null, $this->profile->getProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATETIME);
		$dispensaryReview->insert($this->getPDO());

		// delete the DispensaryReview from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensary review"));
		$dispensaryReview->delete($this->getPDO());

		// grab the data from mySQL and enforce the DispensaryReview does not exist
		$pdoDispensaryReview = DispensaryReview::getDispensaryReviewByDispensaryReviewId($this->getPDO(), $dispensaryReview->getDispensaryReviewId());
		$this->assertNull($pdoDispensaryReview);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("dispensary review"));
	}

	/**
	 * test deleting a DispensaryReview that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidDispensaryReview() {
		// create a DispensaryReview and try to delete it without actually inserting it
		$dispensaryReview = new DispensaryReview(null, $this->profile->getProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATETIME);
		$dispensaryReview->delete($this->getPDO());
	}

	/**
	 * test grabbing a DispensaryReview by dispensary text
	 **/
	public function testGetValidDispensaryReviewByDispensaryReviewTxt() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary review");

		// create a new DispensaryReview and insert to into mySQL
		$dispensaryReview = new DispensaryReview(null, $this->profile->getProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATETIME);
		$dispensaryReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = DispensaryReview::getDispensaryReviewByDispensaryReviewTxt($this->getPDO(), $dispensaryReview->getDispensaryReviewTxt());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensary review"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus", $results);

		// grab the result from the array and validate it
		$pdoDispensaryReview = $results[0];
		$this->assertEquals($pdoDispensaryReview->getProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewTxt(), $this->VALID_DISPENSARYREVIEWTXT);
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewDateTime(), $this->VALID_DISPENSARYREVIEWDATETIME);
	}

	/**
	 * test grabbing a DispensaryReview by dispensary review text that does not exist
	 **/
	public function testGetInvalidDispensaryReviewByDispensaryReviewTxt() {
		// grab a dispensary review by searching for content that does not exist
		$dispensaryReview = DispensaryReview::getDispensaryReviewByDispensaryReviewTxt($this->getPDO(), "Dee Dee Dee, No Such Thing");
		$this->assertCount(0, $dispensaryReview);
	}

	/**
	 * test grabbing all DispensaryReviews
	 **/
	public function testGetAllValidDispensaryReviews() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary review");

		// create a new DispensaryReview and insert to into mySQL
		$dispensaryReview = new DispensaryReview(null, $this->profile->getProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATETIME);
		$dispensaryReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = DispensaryReview::getAllDispensaryReviews($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensary review"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus", $results);

		// grab the result from the array and validate it
		$pdoDispensaryReview = $results[0];
		$this->assertEquals($pdoDispensaryReview->getProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewTxt(), $this->VALID_DISPENSARYREVIEWTXT);
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewDate(), $this->VALID_DISPENSARYREVIEWDATETIME);
	}
}