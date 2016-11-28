<?php
namespace Edu\Cnm\cannaduceus;

require_once(dirname(__DIR__) . "/classes/autoload.php");
/**
 * Cross section of cannaduceus strainFavorite class
 *
 * This is just one strainFavorite out of many that will be rated and catagorized
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class StrainFavorite implements \JsonSerializable {

	/**
	 * id for the StrainFavoriteProfileId; this is one of the foreign keys used to make a primary key
	 * @var int $strainFavoriteProfileId
	 **/
	private $strainFavoriteProfileId;

	/**
	 * id for the StrainFavoriteStrainId; this is one of the foreign keys used to make a primary key
	 * @var int $strainFavoriteStrainId
	 **/
	private $strainFavoriteStrainId;

	/** Constructor for new strainFavorite
	 *
	 * @param int | null $newStrainFavoriteProfileId id of profile from profile class
	 * @param int | null $newStrainFavoriteStrainId id of the strain from the strain class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainFavoriteProfileId = null, int $newStrainFavoriteStrainId = null) {
		try {
			$this->setStrainFavoriteProfileId($newStrainFavoriteProfileId);
			$this->setStrainFavoriteStrainId($newStrainFavoriteStrainId);
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
	 * accessor method for strainFavoriteProfileId
	 *
	 * @return int|null value of strainFavoriteProfileId
	 */

	public function getStrainFavoriteProfileId(){
		return $this->strainFavoriteProfileId;
	}

	/**
	 * mutator method for strainFavoriteProfileId
	 *
	 * @param int $newStrainFavoriteProfileId new value of strainFavoriteProfile Id
	 * @throws \RangeException if $newStrainFavoriteProfileId is not an integer
	 */
	public function setStrainFavoriteProfileId(int $newStrainFavoriteProfileId) {


		if($newStrainFavoriteProfileId <= 0) {
			throw(new \RangeException("Strain Favorite Profile Id is not a positive integer"));
		}

		//Convert and store the strainFavoriteProfileId
		$this->strainFavoriteProfileId = $newStrainFavoriteProfileId;
	}

	/**
	 * accessor method for strainFavoriteStrainId
	 *
	 * @return int|null value of strainFavoriteStrainId
	 */
	public function getStrainFavoriteStrainId(): int {
		return $this->strainFavoriteStrainId;
	}

	/**
	 * mutator method for strainFavoriteStrainId
	 *
	 * @param int $newStrainFavoriteStrainId new value of strainFavoriteStrain Id
	 * @throws \RangeException if $newStrainFavoriteStrainId is not an integer
	 */
	public function setStrainFavoriteStrainId(int $newStrainFavoriteStrainId) {

		if($newStrainFavoriteStrainId <= 0) {
			throw(new \RangeException("Strain Favorite Strain Id is not a positive integer"));
		}

		//Convert and store the strainFavoriteStrainId
		$this->strainFavoriteStrainId = $newStrainFavoriteStrainId;
	}

	/**
	 * inserts this strainFavorite into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {

		// create query template
		$query = "INSERT INTO strainFavorite(strainFavoriteStrainId, strainFavoriteProfileId) VALUES(:strainFavoriteStrainId, :strainFavoriteProfileId)";

		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["strainFavoriteStrainId" => $this->strainFavoriteStrainId, "strainFavoriteProfileId" => $this->strainFavoriteProfileId];

		$statement->execute($parameters);

	}   // insert

	/**
	 * deletes this strainFavorite from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//enforce the strain favorite is not null (i.e., don't delete a strain favorite that hasn't been rated)
		if($this->strainFavoriteStrainId === null || $this->strainFavoriteProfileId === null) {
			throw(new \PDOException("unable to delete a strain favorite that does not exist"));
		}

		//Create Query Template
		$query = "DELETE FROM strainFavorite WHERE strainFavoriteProfileId = :strainFavoriteProfileId AND strainFavoriteStrainId = :strainFavoriteStrainId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holder in the template
		$parameters = ["strainFavoriteProfileId" => $this->strainFavoriteProfileId, "strainFavoriteStrainId" => $this->strainFavoriteStrainId];
		$statement->execute($parameters);
	}	//Delete

	/**
	 * This function retrieves a strain favorite by strain favorite profile ID
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int $strainFavoriteProfileId -- strain favorite profile ID to be retrieved
	 * @throws \InvalidArgumentException when $strainFavoriteProfileId is not an integer
	 * @throws \RangeException when $strainFavoriteProfileId is not a positive
	 * @throws \PDOException
	 * @throws \Exception
	 * @return \SplFixedArray of all strainFavorites by profile id
	 */

	public static function getStrainFavoriteByStrainFavoriteProfileId(\PDO $pdo, $strainFavoriteProfileId) {
		//  check validity of $strainId
		$strainFavoriteProfileId = filter_var($strainFavoriteProfileId, FILTER_VALIDATE_INT);
		if($strainFavoriteProfileId === false) {
			throw(new \InvalidArgumentException("Favorite Strain Profile id is not an integer."));
		}
		if($strainFavoriteProfileId <= 0) {
			throw(new \RangeException("Strain Favorite id is not positive."));
		}
		// prepare query
		$query = "SELECT strainFavoriteProfileId, strainFavoriteStrainId 
					  FROM strainFavorite WHERE strainFavoriteProfileId = :strainFavoriteProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainFavoriteProfileId" => $strainFavoriteProfileId);
		$statement->execute($parameters);

		// create an SplFixedArray to hold all results
		// look at getAllTweets example
		$favorites = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$favorite = new StrainFavorite($row["strainFavoriteProfileId"], $row["strainFavoriteStrainId"]);
				$favorites[$favorites->key()] = $favorite;
				$favorites->next();
			} catch(\Exception $exception) {
				// throw exception here
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($favorites);

	}  // getStrainFavoriteByProfileId

	/**
	 * This function retrieves a strain favorite by strain favorite strain ID
	 * @param \PDO $pdo -- a PDO connection
	 * @param  int $strainFavoriteStrainId -- strain favorite strain ID to be retrieved
	 * @throws \InvalidArgumentException when $strainFavoriteStrainId is not an integer
	 * @throws \RangeException when $strainFavoriteStrainId is not a positive
	 * @throws \PDOException
	 * @throws \Exception
	 * @return \SplFixedArray of all strainFavorites by strain id
	 */

	public static function getStrainFavoriteByStrainFavoriteStrainId(\PDO $pdo, $strainFavoriteStrainId) {
		//  check validity of $strainId
		$strainFavoriteStrainId = filter_var($strainFavoriteStrainId, FILTER_VALIDATE_INT);
		if($strainFavoriteStrainId === false) {
			throw(new \InvalidArgumentException("Favorite Strain Strain id is not an integer."));
		}
		if($strainFavoriteStrainId <= 0) {
			throw(new \RangeException("Strain Favorite Strain id is not positive."));
		}
		// prepare query
		$query = "SELECT strainFavoriteProfileId, strainFavoriteStrainId FROM strainFavorite WHERE strainFavoriteStrainId = :strainFavoriteStrainId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainFavoriteStrainId" => $strainFavoriteStrainId);
		$statement->execute($parameters);

		// create an SplFixedArray to hold all results
		// look at getAllTweets example
		$favorites = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$favorite = new StrainFavorite($row["strainFavoriteProfileId"], $row["strainFavoriteStrainId"]);
				$favorites[$favorites->key()] = $favorite;
				$favorites->next();
			} catch(\Exception $exception) {
				// throw exception here
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($favorites);
	} //Gets Strain Favorite by Strain Favorite Strain Id

	/**
	 * This function retrieves a strain favorite by StrainFavoriteStrain ID and StrainFavoriteProfile ID
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  int $strainFavoriteStrainId and $strainFavoriteProfileId -- $strainFavorite to be retrieved
	 * @param  int $strainFavoriteProfileId
	 * @throws \InvalidArgumentException when $strainFavoriteStrainId and $strainFavoriteProfileId are not integers
	 * @throws \RangeException when $strainFavoriteStrainId and $strainFavoriteProfileId are not positive
	 * @throws \PDOException
	 * @throws \Exception
	 * @return null | $strainFavorite
	 */

	public static function getStrainFavoriteByStrainFavoriteStrainIdAndStrainFavoriteProfileId(\PDO $pdo, int $strainFavoriteStrainId, int $strainFavoriteProfileId) {
		//  check validity of $strainFavorite

		if($strainFavoriteStrainId <= 0  && $strainFavoriteProfileId <= 0) {
			throw(new \RangeException("Strain Favorite ID or Strain Favorite Profile ID is Invalid."));
		}


		// prepare query
		$query = "SELECT strainFavoriteProfileId, strainFavoriteStrainId FROM strainFavorite WHERE strainFavoriteStrainId = :strainFavoriteStrainId AND strainFavoriteProfileId = :strainFavoriteProfileId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainFavoriteStrainId" => $strainFavoriteStrainId, "strainFavoriteProfileId" => $strainFavoriteProfileId);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$strainFavorite = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$strainFavorite = new strainFavorite($row["strainFavoriteProfileId"], $row["strainFavoriteStrainId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($strainFavorite);
	}  // getStrainByStrainId

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
