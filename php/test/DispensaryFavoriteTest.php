<?php
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\Dispensary;
use Edu\Cnm\Cannaduceus\Profile;
use Edu\Cnm\Cannaduceus\Test\{DispensaryFavorite};

// grab the test parameters
require_once("DispensaryFavoriteTest.php");
// grab the class being tested
require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the dispensary favorite class
 *
 * this is a complete PHPUnit test of the dispensary favorite class. It is complete becasue *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and vailid inputs.
 *
 * @see DispensaryFavorite
 * @author nathan sanchez <nsanchez121@cnm.edu>
 */
class DispensaryFavoriteTest extends CannaduceusTest {
	/*--------------------------------Declare Protected State Variables -----------------------*/

	/**
	 * the favorite dispensary
	 * @var string $VALID_DISPENSARYFAVORITE1
	 */
	protected $VALID_FAVORITEDISPENSARY1 = "FavoriteDispensary";
	/**
	 * content of the updated Favorite
	 * @var string $VALID_DISPENSARYFAVORITE2
	 */
	protected $VAILD_FAVORITEDISPENSARY2 = "FavoriteDispensaryUpdated";
	/**
	 * Profile that created the Favorite; this is foreign key relations
	 * @var
	 */
	protected $profile = null;

	/**
	 * create dependent objects before running each test
	 */
	public final function setUp() {
		// run the default abstract setUp() method from parent first
		parent::setUp();


		// create and insert a Profile to own the test DispensaryFavorite
		$password = "abc123";
		$salt = bin2hex(random_bytes(32));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144, 128);
		$activation = bin2hex(random_bytes(16));
		$this->profile = new Profile(null, "profileUserName", "profileEmail", "profileHash", "profileSalt", "profileActivation");
		$this->profile -> insert($this->getPDO());

		// create and insert a Dispensary to Favorite the test DispensaryFavorite
		$this->dispensary = new dispensary(null, "dispensaryAttention", "dispensaryCity", "dispensaryEmail", "dispensaryName", "dispensaryPhone", "dispensaryState", "dispensaryStreet1", "dispensaryStreet2","dispensaryUrl", "dispensaryZipCode");
		$this->dispensary->insert($this->getPDO());
	}

	/**
	 * test inserting a valid DispensaryFavorite and verify that the actual mySQL data matches
	 */
	public function testInsertValidDispensaryFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary favorite");


		// create a new DispensaryFavorite and insert it in to mySQL
		$dispensaryFavorite = dispensaryFavorite(null, $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);


		// insert the mock favorite in SQL
		$dispensaryFavorite->insert($this->getPDO());


		$pdoDispensaryFavorite = dispensaryFavorite::dispensaryFavoriteDispensaryId($this->getPDO(), $dispensaryFavorite->getDispensaryFavoriteProfileId());


		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryFavorite"));


		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VALID_FAVORITEDISPENSARY1);
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VAILD_FAVORITEDISPENSARY2);
	}


	/**
	 * test inserting a favorite that already exists
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidFavorite(){


	$dispensaryFavorite = new dispensaryFavorite(CannaduceusTest::INVALID_KEY, $this->$VALID_FAVORITEDISPENSARY1, $this->$VAILD_FAVORITEDISPENSARY2);

	$dispensaryFavorite->insert($this->getPDO());
	}

	/**
	 * test inserting a favorite, editing it, and then updating it
	 */
	public function testUpdatedValidFavorite(){
		$numRows = $this->getConnection()->getRowCount("favorite");

		$dispensaryFavorite = new dispensaryFavorite(null, $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);

		$dispensaryFavorite->insert($this->getPDO());

		// edit the favorite and update it in SQL
		$dispensaryFavorite->setDispensaryFavorite($this->VAILD_FAVORITEDISPENSARY2);
		$dispensaryFavorite->setDispensaryFavorite($this->VAILD_FAVORITEDISPENSARY2);

		$dispensaryFavorite->update($this->getPDO());

		$pdoDispensaryFavorite = dispensaryFavorite::getDispensaryByDispensaryId($this->getPDO(), $dispensaryFavorite->getDispensaryFavoriteId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("favorite"));


		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VAILD_FAVORITEDISPENSARY2);
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VAILD_FAVORITEDISPENSARY2);
	}

	/**
	 * test updating a favorite that does not exist
	 *
	 * @excpectedException
	 */
	public function testUpdateInvalidFavorite() {
		// create a favorite try to update it without actually updating it and watch it fail
		$dispensaryFavorite = new dispensaryFavorite(null, $this->profile->getProfileId(), $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);
		$dispensaryFavorite->update($this->getPDO());
	}

	/**
	 * test creating a favorite and then deleting it:(
	 */
	public function testDeleteValidFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("favorite");

		// create a new favorite and insert to into mySQL
		$dispensaryFavorite = new dispensaryFavorite(null, $this->profile->getProfileId(), $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);
		$dispensaryFavorite->insert($this->getPDO());

		// delete the favorite from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("favorite"));
		// delete dispensary favorite
		$dispensaryFavorite->delete($this->getPDO());

		//grab the data from mySQL
		$pdoDispensaryFavorite = dispensaryFavorite::getDispensaryByDispensaryId($this->getPDO(), $dispensaryFavorite->getDispensaryId());
		// assert that its null
		$this->assertNull($pdoDispensaryFavorite);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("favorite"));
	}



	/**
	 * test deleting a favorite that does not exist
	 * @expectedException \PDOException
	 */
	public function  testDeleteInvalidProfile(){
		//create a favorite and never actually insert it then try to delete it when it hasnt been inserted

		// create a new DispensaryFavorite and insert it in to mySQL
		$dispensaryFavorite = dispensaryFavorite($this->profile->getProfileId(),  $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);
		//now delete it
		$dispensaryFavorite->delete($this->getPDO());
	}
	/**
	 * test getting a dispensary favorite by profile Id =^. _ .^=
	 */
	public function testGetDispensaryFavoriteByProfileId(){
		//get number of inital rows (will be zero!) and save it for lates
		$numRows = $this->getConnection()->getRowCount("dispensary favorite");
		// create a dummy dispensary favorite
		$dispensaryFavorite = new dispensaryFavorite(null, $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);
		$dispensaryFavorite->insert($this->getPDO());
		$results = dispensaryFavorite::getDispensaryFavoriteByProfileId($this->getPDO(), $dispensaryFavorite->getDispensaryFavorite);
		//confirm we only have 1 favorite in the database
		$this->assertCount(1, $results);


		//ensure there are only instances of the dispensaryFavorite class in the namespace
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\DispensaryFavorite", $results);


		$pdoDispensaryFavorite = $results[0];
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VALID_FAVORITEDISPENSARY1);
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VALID_FAVORITEDISPENSARY2);
	}
	/**
	 * test gettting a dispensary favorite by name that does not exist
	 */
	public function testGetInvalidDispensaryFavoriteByProfileId() {
	$dispensaryFavorite = dispensaryFavorite::getDispensaryFavoriteByProfileId($this->getPDO(), "dispensary favorite not found");
	$this->assertNull($dispensaryFavorite);
	}
	/**
	 * test getting dispensary favorite by dispensary Id
	 */
	public function testGetDispensaryFavoriteByDispensaryId() {
	//get the number of initail rows (will be zero) and save it for later
	$numRows = $this->getConnection()->getRowCount("dispensaryFavorite");
	// create a dummy dispensary favorite
		$dispensaryFavorite = new DispensaryFavorite(null, )





	}







}
