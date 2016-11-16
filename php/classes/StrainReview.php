<?php

namespace Edu\Cnm\hlozano2\DataDesign;

require_once("autoload.php");

/**
 * Small Cross Section of a Strain Review
 *
 *
 * @author Hector Lozano <hlozano2@cnm.edu>
 * @version 4.2.0
 **/

class StrainReview implements \JsonSerializable {
	use ValidateDate;
	/**
	 * id for this StrainReview; this is the primary key
	 * @var int $strainReviewId
	 **/
	private $strainReviewId;
	/**
	 * id of the Strain that is being reviewed; this is a foreign key
	 * @var int $strainReviewId
	 **/
	private $strainReviewProfileId;
	/**
	 * strain being reviewed by a specific profile
	 * @var string $strainReviewStrainId
	 **/
	private $strainReviewStrainId;
	/**
	 * date and time this Review was sent, in a PHP DateTime object
	 * @var \DateTime $strainReviewDateTime
	 **/
	private $strainReviewDateTime;
	/**
	 * actual textual review for this strain
	 * @var string $strainReviewTxt
	 **/
	private $strainReviewTxt;





// El CONSTRUCTOR VA AQUI YA

	/**
	 * StrainReview constructor.
	 * @param int|null $newStrainReviewId Id of this strain review or null if new strain review
	 * @param int|null $newStrainReviewProfileId Id of this strain review profile or null if new strain review profile
	 * @param int|null $newStrainReviewStrainId Id of this strain review strain or null if new strain review strain
	 * @param string $newStrainReviewDateTime string contains actual strain review date
	 * @param string $newStrainReviewTxt string contains actual strain review txt
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g. strings too long, negative integers)
	 * @throws \TypeError if data violates type hints
	 * @throws \Exception if any other exception occurs
	 **/

