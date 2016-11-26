<?php
namespace Edu\Cnm\Cannaduceus;

require_once(dirname(__DIR__) . "/classes/autoload.php");
/**
 * Cross section of cannaduceus strain class
 *
 * This is just one strain out of many that will be reviewed and catagorized
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class Strain implements \JsonSerializable {

	/**
	 * id for the strain; this is the primary key
	 * @var int $strainId
	 **/
	private $strainId;

	/**
	 * name of the strain;
	 * @var string $strainName
	 **/
	private $strainName;

	/**
	 *type of strain indica, sativa, or hybrid;
	 * @var string $strainType
	 **/
	private $strainType;

	/**
	 *strain THC content;
	 * @var float $strainThc
	 **/
	private $strainThc;

	/**
	 *strain CBD content;
	 * @var float $strainCbd
	 **/
	private $strainCbd;

	/**
	 *strain Description gives info about the strain
	 * @var string $strainDescription
	 **/
	private $strainDescription;

	/** Constructor for new strain
	 *
	 * @param int | null $newStrainId id of this strain or null if a new strain
	 * @param string $newStrainName the name of the strain
	 * @param string $newStrainType Sativa, Indica, Hybrid or null if a new strain
	 * @param float $newStrainThc string of new strain THC content
	 * @param float $newStrainCbd string of new strain CBD content
	 * @param string $newStrainDescription string of new strain description
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainId = null, string $newStrainName, string $newStrainType, float $newStrainThc, float $newStrainCbd, string $newStrainDescription) {
		try {
			$this->setStrainId($newStrainId);
			$this->setStrainName($newStrainName);
			$this->setStrainType($newStrainType);
			$this->setStrainThc($newStrainThc);
			$this->setStrainCbd($newStrainCbd);
			$this->setStrainDescription($newStrainDescription);
		} Catch(\InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
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
	 * accessor method for strain id
	 *
	 * @return int|null value of strain id
	 */
	public function getStrainId() {
		return $this->strainId;
	}

	/**
	 * mutator method for strain id
	 *
	 * @param int|null $newStrainId new value of Strain Id
	 * @throws \RangeException if $newStrainId is not positive
	 * @throws \TypeError if $newStrainId is not an integer
	 */
	public function setStrainId(int $newStrainId = null) {
		if($newStrainId === null) {
			$this->strainId = null;
			return;
		}
		if($newStrainId <= 0) {
			throw(new \RangeException("Strain Id is not a valid integer"));
		}

		//Convert and store the strain id
		$this->strainId = $newStrainId;
	}


	/**
	 * accessor method for strain name
	 *
	 * @return string of strain name
	 */
	public function getStrainName() {
		return $this->strainName;
	}

	/**
	 * mutator method for strain name
	 *
	 * @param string $newStrainName new strain name
	 * @throws \InvalidArgumentException if $newStrainName is empty or insecure
	 */
	public function setStrainName(string $newStrainName) {
		$newStrainName = trim($newStrainName);
		$newStrainName = filter_var($newStrainName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newStrainName)) {
			throw(new \InvalidArgumentException("Strain Name not valid"));
		}

		//Convert and store the strain name
		$this->strainName = ($newStrainName);
	}


	/**
	 * accessor method for strain type
	 *
	 * @return string for strain type
	 */
	public function getStrainType() {
		return $this->strainType;
	}

	/**
	 * mutator method for strain type
	 *
	 * @param \string $newStrainType new string of strain type
	 * @throws \InvalidArgumentException if $newStrainType is not Indica, Sativa, or Hybrid
	 */
	public function setStrainType(string $newStrainType) {
		$validStrainTypes = array("Sativa", "Indica", "Hybrid");

		// if $newStrainType is not in array, throw exception
		if (!in_array($newStrainType, $validStrainTypes, true)){
			throw(new \InvalidArgumentException("Type is not valid"));

		}

		//Convert and store the strain type
		$this->strainType = $newStrainType;
	}

	/**
	 * accessor method for strain THC
	 *
	 * @return float for strain THC
	 */
	public function getStrainThc() {
		return $this->strainThc;
	}

	/**
	 * mutator method for strain THC
	 *
	 * @param float $newStrainThc new value of strain buyer premium
	 * @throws \InvalidArgumentException if $newStrainThc is not a float
	 */
	public function setStrainThc(float $newStrainThc) {
		$newStrainThc = filter_var($newStrainThc, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		if(empty($newStrainThc)) {
			throw(new \InvalidArgumentException("Strain THC is not a valid integer"));
		}

		//Convert and store the strain buyer premium
		$this->strainThc = $newStrainThc;
	}

	/**
	 * accessor method for strain Cbd
	 *
	 * @return float for strain Cbd
	 */
	public function getStrainCbd() {
		return $this->strainCbd;
	}

	/**
	 * mutator method for strain Cbd
	 *
	 * @param \float $newStrainCbd new string of strain Cbd
	 * @throws \InvalidArgumentException if $newStrainCbd is not a float
	 * @return float strainCbd
	 */
	public function setStrainCbd(float $newStrainCbd) {
		$newStrainCbd = filter_var($newStrainCbd, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
		if($newStrainCbd === false) {
			throw(new \InvalidArgumentException("Strain Cbd Invalid"));
		}

		//Convert and store the strain Cbd
		return $this->strainCbd = $newStrainCbd;
	}

	/**
	 * accessor method for strain description
	 *
	 * @return string for strain description
	 */
	public function getStrainDescription() {
		return($this->strainDescription);
	}

	/**
	 * mutator method for strain description
	 *
	 * @param \string $newStrainDescription new value of strain description
	 * @throws \RangeException if $newStrainDescription is > 255 characters
	 * @throws \InvalidArgumentException if $newStrainDescription is not a string or insecure
	 * @throws \TypeError if $newStrainDescription is not a string
	 */
	public function setStrainDescription(string $newStrainDescription) {
		//verify the strain description is secure
		$newStrainDescription = filter_var($newStrainDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newStrainDescription) === true) {
			throw(new \UnexpectedValueException("Strain Description Invalid"));
		}

		//verify the strain description will fit in the database
		if(strlen($newStrainDescription) > 255) {
			throw (new \RangeException("Strain description too large"));
		}

		//Convert and store the strain description
		$this->strainDescription = $newStrainDescription;

	}

	/**
	 * inserts this Strain into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		// enforce the strainId is null (i.e., don't insert a strain that already exists)
		if($this->strainId !== null) {
			throw(new \PDOException("not a new strain"));
		}

		// create query template
		$query = "INSERT INTO strain(strainName, strainType, strainThc, strainCbd, strainDescription) VALUES(:strainName, :strainType, :strainThc, :strainCbd, :strainDescription)";
		$statement = $pdo->prepare($query);


		// bind the member variables to the place holders in the template
		$parameters = ["strainName" => $this->strainName, "strainType" => $this->strainType, "strainThc" => $this->strainThc, "strainCbd" => $this->strainCbd, "strainDescription" => $this->strainDescription];
		$statement->execute($parameters);

		// udate null strainId with what mySQL just gave us
		$this->strainId = intval($pdo->lastInsertId());

	}   // insert

	/**
	 * deletes this strain from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//enforce the strainId is not null (i.e., don't delete a strain that hasn't been inserted)
		if($this->strainId === null) {
			throw(new \PDOException("unable to delete a strain that does not exist"));
		}

		//Create Query Template
		$query = "DELETE FROM strain WHERE strainId = :strainId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holder in the template
		$parameters = ["strainId" => $this->strainId];
		$statement->execute($parameters);
	}	//Delete

	/**
	 * Updates this Strain in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) {
		//enforce the strainId is not null (i.e. don't update a strain that hasn't been inserted)
		if($this->strainId === null)	{
			throw(new \PDOException("unable to update strain that does not exist"));
		}//update

		// create query template
		$query = "UPDATE strain SET strainId = :strainId, strainName = :strainName, strainType = :strainType, strainThc = :strainThc, strainCbd = :strainCbd, strainDescription = :strainDescription WHERE strainId = :strainId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameteres = ["strainId" => $this->strainId, "strainName" => $this->strainName, "strainType" => $this->strainType, "strainThc" => $this->strainThc, "strainCbd" => $this->strainCbd, "strainDescription" => $this->strainDescription];
		$statement->execute($parameteres);
	}

	/**
	 * This function retrieves a strain by strain ID
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int $strainId -- strain ID to be retrieved
	 * @throws \InvalidArgumentException when $strainId is not an integer
	 * @throws \RangeException when $strainId is not positive
	 * @throws \PDOException
	 * @return null | Strain
	 */

	public static function getStrainByStrainId(\PDO $pdo, $strainId) {
		//  check validity of $strainId
		$strainId = filter_var($strainId, FILTER_VALIDATE_INT);
		if($strainId === false) {
			throw(new \InvalidArgumentException("Strain id is not an integer."));
		}
		if($strainId <= 0) {
			throw(new \RangeException("Strain id is not positive."));
		}
		// prepare query
		$query = "SELECT strainId, strainName, strainType,
                        strainThc, strainCbd, strainDescription
					  FROM strain WHERE strainId = :strainId";
		$statement = $pdo->prepare($query);
		$parameters = array("strainId" => $strainId);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$strain = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$strain = new Strain($row["strainId"], $row["strainName"], $row["strainType"], $row["strainThc"],
					$row["strainCbd"], $row["strainDescription"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($strain);
	}  // getStrainByStrainId

	/**
	 * This function retrieves a strain by strain name
	 *
	 * @param \PDO $pdo PDO connection
	 * @param  \string $strainName strain name search for
	 * @return \SplFixedArray SplFixedArray of strainNames found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */

	public static function getStrainByStrainName(\PDO $pdo, string $strainName) {
		//  sanitize the strain name before searching
		$strainName = trim($strainName);
		$strainName = filter_var($strainName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($strainName) === true) {
			throw(new \PDOException("Strain Name is Invalid"));
		}

		//create query template
		$query = "SELECT strainId, strainName, strainType, strainThc, strainCbd, strainDescription FROM strain WHERE strainName LIKE :strainName";
		$statement = $pdo->prepare($query);

		//bind the strainName content to the place holder in the template
		$strainName = "%$strainName%";
		$parameters = ["strainName" => $strainName];
		$statement->execute($parameters);

		//build an array of strainNames
		$strainNames = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$strain = new Strain($row["strainId"], $row["strainName"], $row["strainType"], $row["strainThc"], $row["strainCbd"], $row["strainDescription"]);
				$strainNames[$strainNames->key()] = $strain;
				$strainNames->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($strainNames);
	}
		// getStrainByStrainNames

	/**
	 * This function retrieves a strain by strain type
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Strains found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */

	public static function getStrainByStrainType(\PDO $pdo) {
		// prepare query template
		$query = "SELECT strainId, strainName, strainType,
                        strainThc, strainCbd, strainDescription
					  FROM strain";
		$statement = $pdo->prepare($query);
		$statement->execute();

		//  build an array of strains
			$strains = new \SplFixedArray($statement->rowCount());
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			while (($row = $statement->fetch()) !== false) {
			try {
				$strain = new Strain($row["strainId"], $row["strainName"], $row["strainType"], $row["strainThc"], $row["strainCbd"], $row["strainDescription"]);
			$strains [$strains->key()] = $strain;
			$strains->next();
			} catch(\Exception $exception) {
				//if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return \SplFixedArray::fromArray($strain);
	}


	/**
	 * this function retrieves all strains
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Strains found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getAllStrains(\PDO $pdo) {
		// prepare query
		$query = "SELECT strainId, strainName, strainType,
                        strainThc, strainCbd, strainDescription FROM strain ";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of strains
		$strains = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
			while(($row = $statement->fetch()) !== false){
				try {
						$strain = new Strain($row["strainId"],
							$row["strainName"],
							$row["strainType"],
							$row["strainThc"],
							$row["strainCbd"],
							$row["strainDescription"]);
						$strains[$strains->key()] = $strain;
						$strains->next();
					} catch(\Exception $exception) {
						//if the row couldn't be converted, rethrow it
						throw(new \PDOException($exception->getMessage(), 0, $exception));
					}
	}
		return ($strains);

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

} // Strain