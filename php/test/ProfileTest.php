<?php
namespace Edu\Cnm\Cannaduceus\Test;



use Edu\Cnm\Cannaduceus\{Profile};

//grab the parameters for the test, go the abstract test file
require_once ("ProfileTest.php");

//grab the class being tested
require_once (dirname(__DIR__) . "/classes/autoload.php");
/**
 * Full PHPUnit test for the Profile class
 *
 * This is a complete PHPUnit test of the Profile class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Profile\
 * @author nathan sanchez <nsanchez121@cnm.edu>
 **/
class ProfileTest extends CannaduceusTest {
	/*--------------------------------Declare Protected State Variables -----------------------*/

	/**
	 * Default input data set for name
	 * @var string $VAILD_PROFILEUSERNAME1
	 */
	protected $VAILD_PROFILEUSERNAME1 = "Name";


	/**
	 * Default input data for updated name
	 * @var string $VAILD_PROFILEUSERNAME2
	 */
	protected $VAILD_PROFILEUSERNAME2 = "NameUpdated";


	/**
	 * Default input data set for email
	 * @var string $VAILD_PROFILEEMAIL1
	 */
	protected $VAILD_PROFILEEMAIL1 ="email.cnm.edu";


	/**
	 * Default input data set for updated email
	 * @var string $VAILD_PROFILEEMAIL2
	 */
	protected $VAILD_PROFILEEMAIL2 = "emailupdated.cnm.edu";


/**
 * Default input data set profile activation token 32 chars
 * @var string $VAILD_PROFILEACTIVATIONTOKEN1
 */
	protected $VAILD_PROFILEACTIVATIONTOKEN1 = "00000000000000000000000000000022";


	/**
	 * Default input data set UPDATED profile activation token 32 chars
	 * @var string VAILD_PROFILEACTIVATION2
	 */
	protected $VALID_PROFILEACTIVATIONTOKEN2 = "99999999999999999999999999999922";


/**
 * Default input data set profile hash 128 chars
 * @var string $VAILD_PROFILEHASH1
 */
	protected $VAILD_PROFILEHASH1 = null;

/**
 * Default input data set UPDATE profile hash 128 chars
 * @var string $VAILD_PROFILEHASH2
 */
	protected $VAILD_PROFILEHASH2 = null;


/**
 * Default input data set profile salt 64 chars
 * @var string $VAILD_PROFILESALT1
 */
	protected $VAILD_PROFILESALT1 = null;


	/**
	 * Default input data set UPDATED profile salt 64 chars
	 * @var string $VAILD_PROFILESALT2
	 */
	protected $VAILD_PROFILESALT2 = null;



	/**
	 * create dependent objects before running each test
	 */
	public final function setUp() {
		// run the default abstract setUp() method from parent first
		parent::setUp();

		$password = "abc123";

		$salt = bin2hex(random_bytes(16));// add another one of these to make it sexy
		$hash = hash_pdkdf2("sha512", $password, $salt, 262144);


		$salt = bin2hex(random_bytes(16));// add another one of these to make it sexy
		$hash = hash_pdkdf2("sha513", $password, $salt, 262146);

		$this->VAILD_PROFILESALT1 = $salt;
		$this->VAILD_PROFILESALT2 = $salt;

		$this->VAILD_PROFILEHASH1 = $hash;
		$this->VAILD_PROFILEHASH2 = $hash;

	}


	/**
	 *test inserting a vaild profile and verify that what's in mySQL matches what was input
	 */
	public function testInsertVaildProfile() {
		// count the number of rows initially the database (0)
		$numRows = $this->getConnection()->getRowCount("profile");


		// create a new profile and insert it into SQL
		$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEACTIVATIONTOKEN1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEHASH1);

		//insert the mock profile in SQL
		$profile->insert($this->getPDO());


		//NOW, grab the data from SQL and ensure the fields match our expectations

		//$pdoProfile is new declaration... then we call our PDO get method: getProfileByProfileID which requires 2 parameters:
		//the first is a PDO object, the other is our profileId, which we use the accessor method we wrote (getProfileId) to get!
		// $pdoProfile now contains all the information for our dummy profile
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());


		//make assertions here....be assertive


		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));


		// the following will be testing to see if the data we thought we put in the data base is there
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->VAILD_PROFILEUSERNAME1);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VAILD_PROFILEEMAIL1);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->VAILD_PROFILEHASH1);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->VAILD_PROFILESALT1);
		$this->assertEquals($pdoProfile->getProfileActivation(), $this->VAILD_PROFILEACTIVATIONTOKEN1);
	}



	/**
	 * test inserting a profile that already exists
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidProfile(){
		// create a profile with a non-null profileId and watch it fail. use the INVALID_KEY we defined inside the abstract class CannaduceusTest
		//here we are calling an object ($profile) based on the Profile class and feeding it initial values. BUT whereas normally we would define the primary key as NULL
		//this time we are giving it a value (INVALID_KEY)
		$profile = new Profile(CannaduceusTest::INVALID_KEY, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILEACTIVATIONTOKEN1);

		//now insert it into SQL and hope it throws a error!
		//this uses the insert PDO method we wrote back in our class, and all the capabilities it has
		$profile->insert($this->insert($this->getPDO()));
	}



	/**
	 * test inserting a profile, editing it, and then updating it
	 */
	public function testUpdatedValidProfile(){
				//count the initial number of rows and assign it to the variable $numRows
				$numRows = $this->getConnection()->getRowCount("profile");


				//create a new profile and insert it into SQL
				$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILEACTIVATIONTOKEN1);

				//inset the mock profile in SQL
				$profile->insert($this->getPDO());

				//edit the profile and update it in SQL
				$profile->setProfileUserName($this->VAILD_PROFILEUSERNAME2);
				$profile->setProfileEmail($this->VAILD_PROFILEEMAIL2);
				$profile->setProfileHash($this->VAILD_PROFILEHASH2);
				$profile->setProfileSalt($this->VAILD_PROFILESALT2);
				$profile->setProfileActivation($this->VALID_PROFILEACTIVATIONTOKEN2);

				//now call the update PDO method we wrote in the class!!@!@!@
				$profile->update($this->getPDO());

				//now grab the data back out of SQL to make sure it matches what we put in

				//$pdoProfile is new declaration...then we call our PDO get method: getProfileByProfileId which requires 2 parameters:
				//the first is a PDO object, the other is our profileId, which we use the accessor method we wrote (getProfileId) to get!
				// $pdoProfile now contains all the information for our dummy profile
				$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
				$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));




	}



	/**
	 * test insering a profile that already exists
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidProfile(){

	}





}