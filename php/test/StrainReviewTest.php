<?php
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\Profile;
use Edu\Cnm\Cannaduceus\Strain;
use Edu\Cnm\Cannaduceus\StrainReview;


// grab the project test parameters
require_once("CannaduceusTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/classes/autoload.php");


/**
 * Full PHPUnit test for the StrainReview class
 *
 * This is a complete PHPUnit test of the StrainReview class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see StrainReview
 * @author Hector Lozano <hlozano2@cnm.edu>
 **/
class StrainReviewTest extends CannaduceusTest {
	/**
	 * content of the StrainReview
	 * @var string $VALID_STRAINREVIEWTXT
	 **/
	protected $VALID_STRAINREVIEWTXT = "This strain sucks! They have horrible customer service!";

	/**
	 * timestamp of the strainReview; this starts as null and is assigned later
	 * @var \DateTime $VALID_STRAINREVIEWDATETIME
	 **/
	protected $VALID_STRAINREVIEWDATETIME = null;

	/**
	 * Profile that created the strainReview; this is for foreign key relations
	 * @var Profile profile
	 **/
	protected $profile;
	/**
	 * strain that created the strainReview; this is for foreign key relations
	 * @var strain
	 **/
	protected $strain;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		// create and insert a Profile
		$password = "UpInSmoke";
		$salt = bin2hex(random_bytes(32));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144, 128);
		$activation = bin2hex(random_bytes(16));

		$this->profile = new Profile(null, "profileUserName", "user@me.com", $hash, $salt, $activation);
		$this->profile->insert($this->getPDO());

		// create and insert a strain to own the test strainReview
		$this->strain = new Strain(null, "Maui Wowie", "Sativa", 21.0, .03, "Island High!");
		$this->strain->insert($this->getPDO());

		// calculate the date (just use the time the unit test was setup...)
		$dateTime = new \DateTime();
		$this->VALID_STRAINREVIEWDATETIME = $dateTime->format("Y-m-d H:i:s");

	}

	/**
	 * test inserting a valid strainReview and verify that the actual mySQL data matches
	 **/
	public function testInsertValidStrainReview() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainReview");

		// create a new strainReview and insert to into mySQL
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getstrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());


		// grab the data from mySQL and enforce the fields match our expectations
		$pdoStrainReview = StrainReview::getStrainReviewsByStrainReviewId($this->getPDO(), $strainReview->getStrainReviewId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainReview"));
		$this->assertEquals($pdoStrainReview->getStrainReviewProfileId(), $strainReview->getStrainReviewProfileId());
		$this->assertEquals($pdoStrainReview->getStrainReviewTxt(), $this->VALID_STRAINREVIEWTXT);
		$this->assertEquals($pdoStrainReview->getStrainReviewDateTime()->format("Y-m-d H:i:s"), $this->VALID_STRAINREVIEWDATETIME);
	}

	/**
	 * test inserting a StrainReview that already exists
	 *
	 * @expectedException \PDOException
	 **/
	public function testInsertInvalidStrainReview() {
		// create a Strain Review with a non null Strain review id and watch it fail
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getStrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());

		// insert again and watch it fail
		$strainReview->insert($this->getPDO());
	}

	/**
	 * test creating a StrainReview and then deleting it
	 **/
	public function testDeleteValidStrainReview() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainReview");

		// create a new StrainReview and insert to into mySQL
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getstrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());

		// delete the StrainReview from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainReview"));
		$strainReview->delete($this->getPDO());

		// grab the data from mySQL and enforce the StrainReview does not exist
		$pdoStrainReview = StrainReview::getStrainReviewsByStrainReviewId($this->getPDO(), $strainReview->getStrainReviewId());
		$this->assertNull($pdoStrainReview);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("strainReview"));
	}

	/**
	 * test deleting a StrainReview that does not exist
	 *
	 * @expectedException PDOException
	 **/

	public function testDeleteInvalidStrainReview() {
		// create a StrainReview and try to delete it without actually inserting it
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getStrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->delete($this->getPDO());
	}

	/**
	 * test grabbing a StrainReview by strain text
	 **/

	public function testGetValidStrainReviewByStrainReviewTxt() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainReview");

		// create a new StrainReview and insert to into mySQL
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getStrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = StrainReview::getStrainReviewByStrainReviewTxt($this->getPDO(), $strainReview->getStrainReviewTxt());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainReview"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\StrainReview", $results);

		// grab the result from the array and validate it
		$pdoStrainReview = $results[0];
		$this->assertEquals($pdoStrainReview->getStrainReviewProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoStrainReview->getStrainReviewTxt(), $this->VALID_STRAINREVIEWTXT);
		$this->assertEquals($pdoStrainReview->getStrainReviewDateTime()->format("Y-m-d H:i:s"), $this->VALID_STRAINREVIEWDATETIME);
	}

	/**
	 * test grabbing a StrainReview by strain review text that does not exist
	 **/

	public function testGetInvalidStrainReviewByStrainReviewTxt() {
		// grab a strain review by searching for content that does not exist
		$strainReview = StrainReview::getStrainReviewByStrainReviewTxt($this->getPDO(), "Dee Dee Dee, No Such Thing");
		$this->assertCount(0, $strainReview);
	}

	/**
	 * test grabbing all StrainReviews
	 **/

	public function testGetAllValidStrainReviews() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainReview");

		// create a new StrainReview and insert to into mySQL
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getStrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = StrainReview::getAllStrainReviews($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainReview"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\StrainReview", $results);

		// grab the result from the array and validate it
		$pdoStrainReview = $results[0];
		$this->assertEquals($pdoStrainReview->getStrainReviewProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoStrainReview->getStrainReviewTxt(), $this->VALID_STRAINREVIEWTXT);
		$this->assertEquals($pdoStrainReview->getStrainReviewDateTime()->format("Y-m-d H:i:s"), $this->VALID_STRAINREVIEWDATETIME);
	}

	/**
	 * test inserting a valid StrainReview and verify that the actual mySQL data matches
	 **/
	public function testGetStrainReviewsByStrainReviewStrainId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainReview");

		// create a new StrainReview and insert to into mySQL
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getStrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoStrainReview = StrainReview::getStrainReviewsByStrainReviewStrainId($this->getPDO(), $strainReview->getStrainReviewId());
		foreach($pdoStrainReview as $review) {
			if($review->getStrainReviewsByStrainReviewStrainId === $strainReview->getStrainReviewStrainId()) {
				$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainReview"));
				$this->assertEquals($pdoStrainReview->getStrainReviewProfileId(), $this->profile->getProfileId());
				$this->assertEquals($pdoStrainReview->getStrainReviewTxt(), $this->VALID_STRAINREVIEWTXT);
				$this->assertEquals($pdoStrainReview->getStrainReviewDateTime()->format("Y-m-d H:i:s"), $this->VALID_STRAINREVIEWDATETIME);
			}
		}
	}

	/**
	 * test inserting a valid StrainReview and verify that the actual mySQL data matches
	 **/
	public function testGetStrainReviewsByStrainReviewProfileId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainReview");

		// create a new StrainReview and insert to into mySQL
		$strainReview = new StrainReview(null, $this->profile->getProfileId(), $this->strain->getStrainId(), $this->VALID_STRAINREVIEWDATETIME, $this->VALID_STRAINREVIEWTXT);
		$strainReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoStrainReview = StrainReview::getStrainReviewsByStrainReviewProfileId($this->getPDO(), $strainReview->getStrainReviewId());
		foreach($pdoStrainReview as $review) {
			if($review->getStrainReviewsByStrainReviewProfileId === $strainReview->getStrainReviewProfileId()) {
				$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainReview"));
				$this->assertEquals($pdoStrainReview->getStrainReviewProfileId(), $this->profile->getProfileId());
				$this->assertEquals($pdoStrainReview->getStrainReviewTxt(), $this->VALID_STRAINREVIEWTXT);
				$this->assertEquals($pdoStrainReview->getStrainReviewDateTime()->format("Y-m-d H:i:s"), $this->VALID_STRAINREVIEWDATETIME);
			}
		}
	}
}  // StrainReviewTest