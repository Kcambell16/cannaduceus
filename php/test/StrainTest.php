<?php

namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Strain};
use Edu\Cnm\jmontoya306\cannaduceus\strain;

//grabs the project parameters
require_once ("CannaduceusTest.php");

//grabs the class being tested
require_once (dirname(__DIR__) . "../php/classes/autoload.php");

/**
* Full PHPUnit test for the Strain class
*
* This is a complete PHPUnit test of the Strain class. It is complete because *ALL* mySQL/PDO enabled methods
* are tested for both invalid and valid inputs.
*
* @see Strain
* @author James Montoya <jamesmontoyaarts@gmail.com>
* @author Kelly Campbell <kcampbell16@cnm.edu>
**/

class StrainTest extends CannaduceusTest {
	/**
	 * strain Id 0
	 * @var string $VALID_STRAINID0
	 */
	protected $VALID_STRAINID0 = "420";
	/**
	 * strain id 1
	 * @var string
	 */
	protected $VALID_STRAINID1 = "720";
	/**
	 * invalid strain Id 0
	 * @var $INVALID_STRAINID0
	 */
	protected $INVALID_STRAINID0 = "Mary Jane";
	/**
	 * invalid strain Id 1
	 * @var $INVALID_STRAINID1
	 */
	protected $INVALID_STRAINID1 = "Cheech and Chong";
	/**
	 * strain name 0
	 * @var string $VALID_STRAINNAME0
	 */
	protected $VALID_STRAINNAME0 = "Shnozzberry";
	/**
	 * strain name 1
	 * @var string $VALID_STRAINNAME1
	 */
	protected $VALID_STRAINNAME1 = "AK-47";
	/**
	 * invalid strain name 0
	 * @var string $INVALID_STRAINNAME0
	 */
	protected $INVALID_STRAINNAME0 = "-420";
	/**
	 * strain type content 0
	 * @var string $VALID_STRAINTYPE0
	 **/
	protected $VALID_STRAINTYPE0 = "Sativa";
	/**
	 * strain type content 1
	 * @var string $VALID_STRAINTYPE1
	 */
	protected $VALID_STRAINTYPE1 = "Indica";
	/**
	 * invalid strain type 0
	 * @var string $INVALID_STRAINTYPE0
	 */
	protected $INVALID_STRAINTYPE0 = "720";
	/**
	 * strain thc content
	 * @var float $VALID_STRAINTHC0
	 */
	protected $VALID_STRAINTHC0 = "32%";
	/**
	 * strain thc content
	 * @var float $VALID_STRAINTHC1
	 **/
	protected $VALID_STRAINTHC = "28%";
	/**
	 * invalid strain thc content
	 * @var float $INVALID_STRAINTHC0
	 */
	protected $INVALID_STRAINTHC0 = "THC";
	/**
	 * strain Cbd content
	 * @var float $VALID_STRAINCBD0
	 **/
	protected $VALID_STRAINCBD0 = "0.8%";
	/**
	 * strain Cbd content
	 * @var float $VALID_STRAINCBD1
	 */
	protected $VALID_STRAINCBD1 = "0.2%";
	/**
	 * invalid Cbd content 0
	 * @var float $INVALID_STRAINCBD0
	 */
	protected $INVALID_STRAINCDB0 = "Fire";
	/**
	 * strain description 0
	 * @var string $VALID_STRAINDESCRIPTION0
	 */
	protected $VALID_STRAINDESCRIPTION0 = "A light airy scent with a strong sativa high";
	/**
	 * strain description 1
	 * @var string $VALID_STRAINDESCRIPTION1
	 */
	protected $VALID_STRAINDESCRIPTION1 = "Fruity flavor with scents of citrus and heavy hitting";
	/**
	 * invalid strain description 0
	 * @var string $INVALID_STRAINDESCRIPTION0
	 */
	protected $INVALID_STRAINDESCRIPTION0 = "betty@baker.com";


	public final function setUp() {
		//run the default setUp() method first
		parent::setUp();

		// create and insert a Strain to own the test Strain
		$this->strain = new Strain("@phpunit", "test@phpunit.de", "+12125551212");
		$this->strain = insert($this->getPDO());
	}

}
