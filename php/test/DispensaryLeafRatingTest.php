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
	 * valid dispensary leaf rating rating
	 * @var int $VALID_DISPENSARYLEAFRATINGRATING0
	 */
	protected $VALID_DISPENSARYLEAFRATINGRATING0 = 0;

	/**
	 * valid second dispensary leaf rating rating
	 * @var int $VALID_DISPENSARYLEAFRATINGRATING1
	 */
	protected $VALID_DISPENSARYLEAFRATINGRATING1 = 3;

	/**
	 * invalid dispensary leaf rating rating
	 * @var int $INVALID_DISPENSARYLEAFRATINGRATING0
	 */
	protected $INVALID_DISPENSARYLEAFRATINGRATING0 = "A";

	/**
	 * invalid second dispensary leaf rating value
	 * @var int $INVALID_DISPENSARYLEAFRATINGRATING1
	 */
	protected $INVALID_DISPENSARYLEAFRATINGRATING1 = 8;

	/**
	 * valid dispensary to use
	 * @var \Edu\Cnm\Cannaduceus\Test\dispensaryTest $dispensaryId
	 */
	protected $dispensaryId0 = null;

	/**
	 * invalid dispensary to use
	 * @var \Edu\Cnm\Cannaduceus\Test\dispensaryTest $dispensaryId
	 */
	protected $dispensaryId1 = "Betty Baker 1976";

	/**
	 * valid user to use
	 * @var \Edu\Cnm\Cannaduceus\Test\dispensaryTest $profileId
	 */
	protected $profileId0 = null;

	/**
	 * Invalid user to use
	 * @var \Edu\Cnm\Cannaduceus\Test\dispensaryTest $profileId
	 */
	protected $profileId1 = "Happy Stoner";


	/**
	 * create dependent objects before running each test
	 */
	public final function setUp(){
		//run the default setUp() method first
		parent::setUp();

		//create and insert a dispensary and profile to own the rating
		$this->dispensaryId0 = new dispensaryLeafRating(null, "Couch Melt", "Indica", "25%", "13.9%", "A potent dispensary that will put your butt to sleep");
		$this->profileId0 = new dispensaryLeafRating(null, "Betty Baker", "420Betty@google.com", hash_pbkdf2); $this->$this->profileId0->insert($this->getPDO());

		//create the dispensary Leaf Rating Test
		$this->dispensaryLeafRating = new dispensaryLeafRating(null, $this->dispensaryId0->getdispensaryId0(), "PHPUnit dispensary leaf rating test passing");
		$this->dispensaryLeafRating->insert($this->getPDO());
	}//create dispensary Id and profile Id

	/**
	 * test inserting a valid dispensary leaf rating and verify that the actual mySQL data matches
	 */
	public function testIntervalValiddispensaryLeafRating(){
		//count the number of rows and save it for later
		$numRows = $this->getRowCount("dispensaryLeafRating");

		//create a new dispensaryLeafRating and insert it into mySQL
		$like = new \Edu\Cnm\jCannaduceus\dispensaryLeafRating();

	}
}
