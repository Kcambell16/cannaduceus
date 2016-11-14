<?php

// grab the project test parameters
require_once("CannaduceusTest.php");
require_once(dirname(__DIR__) . "/php/classes/StrainLeafRating.php");

//class being tested
//require_once(dirname(__DIR__). "/php/classes/StrainLeafRating.php");

/**
 * Full PHPUnit test for the StrainLeafRating class
 *
 * This is a complete PHPUnit test of the StrainLeafRating class.
 * *All* mySQL/PDo enabled methods are tested for both valid and invalid inputs
 * @author James Montoya <jamesmontoyaarts@gmail.com>
 */
class StrainLeafRating extends \Edu\Cnm\Cannaduceus\Test\CannaduceusTest  {
	/**
	 * valid strain leaf rating value
	 * @var int $VALID_STRAINLEAFRATINGVALUE
	 */
	protected $VALID_STRAINLEAFRATINGVALUE = 5;
	/**
	 * valid second strain leaf rating value
	 * @var int $VALID_STRAINLEAFRATINGVALUE1
	 */
	protected $VALID_STRAINLEAFRATINGVALUE1 = 4;
	/**
	 * invalid strain leaf rating values
	 * @var int $INVALID_STRAINLEAFRATINGVALUE1
	 */
	protected $INVALID_STRAINLEAFRATINGVALUE1 = "A";
	/**
	 * invalid second strain leaf rating value
	 * @var int $INVALID_STRAINLEAFRATINGVALUE2
	 */
	protected $INVALID_STRAINLEAFRATINGVALUE2 = 8;
	/**
	 * valid browser expressions to use
	 * @var string $VALID_BROWSER
	 */
	protected $VALID_BROWSER = "chrome 46.0.2490.";
	/**
	 * valid Ip Address to use for unit testing
	 * @var string $VALID_IPADDRESS
	 */
	protected $VALID_IPADDRESS = "2600::dead:beef:cafe";
	/**
	 * valid user to use
	 * @var \Edu\Cnm\Cannaduceus\Test\Profile $profileId
	 */
	protected $profileId = null;
	/**
	 *valid user hash
	 * @var string $hash
	 */
	protected $hash = null;
	/**
	 *valid user salt
	 * @var string $salt
	 */
	protected $salt = null;

