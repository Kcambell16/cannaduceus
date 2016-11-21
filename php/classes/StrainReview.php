<?php

namespace Edu\Cnm\Cannaduceus;

require_once(dirname(__DIR__) . "/classes/autoload.php");
/**
 * Small Cross Section of a Strain Review
 *
 *
 * @author Hector Lozano <hlozano2@cnm.edu>
 * @version 4.2.0
 **/

class StrainReview implements \JsonSerializable {

	//use ValidateDate;
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
	 * @var string $strainReviewStrainId // should this be an int?
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
	 * @param string $newStrainReviewDate string contains actual strain review date
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

	private static function validateDate($newStrainReviewDateTime) {
		// base case: if the date is a DateTime object, there's no work to be done
		if(is_object($newStrainReviewDateTime) === true && get_class($newStrainReviewDateTime) === "DateTime") {
			return ($newStrainReviewDateTime);
		}
		// treat the date as a mySQL date string: Y-m-d
		$newDate = trim($newStrainReviewDateTime);
		if((preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $newDate, $matches)) !== 1) {
			throw(new \InvalidArgumentException("date is not a valid date"));
		}
		// verify the date is really a valid calendar date
		$year = intval($matches[1]);
		$month = intval($matches[2]);
		$day = intval($matches[3]);
		if(checkdate($month, $day, $year) === false) {
			throw(new \RangeException("date is not a Gregorian date"));
		}
		// if we got here, the date is clean
		$newStrainReviewDateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $newDate . " 00:00:00");
		return ($newStrainReviewDateTime);
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
		if($newStrainReviewId <= 0) {
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
			$this->strainReviewProfileId = null;
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

	/**
	 * inserts this strainReview into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {

		// create query template
		$query = "INSERT INTO strainReview(strainReviewProfileId, strainReviewStrainId, strainReviewDateTime, strainReviewTxt)
                       VALUES (:strainReviewProfileId, :strainReviewStrainId, :strainReviewDateTime, :strainReviewTxt)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$formattedDateTime = $this->strainReviewDateTime->format("Y-m-d H:i:s");
		$parameters = ["strainReviewProfileId" => $this->strainReviewProfileId, "strainReviewStrainId" => $this->strainReviewStrainId,
			"strainReviewDateTime" => $formattedDateTime, "strainReviewTxt" => $this->$this->strainReviewTxt];

		$statement->execute($parameters);

		// update the null strainReviewId with what mySQL just gave us
		$this->strainReviewId = intval($pdo->lastInsertId());

	} // insert

	/**
	 * deletes this StrainReview from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) {
		// enforce the strainReviewId is not null (i.e., don't delete a strainReview that hasn't been inserted)
		if($this->strainReviewId === null) {
			throw(new \PDOException("unable to delete a strain review that does not exist"));
		}

		// create query template
		$query = "DELETE FROM strainReview WHERE strainReviewId = :strainReviewId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["strainReviewId" => $this->strainReviewId];
		$statement->execute($parameters);

	} // deletes

	/**
	 * gets the StrainReview by Id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param \int $strainReviewId
	 * @return \SplFixedArray SplFixedArray of StrainReviews found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getStrainReviewByStrainReviewId(\PDO $pdo, int $strainReviewId) {
		// sanitize the strainReviewId before searching
		if($strainReviewId <= 0) {
			throw(new \PDOException("strain review id is not positive"));
		}

		// create query template
		$query = "SELECT strainReviewId, strainReviewProfileId, strainReviewStrainId, strainReviewDateTime strainReviewTxt FROM strainReview WHERE strainReviewId = :strainReviewId";
		$statement = $pdo->prepare($query);

		// bind the strainReview id to the place holder in the template
		$parameters = ["strainReviewId" => $strainReviewId];
		$statement->execute($parameters);

		$strainReviews = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);

		// grab the strainReviews from mySQL
		while(($row = $statement->fetch()) !== false) {
			try {
				$strainReviewId = null;
				$statement->setFetchMode(\PDO::FETCH_ASSOC);
				$row = $statement->fetch();
				if($row !== false) {
					$newStrainReviewId = new StrainReview($row["strainReviewId"], $row["strainReviewProfileId"], $row["strainReviewStrainId"], $row["dispensaryReviewDateTime"], $row["strainReviewTxt]"]);
				}
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
			return ($strainReviews);

		}
	}


		/**
		 * gets the StrainReview by profile id
		 *
		 * @param \PDO $pdo PDO connection object
		 * @param int $strainReviewProfileId profile id to search by
		 * @return \SplFixedArray SplFixedArray of StrainReviews found
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public
		static function getStrainReviewsByStrainReviewProfileId(\PDO $pdo, int $strainReviewProfileId) {
			// sanitize the profile id before searching
			if($strainReviewProfileId <= 0) {
				throw(new \RangeException("strain review profile id must be positive"));
			}

			// create query template
			$query = "SELECT strainReviewId, strainReviewProfileId, strainReviewStrainId, strainReviewDateTime, strainReviewTxt FROM strainReview WHERE strainReviewProfileId = :strainReviewProfileId";
			$statement = $pdo->prepare($query);

			// bind the strain review profile id to the place holder in the template
			$parameters = ["strainReviewProfileId" => $strainReviewProfileId];
			$statement->execute($parameters);

			// build an array of dispensary reviews
			$strainReviews = new \SplFixedArray($statement->rowCount());
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			while(($row = $statement->fetch()) !== false) {
				try {
					$strainReview = new StrainReview($row["strainReviewId"], $row["strainReviewProfileId"], $row["strainReviewDispensaryId"], $row["strainReviewDateTime"], $row["strainReviewTxt"]);
					$strainReviews[$strainReviews->key()] = $strainReview;
					$strainReviews->next();
				} catch(\Exception $exception) {
					// if the row couldn't be converted, rethrow it
					throw(new \PDOException($exception->getMessage(), 0, $exception));
				}
			}
			return ($strainReviews);
		}

		/**
		 * gets the StrainReview by StrainId
		 *
		 * @param \PDO $pdo PDO connection object
		 * @param int $strainReviewStrainId profile id to search by
		 * @return \SplFixedArray SplFixedArray of StrainReviews found
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public static function getStrainReviewsByStrainReviewStrainId(\PDO $pdo, int $strainReviewStrainId) {
			// sanitize the profile id before searching
			if($strainReviewStrainId <= 0) {
				throw(new \RangeException("strain review strain id must be positive"));
			}

			// create query template
			$query = "SELECT strainReviewId, strainReviewProfileId, strainReviewStrainId, strainReviewDateTime, strainReviewTxt FROM strainReview WHERE strainReviewStrainId = :strainReviewStrainId";
			$statement = $pdo->prepare($query);

			// bind the strain review profile id to the place holder in the template
			$parameters = ["strainReviewStrainId" => $strainReviewStrainId];
			$statement->execute($parameters);

			// build an array of strain reviews
			$strainReviews = new \SplFixedArray($statement->rowCount());
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			while(($row = $statement->fetch()) !== false) {
				try {
					$strainReview = new StrainReview($row["strainReviewId"], $row["strainReviewProfileId"], $row["strainReviewStrainId"], $row["strainReviewDateTime"], $row["strainReviewTxt"]);
					$strainReviews[$strainReviews->key()] = $strainReview;
					$strainReviews->next();
				} catch(\Exception $exception) {
					// if the row couldn't be converted, rethrow it
					throw(new \PDOException($exception->getMessage(), 0, $exception));
				}
			}
			return ($strainReviews);
		}

		/**
		 * gets the strainReview by content
		 *
		 * @param \PDO $pdo PDO connection object
		 * @param string $strainReviewTxt strain review content to search for
		 * @return \SplFixedArray SplFixedArray of Strain Reviews found
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public
		static function getStrainReviewByStrainReviewTxt(\PDO $pdo, string $strainReviewTxt) {
			// sanitize the description before searching
			$strainReviewTxt = trim($strainReviewTxt);
			$strainReviewTxt = filter_var($strainReviewTxt, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
			if(empty($strainReviewTxt) === true) {
				throw(new \PDOException("strain review text is invalid"));
			}

			// create query template
			$query = "SELECT strainReviewId, strainReviewProfileId, strainReviewStrainId, strainReviewDateTime, strainReviewTxt FROM strainReview WHERE strainReviewTxt LIKE :strainReviewTxt";
			$statement = $pdo->prepare($query);

			// bind the strain review content to the place holder in the template
			$strainReviewTxt = "%$strainReviewTxt%";
			$parameters = ["strainReviewTxt" => $strainReviewTxt];
			$statement->execute($parameters);

			// build an array of strain reviews
			$strainReviews = new \SplFixedArray($statement->rowCount());
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			while(($row = $statement->fetch()) !== false) {
				try {
					$strainReview = new StrainReview($row["strainReviewId"], $row["strainReviewProfileId"], $row["strainReviewStrainId"], $row["strainReviewDateTime"], $row["strainReviewTxt"]);
					$strainReviews[$strainReviews->key()] = $strainReview;
					$strainReviews->next();
				} catch(\Exception $exception) {
					// if the row couldn't be converted, rethrow it
					throw(new \PDOException($exception->getMessage(), 0, $exception));
				}
			}
			return ($strainReviews);
		}


		/**
		 * formats the state variables for JSON serialization
		 *
		 * @return array resulting state variables to serialize
		 **/
		public function jsonSerialize() {
			$fields = get_object_vars($this);
			return ($fields);
		}

}