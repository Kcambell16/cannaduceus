<?php
namespace Edu\Cnm\hlozano2\DataDesign\Test;

use Edu\Cnm\hlozano2\DataDesign\{StrainReviewProfile, StrainReview};

// grab the project test parameters
require_once("DataDesignTest.php");

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
class StrainReviewTest extends DataDesignTest {
	/**
	 * content of the StrainReview
	 * @var string $VALID_STARINREVIEWTXT
	 **/
	protected $VALID_STRAINREVIEWTXT = "PHPUnit test passing";
	/**
	 * content of the updated DispensaryReview
	 * @var string $VALID_DISPENSARYREVIEWCONTENT2
	 **/
	protected $VALID_STRAINREVIEWTXT2 = "PHPUnit test still passing";
	/**
	 * timestamp of the DispensaryReview; this starts as null and is assigned later
	 * @var DateTime $VALID_DISPENSARYREVIEWDATE
	 **/
	protected $VALID_STRAINREVIEWDATE = null;
	/**
	 * Profile that created the StrainReview; this is for foreign key relations
	 * @var StrainReviewProfileId profile
	 **/
	protected $profile = null;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		// create and insert a Profile to own the test StrainReview
		$this->strainReviewProfile = new StrainReviewProfile(null, "@phpunit", "test@phpunit.de", "+12125551212");
		$this->strainReviewProfile->insert($this->getPDO());

		// calculate the date (just use the time the unit test was setup...)
		$this->VALID_STRAINREVIEWDATE = new \DateTime();
	}