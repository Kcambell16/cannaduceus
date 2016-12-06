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

class DispensaryLeafRating implements \JsonSerializable {

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
	 * @var int $dispensaryLeafRatingProfileId
	 **/
	private $dispensaryLeafRatingProfileId;


	/**
	 * Constructor for new Dispensary Leaf Rating
	 *
	 * @param int $newDispensaryLeafRatingRating rating of this dispensary
	 * @param int $newDispensaryLeafRatingDispensaryId the id of the dispensary from the dispensary class
	 * @param int $newDispensaryLeafRatingProfileId the id of the profile from the profile class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newDispensaryLeafRatingRating, int $newDispensaryLeafRatingDispensaryId, int $newDispensaryLeafRatingProfileId) {
		try {
			$this->setDispensaryLeafRatingRating($newDispensaryLeafRatingRating);
			$this->setDispensaryLeafRatingDispensaryId($newDispensaryLeafRatingDispensaryId);
			$this->setDispensaryLeafRatingProfileId($newDispensaryLeafRatingProfileId);
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
	public function getDispensaryLeafRatingRating() {
		return $this->dispensaryLeafRatingRating;
	}

	/**
	 * mutator method for dispensaryLeafRatingRating
	 *
	 * @param int $newDispensaryLeafRatingRating new value of dispensaryLeafRatingRating
	 * @throws \RangeException if $newDispensaryLeafRatingRating is not an integer <0 || 5
	 * @throws \InvalidArgumentException if $newDispensaryLeafRatingRating is empty
	 */
	public function setDispensaryLeafRatingRating(int $newDispensaryLeafRatingRating) {

		if(empty($newDispensaryLeafRatingRating)) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating cannot be empty"));
		}

