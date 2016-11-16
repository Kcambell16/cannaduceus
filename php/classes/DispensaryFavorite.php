<?php
namespace Edu\Cnm\cannaduceus;

require_once ("autoload.php");
/**
 * this is going to be a cross section for the dispensary favorite info
 *
 * this is just one of the dispensary favorites out of the many that will be favorited
 *
 * @author Nathan A Sanchez (nsanchez121@cnm.edu)
 * @version
 */

class DispensaryFavorite implements \JsonSerializable {

	/**
	 * id for the DispensaryFavoriteProfileId this is the foreign keys used to make a primary key
	 * @var int $dispensaryFavoriteProfileId
	 */
	private $dispensaryFavoriteProfileId;

	/**
	 * id for the DispensaryFavoriteDispensaryId this is one of the foreign keys used to make a primary key
	 *
	 * @var int $dispensaryFavoritesDispensaryId
	 */
	private $dispensaryFavoriteDispensaryId;

	/** Constructor for the new dispensaryFavorite
	 *
	 * @param int | null $newDispensaryFavoriteId id of the profile from profile class
	 * @param int | null $newDispensaryFavoriteDispensaryId id of the dispensary from the dispensary class
	 * @throws \InvalidArgumentException if data types are not vaild
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newDispensaryFavoriteId = null, int $newDispensaryFavoriteDispensaryId) {
		try {
			$this->setDispensaryFavoriteProfileId($newDispensaryFavoriteId);
			$this->setDispensaryFavoriteDispensaryId($newDispensaryFavoriteDispensaryId);
		} Catch(\InvalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the calller
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
	 * accessor method for the dispensary Favorite Profile Id
	 *
	 * @return int|null value of dispensary Favorite Profile Id
	 */
	public function getDispensaryFavoriteProfileId(): int {
		return $this->dispensaryFavoriteProfileId;
	}

	/**
	 * mutator method for dispensaryFavoriteId
	 * @param int $newDispensaryFavoriteProfileId
	 * @internal param int|null $DispensaryFavoriteId new value of dispensary favorite
	 */


	public function setDispensaryFavoriteProfileId(int $newDispensaryFavoriteProfileId) {

		// base case: if the newDispensaryFavorite is null, this is a new favorite without a mySQL assigned to the ID
		if($newDispensaryFavoriteProfileId === null) {
			$this->dispensaryFavoriteProfileId = null;
			return;
		}
		// validate that the new dispensaryFavoriteProfileId is an integer
		$newDispensaryFavoriteProfileId = filter_var($newDispensaryFavoriteProfileId);
		if($newDispensaryFavoriteProfileId === false) {
			throw(new \UnexpectedValueException("dispensary Favorite Profile Id is not a vaild interger"));
		}

		//Convert and store the dispensaryFavoriteProfileId
		$this->dispensaryFavoriteProfileId = intval($newDispensaryFavoriteProfileId);
	}

	/**
	 * accessor method for dispensaryFavoriteDispensaryId
	 *
	 * @return int|null value of dispensaryFavoriteDispensaryId
	 */
	public function getDispensaryFavoriteDispensaryId(): int {
		return $this->dispensaryFavoriteDispensaryId;
	}

	/**
	 * mutator method for dispensaryFavoriteDispensaryId
	 *
	 * @param int $newDispensaryFavoriteDispensaryId new value of dispensaryFavoriteDispensaryId
	 * @throws \UnexpectedValueException if $newDispensaryFavoriteDispensaryId is not an integer
	 */
	public function setDispensaryFavoriteDispensaryId($newDispensaryFavoriteDispensaryId) {
		$newDispensaryFavoriteDispensaryId = filter_input($newDispensaryFavoriteDispensaryId, FILTER_SANITIZE_STRING);
		if($newDispensaryFavoriteDispensaryId === false) {
			throw(new \UnexpectedValueException("Dispensary Favorite Dispensary Id not a vaild integer"));
		}


		//Convert and store the dispensaryFavoriteDispensaryId
		$this->dispensaryFavoriteDispensaryId = $newDispensaryFavoriteDispensaryId;
	}

