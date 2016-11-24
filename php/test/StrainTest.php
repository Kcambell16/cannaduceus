<?php

namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Strain};

//grabs the project parameters
require_once ("CannaduceusTest.php");

//grabs the class being tested
require_once (dirname(__DIR__) . "/classes/autoload.php");

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
	 * valid strain name
	 * @var string $VALID_STRAINNAME
	 */
	protected $VALID_STRAINNAME = "Shnozzberry";

	/**
	 * valid strain name 2
	 * @var string $VALID_STRAINNAME2
	 */
	protected $VALID_STRAINNAME2 = "Sour Diesel";

	/**
	 * invalid strain name
	 * @var string $INVALID_STRAINNAME
	 */
	protected $INVALID_STRAINNAME;

	/**
	 * valid strain type
	 * @var string $VALID_STRAINTYPE
	 **/
	protected $VALID_STRAINTYPE = "Sativa";
	/**
	 * invalid strain type
	 * @var string $INVALID_STRAINTYPE
	 */
	protected $INVALID_STRAINTYPE = 420;

	/**
	 * valid strain thc content
	 * @var float $VALID_STRAINTHC
	 */
	protected $VALID_STRAINTHC = 32.5;
	/**
	 * invalid strain thc content
	 * @var float $INVALID_STRAINTHC
	 */
	protected $INVALID_STRAINTHC;

	/**
	 * valid strain Cbd content
	 * @var float $VALID_STRAINCBD
	 **/
	protected $VALID_STRAINCBD = 0.8;
	/**
	 * invalid Cbd content
	 * @var float $INVALID_STRAINCBD
	 */
	protected $INVALID_STRAINCBD;

	/**
	 * valid strain description
	 * @var string $VALID_STRAINDESCRIPTION
	 */
	protected $VALID_STRAINDESCRIPTION = "A strong sativa with a fruity scent";
	/**
	 * invalid strain description
	 * @var string $INVALID_STRAINDESCRIPTION
	 */
	protected $INVALID_STRAINDESCRIPTION;

	protected $strain;


	public final function setUp() {
		//run the default setUp() method first
		parent::setUp();
	}

	/**
	 * Test inserting a valid strain and verify that the actual mySQL data matches
	 */
	public function testInsertValidStrain() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());


		//grab the data from mySQL and enforce the fields match our expectations
		$pdoStrain = Strain::getStrainByStrainId($this->getPDO(), $strain->getStrainId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertEquals($pdoStrain->getStrainName(), $this->VALID_STRAINNAME);
		$this->assertEquals($pdoStrain->getStrainType(), $this->VALID_STRAINTYPE);
		$this->assertEquals($pdoStrain->getStrainThc(), $this->VALID_STRAINTHC);
		$this->assertEquals($pdoStrain->getStrainCbd(), $this->VALID_STRAINCBD);
		$this->assertEquals($pdoStrain->getStrainDescription(), $this->VALID_STRAINDESCRIPTION);


	}
	/**
 	* test inserting a strain that already exists
	* @expectedException \PDOException
 	*/
	public function testInsertInvalidStrain() {
		$strain = new Strain(CannaduceusTest::INVALID_KEY, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);

		$strain->insert($this->getPDO());

	}

	/**
	 * test inserting a strain, editing it and then updating it
	 */
	public function testUpdateStrain(){
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());

		//edit the strain and update it in mySQL
		$strain->setStrainName($this->VALID_STRAINNAME2);
		$strain->update($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$pdoStrain = Strain::getStrainByStrainId($this->getPDO(), $strain->getStrainId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertEquals($pdoStrain->getStrainName(), $this->VALID_STRAINNAME2);
		$this->assertEquals($pdoStrain->getStrainType(), $this->VALID_STRAINTYPE);
		$this->assertEquals($pdoStrain->getStrainThc(), $this->VALID_STRAINTHC);
		$this->assertEquals($pdoStrain->getStrainCbd(), $this->VALID_STRAINCBD);
		$this->assertEquals($pdoStrain->getStrainDescription(), $this->VALID_STRAINDESCRIPTION);

	}

	/**
	 * test updating a Strain that does not exist
	 *
	 * @expectedException \PDOException
	 */
	public function testUpdateInvalidStrain() {
		//create a new strain and do not insert it into mySQL and try to update
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->update($this->getPDO());
	}

	/**
	 * test creating a Strain and then deleting it
	 */
	public function testDeleteValidStrain() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());

		//Asserts the table row has been incremented by 1 and then deleted
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$strain->delete($this->getPDO());

		//grab the data from mySQL and enforce the strain does not exist
		$pdoStrain = Strain::getStrainByStrainId($this->getPDO(), $strain->getStrainId());
		$this->assertNull($pdoStrain);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("strain"));
	}


	/**
	 * test deleting a strain that does not exist
	 *
	 * @expectedException \PDOException
	 */
	public function testDeleteInvalidStrain() {
		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->delete($this->getPDO());
	}

	/**
	 * test grabbing a strain by strain name
	 */
	public function testGetValidStrainByStrainName() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Strain::getStrainByStrainName($this->getPDO(), $strain->getStrainName());

		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertContainsOnlyInstancesOf("Edu\\cnm\\Cannaduceus\\Strain", $results);

		//grab the result from the array and validate it
		$pdoStrain = $results[0];
		$this->assertEquals($pdoStrain->getStrainName(), $this->VALID_STRAINNAME)
;
	}

	/**
	 * test grabbing a strain by type and inserting it into mySQL
	 */
	public function testGetStrainType() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Strain::getStrainByStrainType($this->getPDO(), $strain->getStrainType());

		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertContainsOnlyInstancesOf("Edu\\cnm\\Cannaduceus\\Strain", $results);

		//grab the result from the array and validate it
		$pdoStrain = $results[0];
		$this->assertEquals($pdoStrain->getStrainType(), $this->VALID_STRAINTYPE);
	}

	/**
	 * test grabbing a strain by Type that does not exist
	 *
	 * @expectedException \PDOException
	 */
	public function testGetInvalidStrainTypeByStrainType() {
		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->INVALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());

		//grab a strain by searching for a strain type that does not exist
		$strain = Strain::getInvalidStrainByStrainType($this->getPDO(), "strain");
		$this->assertCount(0, $strain);
	}

	/**
	 * test grabbing all Strains
	 */
	public function testGetAllValidStrains() {
		//count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("strain");

		//create a new strain and insert it into mySQL
		$strain = new Strain(null, $this->VALID_STRAINNAME, $this->VALID_STRAINTYPE, $this->VALID_STRAINTHC, $this->VALID_STRAINCBD, $this->VALID_STRAINDESCRIPTION);
		$strain->insert($this->getPDO());

		//grab the data from mySQL and enforce the fields match our expectations
		$results = Strain::getAllStrains($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("strain"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\cnm\\Cannaduceus\\Strain", $results);

		//grab the result from the array and validate it
		$pdoStrain = $results[0];
		$this->assertEquals($pdoStrain->getStrainName(), $this->VALID_STRAINNAME);

	}

}

