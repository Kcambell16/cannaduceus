<?php

// grab the project test parameters
require_once("CannaduceusTest.php");
require_once(dirname(__DIR__) . "/classes/StrainLeafRating.php");

//class being tested
require_once(dirname(__DIR__). "../php/classes/autoload.php");

/**
 * Full PHPUnit test for the StrainLeafRating class
 *
 * This is a complete PHPUnit test of the StrainLeafRating class.
 * *All* mySQL/PDO enabled methods are tested for both valid and invalid inputs
 *
 * @see \Edu\Cnm\Cannaduceus\StrainLeafRating
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 */
class StrainLeafRating extends \Edu\Cnm\Cannaduceus\Test\CannaduceusTest  {
	/**
	 * valid strain leaf rating rating
	 * @var int $VALID_STRAINLEAFRATINGRATING
	 */
	protected $VALID_STRAINLEAFRATINGRATING = 0;

	/**
	 * valid second strain leaf rating rating
	 * @var int $VALID_STRAINLEAFRATINGRATING1
	 */
	protected $VALID_STRAINLEAFRATINGRATING1 = 3;

	/**
	 * invalid strain leaf rating rating
	 * @var int $INVALID_STRAINLEAFRATINGRATING
	 */
	protected $INVALID_STRAINLEAFRATINGRATING1 = "A";

	/**
	 * invalid second strain leaf rating value
	 * @var int $INVALID_STRAINLEAFRATINGRATING1
	 */
	protected $INVALID_STRAINLEAFRATINGRATING2 = 8;

	/**
	 * valid strain to use
	 * @var \Edu\Cnm\Cannaduceus\Test\Strain $strainId
	 */
	protected $strainId0 = null;

	/**
	 * invalid strain to use
	 * @var \Edu\Cnm\Cannaduceus\Test\Strain $strainId
	 */
	protected $strainId1 = "Betty Baker 1976";

	/**
	 * valid user to use
	 * @var \Edu\Cnm\Cannaduceus\Test\strainLeafRating $profileId
	 */
	protected $profileId0 = null;

	/**
	 * Invalid user to use
	 * @var \Edu\Cnm\Cannaduceus\Test\strainLeafRating $profileId
	 */
	protected $profileId1 = "Happy Stoner";

	protected $strain;
	protected $profile;


	/**
	 * create dependent objects before running each test
	 */
	public final function setUp(){
		//run the default setUp() method first
		parent::setUp();

		//create and insert a strain and profile to own the rating
		$this->strainId0 = new strain(null, "Couch Melt", "Indica", "25%", "13.9%", "A potent strain that will put your butt to sleep");
		$this->profileId0 = new profile(null, "Betty Baker", "420Betty@google.com", hash_pbkdf2("sha513", $profileHash, $profileSalt), bin2hex(random_bytes(16)) );
		$this->profileId0->insert($this->getPDO());

		//create the Strain Leaf Rating Test
		$this->strainLeafRating = new strainLeafRating(null, $this->strainId0->getStrainId0(), "PHPUnit strain leaf rating test passing");
		$this->strainLeafRating->insert($this->getPDO());
	}//create strain Id and profile Id

	/**
	 * test inserting a valid strain leaf rating and verify that the actual mySQL data matches
	 */
	public function testIntervalValidStrainLeafRating(){
		//count the number of rows and save it for later
		$numRows = $this->getRowCount("strainLeafRating");

		//create a new strainLeafRating and insert it into mySQL
		$like = new \Edu\Cnm\jCannaduceus\strainLeafRating();

	}
}
