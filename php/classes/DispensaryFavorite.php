<?php
namespace Edu\Cnm\cannaduceus;

require_once ("autoload.php");
/**
 * this is going to be a cross section for the dispensary favorite info
 *
 * this is just one of the dispensary favorites out of the many that will be favorited
 *
 * @author Nathan A Sanchez (nsanchez121@cnm.edu)
 * @version
 */

class DispensaryFavorite implements \JsonSerializable {

	/**
	 * id for the DispensaryFavoriteProfileId this is the foreign keys used to make a primary key
	 * @var int $dispensaryFavoriteProfileId
	 */
	private $dispensaryFavoriteProfileId;

	/**
	 * id for the DispensaryFavoriteDispensaryId this is one of the foreign keys used to make a primary key
	 *
	 * @var int $dispensaryFavoritesDispensaryId
	 */
	private $dispensaryFavoriteDispensaryId;

	/** Constructor for the new dispensaryFavorite
	 *
	 * @param int | null $newDispensaryFavoriteId id of the profile from profile class
	 * @param int | null $newDispensaryFavoriteDispensaryId id of the dispensary from the dispensary class
	 * @throws \InvalidArgumentException if data types are not vaild
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newDispensaryFavoriteId = null, int $newDispensaryFavoriteDispensaryId) {
		try {
			$this->dispensaryFavoriteProfileId($newDispensaryFavoriteId);
			$this->dispensaryFavoriteDispensaryId($newDispensaryFavoriteDispensaryId);
		}Catch(\InvalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the calller
			throw(new \InvalidArgumentException($invalidArgumentException->getMessage(), 0, $invalidArgumentException));
		}Catch(\RangeException $range) {
			// rethrow the exception to the caller
			throw(new \RangeException($range->getMessage(), 0, $range));
		}Catch(\TypeError $typeError) {
			//rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
			} Catch(\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for the dispensary Favorite Profile Id
	 *
	 * @return int|null value of dispensary Favorite Profile Id
	 */
	public function getDispensaryFavoriteProfileId(): int {
		return $this->dispensaryFavoriteProfileId;
	}

	/**
	 * mutator method for dispensaryFavoriteId
	 * @param int $newDispensaryFavoriteProfileId
	 * @internal param int|null $DispensaryFavoriteId new value of dispensary favorite
	 */


	public function setDispensaryFavoriteProfileId(int $newDispensaryFavoriteProfileId) {

		// base case: if the newDispensaryFavorite is null, this is a new favorite without a mySQL assigned to the ID
		if($newDispensaryFavoriteProfileId === null) {
			$this->dispensaryFavoriteProfileId = null;
			return;
		}

		$newDispensaryFavoriteProfileId = filter_var($newDispensaryFavoriteProfileId);
		if($newDispensaryFavoriteProfileId === false){
			throw(new \UnexpectedValueException("dispensary Favorite Profile Id is not a vaild interger"));
		}

		//Convert and store the dispensaryFavoriteProfileId
		$this->dispensaryFavoriteProfileId = $newDispensaryFavoriteProfileId;
	}

	/**
	 * accessor method for dispensaryFavoriteDispensaryId
	 *
	 * @return int|null value of dispensaryFavoriteDispensaryId
	 */
	public function getDispensaryFavoriteDispensaryId(): int {
		return $this->dispensaryFavoriteDispensaryId;
	}

	/**
	 * mutator method for dispensaryFavoriteDispensaryId
	 *
	 * @param int $newDispensaryFavoriteDispensaryId new value of dispensaryFavoriteDispensaryId
	 * @throws \UnexpectedValueException if $newDispensaryFavoriteDispensaryId is not an integer
	 */
	public function setDispensaryFavoriteDispensaryId($dispensaryFavoriteDispensaryId, $newDispensaryFavoriteDispensaryId) {
		$newDispensaryFavoriteDispensaryId = filter_var($newDispensaryFavoriteDispensaryId, FILTER_VAILIDATE_INT);
		if($newDispensaryFavoriteDispensaryId === false) {
			throw(new \UnexpectedValueException("Dispensary Favorite Dispensary Id not a vaild integer"));
		}
		//Convert and store the dispensaryFavoriteDispensaryId
		$this->dispensaryFavoriteDispensaryId = $dispensaryFavoriteDispensaryId;
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 */
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		unset($fields["profileHash"]);
		unset($fields["profileSalt"]);
		return ($fields);
	}




}