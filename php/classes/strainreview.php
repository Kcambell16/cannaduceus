<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus strainReview class
 *
 * This is just one strainReview out of many that will be written and catagorized
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class StrainReview {

	/**
	 * id for the StrainReview; this is the primary key
	 * @var int $strainReviewId
	 **/
	private $strainReviewId;

	/**
	 * Date Time of the strainReview;
	 * @var int $strainReviewDateTime
	 **/
	private $strainReviewDateTime;

	/**
	 *Text of Strain Review;
	 * @var string $strainReviewText
	 **/
	private $StrainReviewText;


	/** Constructor for new strainReview
	 *
	 * @param int | null $newStrainReviewId id of this strainReview or null if a new strainReview
	 * @param string $newStrainReviewDateTime the DateTime of the StrainReview
	 * @param string $newStrainReviewText text of the strainReview or null if a new strainReview
	 * @throws \InvalidArgumentException if data Texts are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data Texts violate Text hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainReviewId = null, string $newStrainReviewDateTime, string $newStrainReviewText) {
		try {
			$this->setStrainReviewId($newStrainReviewId);
			$this->setStrainReviewDateTime($newStrainReviewDateTime);
			$this->setStrainReviewText($newStrainReviewText);
			($newStrainReviewText);
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
	 * accessor method for strainReview id
	 *
	 * @return int|null value of strainReview id
	 */
	public function getStrainReviewId() {
		return $this->strainReviewId;
	}

	/**
	 * mutator method for strainReview id
	 *
	 * @param int $newStrainReviewId new value of strainReview Id
	 * @throws UnexpectedValueException if $newStrainReviewId is not an integer
	 */
	public function setStrainReviewId($newStrainReviewId) {
		$newStrainReviewId = filter_var($newStrainReviewId, FILTER_VALIDATE_INT);
		if($newStrainReviewId === false) {
			throw(new UnexpectedValueException("StrainReview Id is not a valid integer"));
		}

		//Convert and store the strainReview id
		$this->strainReviewId = intval($newStrainReviewId);
	}


	/**
	 * accessor method for strainReview DateTime
	 *
	 * @return string of strainReview DateTime
	 */
	public function getStrainReviewDateTime() {
		return $this->strainReviewDateTime;
	}

	/**
	 * mutator method for strainReview DateTime
	 *
	 * @param string $newStrainReviewDateTime new binary of strainReview DateTime
	 * @throws UnexpectedValueException if $newStrainReviewDateTime is not a binary
	 */
	public function setStrainReviewDateTime($newStrainReviewDateTime) {
		$newStrainReviewDateTime = filter_input($newStrainReviewDateTime, FILTER_SANITIZE_STRING);
		if($newStrainReviewDateTime === false) {
			throw(new UnexpectedValueException("StrainReview DateTime not valid"));
		}

		//Convert and store the StrainReview DateTime
		$this->StrainReviewDateTime = string($newStrainReviewDateTime);
	}


	/**
	 * accessor method for StrainReview Text
	 *
	 * @return string for StrainReview Text
	 */
	public function getStrainReviewText() {
		return $this->strainReviewText;
	}

	/**
	 * mutator method for StrainReview Text
	 *
	 * @param string $newStrainReviewText new string of StrainReview type
	 * @throws UnexpectedValueException if $newStrainReviewText is not a string
	 */
	public function setStrainReviewText($newStrainReviewText) {
		$newStrainReviewText = filter_input($newStrainReviewText, FILTER_SANITIZE_STRING);
		if($newStrainReviewText === false) {
			throw(new UnexpectedValueException("StrainReview Text Invalid"));
		}

		//Convert and store the StrainReview text
		$this->StrainReviewText = string($newStrainReviewText);
	}
}