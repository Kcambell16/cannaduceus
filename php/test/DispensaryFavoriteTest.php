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
		$this-> dispensary = new Dispensary(null, "dispensaryAttention", "dispensaryCity", "dispensaryEmail", "dispensaryName", "dispensaryPhone", "dispensaryState", "dispensaryStreet1", "dispensaryStreeet2","dispensaryUrl", "dispensaryZipCode");
		$this-> dispensary->insert($this->getPDO());
	}

	/**
	 * test inserting a valid DispensaryFavorite and verify that the actual mySQL data matches
	 */
	public function testInsertValidDispensaryFavorite() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("dispensary favorite");


		// create a new DispensaryFavorite and insert it in to mySQL
		$dispensaryFavorite = DispensaryFavorite(null, $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);


		// insert the mock favorite in SQL
		$dispensaryFavorite->insert($this->getPDO());


		$pdoDispensaryFavorite = Dispensary::getDispensaryFavoriteByProfileId($this->getPDO(), $dispensaryFavorite->getDispensaryFavorite());


		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("dispensaryFavorite"));


		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VALID_FAVORITEDISPENSARY1);
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VAILD_FAVORITEDISPENSARY2);
	}


	/**
	 * test inserting a favorite that already exists
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidFavorite(){


	$dispensaryFavorite = new DispensaryFavorite(CannaduceusTest::INVALID_KEY, $this->$VALID_FAVORITEDISPENSARY1, $this->$VAILD_FAVORITEDISPENSARY2);

	$dispensaryFavorite->insert($this->getPDO());
	}

	/**
	 * test inserting a favorite, editing it, and then updating it
	 */
	public function testUpdatedValidFavorite(){
		$numRows = $this->getConnection()->getRowCount("favorite");

		$dispensaryFavorite = new DispensaryFavorite(null, $this->VALID_FAVORITEDISPENSARY1, $this->VAILD_FAVORITEDISPENSARY2);

		$dispensaryFavorite->insert($this->getPDO());

		// edit the favorite and update it in SQL
		$dispensaryFavorite->setDispensaryFavorite($this->VAILD_FAVORITEDISPENSARY2);
		$dispensaryFavorite->setDispensaryFavorite($this->VAILD_FAVORITEDISPENSARY2);

		$dispensaryFavorite->update($this->getPDO());

		$pdoDispensaryFavorite = Dispensary::getDispensaryByDispensaryId($this->getPDO(), $dispensaryFavorite->getDispensaryFavoriteId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("favorite"));


		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VAILD_FAVORITEDISPENSARY2);
		$this->assertEquals($pdoDispensaryFavorite->getDispensaryFavorite(), $this->VAILD_FAVORITEDISPENSARY2);
	}


	/**
	 * test inserting a favorite that already exists
	 * @expectedException \PDOException
	 */















}
