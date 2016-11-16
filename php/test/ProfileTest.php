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