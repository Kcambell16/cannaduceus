<?php
namespace Edu\Cnm\Cannaduceus\Test;



use Edu\Cnm\Cannaduceus\{Profile};

//grab the parameters for the test, go the abstract test file
require_once ("CannaduceusTest.php");

//grab the class being tested
require_once (dirname(__DIR__) . "/classes/autoload.php");
/**
 * Full PHPUnit test for the Profile class
 *
 * This is a complete PHPUnit test of the Profile class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Profile
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
 * @var string $VAILD_PROFILEACTIVATION1
 */
	protected $VAILD_PROFILEACTIVATION1 = "00000000000000000000000000000022";


	/**
	 * Default input data set UPDATED profile activation token 32 chars
	 * @var string VAILD_PROFILEACTIVATION2
	 */
	protected $VALID_PROFILEACTIVATION2 = "99999999999999999999999999999922";


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

		$salt0 = bin2hex(random_bytes(16));
		$hash0 = hash_pbkdf2("sha512", $password, $salt0, 262144, 128);


		$salt1 = bin2hex(random_bytes(16));
		$hash1 = hash_pbkdf2("sha512", $password, $salt1, 262144, 128);
		var_dump($hash1);

		$this->VAILD_PROFILESALT1 = $salt0;
		$this->VAILD_PROFILESALT2 = $salt1;

		$this->VAILD_PROFILEHASH1 = $hash0;
		$this->VAILD_PROFILEHASH2 = $hash1;

	}


	/**
	 *test inserting a vaild profile and verify that what's in mySQL matches what was input
	 */
	public function testInsertValidProfile() {
		// count the number of rows initially the database (0)
		$numRows = $this->getConnection()->getRowCount("profile");


		// create a new profile and insert it into SQL
		$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);

		//insert the mock profile in SQL
		$profile->insert($this->getPDO());


		//NOW, grab the data from SQL and ensure the fields match our expectations

		//$pdoProfile is new declaration... then we call our PDO get method: getProfileByProfileId  which requires 2 parameters:
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
		$this->assertEquals($pdoProfile->getProfileActivation(), $this->VAILD_PROFILEACTIVATION1);
	}



	/**
	 * test inserting a profile that already exists
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidProfile(){
		// create a profile with a non-null profileId and watch it fail. use the INVALID_KEY we defined inside the abstract class CannaduceusTest
		//here we are calling an object ($profile) based on the Profile class and feeding it initial values. BUT whereas normally we would define the primary key as NULL
		//this time we are giving it a value (INVALID_KEY)
		$profile = new Profile(CannaduceusTest::INVALID_KEY, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILEACTIVATION1);

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
				$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);

				//inset the mock profile in SQL
				$profile->insert($this->getPDO());

				//edit the profile and update it in SQL
				$profile->setProfileUserName($this->VAILD_PROFILEUSERNAME2);
				$profile->setProfileEmail($this->VAILD_PROFILEEMAIL2);
				$profile->setProfileHash($this->VAILD_PROFILEHASH2);
				$profile->setProfileSalt($this->VAILD_PROFILESALT2);
				$profile->setProfileActivation($this->VALID_PROFILEACTIVATION2);

				//now call the update PDO method we wrote in the class!!@!@!@
				$profile->update($this->getPDO());

				//now grab the data back out of SQL to make sure it matches what we put in

				//$pdoProfile is new declaration...then we call our PDO get method: getProfileByProfileId which requires 2 parameters:
				//the first is a PDO object, the other is our profileId, which we use the accessor method we wrote (getProfileId) to get!
				// $pdoProfile now contains all the information for our dummy profile
				$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
				$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));

				//the following will all best testing to match that the data in the database matches the data we thought we put in the database
				$this->assertEquals($pdoProfile->getProfileUserName(), $this->VAILD_PROFILEUSERNAME2);
				$this->assertEquals($pdoProfile->getProfileEmail(), $this->VAILD_PROFILEEMAIL2);
				$this->assertEquals($pdoProfile->getProfileHash(), $this->VAILD_PROFILEHASH2);
				$this->assertEquals($pdoProfile->getProfileSalt(), $this->VAILD_PROFILESALT2);
				$this->assertEquals($pdoProfile->getProfileActivation(), $this->VALID_PROFILEACTIVATION2);
	}



	/**
	 * test inserting a profile that already exists
	 * @expectedException \PDOException
	 */
	public function testUpdateInvalidProfile(){
			$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILEACTIVATION1);

			//now that the dummy profile has been created, we will not insert this bad boy but were gonna try to update it in SQL
			$profile->update($this->getPDO());
	}



	/**
	 * test creating a profile and then 410'ing it
	 */
	public function testDeleteValidProfile(){
				//count the rows assign that number to a variable and save it for later
				$numRows = $this->getConnection()->getRowCount("profile");


		//create a dummy profile
		$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);

		//insert it into SQL
		$profile->insert($this->getPDO());

		//check to be sure that the profile was properly inserted
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));

		//delete the profile
		$profile->delete($this->getPDO());


	// $pdoProfile now contains all the information for our dooomy profile
	$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
	// assert that its null
	$this->assertNull($pdoProfile);


	//assert that the rows are empty
	$this->assertEquals($numRows, $this->getConnection()->getRowCount("profile"));
	}
	/**
	 * test deleting a profile that does not exist
	 * @expectedException \PDOException
	 */
	public function testDeleteInvalidProfile(){
			//create a profile and never actually insert it then try to delete it when it hasnt been inserted

			//create a dummy profile (again:()
			$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);

			//now time to delete this egg head with out inserting it
			$profile->delete($this->getPDO());
	}



	/**
	 * test getting a profile by profile name
	 */
	public function testGetProfileByProfileUserName(){
			//get number of initial rows (will be zero) and save it for later
			$numRows = $this->getConnection()->getRowCount("profile");


			// create a dummy profile
			$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);

			$results = Profile::getProfileByProfileUserName($this->getPDO(), $profile->getProfileByProfileUserName());

			$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));

			//confirm we have just 1 profile in the data base
			$this->assertCount(1, $results);


			//ensure there are only instances of the profile class in the namespace
			$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\Profile", $results);

			//grab results from the array and validate them
			$pdoProfile = $results[0];
			//check if the stuff in the database matches the stuff we put in
			$this->assertEquals($pdoProfile->getProfileUserName(), $this->VAILD_PROFILEUSERNAME1);
			$this->assertEquals($pdoProfile->getProfileEmail(), $this->VAILD_PROFILEEMAIL1);
			$this->assertEquals($pdoProfile->getProfileHash(), $this->VAILD_PROFILEHASH1);
			$this->assertEquals($pdoProfile->getProfileSalt(), $this->VAILD_PROFILESALT1);
			$this->assertEquals($pdoProfile->getProfileActivation(), $this->VAILD_PROFILEACTIVATION1);
	}
	/**
	 * test getting a profile by a name that does not exist!
	 */
	public function testGetInvalidProfileByProfileUserName(){
		$profile = Profile::getProfileByProfileUserName($this->getPDO(), "A Stoner with no name");
		$this->assertCount(0,$profile);

	}









	/**
	 * test getting a profile by the profile email
	 */
	public function testGetProfileByProfileEmail(){
			//get number of initial rows (will be zero) and save it for later
			$numRows = $this->getConnection()->getRowCount("profile");

			//create a dummy profile
			$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);

			//insert the mock profile in SQL
			$profile->insert($this->getPDO());

			$results = Profile::getProfileByProfileEmail($this->getPDO(), $profile->getProfileEmail());

			$this->assertEquals ($numRows + 1, $this->getConnection()->getRowCount("profile"));

			//confirm we have just 1 profile in the database
			$this->assertCount(1, $results);

			//ensure there are only instances of the profile class in the namespace
			$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\Profile", $results);

			//grab results from the array and validate them
			$pdoProfile = $results[0];
			//check if the stuff in the database matches the stuff we put in
			$this->assertEquals($pdoProfile->getProfileUserName(), $this->VAILD_PROFILEUSERNAME1);
			$this->assertEquals($pdoProfile->getProfileEmail(), $this->VAILD_PROFILEEMAIL1);
			$this->assertEquals($pdoProfile->getProfileHash(), $this->VAILD_PROFILEHASH1);
			$this->assertEquals($pdoProfile->getProfileSalt(), $this->VAILD_PROFILESALT1);
			$this->assertEquals($pdoProfile->getProfileActivation(), $this->VAILD_PROFILEACTIVATION1);
	}


	/**
	 * test getting a profile by a email that does not exist
	 */
	public function testGetInvalidProfileProfileByProfileEmail(){
			//grab a profile by searching for a Email that doesn't exist
			$profile = Profile::getProfileByProfileEmail($this->getPDO(), "A code monkey with no Email");
			$this->assertCount(0,$profile);
	}

	/**
	 * test getting all the profiles
	 */
	public function testGetAllValidProfile(){
		//count the initial number of rows (0) and save it for lates
		$numRows = $this->getConnection()->getRowCount("profile");

		//make a dummy profile
		$profile = new Profile(null, $this->VAILD_PROFILEUSERNAME1, $this->VAILD_PROFILEEMAIL1, $this->VAILD_PROFILEHASH1, $this->VAILD_PROFILESALT1, $this->VAILD_PROFILEACTIVATION1);
		//insert in to dat SQL
		$profile->insert($this->getPDO());

		//now get the data from SQL and make sure it matches
		$results = Profile::getAllProfiles($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		//confirm we have just 1 profile in the database
		$this->assertCount(1, $results);
		//ensure there are only instances of the profile class in the namespace
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\Profile", $results);

		//grab results from the array and validate them
		$pdoProfile = $results[0];
		//check if the stuff in the database matches the stuff we put in
		$this->assertEquals($pdoProfile->getProfileUserName(), $this->VAILD_PROFILEUSERNAME1);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VAILD_PROFILEEMAIL1);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->VAILD_PROFILEHASH1);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->VAILD_PROFILESALT1);
		$this->assertEquals($pdoProfile->getProfileActivation(), $this->VAILD_PROFILEACTIVATION1);

	}


}