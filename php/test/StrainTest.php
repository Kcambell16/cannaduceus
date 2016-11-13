<?php
/**
* Created by PhpStorm.
* User: Kcampbell
* Date: 11/11/16
* Time: 6:45 PM
*/

namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\{Dispensary};

//grabs the project parameters
require_once ("CannaduceusTest.php");

//grabs the class being tested
require_once (dirname(__DIR__) . "/public_html/php/classes/autoload.php");

/**
* Full PHPUnit test for the Strain class
*
* This is a complete PHPUnit test of the Strain class. It is complete because *ALL* mySQL/PDO enabled methods
* are tested for both invalid and valid inputs.
*
* @see Strain
* @author Kelly Campbell <kcampbell16@cnm.edu>
**/

class StrainTest extends DataDesignTest
