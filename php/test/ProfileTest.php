<?php


namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Profile};

//grabs the project parameters
require_once ("CannaduceusTest.php");

//grabs the class being tested
require_once (dirname(__DIR__) . "../php/classes/Profile.php");

/**
 * Full PHPUnit test for the Profile class
 * all MySQL/PDO enabled methods are tested for both invalid and valid inputs in this test
 * @see Profile
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 */

class Profile extends CannaduceusTest {

	//adding this to test dummy profile

	/**
	 * name of profile
	 * @var string $VALID_PROFILENAME
	 **/
	protected $VALID_PROFILEUSERNAME = "betty420";
	/**
	 * email of profile
	 * @var string $VALID_PROFILEEMAIL
	 **/
	protected $VALID_PROFILEEMAIL = "foo@bar.com";
	/**
	 * hash for profile
	 * @var profileHash
	 **/
	private $profileHash;
	/**
	 * salt for profile
	 * @var profileSalt
	 **/
	private $profileSalt;
	/**
	 * content of the profile hash
	 * @var string $VALID_PROFILEHASH
	 **/
	protected $VALID_PROFILEHASH = "12345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678";
	/** content of the Profile Salt
	 * @var string $VALID_PROFILESALT
	 **/
	protected $VALID_PROFILESALT = "1234567890123456789012345678901234567890123456789012345678901234";
	/**
	 * activation token for profile
	 * @var string $VALID_PROFILEACTIVATION
	 **/
	protected $VALID_PROFILEACTIVATION = "01234567890123456789012345678901";

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		//run the default setUp() method first
		parent::setUp();
		//create and insert a Profile to own the account
		$this->VALID_PROFILEACTIVATION = bin2hex(random_bytes(16));
		$this->salt = bin2hex(random_bytes(32));
		$this->hash = hash_pbkdf2("sha256", "abc123", $this->salt, 262144);
	}

	/**
	 * test inserting a valid profile and verify that the actual mySQL data matches
	 **/
	public function testInsertValidProfile() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a new Profile and insert it into mySQL
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("Profile"));
		$this->assertEquals($pdoProfile->getProfileName(), $this->VALID_PROFILENAME);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->hash);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->salt);
		$this->assertEquals($pdoProfile->getProfileActivation(), $this->VALID_PROFILEACTIVATION);
	}

	/**
	 * test inserting a Profile that already exists
	 *
	 * @expectedException \PDOException
	 **/
	public function testUpdateValidProfile() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a Profile with a non null profile id and watch it fail
		$profile = new Profile(null, $this->VALID_PROFILENAME,
			$this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//edit the Profile and update it in mySQL
		$profile->setProfileEmail($this->VALID_PROFILEEMAIL2);
		$profile->setProfileHash($this->hash);
		$profile->setProfileSalt($this->salt);
		$profile->setProfileActivation($this->VALID_PROFILEACTIVaTION2);
		$profile->update($this->getPDO());
		// grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertEquals($pdoProfile->getProfileName(), $this->VALID_PROFILENAME);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL2);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->hash);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->salt);
		$this->assertEquals($pdoProfile->getProfileAccessToken(), $this->);
		$this->assertEquals($pdoProfile->getPROFILEACTIVATION(), $this->VALID_PROFILEACTIVATION2);
	}

	/**
	 * test updating a Profile that already exists
	 *
	 * @expectedException \PDOException
	 **/
	public function testUpdateInvalidProfile() {
		//create a profile with a null profile id and watch it fail
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->update($this->getPDO());
	}

	/**
	 * test creating a Profile and then deleting
	 **/
	public function testDeleteValidProfile() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a new Profile and insert it into mySQL
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//delete the Profile from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$profile->delete($this->getPDO());
		//grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertNull($pdoProfile);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("profile"));
	}

	/**
	 *test deleting a Profile that does not exist
	 *
	 * @expectedException \PDOException
	 **/
	public function testDeleteInvalidProfile() {
		//create a profile and try to delete it without actually inserting it
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->delete($this->getPDO());
	}

	/**
	 *test inserting a Profile and re-grabbing it from mySQL
	 **/
	public function testGetValidProfileByProfileId() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a new Profile and insert it in mySQL
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileId($this->getPDO(), $profile->getProfileId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		//grab the result from the array and validate it
		$this->assertEquals($pdoProfile->getProfileName(), $this->VALID_PROFILENAME);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->hash);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->salt);
		$this->assertEquals($pdoProfile->getProfileAccess(), $this->);
		$this->assertEquals($pdoProfile->getPROFILEACTIVATION(), $this->VALID_PROFILEACTIVATION);
	}

	/**
	 *test grabbing a Profile that does not exist
	 **/
	public function testGetInvalidProfileByProfileId() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//grab a profile id that exceeds that maximum allowable profile id
		$profile = Profile::getProfileByProfileId($this->getPDO(), CannaduceusTest::INVALID_KEY);
		$this->assertNull($profile);
	}

	/**
	 *test grabbing a Profile by profile email
	 **/
	public function testGetValidProfileByProfileEmail() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a new Profile and insert it into mySQL
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//grab the data from mySQL and enforce the fields match our expectations
		$pdoProfile = Profile::getProfileByProfileEmail($this->getPDO(), $profile->getProfileEmail());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		//grab the result from the array and validate it
		$this->assertEquals($pdoProfile->getProfileName(), $this->VALID_PROFILENAME);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->hash);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->salt);
		$this->assertEquals($pdoProfile->getProfileAccess(), $this->);
		$this->assertEquals($pdoProfile->getPROFILEACTIVATION(), $this->VALID_PROFILEACTIVATION);
	}

	/**
	 *test grabbing a Profile by profile email that does not exist
	 **/
	public function testGetInvalidProfileByProfileEmail() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection("profile");
		//grab a profile by searching for an email that does not exist
		$profile = Profile::getProfileByProfileEmail($this->getPDO(), "this email does not exist");
		$this->assertNull($profile);
	}

	/**
	 *test grabbing a Profile by profile access token
	 **/
	public function testGetValidProfileAccess() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a new Profile and insert it into mySQL
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//grab the data from mySQL and enforce the fields match our exceptions
		$result = Profile::getProfileByProfileAccess($this->getPDO(), $profile->getProfileAccess());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		//grab the result from the array and validate it
		$pdoProfile = $result;
		$this->assertEquals($pdoProfile->getProfileName(), $this->VALID_PROFILENAME);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->hash);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->salt);
		$this->assertEquals($pdoProfile->getProfileAccess(), $this->);
		$this->assertEquals($pdoProfile->getPROFILEACTIVATION(), $this->VALID_PROFILEACTIVATION);
	}

	/**
	 *test grabbing a Profile by profile access token that does not exist
	 **/
	public function testGetInvalidProfileByProfileAccess() {
		//grab a Profile by searching for profile activation  that doesn't exist
		$profile = Profile::getProfileByProfileAccess($this->getPDO(), "profile activation does not exist");
		$this->assertNull($profile);
	}

	/**
	 * test grabbing all profiles
	 **/
	public function testGetAllValidProfiles() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("profile");
		//create a new Profile and insert it in mySQL
		$profile = new Profile(null, $this->VALID_PROFILENAME, $this->VALID_PROFILEEMAIL, $this->hash, $this->salt, $this->, $this->VALID_PROFILEACTIVATION);
		$profile->insert($this->getPDO());
		//grab the data from mySQL and enforce the fields match our expectations
		$results = Profile::getsAllProfiles($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("profile"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\Profile", $results);
		//grab the results from the array and validate it
		$pdoProfile = $results[0];
		$this->assertEquals($pdoProfile->getProfileName(), $this->VALID_PROFILENAME);
		$this->assertEquals($pdoProfile->getProfileEmail(), $this->VALID_PROFILEEMAIL);
		$this->assertEquals($pdoProfile->getProfileHash(), $this->hash);
		$this->assertEquals($pdoProfile->getProfileSalt(), $this->salt);
		$this->assertEquals($pdoProfile->getProfileAccess(), $this->);
		$this->assertEquals($pdoProfile->getPROFILEACTIVATION(), $this->VALID_PROFILEACTIVATION);
	}
}