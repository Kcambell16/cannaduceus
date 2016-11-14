<?php

namespace Edu\Cnm\hlozano2\DataDesign;

require_once("autoload.php");

/**
 * Small Cross Section of a Dispensary Review
 *
 *
 * @author Hector Lozano <hlozano2@cnm.edu>
 * @version 4.2.0
 **/

class DispensayReview implements \JsonSerializable {
	use ValidateDate;
	/**
	 * id for this DispensaryReview; this is the primary key
	 * @var int $dispensaryReviewId
	 **/
	private $dispensaryReviewId;
	/**
	 * id of the Profile that reviewed this dispensary; this is a foreign key
	 * @var int $dispensaryReviewId
	 **/
	private $dispensaryReviewProfileId;
	/**
	 * dispensary being reviewed by a specific profile
	 * @var string $dispensaryReviewDispensaryId
	 **/
	private $dispensaryReviewDispensaryId;
	/**
	 * date and time this Review was sent, in a PHP DateTime object
	 * @var \DateTime $tweetDate
	 **/
	private $dispensaryReviewDate;
	/**
	 * actual textual review for this dispensary
	 * @var string $tweetContent
	 **/
	private $dispensaryReviewTxt;


/**
 * List of review per individual dispensary.
 *
 *
 * @author <hlozano2@cnm.edu>
 * @version 1.0.0
 */


class DispensaryReview {
	/**
	 * id for this dispensary review; this is the primary key
	 * @var int $dispensaryReviewId
	 **/
	private $dispensaryReviewId;
	/**
	 * This is the id of the review left by specific profile and it's a unique atribute.
	 * @var int $dispensaryReviewProfileId
	 **/
	private $dispensaryReviewProfileId;
	/**
	 * This is the id that identifies the dispensary a specific review was left for
	 * @var $dispensaryReviewDispensaryId
	 **/
	private $dispensaryReviewDispensaryId;
	/**
	 * This is the date and time stamp
	 * @var $dispensaryReviewDate
	 **/
	private $dispensaryReviewDate;
	/**
	 * This is the review content
	 * @var $dispensaryReviewTxt
	 **/
	private $dispensaryReviewTxt;

	// CONSTRUCTOR GOES HERE LATER

	/**
	 * DispensaryReview constructor.
	 * @param int|null $newDispensaryReviewId Id of this dispensary review or null if new dispensary review
	 * @param int|null $newDispensaryReviewProfileId Id of this dispensary review profile or null if new dispensary review profile
	 * @param int|null $newDispensaryReviewDispensaryId Id of this dispensary review dispensary or null if new dispensary review dispensary
	 * @param string $newDispensaryReviewDate string contains actual dispensary review date
	 * @param string $newDispensaryReviewTxt string contains actual dispensary review txt
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g. strings too long, negative integers)
	 * @throws \TypeError if data violates type hints
	 * @throws \Exception if any other exception occurs
	 **/

	public function __construct(int $newDispensaryReviewId = null, int $newDispensaryReviewProfileId, int $newDispensaryReviewDispensaryId, string $newDispensaryReviewDate, string $newDispensaryReviewTxt) {
		try {
			$this->setDispensaryReviewIdId($newDispensaryReviewId);
			$this->setDispensaryReviewProfileId($newDispensaryReviewProfileId);
			$this->setDispensaryReviewDispensaryId($newDispensaryReviewDispensaryId);
			$this->setDispensaryReviewDate($newDispensaryReviewDate);
			$this->setDispensaryReviewTxt($newDispensaryReviewTxt);
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
		if($newDispensaryReviewProfileId === null) {
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
	public function getDispensaryReviewDate() {
		return ($this->dispensaryReviewDate);
	}

	/**
	 * mutator method for dispensary review date
	 *
	 * @param \DateTime|string|null $newDispensaryReviewDate dispensary review date as         a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newDispensaryReviewDate is not a valid         object or string
	 * @throws \RangeException if $newDispensaryReviewDate is a date that does not exist
	 **/
	public function setDispensaryReviewDate($newDispensaryReviewDate = null) {
		// base case: if the date is null, use the current date and time
		if($newDispensaryReviewDate === null) {
			$this->dispensaryReviewDate = new \DateTime();
			return;
		}

		// store the dispensary review date
		try {
			$newDispensaryReviewDate = self::validateDateTime($newDispensaryReviewDate);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		$this->dispensaryReviewDate = $newDispensaryReviewDate;
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

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["tweetDate"] = $this->tweetDate->getTimestamp() * 1000;
		return($fields);
	}
}

