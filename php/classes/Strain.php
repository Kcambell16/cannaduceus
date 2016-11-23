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
	 * @param float $newStrainThc string of strain THC content
	 * @param float $newStrainCbd string of strain CBD content
	 * @param string $newStrainDescription string of strain description
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainId = null,
										 string $newStrainName,
										 string $newStrainType,
										 float $newStrainThc,
										 float $newStrainCbd,
										 string $newStrainDescription) {
		try {
			$this->setStrainId($newStrainId);
			$this->setStrainName($newStrainName);
			$this->setStrainType($newStrainType);
			$this->setStrainThc($newStrainThc);
			$this->setStrainCbd($newStrainCbd);
			$this->setStrainDescription($newStrainDescription);
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
	 * @param int $newStrainId new value of Strain Id
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
	 * @throws \UnexpectedValueException if $newStrainType is not a string
	 */
	public function setStrainType(string $newStrainType) {
		$newStrainType = filter_var($newStrainType, FILTER_SANITIZE_STRING);
		if($newStrainType === false) {
			throw(new \UnexpectedValueException("Strain Type Invalid"));
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
		$newStrainThc = filter_var($newStrainThc, FILTER_SANITIZE_NUMBER_FLOAT);
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
	 * @throws \UnexpectedValueException if $newStrainCbd is not a string
	 * @return float strainCbd
	 */
	public function setStrainCbd(float $newStrainCbd) {
		$newStrainCbd = filter_var($newStrainCbd, FILTER_SANITIZE_NUMBER_FLOAT);
		if($newStrainCbd === false) {
			throw(new \UnexpectedValueException("Strain Cbd Invalid"));
		}

		//Convert and store the strain Cbd
		return $this->strainCbd;
	}

	/**
	 * accessor method for strain description
	 *
	 * @return string for strain description
	 */
	public function getStrainDescription() {
		return $this->strainDescription;
	}

	/**
	 * mutator method for strain description
	 *
	 * @param \string $newStrainDescription new string of strain payment
	 * @throws \UnexpectedValueException if $newStrainDescription is not a string
	 * @return \string $newStrainDescription
	 */
	public function setStrainDescription(string $newStrainDescription) {
		$newStrainDescription = filter_var($newStrainDescription, FILTER_SANITIZE_STRING);
		if($newStrainDescription === false) {
			throw(new \UnexpectedValueException("Strain Description Invalid"));
		}

		//Convert and store the strain description
		return $this->strainDescription;
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
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \string $strainName -- strain name to be retrieved
	 * @throws \InvalidArgumentException when $strainName is not a string
	 * @throws \RangeException when $strainName is too long
	 * @throws \PDOException
	 * @return null | Strain
	 */

	public static function getStrainByStrainName(\PDO $pdo, $strainName) {
		//  check validity of $strainName
		$strainName = filter_var($strainName, FILTER_SANITIZE_STRING);
		if($strainName === false) {
			throw(new \InvalidArgumentException("Strain Name is not valid."));
		}
		if($strainName === null) {
			throw(new \RangeException("Strain name does not exist."));
		}
		// prepare query
		$query = "SELECT strainId, strainName, strainType,
                        strainThc, strainCbd, strainDescription
					  FROM strain WHERE strainName = :strainName";
		$statement = $pdo->prepare($query);
		$parameters = array("strainName" => $strainName);
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
	}  // getStrainByStrainName

	/**
	 * This function retrieves a strain by strain type
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \string $strainType -- strain type to be retrieved
	 * @throws \InvalidArgumentException when $strainType is not a string
	 * @throws \RangeException when $strainType is too long
	 * @throws \PDOException
	 * @return null | Strain
	 */

	public static function getStrainByStrainType(\PDO $pdo, $strainType) {
		//  check validity of $strainName
		$strainType = filter_var($strainType, FILTER_SANITIZE_STRING);
		if($strainType === false) {
			throw(new \InvalidArgumentException("Strain Type is not valid."));
		}
		if($strainType === null) {
			throw(new \RangeException("Strain type does not exist."));
		}
		// prepare query
		$query = "SELECT strainId, strainName, strainType,
                        strainThc, strainCbd, strainDescription
					  FROM strain WHERE strainType = :strainType";
		$statement = $pdo->prepare($query);
		$parameters = array("strainType" => $strainType);
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
	}  // getStrainByStrainType

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
