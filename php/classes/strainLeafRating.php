<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus strainLeafRating class
 *
 * This is just one strain out of many that will be rated
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class strainLeafRating {

	/**
	 * rating for the strain;
	 * @var int $strainLeafRatingRating
	 **/
	private $strainLeafRatingRating;

	/**
	 * strain Id from the strain class;
	 * @var int $strainLeafRatingStrainId
	 **/
	private $strainLeafRatingStrainId;

	/**
	 *profile Id from the profile class;
	 * @var int $strainLeafRatingProfileId
	 **/
	private $strainLeafRatingProfileId;


	/** Constructor for new strainLeafRating
	 *
	 * @param int | null $newStrainLeafRatingRating rating of this strain or null if a new strain
	 * @param int $newStrainLeafRatingStrainId the id of the strain from the strain class
	 * @param int $newStrainLeafRatingProfileId the id of the profile from the profile class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainLeafRatingRating = null, int $newStrainLeafRatingStrainId, int $newStrainLeafRatingProfileId) {
		try {
			$this->setStrainLeafRatingRating($newStrainLeafRatingRating);
			$this->setStrainLeafRatingStrainId($newStrainLeafRatingStrainId);
			$this->setStrainLeafRatingProfileId($newStrainLeafRatingProfileId);
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
	 * accessor method for strainLeafRatingRating
	 *
	 * @return int|null value of strainLeafRatingRating
	 */
	public function getStrainLeafRatingRating() {
		return $this->strainLeafRatingRating;
	}

	/**
	 * mutator method for strainLeafRatingRating
	 *
	 * @param int $newStrainLeafRatingRating new value of strainLeafRatingRating
	 * @throws UnexpectedValueException if $newStrainLeafRatingRating is not an integer
	 */
	public function setStrainLeafRatingRating($newStrainLeafRatingRating) {
		$newStrainLeafRatingRating = filter_input($newStrainLeafRatingRating, FILTER_VALIDATE_INT);
		if($newStrainLeafRatingRating === false) {
			throw(new UnexpectedValueException("Strain Leaf Rating is not a valid integer"));
		}

		//Convert and store the strainLeafRating rating
		$this->strainLeafRatingRating = string($newStrainLeafRatingRating);
	}


	/**
	 * accessor method for strainLeafRatingStrainId
	 *
	 * @return int of strainLeafRatingStrainId
	 */
	public function getstrainLeafRatingStrainId() {
		return $this->strainLeafRatingStrainId;
	}

	/**
	 * mutator method for strainLeafRatingStrainId
	 *
	 * @param int $newStrainLeafRatingStrainId new var of strainLeafRatingStrainId
	 * @throws UnexpectedValueException if $newStrainLeafRatingStrainId is not a int
	 */
	public function setStrainLeafRatingStrainId($newStrainLeafRatingStrainId) {
		$newStrainLeafRatingStrainId = filter_input($newStrainLeafRatingStrainId, FILTER_SANITIZE_STRING);
		if($newStrainLeafRatingStrainId === false) {
			throw(new UnexpectedValueException("Strain Leaf Rating Strain Id not valid"));
		}

		//Convert and store the strain name
		$this->strainLeafRatingStrainId = string($newStrainLeafRatingStrainId);
	}


	/**
	 * accessor method for strainLeafRatingProfileId
	 *
	 * @return int for strainLeafRatingProfileId
	 */
	public function getStrainLeafRatingProfileId() {
		return $this->strainLeafRatingProfileId;
	}

	/**
	 * mutator method for strainLeafRatingProfileId
	 *
	 * @param int $newStrainLeafRatingProfileId new strainLeafRatingProfileId
	 * @throws UnexpectedValueException if $newStrainLeafRatingProfileId is not an int
	 */
	public function setStrainLeafRatingProfileId($newStrainLeafRatingProfileId) {
		$newStrainLeafRatingProfileId = filter_input($newStrainLeafRatingProfileId, FILTER_SANITIZE_STRING);
		if($newStrainLeafRatingProfileId === false) {
			throw(new UnexpectedValueException("Strain Leaf Rating Profile Id Invalid"));
		}

		//Convert and store the strainLeafRatingProfileId
		$this->strainLeafRatingProfileId = string($newStrainLeafRatingProfileId);
	}

}