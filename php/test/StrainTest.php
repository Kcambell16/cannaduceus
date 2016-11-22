<?php

namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Strain};

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
	 * valid strain Id 0
	 * @var string $VALID_STRAINID0
	 */
	protected $VALID_STRAINID0 = "420";

	/**
	 * invalid strain Id 0
	 * @var $INVALID_STRAINID0
	 */
	protected $INVALID_STRAINID0 = "Mary Jane";

	/**
	 * valid strain name 0
	 * @var string $VALID_STRAINNAME0
	 */
	protected $VALID_STRAINNAME0 = "Shnozzberry";

	/**
	 * invalid strain name 0
	 * @var string $INVALID_STRAINNAME0
	 */
	protected $INVALID_STRAINNAME0 = "-4.20%";
	/**
	 * valid strain type 0
	 * @var string $VALID_STRAINTYPE0
	 **/
	protected $VALID_STRAINTYPE0 = "Sativa";

	/**
	 * invalid strain type 0
	 * @var string $INVALID_STRAINTYPE0
	 */
	protected $INVALID_STRAINTYPE0 = "720";
	/**
	 * valid strain thc content
	 * @var float $VALID_STRAINTHC0
	 */
	protected $VALID_STRAINTHC0 = "32%";

	/**
	 * invalid strain thc content
	 * @var float $INVALID_STRAINTHC0
	 */
	protected $INVALID_STRAINTHC0 = "THC";
	/**
	 * valid strain Cbd content
	 * @var float $VALID_STRAINCBD0
	 **/
	protected $VALID_STRAINCBD0 = "0.8%";

	/**
	 * invalid Cbd content 0
	 * @var float $INVALID_STRAINCBD0
	 */
	protected $INVALID_STRAINCDB0 = "Fire";
	/**
	 * valid strain description 0
	 * @var string $VALID_STRAINDESCRIPTION0
	 */
	protected $VALID_STRAINDESCRIPTION0 = "A light airy scent with a strong sativa high";

	/**
	 * invalid strain description 0
	 * @var string $INVALID_STRAINDESCRIPTION0
	 */
	protected $INVALID_STRAINDISCREPTION0 = "betty@baker.com";

	protected $strain;


	public final function setUp() {
		//run the default setUp() method first
		parent::getSetUpOperation();
	}

	/**
	 * Test inserting a valid strain and verify that the actual mySQL data matches
	 */
	public function testInsertValidStrain() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);

		//grab the data from mySQL and enforce the fields match our expectations
		$pdoStrain = Strain::getStrainByStrainId($this->getPDO(), $strain->getStrainId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertEquals($pdoStrain->getStrainId(), $strain->assertEquals()->strainId);
		$this->getStrain($pdoStrain->getStrainName(), $strain->assertEquals()->strainName);
		$this->getStrain($pdoStrain->getStrainType(), $strain->assertEquals()->strainType));
		$this->getStrain($pdoStrain->getStrainThc(), $strain->assertEquals()->strainThc);
		$this->getStrain($pdoStrain->getStrainCbd(), $strain->assertEquals()->strainCbd);
		$this->getStrain($pdoStrain->getStrainDescription(), $strain->assertEquals()->strainDescription);


	}

}
