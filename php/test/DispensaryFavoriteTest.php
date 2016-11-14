<?php
namespace Edu\Cnm\Cannaduceus\Test;

use Edu\Cnm\Cannaduceus\Test\CannaduceusTest;
use Edu\Cnm\Cannaduceus\{Dispensary, review};

// grab the test parameters
require_once("DispensaryFavoriteTest.php");

require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the dispensary favorite class
 *
 * this is a complete PHPUnit test of the dispensary favorite class. It is complete becasue *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and vailid inputs.
 *
 * @see Review
 * @author Nathan Sanchez <nsanchez121@cnm.edu>
 */
class DispensaryFavoriteTest extends CannaduceusTest {
	/**
	 * the favorite dispensary
	 * @var string $VALID_DISPENSARYFAVORITE
	 */
	protected $VALID_FAVORITEDISPENSARY = "PHPUnit test passing";
	/**
	 * content of the updated Favorite
	 * @var string $VALID_DISPENSARYFAVORITE2
	 */
	protected $VAILD_FAVORITEDISPENSARY2 = "PHPUnit test still passing";
	/**
	 * Profile that created the Favorite; this is foreign key relations
	 * @var
	 */
	protected $profile = null;

	/**
	 * create dependent objects before running each test
	 */
}
