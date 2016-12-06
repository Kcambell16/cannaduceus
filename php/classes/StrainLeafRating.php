<?php
namespace Edu\Cnm\Cannaduceus;

require_once(dirname(__DIR__) . "/classes/autoload.php");
/**
 * Cross section of Cannaduceus strainLeafRating class
 *
 * This is just one strain out of many that will be rated
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class StrainLeafRating implements \JsonSerializable {

	/**
	 * rating for the strain;
	 * @var int $strainLeafRatingRating
	 **/
	private $strainLeafRatingRating;

	/**
	 * strain Id from the strain class;
	 * @var int $strainLeafRatingStrainId
	 **/
	private $strainLeafRatingStrainId;

	/**
	 *profile Id from the profile class;
	 * @var int $strainLeafRatingProfileId
	 **/
	private $strainLeafRatingProfileId;


	/**
	 * Constructor for new Strain Leaf Rating
	 *
	 * @param int $newStrainLeafRatingRating rating of this strain
	 * @param int $newStrainLeafRatingStrainId the id of the strain from the strain class
	 * @param int $newStrainLeafRatingProfileId the id of the profile from the profile class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainLeafRatingRating, int $newStrainLeafRatingStrainId, int $newStrainLeafRatingProfileId) {
		try {
			$this->setStrainLeafRatingRating($newStrainLeafRatingRating);
			$this->setStrainLeafRatingStrainId($newStrainLeafRatingStrainId);
			$this->setStrainLeafRatingProfileId($newStrainLeafRatingProfileId);
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
	 * accessor method for strainLeafRatingRating
	 *
	 * @return int|null value of strainLeafRatingRating
	 */
	public function getStrainLeafRatingRating() {
		return $this->strainLeafRatingRating;
	}

	/**
	 * mutator method for strainLeafRatingRating
	 *
	 * @param int $newStrainLeafRatingRating new value of strainLeafRatingRating
	 * @throws \RangeException if $newStrainLeafRatingRating is not an integer <0 || 5
	 * @throws \InvalidArgumentException if $newStrainLeafRatingRating is empty
	 */
	public function setStrainLeafRatingRating(int $newStrainLeafRatingRating) {

		if(empty($newStrainLeafRatingRating)) {
			throw(new \InvalidArgumentException("Strain Leaf Rating cannot be empty"));
		}

		if($newStrainLeafRatingRating <= 0 || $newStrainLeafRatingRating > 5) {
			throw(new \RangeException("Strain Leaf Rating is not a valid integer"));
		}

		//Convert and store the strainLeafRating rating
		$this->strainLeafRatingRating = ($newStrainLeafRatingRating);
	}


	/**
	 * accessor method for strainLeafRatingStrainId
	 *
	 * @return int of strainLeafRatingStrainId
	 */
	public function getStrainLeafRatingStrainId() {
		return $this->strainLeafRatingStrainId;
	}

	/**
	 * mutator method for strainLeafRatingStrainId
	 *
	 * @param int $newStrainLeafRatingStrainId new var of strainLeafRatingStrainId
	 * @throws \UnexpectedValueException if $newStrainLeafRatingStrainId is not an int
	 */
	public function setStrainLeafRatingStrainId(int $newStrainLeafRatingStrainId) {
		if($newStrainLeafRatingStrainId <= 0) {
			throw(new \UnexpectedValueException("Strain Leaf Rating Strain Id Invalid"));

		}

		//Convert and store the strain name
		$this->strainLeafRatingStrainId = ($newStrainLeafRatingStrainId);
	}


	/**
	 * accessor method for strainLeafRatingProfileId
	 *
	 * @return int for strainLeafRatingProfileId
	 */
	public function getStrainLeafRatingProfileId() {
		return $this->strainLeafRatingProfileId;
	}

	/**
	 * mutator method for strainLeafRatingProfileId
	 *
	 * @param int $newStrainLeafRatingProfileId new strainLeafRatingProfileId
	 * @throws \UnexpectedValueException if $newStrainLeafRatingProfileId is not an int
	 */
	public function setStrainLeafRatingProfileId(int $newStrainLeafRatingProfileId) {
		if($newStrainLeafRatingProfileId <= 0) {
			throw(new \UnexpectedValueException("Strain Leaf Rating Profile Id Invalid"));
		}

		//Convert and store the strainLeafRatingProfileId
		$this->strainLeafRatingProfileId = ($newStrainLeafRatingProfileId);
	}

	/**
	 * inserts this Strain Leaf Rating into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		// enforce the strainLeafRatingRating is null (i.e., don't insert a strain that already exists)
		if($this->strainLeafRatingRating === null) {
			throw(new \PDOException("Not a new strain leaf rating rating"));
		}

		if($this->strainLeafRatingStrainId === null) {
			throw(new \PDOException("Not a valid strain leaf rating Strain ID"));
		}

		if($this->strainLeafRatingProfileId === null) {
			throw(new \PDOException("Not a new strain leaf rating Profile ID"));
		}

		// create query template
		$query = "INSERT INTO strainLeafRating(strainLeafRatingRating, strainLeafRatingStrainId, strainLeafRatingProfileId) VALUES(:strainLeafRatingRating, :strainLeafRatingStrainId, :strainLeafRatingProfileId)";
		$statement = $pdo->prepare($query);


		// bind the member variables to the place holders in the template
		$parameters = ["strainLeafRatingRating" => $this->strainLeafRatingRating, "strainLeafRatingStrainId" => $this->strainLeafRatingStrainId, "strainLeafRatingProfileId" => $this->strainLeafRatingProfileId];
		$statement->execute($parameters);

		// udate null strainId with what mySQL just gave us
		//$this->strainLeafRatingRating = intval($pdo->lastInsertId());

	}   // insert

	/**
	 * deletes this strain Leaf Rating from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//enforce the strainLeafRating is not null (i.e., don't delete a strain leaf rating that hasn't been inserted)
		if(empty($this->strainLeafRatingStrainId) || empty($this->strainLeafRatingProfileId)) {
			throw(new \PDOException("unable to delete a strain leaf rating that does not exist"));
		}

		//Create Query Template
		$query = "DELETE FROM strainLeafRating WHERE strainLeafRatingStrainId = :strainLeafRatingStrainId AND strainLeafRatingProfileId = :strainLeafRatingProfileId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holder in the template
		$parameters = ["strainLeafRatingStrainId" => $this->strainLeafRatingStrainId,
		"strainLeafRatingProfileId" => $this->strainLeafRatingProfileId];
		$statement->execute($parameters);
	}	//Delete

	/**
	 * Updates this Strain Leaf Rating in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) {
		//enforce the strainLeafRating is not null (i.e. don't update a strain leaf rating that hasn't been inserted)
		if($this->strainLeafRatingRating === null)	{
			throw(new \PDOException("unable to update strain leaf rating that does not exist"));}
		// create query template
		$query = "UPDATE strainLeafRating SET strainLeafRatingRating = :strainLeafRatingRating AND strainLeafRatingStrainId = :strainLeafRatingStrainId AND strainLeafRatingProfileId = :strainLeafRatingProfileId WHERE strainLeafRatingRating = :strainLeafRatingRating";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["strainLeafRatingRating" => $this->strainLeafRatingRating, "strainLeafRatingStrainId" => $this->strainLeafRatingStrainId, "strainLeafRatingProfileId" => $this->strainLeafRatingProfileId];
		$statement->execute($parameters);
	}//update

	/**
	 * This function retrieves an array of Strain Leaf Ratings by Strain Leaf Rating Rating
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param  \int $strainLeafRatingRating strain leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $strainLeafRatingRating is not an integer
	 * @throws \RangeException when $strainLeafRatingRating is too long
	 * @throws \PDOException
	 * @return null | \SplFixedArray array of Dispensaries with the same $strainLeafRatingRating or null if not found
	 */

	public static function getStrainLeafRatingByStrainLeafRatingRating(\PDO $pdo, int $strainLeafRatingRating) {
		//  check validity of $strainLeafRating
		$strainLeafRatingRating = filter_var($strainLeafRatingRating, FILTER_SANITIZE_NUMBER_INT);

		if($strainLeafRatingRating <= 0 || $strainLeafRatingRating > 5) {
			throw(new \RangeException("Strain Leaf Rating is not valid."));
		}
		if($strainLeafRatingRating === null) {
			throw(new \RangeException("Strain name does not exist."));
		}
		// prepare query
		$query = "SELECT strainLeafRatingRating, strainLeafRatingStrainId, strainLeafRatingProfileId FROM strainLeafRating WHERE strainLeafRatingRating = :strainLeafRatingRating";
		$statement = $pdo->prepare($query);
		$parameters = array("strainLeafRating" => $strainLeafRatingRating);
		$statement->execute($parameters);

		//  build an array of dispensaries based on strainLeafRating
		$strainLeafRatings = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try{
				$strainLeafRating = new StrainLeafRating($row["strainLeafRatingRating"], $row["strainLeafRatingStrainId"], $row["strainLeafRatingProfileId"]);
				$strainLeafRatings[$strainLeafRatings->key()] = $strainLeafRating;
				$strainLeafRatings->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($strainLeafRatings);

	}  // get by StrainLeafRatingRating

	/**
	 * This function retrieves a Strain Leaf Rating by Strain Leaf Rating Strain Id
	 *
	 * @param \PDO $pdo PDO connection
	 * @param  \int strainLeafRatingStrainId strain leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $strainLeafRatingStrainId is not an integer
	 * @throws \RangeException when $strainLeafRatingStrainId is not an int
	 * @throws \PDOException
	 * @return null | \SplFixedArray $strainLeafRatings
	 */

	public static function getStrainLeafRatingByStrainLeafRatingStrainId(\PDO $pdo, $strainId) {
		//  check validity of $strainId
		$strainLeafRatingStrainId = filter_var($strainId, FILTER_SANITIZE_NUMBER_INT);

		if($strainLeafRatingStrainId <= 0) {
			throw(new \RangeException("Strain Leaf Rating Id is not valid."));
		}

		if($strainLeafRatingStrainId === null) {
			throw(new \InvalidArgumentException("Strain Leaf Rating does not exist."));
		}

		// prepare query
		$query = "SELECT strainLeafRatingRating, strainLeafRatingStrainId, strainLeafRatingProfileId FROM strainLeafRating WHERE strainLeafRatingStrainId = :strainLeafRatingStrainId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainLeafRatingStrainId" => $strainLeafRatingStrainId);
		$statement->execute($parameters);

		//  build an array of dispensaries based on strainLeafRatingStrainId
		$strainLeafRatings = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try{
				$strainLeafRating = new StrainLeafRating($row["strainLeafRatingRating"], $row["strainLeafRatingStrainId"], $row["strainLeafRatingProfileId"]);
				$strainLeafRatings[$strainLeafRatings->key()] = $strainLeafRating;
				$strainLeafRatings->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($strainLeafRatings);

	}  // get by StrainLeafRatingStrainId

	/**
	 * This function retrieves a strain Leaf Rating by strain Leaf Rating Profile Id
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int strainLeafRatingProfileId strain leaf ratings to be retrieved
	 * @throws \InvalidArgumentException when $strainLeafRatingProfileId is not an integer
	 * @throws \RangeException when $strainLeafRatingProfileId is not an valid integer
	 * @throws \PDOException
	 * @return null | \SplFixedArray $strainLeafRatings
	 */

	public static function getStrainLeafRatingByStrainLeafRatingProfileId(\PDO $pdo, $strainLeafRatingProfileId) {
		//  check validity of $strainName
		$strainLeafRatingProfileId = filter_var($strainLeafRatingProfileId, FILTER_SANITIZE_NUMBER_INT);

		if($strainLeafRatingProfileId <= 0) {
			throw(new \InvalidArgumentException("Strain Leaf Rating Profile Id is not valid."));
		}

		if($strainLeafRatingProfileId === null) {
			throw(new \RangeException("Strain Leaf Rating Profile Id does not exist."));
		}

		// prepare query
		$query = "SELECT strainLeafRatingRating, strainLeafRatingStrainId, strainLeafRatingProfileId FROM strainLeafRating WHERE strainLeafRatingProfileId = :strainLeafRatingProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainLeafRatingProfileId" => $strainLeafRatingProfileId);
		$statement->execute($parameters);

		//  build an array of dispensaries based on strainLeafRatingProfileId
		$strainLeafRatings = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try{
				$strainLeafRating = new StrainLeafRating($row["strainLeafRatingRating"], $row["strainLeafRatingStrainId"], $row["strainLeafRatingProfileId"]);
				$strainLeafRatings[$strainLeafRatings->key()] = $strainLeafRating;
				$strainLeafRatings->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($strainLeafRatings);
	}  // get by strainLeafRatingProfileId

	/**
	 * This function retrieves a strain Leaf Rating by strain Leaf Rating Strain Id and strain Leaf Rating Profile Id
	 *
	 * @param \PDO $pdo PDO connection
	 * @param  \int $strainLeafRatingRating strain leaf rating to be retrieved
	 * @param  \int $strainLeafRatingStrainId strain leaf rating strainId to be retrieved
	 * @param  \int $strainLeafRatingProfileId strain leaf rating profileId to be retrieved
	 * @throws \InvalidArgumentException when $strainLeafRatingStrainId and $strainLeafRatingProfileId are not integers
	 * @throws \RangeException when $strainLeafRatingStrainId and $strainLeafRatingProfileId are not integers
	 * @throws \PDOException
	 * @return null | $strainLeafRating
	 */

	public static function getStrainLeafRatingByStrainLeafRatingStrainIdAndStrainLeafRatingProfileId(\PDO $pdo, int $strainLeafRatingStrainId, int $strainLeafRatingProfileId) {

		$strainLeafRatingStrainId = filter_var($strainLeafRatingStrainId, FILTER_SANITIZE_NUMBER_INT);

		$strainLeafRatingProfileId = filter_var($strainLeafRatingProfileId, FILTER_SANITIZE_NUMBER_INT);

		if(empty($strainLeafRatingStrainId) || $strainLeafRatingStrainId <= 0) {
			throw(new \InvalidArgumentException("Strain Id or is not valid."));
		}

		if(empty($strainLeafRatingProfileId) || $strainLeafRatingProfileId <= 0) {
			throw(new \InvalidArgumentException("Profile Id or is not valid."));
		}

		// prepare query
		$query = "SELECT strainLeafRatingRating, strainLeafRatingStrainId, strainLeafRatingProfileId FROM strainLeafRating WHERE strainLeafRatingStrainId = :strainLeafRatingStrainId AND strainLeafRatingProfileId = :strainLeafRatingProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainLeafRatingStrainId" => $strainLeafRatingStrainId, "strainLeafRatingProfileId" => $strainLeafRatingProfileId);
		$statement->execute($parameters);

		//  setup results from query
		try {
			$strainLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$strainLeafRating = new StrainLeafRating($row["strainLeafRatingRating"], $row["strainLeafRatingStrainId"], $row["strainLeafRatingProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($strainLeafRating);
	}  // get by strainLeafRatingStrainId

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
