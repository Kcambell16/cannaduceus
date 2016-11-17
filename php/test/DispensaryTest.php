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
 * Full PHPUnit test for the Profile class
 * all MySQL/PDO enabled methods are tested for both invalid and valid inputs in this test
 * @see Dispensary
 * @author Kelly Campbell <kcampbell16@cnm.edu>
 **/

class DispensaryTest extends CannaduceusTest {
	/**
	 * Id of the Dispensary
	 * @var int $VALID_DISPENSARYID
	 **/
	protected $VALID_DISPENSARYID = "PHPUnit test passing";

	/**
	 * Attention of the Dispensary
	 * @var string $VALID_DISPENSARYATTENTION
	 **/
	protected $VALID_DISPENSARYATTENTION = "PHPUnit test still passing";



}