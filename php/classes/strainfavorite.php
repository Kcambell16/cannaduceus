<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus strainFavorite class
 *
 * This is just one strainFavorite out of many that will be rated and catagorized
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class StrainFavorite{

	/**
	 * id for the StrainFavoriteProfileId; this is one of the foreign keys used to make a primary key
	 * @var int $strainFavoriteProfileId
	 **/
	private $strainFavoriteProfileId;

	/**
	 * id for the StrainFavoriteStrainId; this is one of the foreign keys used to make a primary key
	 * @var int $strainFavoriteStrainId
	 **/
	private $strainFavoriteStrainId;

	/** Constructor for new strainFavorite
	 *
	 * @param int | null $newStrainFavoriteProfileId id of profile from profile class
	 * @param int | null $newStrainFavoriteStrainId id of the strain from the strain class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainFavoriteProfileId = null, int $newStrainFavoriteStrainId) {
		try {
			$this->setStrainFavoriteProfileId($newStrainFavoriteProfileId);
			$this->setStrainFavoriteStrainId($newStrainFavoriteStrainId);
		} Catch(\InvalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgumentException->getMessage(), 0, $invalidArgumentException));
		} Catch(\RangeException $range) {
			// rethrow the exception to the caller
			throw(new \RangeException($range->getMessage(), 0, $range));
		} Catch(\TypeError $typeError) {
			//rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} Catch(\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for strainFavoriteProfileId
	 *
	 * @return int|null value of strainFavoriteProfileId
	 */

	public function getStrainFavoriteProfileId(): int {
		return $this->strainFavoriteProfileId;
	}

	/**
	 * mutator method for strainFavoriteProfileId
	 *
	 * @param int $newStrainFavoriteProfileId new value of strainFavoriteProfile Id
	 * @throws \UnexpectedValueException if $newStrainFavoriteProfileId is not an integer
	 */
	public function setStrainFavoriteProfileId( $strainFavoriteProfileId) {
		$newStrainFavoriteProfileId = filter_var($newStrainFavoriteProfileId, FILTER_VALIDATE_INT);
		if($newStrainFavoriteProfileId === false) {
			throw(new \UnexpectedValueException("Strain Favorite Profile Id is not a valid integer"));
		}

		//Convert and store the strainFavoriteProfileId
		$this->strainFavoriteProfileId = $strainFavoriteProfileId;
	}

	/**
	 * accessor method for strainFavoriteStrainId
	 *
	 * @return int|null value of strainFavoriteStrainId
	 */
	public function getStrainFavoriteStrainId(): int {
		return $this->strainFavoriteStrainId;
	}

	/**
	 * mutator method for strainFavoriteStrainId
	 *
	 * @param int $newStrainFavoriteStrainId new value of strainFavoriteStrain Id
	 * @throws \UnexpectedValueException if $newStrainFavoriteStrainId is not an integer
	 */
	public function setStrainFavoriteStrainId( $strainFavoriteStrainId) {
		$newStrainFavoriteStrainId = filter_var($newStrainFavoriteStrainId, FILTER_VALIDATE_INT);
		if($newStrainFavoriteStrainId === false) {
			throw(new \UnexpectedValueException("Strain Favorite Strain Id is not a valid integer"));
		}

		//Convert and store the strainFavoriteStrainId
		$this->strainFavoriteStrainId = $strainFavoriteStrainId;
	}
}
