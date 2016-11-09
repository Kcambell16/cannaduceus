<?php
namespace Edu\Cnm\nsanchez121\cannaduceus;
use MongoDB\Driver\Exception\UnexpectedValueException;

/**
 * this is going to be the cross section for profile info
 *
 *this is just one profile out of the many that will be made.
 * @author Nathan A Sanchez (nsanchez121@cnm.edu)
 * @version 1.0.0
 **/

class Profile {

	/**
	 * id for the profile; this is the primary key
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 *name of the profile;
	 * @var int $stingUserName
	 **/
	private $profileUserName;
	/**
	 * email for the profile
	 * @var int $stringEmail
	 **/
	private $profileEmail;
	/**
	 * this is the hash for the profile
	 * @var $stingHash
	 * ask dylan about how to do this better
	 **/
	private $profileHash;
	/**
	 * this is the salt for the profile
	 * @var $stingSalt
	 **/
	private $profileSalt;
	/**
	 * this is the activation for the profile
	 * @var $stingactivation
	 **/
	private $profileActivation;

	/**
	 * Constructor for the new profile
	 *
	 * @param int | null $newProfileId Id of this profile or null if new profile
	 * @param string $newProfileUserName the name of the profile
	 * @param string $newProfileEmail the email for the profile
	 * @param string $profileHash the hash for the profile (again not sure if this is the way to handle hash/salt ask dylan)
	 * @param string $profileActivation the activation for the profile
	 * @param string $profileSalt the salt for the profile
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newProfileId = null, string $newProfileUserName, string $newProfileEmail, string $newProfileHash, $newProfileSalt, $newProfileActivation) {

		try {
			$this->setProfileId($newProfileId);
			$this->setProfileUserName($newProfileUserName);
			$this->setProfileEmail($newProfileEmail);
			$this->setProfileHash($newProfileHash);
			$this->setProfileSalt($newProfileSalt);
			$this->setProfileActivation($newProfileActivation);
		} Catch(\invalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgumentException->getMessage(), 0, $invalidArgumentException));
		} Catch(\RangeException $range) {
			// rethrow the exception to caller
			throw(new \RangeException($range->getMessage(), 0, range));
		} Catch(\TypeError $typeError) {
			// rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} Catch(\Exception $exception) {
			// rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for Profile Id
	 *
	 * @return int|null value of Profile Id
	 */
	public function getProfileId() {
		return $this->profileId;
	}

	/**
	 * mutator method for Profile Id
	 *
	 * @param int $newProfileId new value of Profile Id
	 * @throws /UnexpectedValueException if $newProfileId is not an integer
	 */
	public function setProfileId($newProfileId) {
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		if($newProfileId === false) {
			throw(new \UnexpectedValueException("Profile Id is not a vaild integer"));
		}


		//Convert and store the profile Id
		$this->ProfileId = intval($newProfileId);
	}


	/**
	 * accessor method for Profile UserName
	 *
	 * @return string of Profile UserName
	 */
	public function getProfileUserName() {
		return $this->profileUserName;
	}

	/**
	 * mutator method for Profile UserName
	 *
	 * @param string $newProfileUserName new binary of Profile UserName
	 * @throws /UnexpectedValueException if $newProfileUserName is not a binary
	 */


	public function setProfileUserName($newProfileUserName) {
		$newProfileUserName = filter_input($newProfileUserName, FILTER_SANITIZE_STRING);
		if($newProfileUserName === false) {
			throw(new \UnexpectedValueException("Profile UserName not vaild"));
		}


		//Convert and store the Profile UserName
		$this->profileUserName = string($newProfileUserName);
	}


	/**
	 * accessor method for Profile Email
	 *
	 * @return string for Profile Email
	 */
	public function getProfileEmail() {
		return $this->ProfileEmail;
	}

	/**
	 * mutator method for Profile Email
	 *
	 * @param string $newProfileEmail new sting of Profile Email
	 * @throws \UnexpectedValueException if $newProfileEmail is not a string
	 */

	public function setProfileEmail($newProfileEmail) {
		$newProfileEmail = filter_input($newProfileEmail, FILTER_SANITIZE_STRING);
		if($newProfileEmail === false)	{
			throw(new \UnexpectedValueException("Profile Email Invalid"));
		}


		//Convert and store the Profile
		$this->profileEmail = string($newProfileEmail);
	}

	/**
	 * accessor method for Profile Hash
	 *
	 * @return int for Profile Hash
	 */
	public function getProfileHash() {
		return $this->getProfileHash;
	}
	/**
	 * mutator method for Profile Hash
	 *
	 * @param string $newProfileHash new string of Profile Hash
	 * @throws \UnexpectedValueException if $newProfileHash is not string
	 */
	public function setProfileHash($newProfileHash) {
		$newProfileHash = filter_input($newProfileHash, FILTER_SANITIZE_STRING);
		if($newProfileHash === false)	{
			throw(new \UnexpectedValueException("Hash Invalid"));
		}

		//Convert and store the Profile Hash
		$this->profileHash = string($newProfileHash);
	}

	}




