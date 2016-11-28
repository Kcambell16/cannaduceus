<?php
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\Dispensary;
use Edu\Cnm\Cannaduceus\Profile;
use Edu\Cnm\Cannaduceus\DispensaryFavorite;

// grab the test parameters
require_once("CannaduceusTest.php");
// grab the class being tested
require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once ("../classes/autoload.php");

/**
 * Full PHPUnit test for the dispensary favorite class
 *
 * this is a complete PHPUnit test of the dispensary favorite class. It is complete becasue *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see DispensaryFavorite
 * @author Nathan Sanchez <nsanchez121@cnm.edu>
 * @version 1.0.0
 **/
class DispensaryFavoriteTest extends CannaduceusTest {
	/*--------------------------------Declare Protected State Variables -----------------------**/


	/**
	 * Profile that created the Favorite; this is foreign key relations
	 * @var string $profile
	 **/
	protected $profile;
	/**
	 * the favorite dispensary
	 * @var string $dispensary
	 **/
	protected $dispensary;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default abstract setUp() method from parent first
		parent::setUp();


		// create and insert a Profile to own the test DispensaryFavorite
		$password = "abc123";
		$salt = bin2hex(random_bytes(32));
		$hash = hash_pbkdf2("sha512", $password, $salt, 262144, 128);
		$activation = bin2hex(random_bytes(16));
		$this->profile = new Profile(null, "profileUserName", "profileEmail", $hash, $salt, $activation);
		$this->profile -> insert($this->getPDO());

		// create and insert a Dispensary to Favorite the test DispensaryFavorite
		$this->dispensary = new Dispensary(null, "dispensaryAttention", "abq", "dinoking505@gmail.com", "weedpizza", 5058223457, "NM", "CU", "6969Unt","weedpizza.com", 87110);
		$this->dispensary->insert($this->getPDO());

	}

	/**
	 * test inserting a valid DispensaryFavorite and verify that the actual mySQL data matches
	 **/
	public function testInsertValidDispensaryFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensaryFavorite");


		// create a new DispensaryFavorite and insert it in to mySQL
		$dispensaryFavorite = new DispensaryFavorite($this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		// insert the mock favorite in SQL
		$dispensaryFavorite->insert($this->getPDO(),$this->profile->getProfileId(), $this->dispensary->getDispensaryId());

		$pdoDispensaryFavorite = DispensaryFavorite::getDispensaryFavoriteByDispensaryFavoriteDispensaryIdAndDispensaryFavoriteProfileId($this->getPDO(), $this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryFavorite"));
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavoriteProfileId(), $dispensaryFavorite->getDispensaryFavoriteProfileId());
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavoriteDispensaryId(), $dispensaryFavorite->getDispensaryFavoriteDispensaryId());
	}


	/**
	 * test inserting a favorite that already exists
	 * @expectedException \PDOException
	 **/
	public function testInsertInvalidFavorite(){


		$dispensaryFavorite = new DispensaryFavorite($this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		$dispensaryFavorite->insert($this->getPDO(),$this->profile->getProfileId(), $this->dispensary->getDispensaryId());

		// insert again and wath it fail
		$dispensaryFavorite->insert($this->getPDO(),$this->profile->getProfileId(), $this->dispensary->getDispensaryId());

	}




	/**
	 * test creating a favorite and then deleting it:(\
	 *
	 **/
	public function testDeleteValidFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensaryFavorite");

		// create a new favorite and insert to into mySQL
		$dispensaryFavorite = new DispensaryFavorite($this->profile->getProfileId(), $this->dispensary->getDispensaryId());
		$dispensaryFavorite->insert($this->getPDO());


		// delete the favorite from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryFavorite"));
		// delete dispensary favorite
		$dispensaryFavorite->delete($this->getPDO());

		//grab the data from mySQL
		$pdoDispensaryFavorite = DispensaryFavorite::getDispensaryFavoriteByDispensaryFavoriteDispensaryIdAndDispensaryFavoriteProfileId($this->getPDO(), $this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		//var_dump($pdoDispensaryFavorite);

		// assert that its null
		$this->assertNull($pdoDispensaryFavorite);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("dispensaryFavorite"));
	}



	/**
	 * test deleting a favorite that does not exist
	 * @expectedException \PDOException
	 **/
	public function  testDeleteInvalidFavorite(){
		//create a favorite and never actually insert it then try to delete it when it hasnt been inserted

		// create a new DispensaryFavorite
		$dispensaryFavorite = new DispensaryFavorite($this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		//now delete it
		$dispensaryFavorite->delete($this->getPDO());
	}
	/**
	 * test getting a dispensary favorite by profile Id
	 **/
	public function testGetDispensaryFavoriteByProfileId(){


		// create a dummy dispensary favorite
		$dispensaryFavorite = new DispensaryFavorite($this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		$dispensaryFavorite->insert($this->getPDO());

		$results = DispensaryFavorite::getDispensaryFavoriteByDispensaryFavoriteProfileId($this->getPDO(), $dispensaryFavorite->getDispensaryFavoriteProfileId());
		//confirm we only have 1 favorite in the database
		$this->assertCount(1, $results);

		//ensure there are only instances of the dispensaryFavorite class in the namespace
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Cannaduceus\\DispensaryFavorite", $results);


		$pdoDispensaryFavorite = $results[0];
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavoriteProfileId(), $dispensaryFavorite->getDispensaryFavoriteProfileId());
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavoriteDispensaryId(), $dispensaryFavorite->getDispensaryFavoriteDispensaryId());

	}


	/**
	 * test gettting a dispensary favorite by profileId that does not exist
	 * @expectedException \PDOException 
	 **/
	public function testGetInvalidDispensaryFavoriteByProfileId() {
	$dispensaryFavorite = DispensaryFavorite::getDispensaryFavoriteByDispensaryFavoriteProfileId($this->getPDO(), 5000);
	$this->assertEquals(0, $dispensaryFavorite->count());
	}


	/**
	 * test getting dispensary favorite by dispensary Id
	 **/
	public function testGetDispensaryFavoriteByDispensaryId() {
	//get the number of initial rows (will be zero) and save it for later

	// create a dummy dispensary favorite
		$dispensaryFavorite = new DispensaryFavorite($this->profile->getProfileId(),$this->dispensary->getDispensaryId());
		$dispensaryFavorite->insert($this->getPDO());
		$results = DispensaryFavorite::getDispensaryFavoriteByDispensaryFavoriteDispensaryId($this->getPDO(), $this->dispensary->getDispensaryId());

		$this->assertCount(1, $results);

		$pdoDispensaryFavorite = $results[0];
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavoriteProfileId(), $dispensaryFavorite->getDispensaryFavoriteProfileId());
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavoriteDispensaryId(), $dispensaryFavorite->getDispensaryFavoriteDispensaryId());
	}
	// Making these @throws from PDO/exception to just exception they seem to work fine that way gotta ask dylan why because im not sure
	/**
	 * test getting a dispensary favorite by dispensary Id
	 * @exoectedException PDOException
	 **/
public function  testGetInvalidDispensaryFavoriteByDispensaryId() {
	$dispensaryFavorite = DispensaryFavorite::getDispensaryFavoriteByDispensaryFavoriteDispensaryId($this->getPDO(),5000);
	$this->assertEquals(0, $dispensaryFavorite->count());


}





}