	/**
	 * inserts this Dispensary Favorite into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is to a PDO connection object
	 */
	public function insert(\PDO $pdo) {
		// enforce the dispensaryFavoriteProfileId is null (i.e., don't insert a favorite that already exists)
		if($this->dispensaryFavoriteProfileId !== null) {
			throw(new\PDOException("not a new profile"));
		}

		// create query template
		$query = "INSERT INTO dispensaryFavorite(dispensaryFavoriteProfileId, dispensaryFavoriteDispensaryId) VALUES(:dispensaryFavoriteProfileId, :dispensaryFavoriteDispensaryId)";


		//prepare is used as an extra means of security
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder slots in the template. putting these into an array
		$parameters = ["dispensaryFavoriteProfileId" => $this->dispensaryFavoriteProfileId, "dispensaryFavoriteDispensaryId" => $this->dispensaryFavoriteDispensaryId];


		//execute the command held in $statement
		$statement->execute($parameters);

		//update the null dispensaryFavoriteProfileId. Ask mySQL for the primary key value it assigned to this entry
		$this->dispensaryFavoriteProfileId = intval($pdo->lastInsertId());


	}// insert

	/**
	 * deletes this favorite from the mySQL database
	 * @param \PDO $pdo Pdo connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//first check to make sure the dispensaryFavoriteProfileId isn't null, cant delete something that hasn't been entered into SQL yet
		if($this->dispensaryFavoriteProfileId === null) {
			throw(new \PDOException("The profile you selected does not exist"));
		}

		//create the query template
		$query = "DELETE FROM dispensaryFavorite WHERE dispensaryFavoriteProfileId = :dispensaryFavoriteProfileId";
		// prepare is used as an extra means of security
		$statement = $pdo->prepare($query);


		//bind parameters and execute the function
		$parameters = ["dispensaryFavoriteProfileId" => $this->dispensaryFavoriteProfileId];

		//execute the command held in $statement
		$statement->execute($parameters);
	}// delete

	/**
	 * This function retrieves a dispensary favorite by dispensary favorite profile ID
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int $dispensaryFavoriteProfileId -- dispensary favorite profile ID to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryFavoriteProfileId is not an integer
	 * @throws \RangeException when $dispensaryFavoriteProfileId is not a positive
	 * @throws \PDOException
	 * @return \SplFixedArray of all dispensaryFavorites by profile id
	 */

	public static function getDispensaryFavoriteByDispensaryFavoriteProfileId(\PDO $pdo, $dispensaryFavoriteProfileId) {
		//  check validity of $dispensaryId
		$dispensaryFavoriteProfileId = filter_var($dispensaryFavoriteProfileId, FILTER_VALIDATE_INT);
		if($dispensaryFavoriteProfileId === false) {
			throw(new \InvalidArgumentException("Favorite Dispensary Profile id is not an integer."));
		}
		if($dispensaryFavoriteProfileId <= 0) {
			throw(new \RangeException("Dispensary Favorite id is not positive."));
		}
		// prepare query
		$query = "SELECT dispensaryFavoriteProfileId, dispensaryFavoriteDispensaryId FROM dispensaryFavorite WHERE dispensaryFavoriteProfileId = :dispensaryFavoriteProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryFavoriteProfileId" => $dispensaryFavoriteProfileId);
		$statement->execute($parameters);

