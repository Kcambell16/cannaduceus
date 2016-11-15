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
	 * @var \DateTime $dispensaryReviewDate
	 **/
	private $dispensaryReviewDateTime;
	/**
	 * actual textual review for this dispensary
	 * @var string $tweetContent
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
			$this->setDispensaryReviewId($newDispensaryReviewId);
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


	/**
	 * inserts this dispensaryReview into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {

		// create query template
		$query = "INSERT INTO dispensaryReview(dispensaryReviewProfileId, dispensaryReviewDispensaryId, dispensaryReviewDateTime, dispensaryReviewTxt)
                       VALUES (:dispensaryReviewProfileId, :dispensaryReviewDispensaryId, :dispensaryReviewDateTime, :dispensaryReviewTxt)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDateTime = $this->dispensaryReviewDateTime->format("Y-m-d H:i:s");
		$parameters = ["dispensaryReviewProfileId" => $this->dispensaryReviewProfileId, "dispensaryReviewDispensaryId" => $this->dispensaryReviewDispensaryId,
			            "dispensaryReviewDateTime" => $formattedDateTime, "dispensaryReviewTxt" => $this->$this->dispensaryReviewTxt];

		$statement->execute($parameters);

		// update the null tweetId with what mySQL just gave us
		$this->dispensaryReviewId = intval($pdo->lastInsertId());

	} // insert

	/**
	 * gets the DispensaryReview by Id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param \int $dispensaryReviewId
	 * @return DispensayReview|null DispensaryReview found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getDispensaryReviewByDispensaryReviewId(\PDO $pdo, int $dispensaryReviewId) {
		// sanitize the dispensaryReviewId before searching
		if($dispensaryReviewId <= 0) {
			throw(new \PDOException("dispensary review id is not positive"));
		}

		// create query template
		$query = "SELECT dispensaryReviewId, dispensaryReviewProfileId, dispensaryReviewDispensaryId, dispensaryReviewTxt FROM dispensaryReview WHERE dispensaryReviewId = :dispensaryReviewId";
		$statement = $pdo->prepare($query);

		// bind the dispensaryReview id to the place holder in the template
		$parameters = ["dispensaryReviewId" => $dispensaryReviewId];
		$statement->execute($parameters);

		// grab the dispensaryReview from mySQL
		try {
			$dispensaryReview = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryReview = new DispensayReview($row["dispensaryReviewId"], $row["dispensaryReviewProfileId"], $row["dispensaryReviewDispensaryId"], $row["dispensaryReviewTxt]");
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($dispensaryReview);

	}

	/**
	 * gets the DispensaryReview by profile id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $dispensaryReviewProfileId profile id to search by
	 * @return \SplFixedArray SplFixedArray of DispensaryReviews found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getDispensaryReviewByDispensaryReviewProfileId(\PDO $pdo, int $dispensaryReviewProfileId) {
		// sanitize the profile id before searching
		if($dispensaryReviewProfileId <= 0) {
			throw(new \RangeException("dispensary review profile id must be positive"));
		}

		// create query template
		$query = "SELECT dispensaryReviewId, dispensaryReviewProfileId, dispensaryReviewDispensaryId, dispensaryReviewTxt FROM dispensaryReview WHERE dispensaryReviewProfileId = :dispensaryReviewProfileId";
		$statement = $pdo->prepare($query);

		// bind the dispensary review profile id to the place holder in the template
		$parameters = ["dispensaryReviewProfileId" => $dispensaryReviewProfileId];
		$statement->execute($parameters);

		// build an array of dispensary reviews
		$dispensaryReviews = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$dispensaryReview = new DispensaryReview($row["dispensaryReviewId"], $row["dispensaryReviewProfileId"], $row["dispensaryReviewDispensaryId"], $row["dispensaryReviewTxt"]);
				$dispensaryReviews[$dispensaryReviews->key()] = $dispensaryReview;
				$dispensaryReviews->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($dispensaryReviews);
	}

	/**
	 * gets the DispensaryReview by DispensaryId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $dispensaryReviewDispensaryId profile id to search by
	 * @return \SplFixedArray SplFixedArray of DispensaryReviews found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getDispensaryReviewByDispensaryReviewDispensaryId(\PDO $pdo, int $dispensaryReviewDispensaryId) {
		// sanitize the profile id before searching
		if($dispensaryReviewDispensaryId <= 0) {
			throw(new \RangeException("dispensary review dispensary id must be positive"));
		}

		// create query template
		$query = "SELECT dispensaryReviewId, dispensaryReviewProfileId, dispensaryReviewDispensaryId, dispensaryReviewTxt FROM dispensaryReview WHERE dispensaryReviewDispensaryId = :dispensaryReviewDispensaryId";
		$statement = $pdo->prepare($query);

		// bind the dispensary review profile id to the place holder in the template
		$parameters = ["dispensaryReviewDispensaryId" => $dispensaryReviewDispensaryId];
		$statement->execute($parameters);

		// build an array of dispensary reviews
		$dispensaryReviews = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$dispensaryReview = new DispensaryReview($row["dispensaryReviewId"], $row["dispensaryReviewProfileId"], $row["dispensaryReviewDispensaryId"], $row["dispensaryReviewTxt"]);
				$dispensaryReviews[$dispensaryReviews->key()] = $dispensaryReview;
				$dispensaryReviews->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($dispensaryReviews);
	}

	/**
	 * gets the DidpensaryReview by content
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $dispensaryReviewTxt dispensary review content to search for
	 * @return \SplFixedArray SplFixedArray of Tweets found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getDispensaryReviewByDispensaryReviewTxt(\PDO $pdo, string $dispensaryReviewTxt) {
		// sanitize the description before searching
		$dispensaryReviewTxt = trim($dispensaryReviewTxt);
		$dispensaryReviewTxt = filter_var($dispensaryReviewTxt, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($dispensaryReviewTxt) === true) {
			throw(new \PDOException("dispensary review text is invalid"));
		}

		// create query template
		$query = "SELECT dispensaryReviewId, dispensaryReviewProfileId, dispensaryReviewDispensaryId, dispensaryReviewTxt FROM dispensaryReview WHERE dispensaryReviewTxt LIKE :dispensaryReviewTxt";
		$statement = $pdo->prepare($query);

		// bind the tweet content to the place holder in the template
		$dispensaryReviewTxt = "%$dispensaryReviewTxt%";
		$parameters = ["dispensaryReviewTxt" => $dispensaryReviewTxt];
		$statement->execute($parameters);

		// build an array of dispensary reviews
		$dispensaryReviews = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$dispensaryReview = new DispensaryReview($row["dispensaryReviewId"], $row["dispensaryReviewProfileId"], $row["dispensaryReviewDispensaryId"], $row["dispensaryReviewTxt"]);
				$s[$dispensaryReviews->key()] = $dispensaryReview;
				$dispensaryReviews->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($tweets);
	}


	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
	}
}  // DispensaryReview

