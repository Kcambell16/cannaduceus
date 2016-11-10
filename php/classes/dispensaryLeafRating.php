<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus dispensaryLeafRating class
 *
 * This is just one dispensary out of many that will be rated
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class dispensaryLeafRating {

	/**
	 * rating for the dispensary;
	 * @var int $dispensaryLeafRatingRating
	 **/
	private $dispensaryLeafRatingRating;

	/**
	 * dispensary Id from the dispensary class;
	 * @var int $dispensaryLeafRatingdispensaryId
	 **/
	private $dispensaryLeafRatingdispensaryId;

	/**
	 *profile Id from the profile class;
	 * @var string $dispensaryType
	 **/
	private $dispensaryLeafRatingProfileId;


	/** Constructor for new dispensaryLeafRating
	 *
	 * @param int | null $newdispensaryLeafRatingRating rating of this dispensary or null if a new dispensary
	 * @param int $newdispensaryLeafRatingdispensaryId the id of the dispensary from the dispensary class
	 * @param int $newdispensaryLeafRatingProfileId the id of the profile from the profile class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newdispensaryLeafRatingRating = null, int $newdispensaryLeafRatingdispensaryId, int $newdispensaryLeafRatingProfileId) {
		try {
			$this->setdispensaryLeafRatingRating($newdispensaryLeafRatingRating);
			$this->setdispensaryLeafRatingdispensaryId($newdispensaryLeafRatingdispensaryId);
			$this->setdispensaryLeafRatingProfileId($newdispensaryLeafRatingProfileId);
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
	 * accessor method for dispensaryLeafRatingRating
	 *
	 * @return int|null value of dispensaryLeafRatingRating
	 */
	public function getdispensaryLeafRatingRating() {
		return $this->dispensaryLeafRatingRating;
	}

	/**
	 * mutator method for dispensaryLeafRatingRating
	 *
	 * @param int $newDispensaryLeafRatingRating new value of dispensaryLeafRatingRating
	 * @throws \UnexpectedValueException if $newDispensaryLeafRatingRating is not an integer
	 */
	public function setdispensaryLeafRatingRating($newDispensaryLeafRatingRating) {

		if($newDispensaryLeafRatingRating <0 || 5) {
			throw(new \UnexpectedValueException("Dispensary Leaf Rating is not a valid integer"));
		}

		//Convert and store the dispensaryLeafRating rating
		$this->dispensaryLeafRatingRating = int($newDispensaryLeafRatingRating);
	}


	/**
	 * accessor method for dispensaryLeafRatingdispensaryId
	 *
	 * @return int of dispensaryLeafRatingdispensaryId
	 */
	public function getdispensaryLeafRatingdispensaryId() {
		return $this->dispensaryLeafRatingdispensaryId;
	}

	/**
	 * mutator method for dispensaryLeafRatingDispensaryId
	 *
	 * @param int $newDispensaryLeafRatingDispensaryId new var of dispensaryLeafRatingDispensaryId
	 * @throws \UnexpectedValueException if $newDispensaryLeafRatingDispensaryId is not a int
	 */
	public function setdispensaryLeafRatingDispensaryId($newDispensaryLeafRatingDispensaryId) {
		$newDispensaryLeafRatingDispensaryId = filter_input($newDispensaryLeafRatingDispensaryId, FILTER_SANITIZE_STRING);
		if($newDispensaryLeafRatingDispensaryId === false) {
			throw(new \UnexpectedValueException("dispensary Leaf Rating dispensary Id not valid"));
		}

		//Convert and store the dispensary name
		$this->dispensaryLeafRatingDispensaryId = ($newDispensaryLeafRatingDispensaryId);
	}


	/**
	 * accessor method for dispensaryLeafRatingProfileId
	 *
	 * @return int for dispensaryLeafRatingProfileId
	 */
	public function getdispensaryLeafRatingProfileId() {
		return $this->dispensaryLeafRatingProfileId;
	}

	/**
	 * mutator method for dispensaryLeafRatingProfileId
	 *
	 * @param int $newDispensaryLeafRatingProfileId new dispensaryLeafRatingProfileId
	 * @throws \UnexpectedValueException if $newDispensaryLeafRatingProfileId is not an int
	 */
	public function setdispensaryLeafRatingProfileId($newDispensaryLeafRatingProfileId) {
		$newDispensaryLeafRatingProfileId = filter_input($newDispensaryLeafRatingProfileId, FILTER_SANITIZE_STRING);
		if($newDispensaryLeafRatingProfileId === false) {
			throw(new \UnexpectedValueException("dispensary Leaf Rating Profile Id Invalid"));
		}

		//Convert and store the dispensaryLeafRatingProfileId
		$this->dispensaryLeafRatingProfileId = string($newDispensaryLeafRatingProfileId);
	}

}