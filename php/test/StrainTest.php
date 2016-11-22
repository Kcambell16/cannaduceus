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
	/**
 	* test inserting a strain that already exists
 	*/
	public function testInsertInvalidStrain() {
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);

		$strain->insert($this->getPDO());

		//insert again to see if it fails
		$strain->insert($this->getPDO());
	}

	/**
	 * test inserting a strain, editing it and then updating it
	 */
	public function testUpdateStrain(){
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);

		$strain->insert($this->getPDO());

		//edit the strain and update it in mySQL
		$strain->setStrainName($this->VALID_STRAINNAME0);
		$strain->update($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$pdoStrain = Strain::getStrainByStrainId($this->getPDO(), $strain->getStrainId(), $strain->getStrainName(), $strain->getStrainType(), $strain->getStrainThc(), $strain->getStrainCbd(), $strain->getStrainDescription());
	}

	/**
	 * test inserting a Strain that does not exist
	 *
	 * @expectedException \PDOException
	 */
	public function testUpdateInvalidDispensary() {
		//create a Strain, try to update it without actually updating it and watch it fail
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);
		$strain->update($this->getPDO());
	}

	/**
	 * test creating a Strain and then deleting it
	 */
	public function testDeleteValidDispensary() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);
		$strain->insert($this->getPDO());

		//delete the data from mySQL and enforce the Strain does not exist
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));

		//grab the data from mySQL and enforce the strain does not exist
		$pdoStrain = Strain::getStrainByStrainId($this->getPDO(), $strain->getStrainByStrainId());
		$this->assertNull($pdoStrain);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("strain"));
	}

	/**
	 * test deleting a strain that does not exist
	 *
	 * @expectedException \PDOException
	 */
	public function testDeleteInvalidStrain() {
		//create a strain and try and delete it without actually inserting it
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);
		$strain->delete($this->getPDO());
	}

	/**
	 * test grabbing a strain by strain name
	 */
	public function testGetValidStrainByStrainName() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);
		$strain->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Strain::getStrainByStrainName($this->getPDO(), $strain->getStrainName());

		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertContainsOnlyInstancesOf("Edu\\cnm\\Cannaduceus\\Strain", $results);

		//grab the result from the array and validate it
		$pdoStrain = $results[0];
		$this->assertEquals($pdoStrain->getStrainName(), $this->VALID_STRAINNAME0)
;
	}

	/**
	 * test grabbing a strain by type and inserting it into mySQL
	 */
	public function testGetStrainType() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);
		$strain->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Strain::getStrainByStrainType($this->getPDO(), $strain->getStrainType());

		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertContainsOnlyInstancesOf("Edu\\cnm\\Cannaduceus\\Strain", $results);

		//grab the result from the array and validate it
		$pdoStrain = $results[0];
		$this->assertEquals($pdoStrain->getDispensaryType(), $this->VALID_STRAINTYPE0);
	}

	/**
	 * test grabbing a strain by Type that does not exist
	 */
	public function testGetInvalidStrainTypeByStrainType() {
		//grab a strain by searching for a strain type that does not exist
		$strain = Strain::getStrainByStrainType($this->getPDO(), "strain");
		$this->assertCount(0, $strain);
	}

	/**
	 * test grabbing all Strains
	 */
	public function testGetAllValidStrains() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME0, $this->VALID_STRAINTYPE0, $this->VALID_STRAINTHC0, $this->VALID_STRAINCBD0, $this->VALID_STRAINDESCRIPTION0);
		$strain->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Strain::getAllStrains($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\cnm\\Cannaduceus\\Strain", $results);

		//grab the result from the array and validate it
		$pdoStrain = $results[0];
		$this->assertEquals($pdoStrain->getStrainName(), $this->VALID_STRAINNAME0);

	}

}
