<?php
namespace Edu\Cnm\hlozano2\DataDesign\Test;

use Edu\Cnm\hlozano2\DataDesign\{DispensayReviewProfile, DispensayReview};

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
class DispensaryReviewTest extends DataDesign {
	/**
	 * content of the DispensaryReview
	 * @var string $VALID_DISPENSARYREVIEWTXT
	 **/
	protected $VALID_DISPENSARYREVIEWTXT = "PHPUnit test passing";
	/**
	 * content of the updated DispensaryReview
	 * @var string $VALID_DISPENSARYREVIEWCONTENT2
	 **/
	protected $VALID_DISPENSARYREVIEWTXT2 = "PHPUnit test still passing";
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

		// create and insert a Profile to own the test DispensaryReview
		$this->dispensaryReviewProfile = new DispensaryReviewProfile(null, "@phpunit", "test@phpunit.de", "+12125551212");
		$this->dispensaryReviewProfile->insert($this->getPDO());

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
		$pdoDispensaryReview = DispensaryReview::getDispensaryReviewtByDispensaryReviewId($this->getPDO(), $dispensaryReview->getDispensaryReviewId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("tweet"));
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewProfileId(), $this->dispensaryReviewProfile->getDispensaryReviewProfileId());
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewTxt(), $this->VALID_DISPENSARYREVIEWTXT);
		$this->assertEquals($pdoDispensaryReview->getDispensaryReviewDate(), $this->VALID_DISPENSARYREVIEWDATE);
	}

	/**
	 * test inserting a DispensaryReview that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidDispensaryReview() {
		// create a Tweet with a non null tweet id and watch it fail
		$dispensaryReview = new DispensayReview(DataDesignTest::INVALID_KEY, $this->profile->getDispensaryReviewProfileId(), $this->VALID_DISPENSARYREVIEWTXT, $this->VALID_DISPENSARYREVIEWDATE);
		$dispensaryReview->insert($this->getPDO());
	}

	/**
	 * test inserting a DispensaryReview, editing it, and then updating it
	 **/
	public function testUpdateValidTweet() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("tweet");

		// create a new Tweet and insert to into mySQL
		$tweet = new Tweet(null, $this->profile->getProfileId(), $this->VALID_TWEETCONTENT, $this->VALID_TWEETDATE);
		$tweet->insert($this->getPDO());

		// edit the Tweet and update it in mySQL
		$tweet->setTweetContent($this->VALID_TWEETCONTENT2);
		$tweet->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoTweet = Tweet::getTweetByTweetId($this->getPDO(), $tweet->getTweetId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("tweet"));
		$this->assertEquals($pdoTweet->getProfileId(), $this->profile->getProfileId());
		$this->assertEquals($pdoTweet->getTweetContent(), $this->VALID_TWEETCONTENT2);
		$this->assertEquals($pdoTweet->getTweetDate(), $this->VALID_TWEETDATE);
	}