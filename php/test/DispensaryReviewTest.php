<?php
namespace Edu\Cnm\hlozano2\DataDesign\Test;

use Edu\Cnm\hlozano2\DataDesign\{DispensayReviewProfileId, DispensayReview};

// grab the project test parameters
require_once("DataDesignTest.php");

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
class DispensaryReviewTest extends DataDesignTest {
	/**
	 * content of the DispensaryReview
	 * @var string $VALID_DISPENSARYREVIEWCONTENT
	 **/
	protected $VALID_DISPENSARYREVIEWCONTENT = "PHPUnit test passing";
	/**
	 * content of the updated DispensaryReview
	 * @var string $VALID_DISPENSARYREVIEWCONTENT2
	 **/
	protected $VALID_DISPENSARYREVIEWCONTENT2 = "PHPUnit test still passing";
	/**
	 * timestamp of the DispensaryReview; this starts as null and is assigned later
	 * @var DateTime $VALID_DISPENSARYREVIEWDATE
	 **/
	protected $VALID_DISPENSARYREVIEWDATE = null;
	/**
	 * Profile that created the DispensaryReview; this is for foreign key relations
	 * @var DispensayReviewProfileId profile
	 **/
	protected $profile = null;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		// create and insert a Profile to own the test Tweet
		$this->profile = new Profile(null, "@phpunit", "test@phpunit.de", "+12125551212");
		$this->profile->insert($this->getPDO());

		// calculate the date (just use the time the unit test was setup...)
		$this->VALID_DISPENSARYREVIEWDATE = new \DateTime();
	}
	/**
	 * test inserting a valid DispensaryReview and verify that the actual mySQL data matches
	 **/
	public function testInsertValidDispensaryReview() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary review");

		// create a new DispensaryReview and insert to into mySQL
		$dispensaryReview = new DispensayReview(null, $this->profile->dispensaryReviewProfileId(), $this->VALID_DISPENSARYREVIEWCONTENT, $this->VALID_DISPENSARYREVIEWDATE);
		$dispensaryReview->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoTweet = Tweet::getTweetByTweetId($this->getPDO(), $tweet->getTweetId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("tweet"));
		$this->assertEquals($pdoTweet->getProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoTweet->getTweetContent(), $this->VALID_TWEETCONTENT);
		$this->assertEquals($pdoTweet->getTweetDate(), $this->VALID_TWEETDATE);
	}