		if($newDispensaryLeafRatingRating <= 0 || $newDispensaryLeafRatingRating > 5) {
			throw(new \RangeException("Dispensary Leaf Rating is not a valid integer"));
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
	public function setDispensaryLeafRatingDispensaryId(int $newDispensaryLeafRatingDispensaryId) {
		if($newDispensaryLeafRatingDispensaryId <= 0) {
			throw(new \UnexpectedValueException("Dispensary Leaf Rating Dispensary Id Invalid"));

		}

		//Convert and store the dispensary name
		$this->dispensaryLeafRatingDispensaryId = ($newDispensaryLeafRatingDispensaryId);
	}


	/**
	 * accessor method for dispensaryLeafRatingProfileId
	 *
	 * @return int for dispensaryLeafRatingProfileId
	 */
	public function getDispensaryLeafRatingProfileId() {
		return $this->dispensaryLeafRatingProfileId;
	}

	/**
	 * mutator method for dispensaryLeafRatingProfileId
	 *
	 * @param int $newDispensaryLeafRatingProfileId new dispensaryLeafRatingProfileId
	 * @throws \UnexpectedValueException if $newDispensaryLeafRatingProfileId is not an int
	 */
	public function setDispensaryLeafRatingProfileId(int $newDispensaryLeafRatingProfileId) {
		if($newDispensaryLeafRatingProfileId <= 0) {
			throw(new \UnexpectedValueException("Dispensary Leaf Rating Profile Id Invalid"));
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
		if($this->dispensaryLeafRatingRating === null) {
			throw(new \PDOException("Not a new dispensary leaf rating rating"));
		}

		if($this->dispensaryLeafRatingDispensaryId === null) {
			throw(new \PDOException("Not a valid dispensary leaf rating Dispensary ID"));
		}

		if($this->dispensaryLeafRatingProfileId === null) {
			throw(new \PDOException("Not a new dispensary leaf rating Profile ID"));
		}

		// create query template
		$query = "INSERT INTO dispensaryLeafRating(dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId) VALUES(:dispensaryLeafRatingRating, :dispensaryLeafRatingDispensaryId, :dispensaryLeafRatingProfileId)";
		$statement = $pdo->prepare($query);


		// bind the member variables to the place holders in the template
		$parameters = ["dispensaryLeafRatingRating" => $this->dispensaryLeafRatingRating, "dispensaryLeafRatingDispensaryId" => $this->dispensaryLeafRatingDispensaryId, "dispensaryLeafRatingProfileId" => $this->dispensaryLeafRatingProfileId];
			$statement->execute($parameters);

		// udate null dispensaryId with what mySQL just gave us
		//$this->dispensaryLeafRatingRating = intval($pdo->lastInsertId());

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
		if(empty($this->dispensaryLeafRatingDispensaryId) || empty($this->dispensaryLeafRatingProfileId)) {
			throw(new \PDOException("unable to delete a dispensary leaf rating that does not exist"));
		}

		//Create Query Template
		$query = "DELETE FROM dispensaryLeafRating WHERE dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingDispensaryId AND dispensaryLeafRatingProfileId = :dispensaryLeafRatingProfileId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holder in the template
		$parameters = ["dispensaryLeafRatingDispensaryId" => $this->dispensaryLeafRatingDispensaryId, "dispensaryLeafRatingProfileId" => $this->dispensaryLeafRatingProfileId];
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
	 * This function retrieves an array of Dispensary Leaf Ratings by Dispensary Leaf Rating Rating
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param  \int $dispensaryLeafRatingRating dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingRating is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingRating is too long
	 * @throws \PDOException
	 * @return null | \SplFixedArray array of Dispensaries with the same $dispensaryLeafRatingRating or null if not found
	 */

	public static function getDispensaryLeafRatingsByDispensaryLeafRatingRating(\PDO $pdo, int $dispensaryLeafRatingRating) {
		//  check validity of $dispensaryLeafRating
		$dispensaryLeafRatingRating = filter_var($dispensaryLeafRatingRating, FILTER_SANITIZE_NUMBER_INT);

		if($dispensaryLeafRatingRating <= 0 || $dispensaryLeafRatingRating > 5) {
			throw(new \RangeException("Dispensary Leaf Rating is not valid."));
		}

		if($dispensaryLeafRatingRating === null) {
			throw(new \InvalidArgumentException("Dispensary rating does not exist."));
		}

		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRatingRating" => $dispensaryLeafRatingRating);
		$statement->execute($parameters);

		//  build an array of dispensaries based on dispensaryLeafRating
		$dispensaryLeafRatings = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try{
				$dispensaryLeafRating = new DispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
				$dispensaryLeafRatings[$dispensaryLeafRatings->key()] = $dispensaryLeafRating;
				$dispensaryLeafRatings->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($dispensaryLeafRatings);

	}  // get by DispensaryLeafRatingRating

	/**
	 * This function retrieves a Dispensary Leaf Rating by Dispensary Leaf Rating Dispensary Id
	 *
	 * @param \PDO $pdo PDO connection
	 * @param  \int dispensaryLeafRatingDispensaryId dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingDispensaryId is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingDispensaryId is not an int
	 * @throws \PDOException
	 * @return null | \SplFixedArray $dispensaryLeafRatings
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingDispensaryId(\PDO $pdo, $dispensaryId) {
		//  check validity of $dispensaryId
		$dispensaryLeafRatingDispensaryId = filter_var($dispensaryId, FILTER_SANITIZE_NUMBER_INT);

		if($dispensaryLeafRatingDispensaryId <= 0) {
			throw(new \RangeException("Dispensary Leaf Rating Id is not valid."));
		}

		if($dispensaryLeafRatingDispensaryId === null) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating does not exist."));
		}

		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingDispensaryId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRatingDispensaryId" => $dispensaryLeafRatingDispensaryId);
		$statement->execute($parameters);

		//  build an array of dispensaries based on dispensaryLeafRatingDispensaryId
		$dispensaryLeafRatings = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try{
				$dispensaryLeafRating = new DispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
				$dispensaryLeafRatings[$dispensaryLeafRatings->key()] = $dispensaryLeafRating;
				$dispensaryLeafRatings->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($dispensaryLeafRatings);

	}  // get by DispensaryLeafRatingDispensaryId

	/**
	 * This function retrieves a dispensary Leaf Rating by dispensary Leaf Rating Profile Id
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int dispensaryLeafRatingProfileId dispensary leaf ratings to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingProfileId is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingProfileId is not an valid integer
	 * @throws \PDOException
	 * @return null | \SplFixedArray $dispensaryLeafRatings
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingProfileId(\PDO $pdo, $dispensaryLeafRatingProfileId) {
		//  check validity of $dispensaryName
		$dispensaryLeafRatingProfileId = filter_var($dispensaryLeafRatingProfileId, FILTER_SANITIZE_NUMBER_INT);

		if($dispensaryLeafRatingProfileId <= 0) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating Profile Id is not valid."));
		}

		if($dispensaryLeafRatingProfileId === null) {
			throw(new \RangeException("Dispensary Leaf Rating Profile Id does not exist."));
		}

		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingProfileId = :dispensaryLeafRatingProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRatingProfileId" => $dispensaryLeafRatingProfileId);
		$statement->execute($parameters);

		//  build an array of dispensaries based on dispensaryLeafRatingProfileId
		$dispensaryLeafRatings = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try{
				$dispensaryLeafRating = new DispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
				$dispensaryLeafRatings[$dispensaryLeafRatings->key()] = $dispensaryLeafRating;
				$dispensaryLeafRatings->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($dispensaryLeafRatings);
	}  // get by dispensaryLeafRatingProfileId

	/**
	 * This function retrieves a dispensary Leaf Rating by dispensary Leaf Rating Dispensary Id and dispensary Leaf Rating Profile Id
	 *
	 * @param \PDO $pdo PDO connection
	 * @param  \int $dispensaryLeafRatingRating dispensary leaf rating to be retrieved
	 * @param  \int $dispensaryLeafRatingDispensaryId dispensary leaf rating dispensaryId to be retrieved
	 * @param  \int $dispensaryLeafRatingProfileId dispensary leaf rating profileId to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRatingDispensaryId and $dispensaryLeafRatingProfileId are not integers
	 * @throws \RangeException when $dispensaryLeafRatingDispensaryId and $dispensaryLeafRatingProfileId are not integers
	 * @throws \PDOException
	 * @return null | $dispensaryLeafRating
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingDispensaryIdAndDispensaryLeafRatingProfileId(\PDO $pdo, int $dispensaryLeafRatingDispensaryId, int $dispensaryLeafRatingProfileId) {

		$dispensaryLeafRatingDispensaryId = filter_var($dispensaryLeafRatingDispensaryId, FILTER_SANITIZE_NUMBER_INT);

		$dispensaryLeafRatingProfileId = filter_var($dispensaryLeafRatingProfileId, FILTER_SANITIZE_NUMBER_INT);

		if(empty($dispensaryLeafRatingDispensaryId) || $dispensaryLeafRatingDispensaryId <= 0) {
			throw(new \InvalidArgumentException("Dispensary Id or is not valid."));
		}

		if(empty($dispensaryLeafRatingProfileId) || $dispensaryLeafRatingProfileId <= 0) {
			throw(new \InvalidArgumentException("Profile Id or is not valid."));
		}

		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingDispensaryId = :dispensaryLeafRatingDispensaryId AND dispensaryLeafRatingProfileId = :dispensaryLeafRatingProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRatingDispensaryId" => $dispensaryLeafRatingDispensaryId, "dispensaryLeafRatingProfileId" => $dispensaryLeafRatingProfileId);
		$statement->execute($parameters);

		//  setup results from query
		try {
			$dispensaryLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryLeafRating = new DispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensaryId"], $row["dispensaryLeafRatingProfileId"]);
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