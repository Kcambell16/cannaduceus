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
	 *address of the strain selling the catalog of lots;
	 * @var string $strainAddress
	 **/
	private $strainAddress;

	/**
	 *buyer premium is the price on top of the selling price that the winner owes the "strain" who sold the lots;
	 * @var int $strainBuyerPremium
	 **/
	private $strainBuyerPremium;

	/**
	 *shipping policy is the shipping standards followed by the "strain"
	 * @var string $strainShippingPolicy
	 **/
	private $strainShippingPolicy;

	/**
	 *payment policy is the standard payment policy followed by the "strain" and is agreed to be followed by the user
	 * @var string $strainPaymentPolicy
	 **/
	private $strainPaymentPolicy;

	/** Constructor for new strain
	 *
	 * @param int | null $newstrainId id of this strain or null if a new strain
	 * @param string $newstrainLogo the image file of the strain logo
	 * @param int | null $newstrainBuyerPremium buyer premium amount or null if a new strain
	 * @param string $newstrainAddress string of strain address
	 * @param string $newstrainShippingPolicy string of strain shipping policy
	 * @param string $newstrainPaymentPolicy string of strain payment policy
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newstrainId = null, string $newstrainLogo, int $newstrainBuyerPremium, string $newstrainAddress, string $newstrainShippingPolicy, string $newstrainPaymentPolicy) {
		try {
			$this->setstrainId($newstrainId);
			$this->setstrainLogo($newstrainLogo);
			$this->setstrainBuyerPremium($newstrainBuyerPremium);
			$this->setstrainAddress($newstrainAddress);
			$this->setstrainShippingPolicy($newstrainShippingPolicy);
			$this->setstrainPaymentPolicy($newstrainPaymentPolicy);
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
	public function getstrainId() {
		return $this->strainId;
	}

	/**
	 * mutator method for strain Id
	 *
	 * @param int $newstrainId new value of strain Id
	 * @throws UnexpectedValueException if $newstrainId is not an integer
	 */
	public function setstrainId($newstrainId) {
		$newstrainId = filter_var($newstrainId, FILTER_VALIDATE_INT);
		if($newstrainId === false)	{
			throw(new UnexpectedValueException("strain Id is not a valid integer"));
		}

		//Convert and store the strain id
		$this->strainId = intval($newstrainId);
	}


	/**
	 * accessor method for strain logo
	 *
	 * @return string of strain logo
	 */
	public function getstrainLogo() {
		return $this->strainLogo;
	}

	/**
	 * mutator method for strain logo
	 *
	 * @param string $newstrainLogo new binary of strain logo
	 * @throws UnexpectedValueException if $newstrainLogo is not a binary
	 */
	public function setstrainLogo($newstrainLogo) {
		$newstrainLogo = filter_input($newstrainLogo, FILTER_SANITIZE_STRING);
		if($newstrainLogo === false)	{
			throw(new UnexpectedValueException("strain Logo not valid"));
		}

		//Convert and store the strain logo
		$this->strainLogo = string($newstrainLogo);
	}


	/**
	 * accessor method for strain address
	 *
	 * @return string for strain address
	 */
	public function getstrainAddress() {
		return $this->strainAddress;
	}

	/**
	 * mutator method for strain address
	 *
	 * @param string $newstrainAdress new string of strain address
	 * @throws UnexpectedValueException if $newstrainAddress is not a string
	 */
	public function setstrainAddress($newstrainAddress) {
		$newstrainAddress = filter_input($newstrainAddress, FILTER_SANITIZE_STRING);
		if($newstrainAddress === false)	{
			throw(new UnexpectedValueException("strain Address Invalid"));
		}

		//Convert and store the strain address
		$this->strainAddress = string($newstrainAddress);
	}

	/**
	 * accessor method for strain buyer premium
	 *
	 * @return int for strain buyer premium
	 */
	public function getstrainBuyerPremium() {
		return $this->strainBuyerPremium;
	}

	/**
	 * mutator method for strain buyer premium
	 *
	 * @param int $newstrainBuyerPremium new value of strain buyer premium
	 * @throws UnexpectedValueException if $newstrainBuyerPremium is not an integer
	 */
	public function setstrainBuyerPremium($newstrainBuyerPremium) {
		$newstrainBuyerPremium = filter_var($newstrainBuyerPremium, FILTER_VALIDATE_INT);
		if($newstrainBuyerPremium === false)	{
			throw(new UnexpectedValueException("strain Buyer Premium is not a valid integer"));
		}

		//Convert and store the strain buyer premium
		$this->strainBuyerPremium = intval($newstrainBuyerPremium);
	}

	/**
	 * accessor method for strain shipping policy
	 *
	 * @return string for strain shipping policy
	 */
	public function getstrainShippingPolicy() {
		return $this->strainShippingPolicy;
	}

	/**
	 * mutator method for strain shipping policy
	 *
	 * @param string $newstrainShippingPolicy new string of strain policy
	 * @throws UnexpectedValueException if $newstrainShippingPolicy is not a string
	 */
	public function setstrainShippingPolicy($newstrainShippingPolicy) {
		$newstrainShippingPolicy = filter_input($newstrainShippingPolicy, FILTER_SANITIZE_STRING);
		if($newstrainShippingPolicy === false) {
			throw(new UnexpectedValueException("strain Shipping Policy Invalid"));
		}

		//Convert and store the strain shipping policy
		return $this->strainShippingPolicy;
	}

	/**
	 * accessor method for strain payment policy
	 *
	 * @return string for strain payment policy
	 */
	public function getstrainPaymentPolicy() {
		return $this->strainPaymentPolicy;
	}

	/**
	 * mutator method for strain payment policy
	 *
	 * @param string $newstrainPaymentPolicy new string of strain payment
	 * @throws UnexpectedValueException if $newstrainPaymentPolicy is not a string
	 */
	public function setstrainPaymentPolicy($newstrainPaymentPolicy) {
		$newstrainPaymentPolicy = filter_input($newstrainPaymentPolicy, FILTER_SANITIZE_STRING);
		if($newstrainPaymentPolicy === false) {
			throw(new UnexpectedValueException("strain Payment Policy Invalid"));
		}

		//Convert and store the strain payment policy
		return $this->strainPaymentPolicy;
	}
}