	public function __construct(int $newStrainReviewId = null, int $newStrainReviewProfileId, int $newStrainReviewStrainId, string $newStrainReviewDate, string $newStrainReviewTxt) {
		try {
			$this->setStrainReviewId($newStrainReviewId);
			$this->setStrainReviewProfileId($newStrainReviewProfileId);
			$this->setStrainReviewStrainId($newStrainReviewStrainId);
			$this->setStrainReviewDate($newStrainReviewDate);
			$this->setStrainReviewTxt($newStrainReviewTxt);
		} catch(\InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw (new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $rangeException) {
			// rethrow the exception to the caller
			throw (new \RangeException($rangeException->getMessage(), 0, $rangeException));
		} catch(\TypeError $typeError) {
			// rethrow the exception to the caller
			throw (new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			// rethrow the exception to the caller
			throw (new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * Accesor method for strainReviewId
	 *
	 * @return int|null value of strain review id
	 **/
	public function getStrainReviewId() {
		return ($this->strainReviewId);
	}

	/**
	 * mutator method for strain review id
	 *
	 * @param int|null $newStrainReviewId new value of strain review id
	 * @throws \RangeException if $newStrainReviewId is not positive
	 * @thows \TypeError if $newStrainReviewId is not an integer
	 **/

	public function setStrainReviewId(int $newStrainReviewId = null) {
		// base case: if the strain review id is null, this is a new strain review without a mySQL assigned id (yet)
		if($newStrainReviewId === null) {
			$this->strainReviewId = null;
			return;
		}

		// verify the strain review id is positive
		if($newDispensaryReviewId <= 0) {
			throw(new \RangeException("dispensary review id is not positive"));
		}
		// convert and store the strain review id
		$this->strainReviewId = $newStrainReviewId;

	}

	/**
	 * Accesor method for strainReviewProfileId
	 *
	 * @return int|null value of strain review profile id
	 **/
	public function getStrainReviewProfileId() {
		return ($this->strainReviewProfileId);
	}

	/**
	 * mutator method for strain review profile id
	 *
	 * @param int|null $newStrainReviewProfileId new value of strain review profile id
	 * @throws \RangeException if $newStrainReviewProfileId is not positive
	 * @throws \TypeError if $newStrainReviewProfileId is not an integer
	 **/

	public function setStrainReviewProfileId(int $newStrainReviewProfileId = null) {
		// base case: if the strain review profile id is null, this is a new strain review profile id without a mySQL assigned id (yet)
		if($newStrainReviewProfileId === null) { // otra vez aqui hector Dee Dee Dee
			$this->strainReviewProfileId = null;
			return;
		}

		// verify the strain review profile id is positive
		if($newStrainReviewProfileId <= 0) {
			throw(new \RangeException("strain review profile id is not positive"));
		}
		// convert and store the strain review profile id
		$this->strainReviewProfileId = $newStrainReviewProfileId;

	}

	/**
	 * Accesor method for strainReviewStrainId
	 *
	 * @return int|null value of strain review strain id
	 **/
	public function getStrainReviewStrainId() {
		return ($this->strainReviewStrainId);
	}

	/**
	 * mutator method for strain review strain id
	 *
	 * @param int|null $newStrainReviewStrainId new value of strain review strain id
	 * @throws \RangeException if $newStrainReviewStrainId is not positive
	 * @throws \TypeError if $newStrainReviewStrainId is not an integer
	 **/

	public function setStrainReviewStrainId(int $newStrainReviewStrainId = null) {
		// base case: if the dispensary review strain id is null, this is a new strain review strain id without a mySQL assigned id (yet)
		if($newStrainReviewStrainId === null) {
			$this->strainReviewStrainId = null;
			return;
		}

		// verify the strain review strain id is positive
		if($newStrainReviewStrainId <= 0) {
			throw(new \RangeException("strain review strain id is not positive"));
		}
		// convert and store the strain review strain id
		$this->strainReviewStrainId = $newStrainReviewStrainId;

	}

	/**
	 * accessor method for strain review date
	 *
	 * @return \DateTime value of strain review date
	 **/
	public function getStrainReviewDateTime() {
		return ($this->strainReviewDateTime);
	}

	/**
	 * mutator method for strain review date
	 *
	 * @param \DateTime|string|null $newStrainReviewDateTime strain review date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newStrainReviewDateTime is not a valid object or string
	 * @throws \RangeException if $newStrainReviewDateTime is a date that does not exist
	 **/
	public function setStrainReviewDate($newStrainReviewDateTime = null) {
		// base case: if the date is null, use the current date and time
		if($newStrainReviewDateTime === null) {
			$this->strainReviewDateTime = new \DateTime();
			return;
		}

		// store the strain review date
		try {
			$newStrainReviewDateTime = self::validateDateTime($newStrainReviewDateTime);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		$this->strainReviewDateTime = $newStrainReviewDateTime;
	}

	/**
	 *
	 * Accesor method for strainReviewTxt
	 * @return string value of strain review txt
	 **/

	public function getStrainReviewTxt() {
		return ($this->strainReviewTxt);
	}

	/**
	 * Mutator method for strain review txt
	 *
	 * @param string $newStrainReviewTxt new value of strain review txt
	 * @throws \InvalidArgumentException if $newStrainReviewTxt is not a string or insecure
	 * @throws \RangeException if $newStrainReviewTxt is > 256 characters
	 * @throws \TypeError if $newStrainReviewTxt is not a string
	 **/
	public function setStrainReviewTxt(string $newStrainReviewTxt) {
		// verify the strain review txt is secure
		$newStrainReviewTxt = trim($newStrainReviewTxt);
		$newStrainReviewTxt = filter_var($newStrainReviewTxt, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStrainReviewTxt) === true) {
			throw(new \InvalidArgumentException("strain review txt is empty or insecure"));
		}

		//verify the strain review txt will fit in the database
		if(strlen($newStrainReviewTxt) > 256) {
			throw(new \RangeException("strain review txt too large"));
		}

		// store the name content
		$this->strainReviewTxt = $newStrainReviewTxt;
	}
