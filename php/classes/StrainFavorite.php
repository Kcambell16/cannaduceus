<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus strainFavorite class
 *
 * This is just one strainFavorite out of many that will be rated and catagorized
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class StrainFavorite{

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

	public function __construct(int $newStrainFavoriteProfileId = null, int $newStrainFavoriteStrainId) {
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

	public function getStrainFavoriteProfileId(): int {
		return $this->strainFavoriteProfileId;
	}

	/**
	 * mutator method for strainFavoriteProfileId
	 *
	 * @param int $newStrainFavoriteProfileId new value of strainFavoriteProfile Id
	 * @throws \UnexpectedValueException if $newStrainFavoriteProfileId is not an integer
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
	 * @throws \UnexpectedValueException if $newStrainFavoriteStrainId is not an integer
	 */
	public function setStrainFavoriteStrainId(int $newStrainFavoriteStrainId) {

		if($newStrainFavoriteStrainId <= 0) {
			throw(new \RangeException("Strain Favorite Strain Id is not a positive integer"));
		}

		//Convert and store the strainFavoriteStrainId
		$this->strainFavoriteStrainId = $newStrainFavoriteStrainId;
	}

	/**
	 * This function retrieves a strain favorite by strain favorite profile ID
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int $strainFavoriteProfileId -- strain favorite profile ID to be retrieved
	 * @throws \InvalidArgumentException when $strainFavoriteProfileId is not an integer
	 * @throws \RangeException when $strainFavoriteProfileId is not a positive
	 * @throws \PDOException
	 * @return null | strainFavorite
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
		$query = "SELECT strainFavoriteProfileId
					  FROM strain WHERE strainFavorite = :strainFavoriteProfileId, :strainFavoriteStrainId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainFavoriteProfileId" => $strainFavoriteProfileId);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$strainFavoriteProfileId = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$strainFavoriteProfileId = new strainFavorite ($row["$strainFavoriteProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($strainFavoriteProfileId);
	}  // getStrainFavoriteByStrainId



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
