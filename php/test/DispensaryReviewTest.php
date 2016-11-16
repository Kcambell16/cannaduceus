<?php
namespace Edu\Cnm\hlozano2\DataDesign\Test;

use Edu\Cnm\hlozano2\DataDesign\{Profile, DispensayReview};

// grab the project test parameters
require_once("DataDesignTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the DispensaryReview class
 *
 * This is a complete PHPUnit test of the DispensaryReview class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see DispensayReview
 * @author Hector Lozano <hlozano2@cnm.edu>
 **/