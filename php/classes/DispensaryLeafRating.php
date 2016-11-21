<?php
namespace Edu\Cnm\Cannaduceus;

require_once(dirname(__DIR__) . "/classes/autoload.php");
/**
 * Cross section of Cannaduceus dispensaryLeafRating class
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
	 * @var int $dispensaryLeafRatingDispensaryId
	 **/
	private $dispensaryLeafRatingDispensaryId;

	/**
	 *profile Id from the profile class;
	 * @var string $dispensaryLeafRatingProfileId
	 **/
	private $dispensaryLeafRatingProfileId;


	/** Constructor for new Dispensary Leaf Rating
	 *
	 * @param int | null $newDispensaryLeafRatingRating rating of this dispensary or null if a new dispensary
	 * @param int | null $newDispensaryLeafRatingDispensaryId the id of the dispensary from the dispensary class
	 * @param int | null $newDispensaryLeafRatingProfileId the id of the profile from the profile class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newDispensaryLeafRatingRating = null, int $newDispensaryLeafRatingDispensaryId = null, int $newDispensaryLeafRatingProfileId = null) {
		try {
			$this->setdispensaryLeafRatingRating($newDispensaryLeafRatingRating);
			$this->setdispensaryLeafRatingDispensaryId($newDispensaryLeafRatingDispensaryId);
			$this->setdispensaryLeafRatingProfileId($newDispensaryLeafRatingProfileId);
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
		$this->dispensaryLeafRatingRating = ($newDispensaryLeafRatingRating);
	}


	/**
	 * accessor method for dispensaryLeafRatingDispensaryId
	 *
	 * @return int of dispensaryLeafRatingDispensaryId
	 */
	public function getDispensaryLeafRatingDispensaryId() {
		return $this->dispensaryLeafRatingDispensaryId;
	}

	/**
	 * mutator method for dispensaryLeafRatingDispensaryId
	 *
	 * @param int $newDispensaryLeafRatingDispensaryId new var of dispensaryLeafRatingDispensaryId
	 * @throws \UnexpectedValueException if $newDispensaryLeafRatingDispensaryId is not an int
	 */
	public function setdispensaryLeafRatingDispensaryId($newDispensaryLeafRatingDispensaryId) {
		$newDispensaryLeafRatingDispensaryId = filter_input($newDispensaryLeafRatingDispensaryId, FILTER_SANITIZE_NUMBER_INT);
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
		$this->dispensaryLeafRatingProfileId = ($newDispensaryLeafRatingProfileId);
	}

	/**
	 * inserts this Dispensary Leaf Rating into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		// enforce the dispensaryLeafRatingRating is null (i.e., don't insert a dispensary that already exists)
		if($this->dispensaryLeafRatingRating !== null) {
			throw(new \PDOException("not a new dispensary leaf rating"));
		}

		// create query template
		$query = "INSERT INTO dispensaryLeafRating(dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId) VALUES(:dispensaryLeafRatingRating, :dispensaryLeafRatingDispensaryId, :dispensaryLeafRatingProfileId)";
		$statement = $pdo->prepare($query);


		// bind the member variables to the place holders in the template
		$parameters = ["dispensaryLeafRatingRating" => $this->dispensaryLeafRatingRating, "dispensaryLeafRatingDispensaryId" => $this->dispensaryLeafRatingDispensaryId, "dispensaryLeafRatingProfileId" => $this->dispensaryLeafRatingProfileId];
		$statement->execute($parameters);

		// udate null dispensaryId with what mySQL just gave us
		$this->dispensaryLeafRatingRating = intval($pdo->lastInsertId());

	}   // insert

	/**
	 * deletes this dispensary Leaf Rating from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//enforce the dispensaryLeafRating is not null (i.e., don't delete a dispensary leaf rating that hasn't been inserted)
		if($this->dispensaryLeafRatingRating === null) {
			throw(new \PDOException("unable to delete a dispensary leaf rating that does not exist"));
		}

		//Create Query Template
		$query = "DELETE FROM dispensaryLeafRating WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holder in the template
		$parameters = ["dispensaryLeafRatingRating" => $this->dispensaryLeafRatingRating];
		$statement->execute($parameters);
	}	//Delete

	/**
	 * Updates this Dispensary Leaf Rating in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) {
		//enforce the dispensaryLeafRating is not null (i.e. don't update a dispensary leaf rating that hasn't been inserted)
		if($this->dispensaryLeafRatingRating === null)	{
			throw(new \PDOException("unable to update dispensary leaf rating that does not exist"));}
			// create query template
			$query = "UPDATE dispensaryLeafRating SET dispensaryLeafRatingRating = :dispensaryLeafRatingRating AND dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingDispensaryId AND dispensaryLeafRatingProfileId = :dispensaryLeafRatingProfileId WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating";
			$statement = $pdo->prepare($query);

			//bind the member variables to the place holders in the template
			$parameteres = ["dispensaryLeafRatingRating" => $this->dispensaryLeafRatingRating, "dispensaryLeafRatingDispensaryId" => $this->dispensaryLeafRatingDispensaryId, "dispensaryLeafRatingProfileId" => $this->dispensaryLeafRatingProfileId];
			$statement->execute($parameteres);
	}//update

	/**
	 * This function retrieves a Dispensary Leaf Rating by Dispensary Leaf Rating Rating
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int dispensaryLeafRating -- dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRating is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingRating is too long
	 * @throws \PDOException
	 * @return null | $dispensaryLeafRating
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingRating(\PDO $pdo, $dispensaryLeafRating) {
		//  check validity of $dispensaryName
		$dispensaryLeafRating = filter_input($dispensaryLeafRating, FILTER_SANITIZE_NUMBER_INT);
		if($dispensaryLeafRating <= 0) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating is not valid."));
		}
		if($dispensaryLeafRating === null) {
			throw(new \RangeException("dispensary name does not exist."));
		}
		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRating" => $dispensaryLeafRating);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$dispensaryLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryLeafRating = new dispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($dispensaryLeafRating);
	}  // get by DispensaryLeafRatingRating

	/**
	 * This function retrieves a Dispensary Leaf Rating by Dispensary Leaf Rating Dispensary Id
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int dispensaryLeafRating -- dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingDispensaryId is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingDispensaryId is not an int
	 * @throws \PDOException
	 * @return null | $dispensaryLeafRating
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingDispensaryId(\PDO $pdo, $dispensaryLeafRating) {
		//  check validity of $dispensaryName
		$dispensaryLeafRatingDispensaryId = filter_input($dispensaryLeafRating, FILTER_SANITIZE_NUMBER_INT);
		if($dispensaryLeafRatingDispensaryId <= 0) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating Id is not valid."));
		}
		if($dispensaryLeafRatingDispensaryId === null) {
			throw(new \RangeException("Dispensary Leaf Rating does not exist."));
		}
		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingDispensaryId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRating" => $dispensaryLeafRating);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$dispensaryLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryLeafRating = new dispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($dispensaryLeafRating);
	}  // get by DispensaryLeafRatingDispensaryId

	/**
	 * This function retrieves a dispensary Leaf Rating by dispensary Leaf Rating Profile Id
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int dispensaryLeafRating -- dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingProfileId is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingProfileId is not an int
	 * @throws \PDOException
	 * @return null | $dispensaryLeafRating
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingProfileId(\PDO $pdo, $dispensaryLeafRatingProfileId) {
		//  check validity of $dispensaryName
		$dispensaryLeafRating = filter_input($dispensaryLeafRatingProfileId, FILTER_SANITIZE_NUMBER_INT);
		if($dispensaryLeafRatingProfileId <= 0) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating Profile Id is not valid."));
		}
		if($dispensaryLeafRatingProfileId === null) {
			throw(new \RangeException("Dispensary Leaf Rating Profile Id does not exist."));
		}
		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating AND dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingdispensaryId AND dispensaryLeafRatingProfileId = :dispensaryLeafRatingProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRating" => $dispensaryLeafRating);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$dispensaryLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryLeafRating = new dispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($dispensaryLeafRating);
	}  // get by dispensaryLeafRatingDispensaryId

	/**
	 * This function retrieves a dispensary Leaf Rating by dispensary Leaf Rating Dispensary Id and dispensary Leaf Rating Profile Id
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int dispensaryLeafRating -- dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingDispensaryId and $dispensaryLeafRatingProfileId are not integers
	 * @throws \RangeException when $dispensaryLeafRatingDispensaryId and $dispensaryLeafRatingProfileId are not integers
	 * @throws \PDOException
	 * @return null | $dispensaryLeafRating
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingDispensaryIdAndDispensaryLeafRatingProfileId(\PDO $pdo, , $dispensaryLeafRatingDispensaryId, $dispensaryLeafRatingProfileId) {
		//  check validity of $dispensaryName
		$dispensaryLeafRating = filter_input($dispensaryLeafRatingDispensaryId, $dispensaryLeafRatingProfileId, FILTER_SANITIZE_NUMBER_INT);
		if($dispensaryLeafRatingProfileId and $dispensaryLeafRatingDispensaryId<= 0) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating is not valid."));
		}
		if($dispensaryLeafRatingDispensaryId and $dispensaryLeafRatingProfileId === null) {
			throw(new \RangeException("Dispensary Leaf Rating does not exist."));
		}
		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating AND dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingdispensaryId AND dispensaryLeafRatingProfileId = :dispensaryLeafRatingProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRating" => $dispensaryLeafRating);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$dispensaryLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryLeafRating = new dispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($dispensaryLeafRating);
	}  // get by dispensaryLeafRatingDispensaryId

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
	}
}