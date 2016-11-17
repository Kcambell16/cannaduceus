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

		$salt = bin2hex(random_bytes(16));
		$hash = hash_pdkdf2("sha512", $password, $salt, 262144);


		$this->VAILD_PROFILESALT1 = $salt;
		$this->VAILD_PROFILESALT2 = $salt;

		$this->VAILD_PROFILEHASH1 = $hash;
		$this->VAILD_PROFILEHASH2 = $hash;


	}


}