		// create an SplFixedArray to hold all results
		$favorites = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$favorite = new DispensaryFavorite($row["dispensaryFavoriteProfileId"], $row["dispensaryFavoriteDispensaryId"]);
				$favorites[$favorites->key()] = $favorite;
				$favorites->next();
			} catch(\Exception $exception) {
				// throw exception here
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($favorites);

	}  // getDispensaryFavoriteByDispensaryId

	/**
	 * This function retrieves a dispensary favorite by dispensary favorite dispensary ID
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int $dispensaryFavoriteDispensaryId -- dispensary favorite dispensary ID to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryFavoriteDispensaryId is not an integer
	 * @throws \RangeException when $dispensaryFavoriteDispensaryId is not a positive
	 * @throws \PDOException
	 * @return \SplFixedArray of all dispensaryFavorites by dispensary id
	 */

	public static function getDispensaryFavoriteByDispensaryFavoriteDispensaryId(\PDO $pdo, $dispensaryFavoriteDispensaryId) {
		//  check validity of $dispensaryId
		$dispensaryFavoriteDispensaryId = filter_var($dispensaryFavoriteDispensaryId, FILTER_VALIDATE_INT);
		if($dispensaryFavoriteDispensaryId === false) {
			throw(new \InvalidArgumentException("Favorite Dispensary Dispensary id is not an integer."));
		}
		if($dispensaryFavoriteDispensaryId <= 0) {
			throw(new \RangeException("Dispensary Favorite Dispensary id is not positive."));
		}
		// prepare query
		$query = "SELECT dispensaryFavoriteDispensaryId, dispensaryFavoriteDispensaryId FROM dispensaryFavorite WHERE dispensaryFavoriteDispensaryId = :dispensaryFavoriteDispensaryId";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryFavoriteDispensaryId" => $dispensaryFavoriteDispensaryId);
		$statement->execute($parameters);

		// create an SplFixedArray to hold all results
		$favorites = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$favorite = new DispensaryFavorite($row["dispensaryFavoriteProfileId"], $row["dispensaryFavoriteDispensaryId"]);
				$favorites[$favorites->key()] = $favorite;
				$favorites->next();
			} catch(\Exception $exception) {
				// throw exception here
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($favorites);
	} //Gets Dispensary Favorite by Dispensary Favorite Dispensary Id

	/**
	 * This function retrieves a dispensary favorite by DispensaryFavoriteDispensary ID and DispensaryFavoriteProfile ID
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int $dispensaryFavoriteDispensaryId and $dispensaryFavoriteProfileId -- $dispensaryFavorite to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryFavoriteDispensaryId and $dispensaryFavoriteProfileId are not integers
	 * @throws \RangeException when $dispensaryFavoriteDispensaryId and $dispensaryFavoriteProfileId are not positive
	 * @throws \PDOException
	 * @return null | $dispensaryFavorite
	 */

	public static function getDispensaryFavoriteByDispensaryFavoriteDispensaryIdAndDispensaryFavoriteProfileId(\PDO $pdo, $dispensaryFavoriteDispensaryId, $dispensaryFavoriteProfileId) {
		//  check validity of $dispensaryFavorite
		$dispensaryFavorite = filter_var($dispensaryFavoriteDispensaryId, $dispensaryFavoriteProfileId, FILTER_VALIDATE_INT);
		if($dispensaryFavorite === false) {
			throw(new \InvalidArgumentException("Dispensary Favorite Dispensary Id and Dispensary Favorite Profile Id are not integers."));
		}
		if($dispensaryFavorite <= 0) {
			throw(new \RangeException("Dispensary Favorite is Invalid."));
		}
		// prepare query
		$query = "SELECT dispensaryFavoriteDispensaryId, dispensaryFavoriteProfileId FROM dispensaryFavorite WHERE ($dispensaryFavorite = :dispensaryFavoriteDispensaryId, :dispensaryFavoriteProfileId)";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryFavorite" => $dispensaryFavorite);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$dispensaryFavorite = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryFavorite = new dispensaryFavorite($row["dispensaryFavoriteDispensaryId"], $row["dispensaryFavoriteProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($dispensaryFavorite);
	}  // getDispensaryByDispensaryId

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 */
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		unset($fields["profileHash"]);
		unset($fields["profileSalt"]);
		return ($fields);
	}



}
