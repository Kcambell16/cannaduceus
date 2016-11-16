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
	 * Accesor method for dispensaryReviewId
	 *
	 * @return int|null value of dispensary review id
	 **/
	public function getDispensaryReviewId() {
		return ($this->dispensaryReviewId);
	}

	/**
	 * mutator method for dispensary review id
	 *
	 * @param int|null $newDispensaryReviewId new value of dispensary review id
	 * @throws \RangeException if $newDispensaryReviewId is not positive
	 * @thows \TypeError if $newDispensaryReviewId is not an integer
	 **/

	public function setDispensaryReviewId(int $newDispensaryReviewId = null) {
		// base case: if the dispensary review id is null, this is a new dispensary review without a mySQL assigned id (yet)
		if($newDispensaryReviewId === null) {
			$this->dispensaryReviewId = null;
			return;
		}

		// verify the dispensary review id is positive
		if($newDispensaryReviewId <= 0) {
			throw(new \RangeException("dispensary review id is not positive"));
		}
		// convert and store the dispensary review id
		$this->dispensaryReviewId = $newDispensaryReviewId;

	}

	/**
	 * Accesor method for dispensaryReviewProfileId
	 *
	 * @return int|null value of dispensary review profile id
	 **/
	public function getDispensaryReviewProfileId() {
		return ($this->dispensaryReviewProfileId);
	}

	/**
	 * mutator method for dispensary review profile id
	 *
	 * @param int|null $newDispensaryReviewProfileId new value of dispensary review profile id
	 * @throws \RangeException if $newDispensaryReviewProfileId is not positive
	 * @throws \TypeError if $newDispensaryReviewProfileId is not an integer
	 **/

	public function setDispensaryReviewProfileId(int $newDispensaryReviewProfileId = null) {
		// base case: if the dispensary review profile id is null, this is a new dispensary review profile id without a mySQL assigned id (yet)
		if($newDispensaryReviewProfileId === null) { // here hector
			$this->dispensaryReviewProfileId = null;
			return;
		}

		// verify the dispensary review profile id is positive
		if($newDispensaryReviewProfileId <= 0) {
			throw(new \RangeException("dispensary review profile id is not positive"));
		}
		// convert and store the dispensary review profile id
		$this->dispensaryReviewProfileId = $newDispensaryReviewProfileId;

	}

	/**
	 * Accesor method for dispensaryReviewDispensaryId
	 *
	 * @return int|null value of dispensary review dispensary id
	 **/
	public function getDispensaryReviewDispensaryId() {
		return ($this->dispensaryReviewDispensaryId);
	}

	/**
	 * mutator method for dispensary review dispensary id
	 *
	 * @param int|null $newDispensaryReviewDispensaryId new value of dispensary review dispensary id
	 * @throws \RangeException if $newDispensaryReviewDispensaryId is not positive
	 * @throws \TypeError if $newDispensaryReviewDispensaryId is not an integer
	 **/

	public function setDispensaryReviewDispensaryId(int $newDispensaryReviewDispensaryId = null) {
		// base case: if the dispensary review dispensary id is null, this is a new dispensary review dispensary id without a mySQL assigned id (yet)
		if($newDispensaryReviewDispensaryId === null) {
			$this->dispensaryReviewProfileId = null;
			return;
		}

		// verify the dispensary review dispensary id is positive
		if($newDispensaryReviewDispensaryId <= 0) {
			throw(new \RangeException("dispensary review dispensary id is not positive"));
		}
		// convert and store the dispensary review dispensary id
		$this->dispensaryReviewDispensaryId = $newDispensaryReviewDispensaryId;

	}

	/**
	 * accessor method for dispensary review date
	 *
	 * @return \DateTime value of dispensary review date
	 **/
	public function getDispensaryReviewDateTime() {
		return ($this->dispensaryReviewDateTime);
	}

	/**
	 * mutator method for dispensary review date
	 *
	 * @param \DateTime|string|null $newDispensaryReviewDateTime dispensary review date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newDispensaryReviewDateTime is not a valid object or string
	 * @throws \RangeException if $newDispensaryReviewDateTime is a date that does not exist
	 **/
	public function setDispensaryReviewDate($newDispensaryReviewDateTime = null) {
		// base case: if the date is null, use the current date and time
		if($newDispensaryReviewDateTime === null) {
			$this->dispensaryReviewDateTime = new \DateTime();
			return;
		}

		// store the dispensary review date
		try {
			$newDispensaryReviewDateTime = self::validateDateTime($newDispensaryReviewDateTime);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		$this->dispensaryReviewDateTime = $newDispensaryReviewDateTime;
	}

	/**
	 *
	 * Accesor method for dispensaryReviewTxt
	 * @return string value of dispensary review txt
	 **/

	public function getDispensaryReviewTxt() {
		return ($this->dispensaryReviewTxt);
	}

	/**
	 * Mutator method for dispensary review txt
	 *
	 * @param string $newDispensaryReviewTxt new value of dispensary review txt
	 * @throws \InvalidArgumentException if $newDispensaryReviewTxt is not a string or insecure
	 * @throws \RangeException if $newDispensaryReviewTxt is > 256 characters
	 * @throws \TypeError if $newDutyStationName is not a string
	 **/
	public function setDispensaryReviewTxt(string $newDispensaryReviewTxt) {
		// verify the dispensary review txt is secure
		$newDispensaryReviewTxt = trim($newDispensaryReviewTxt);
		$newDispensaryReviewTxt = filter_var($newDispensaryReviewTxt, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newDispensaryReviewTxt) === true) {
			throw(new \InvalidArgumentException("dispensary review txt is empty or insecure"));
		}

		//verify the dispensary review txt will fit in the database
		if(strlen($newDispensaryReviewTxt) > 256) {
			throw(new \RangeException("dispensary review txt too large"));
		}

		// store the name content
		$this->dispensaryReviewTxt = $newDispensaryReviewTxt;
	}
