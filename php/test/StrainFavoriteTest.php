<?php
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\Strain;
use Edu\Cnm\Cannaduceus\Profile;
use Edu\Cnm\Cannaduceus\StrainFavorite;

// grab the test parameters
require_once("CannaduceusTest.php");
// grab the class being tested
require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once ("../classes/autoload.php");

/**
 * Full PHPUnit test for the strain favorite class
 *
 * this is a complete PHPUnit test of the strain favorite class. It is complete becasue *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and vailid inputs.
 *
 * @see strainFavorite
 * @author nathan sanchez <nsanchez121@cnm.edu>
 */
class strainFavoriteTest extends CannaduceusTest {
	/*--------------------------------Declare Protected State Variables -----------------------*/


	/**
	 * Profile that created the Favorite; this is foreign key relations
	 * @var string $profile
	 */
	protected $profile;
	/**
	 * the favorite strain
	 * @var string 
	 **/
	protected $strain;

	/**
	 * create dependent objects before running each test
	 */
	public final function setUp() {
		// run the default abstract setUp() method from parent first
		parent::setUp();


		// create and insert a Profile to own the test strainFavorite
		$password = "abc123";
		$salt = bin2hex(random_bytes(32));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144, 128);
		$activation = bin2hex(random_bytes(16));
		$this->profile = new Profile(null, "profileUserName", "profileEmail", $hash, $salt, $activation);
		$this->profile -> insert($this->getPDO());

		// create and insert a Strain to Favorite the test strainFavorite
		$this->strain = new Strain(null, "dankestbud", "Sativa", "32.5", "0.8", "some good stuff 10/10");
		$this->strain->insert($this->getPDO());

	}

	/**
	 * test inserting a valid strainFavorite and verify that the actual mySQL data matches
	 */
	public function testInsertValidStrainFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainFavorite");


		// create a new strainFavorite and insert it in to mySQL
		$strainFavorite = new StrainFavorite($this->profile->getProfileId(),$this->strain->getStrainId());
		// insert the mock favorite in SQL
		$strainFavorite->insert($this->getPDO());
		var_dump($strainFavorite->getStrainFavoriteProfileId());
		var_dump($strainFavorite->getStrainFavoriteStrainId());

		$pdoStrainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId($this->getPDO(),$this->strain->getStrainId(), $this->profile->getProfileId());
		var_dump($pdoStrainFavorite);
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainFavorite"));
		$this->assertEquals($pdoStrainFavorite->getStrainFavoriteProfileId(), $strainFavorite->getStrainFavoriteProfileId());
		$this->assertEquals($pdoStrainFavorite->getStrainFavoriteStrainId(), $strainFavorite->getStrainFavoriteStrainId());
	}


	/**
	 * test inserting a favorite that already exists
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidFavorite(){


		$strainFavorite = new StrainFavorite($this->profile->getProfileId(),$this->strain->getstrainId());
		$strainFavorite->insert($this->getPDO());

		// insert again and watch it fail
		$strainFavorite->insert($this->getPDO());

	}




	/**
	 * test creating a favorite and then deleting it:(
	 */
	public function testDeleteValidFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strainFavorite");

		// create a new favorite and insert to into mySQL
		$strainFavorite = new StrainFavorite($this->profile->getProfileId(), $this->strain->getstrainId());
		$strainFavorite->insert($this->getPDO());


		// delete the favorite from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strainFavorite"));
		// delete strain favorite
		$strainFavorite->delete($this->getPDO());

		//grab the data from mySQL
		$pdoStrainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId($this->getPDO(), $this->profile->getProfileId(),$this->strain->getstrainId());
		//var_dump($pdoStrainFavorite);

		// assert that its null
		$this->assertNull($pdoStrainFavorite);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("strainFavorite"));
	}



	/**
	 * test deleting a favorite that does not exist
	 *
	 * @expectedException \Exception
	 */
	public function  testDeleteInvalidFavorite(){
		//create a favorite and never actually insert it then try to delete it when it hasnt been inserted

		// create a new strainFavorite and insert it in to mySQL
		$strainFavorite = new StrainFavorite($this->profile->getProfileId(),$this->strain->getstrainId());
		//now delete it
		$strainFavorite->delete($this->getPDO());
	}
	/**
	 * test getting a strain favorite by profile Id =^. _ .^=
	 */
	public function testGetstrainFavoriteByProfileId(){


		// create a dummy strain favorite
		$strainFavorite = new StrainFavorite($this->profile->getProfileId(),$this->strain->getstrainId());
		$strainFavorite->insert($this->getPDO());

		$results = StrainFavorite::getStrainFavoriteByStrainFavoriteProfileId($this->getPDO(), $strainFavorite->getStrainFavoriteProfileId());
		//confirm we only have 1 favorite in the database
		$this->assertCount(1, $results);

		//ensure there are only instances of the strainFavorite class in the namespace
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\strainFavorite", $results);


		$pdoStrainFavorite = $results[0];
		$this->assertEquals($pdoStrainFavorite->getStrainFavoriteProfileId(), $strainFavorite->getStrainFavoriteProfileId());
		$this->assertEquals($pdoStrainFavorite->getStrainFavoriteStrainId(), $strainFavorite->getStrainFavoriteStrainId());

	}


	/**
	 * test gettting a strain favorite by profileId that does not exist
	 */
	public function testGetInvalidStrainFavoriteByProfileId() {
		$strainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteProfileId($this->getPDO(), 5000);
		$this->assertEquals(0, $strainFavorite->count());
	}


	/**
	 * test getting strain favorite by strain Id
	 */
	public function testGetStrainFavoriteByStrainId() {
		//get the number of initail rows (will be zero) and save it for later

		// create a dummy strain favorite
		$strainFavorite = new StrainFavorite($this->profile->getProfileId(),$this->strain->getstrainId());
		$strainFavorite->insert($this->getPDO());
		$results = StrainFavorite::getStrainFavoriteByStrainFavoriteStrainId($this->getPDO(), $this->strain->getstrainId());

		$this->assertCount(1, $results);

		$pdoStrainFavorite = $results[0];
		$this->assertEquals($pdoStrainFavorite->getStrainFavoriteProfileId(), $strainFavorite->getStrainFavoriteProfileId());
		$this->assertEquals($pdoStrainFavorite->getStrainFavoriteStrainId(), $strainFavorite->getStrainFavoriteStrainId());
	}
	/**
	 * test getting a strain favorite by strain Id
	 */
	public function  testGetInvaildStrainFavoriteByStrainId() {
		$strainFavorite = StrainFavorite::getStrainFavoriteByStrainFavoriteStrainId($this->getPDO(),5000);
		$this->assertEquals(0, $strainFavorite->count());


	}





}

