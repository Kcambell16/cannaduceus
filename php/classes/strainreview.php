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
	 * @throws \TextError if data Texts violate Text hints
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
	 * accessor method for StrainReview id
	 *
	 * @return int|null value of StrainReview id
	 */
	public function getStrainReviewId() {
		return $this->StrainReviewId;
	}

	/**
	 * mutator method for strainReview id
	 *
	 * @param int $newStrainReviewId new value of strainReview Id
	 * @throws UnexpectedValueException if $newStrainReviewId is not an integer
	 */
	public function setStrainReviewId($newStrainReviewId) {
		$newStrainReviewId = filter_var($newStrainReviewId, FILTER_VALIDATE_INT);
		if($newStrainReviewId === false)	{
			throw(new UnexpectedValueException("StrainReview Id is not a valid integer"));
		}

		//Convert and store the StrainReview id
		$this->StrainReviewId = intval($newStrainReviewId);
	}


	/**
	 * accessor method for strainReview DateTime
	 *
	 * @return string of strainReview DateTime
	 */
	public function getStrainReviewDateTime() {
		return $this->StrainReviewDateTime;
	}

	/**
	 * mutator method for StrainReview DateTime
	 *
	 * @param string $newStrainReviewDateTime new binary of StrainReview DateTime
	 * @throws UnexpectedValueException if $newStrainReviewDateTime is not a binary
	 */
	public function setStrainReviewDateTime($newStrainReviewDateTime) {
		$newStrainReviewDateTime = filter_input($newStrainReviewDateTime, FILTER_SANITIZE_STRING);
		if($newStrainReviewDateTime === false)	{
			throw(new UnexpectedValueException("StrainReview DateTime not valid"));
		}

		//Convert and store the StrainReview DateTime
		$this->StrainReviewDateTime = string($newStrainReviewDateTime);
	}


	/**
	 * accessor method for StrainReview type
	 *
	 * @return string for StrainReview type
	 */
	public function getStrainReviewType() {
		return $this->StrainReviewType;
	}

	/**
	 * mutator method for StrainReview type
	 *
	 * @param string $newStrainReviewType new string of StrainReview type
	 * @throws UnexpectedValueException if $newStrainReviewType is not a string
	 */
	public function setStrainReviewType($newStrainReviewType) {
		$newStrainReviewType = filter_input($newStrainReviewType, FILTER_SANITIZE_STRING);
		if($newStrainReviewType === false)	{
			throw(new UnexpectedValueException("StrainReview Type Invalid"));
		}

		//Convert and store the StrainReview type
		$this->StrainReviewType = string($newStrainReviewType);
	}

	/**
	 * accessor method for StrainReview THC
	 *
	 * @return int for StrainReview THC
	public function getStrainReviewThc() {
	return $this->StrainReviewThc;
	}

	/**
	 * mutator method for StrainReview THC
	 *
	 * @param int $newStrainReviewThc new value of StrainReview buyer premium
	 * @throws UnexpectedValueException if $newStrainReviewThc is not an integer
	 */
	public function setStrainReviewThc($newStrainReviewThc) {
		$newStrainReviewThc = filter_var($newStrainReviewThc, FILTER_VALIDATE_INT);
		if($newStrainReviewThc === false)	{
			throw(new UnexpectedValueException("StrainReview THC is not a valid integer"));
		}

		//Convert and store the StrainReview buyer premium
		$this->StrainReviewThc = intval($newStrainReviewThc);
	}

	/**
	 * accessor method for StrainReview Cbd
	 *
	 * @return string for StrainReview Cbd
	 */
	public function getStrainReviewCbd() {
		return $this->StrainReviewCbd;
	}

	/**
	 * mutator method for StrainReview Cbd
	 *
	 * @param string $newStrainReviewCbd new string of StrainReview Cbd
	 * @throws UnexpectedValueException if $newStrainReviewCbd is not a string
	 */
	public function setStrainReviewCbd($newStrainReviewCbd) {
		$newStrainReviewCbd = filter_input($newStrainReviewCbd, FILTER_SANITIZE_STRING);
		if($newStrainReviewCbd === false) {
			throw(new UnexpectedValueException("StrainReview Cbd Invalid"));
		}

		//Convert and store the StrainReview Cbd
		return $this->StrainReviewCbd;
	}

	/**
	 * accessor method for StrainReview description
	 *
	 * @return string for StrainReview description
	 */
	public function getStrainReviewDescription() {
		return $this->StrainReviewDescription;
	}

	/**
	 * mutator method for StrainReview description
	 *
	 * @param string $newStrainReviewDescription new string of StrainReview payment
	 * @throws UnexpectedValueException if $newStrainReviewDescription is not a string
	 */
	public function setStrainReviewDescription($newStrainReviewDescription) {
		$newStrainReviewDescription = filter_input($newStrainReviewDescription, FILTER_SANITIZE_STRING);
		if($newStrainReviewDescription === false) {
			throw(new UnexpectedValueException("StrainReview Description Invalid"));
		}

		//Convert and store the StrainReview description
		return $this->StrainReviewDescription;
	}
}
