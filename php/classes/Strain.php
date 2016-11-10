<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus strain class
 *
 * This is just one strain out of many that will be reviewed and catagorized
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class Strain {

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

	public function __construct(int $newStrainId = null, string $newStrainName, string $newStrainType, float $newStrainThc, float $newStrainCbd, string $newStrainDescription) {
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
	 * @throws \UnexpectedValueException if $newStrainId is not an integer
	 */
	public function setStrainId(int $newStrainId) {
		$newStrainId = filter_var($newStrainId, FILTER_VALIDATE_INT);
		if($newStrainId <=0)	{
			throw(new \UnexpectedValueException("Strain Id is not a valid integer"));
		}

		//Convert and store the strain id
		$this->strainId = intval($newStrainId);
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
	 * @throws \UnexpectedValueException if $newStrainName is not a strain
	 */
	public function setStrainName($newStrainName) {
		$newStrainName = filter_input($newStrainName, FILTER_SANITIZE_STRING);
		if($newStrainName === false)	{
			throw(new \UnexpectedValueException("Strain Name not valid"));
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
	 * @param string $newStrainType new string of strain type
	 * @throws \UnexpectedValueException if $newStrainType is not a string
	 */
	public function setStrainType($newStrainType) {
		$newStrainType = filter_input($newStrainType, FILTER_SANITIZE_STRING);
		if($newStrainType === false)	{
			throw(new \UnexpectedValueException("Strain Type Invalid"));
		}

		//Convert and store the strain type
		$this->strainType = string($newStrainType);
	}

	/**
	 * accessor method for strain THC
	 *
	 * @return float for strain THC
	public function getStrainThc() {
		return $this->strainThc;
	}

	/**
	 * mutator method for strain THC
	 *
	 * @param float $newStrainThc new value of strain buyer premium
	 * @throws \UnexpectedValueException if $newStrainThc is not a float
	 */
	public function setStrainThc(float $newStrainThc) {
		$newStrainThc = filter_var($newStrainThc, FILTER_SANITIZE_STRING);
		if($newStrainThc === false)	{
			throw(new \UnexpectedValueException("Strain THC is not a valid integer"));
		}

		//Convert and store the strain buyer premium
		$this->strainThc = intval($newStrainThc);
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
	 * @param float $newStrainCbd new string of strain Cbd
	 * @throws \UnexpectedValueException if $newStrainCbd is not a string
	 */
	public function setStrainCbd(string $newStrainCbd) {
		$newStrainCbd = filter_input($newStrainCbd, FILTER_SANITIZE_STRING);
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
	 * @param string $newStrainDescription new string of strain payment
	 * @throws \UnexpectedValueException if $newStrainDescription is not a string
	 */
	public function setStrainDescription($newStrainDescription) {
		$newStrainDescription = filter_input($newStrainDescription, FILTER_SANITIZE_STRING);
		if($newStrainDescription === false) {
			throw(new \UnexpectedValueException("Strain Description Invalid"));
		}

		//Convert and store the strain description
		return $this->strainDescription;
	}
}
