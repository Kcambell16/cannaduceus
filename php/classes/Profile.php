<?php
namespace Edu\Cnm\Cannaduceus;


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
	 * @var string $profileUserName
	 **/
	private $profileUserName;
	/**
	 * email for the profile
	 * @var string $profileEmail
	 **/
	private $profileEmail;
	/**
	 * this is the hash for the profile
	 * @var string $profileHash
	 **/
	private $profileHash;
	/**
	 * this is the salt for the profile
	 * @var string $profileSalt
	 **/
	private $profileSalt;
	/**
	 * this is the activation for the profile
	 * @var string $profileActivation
	 **/
	private $profileActivation;

	/**
	 * Constructor for the new profile
	 *
	 * @param int | null $newProfileId Id of this profile or null if new profile
	 * @param string $newProfileUserName the name of the profile
	 * @param string $newProfileEmail the email for the profile
	 * @param string $profileHash the hash for the profile
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
		} Catch(\InvalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgumentException->getMessage(), 0, $invalidArgumentException));
		} Catch(\RangeException $range) {
			// rethrow the exception to caller
			throw(new \RangeException($range->getMessage(), 0, $range));
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
	 * @param int|null $newProfileId new value of Profile Id
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newProfileId is not an integer
	 */
	public function setProfileId( int $newProfileId) {
		$newProfileId = filter_var($newProfileId);
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


	public function setProfileUserName( string $newProfileUserName) {
		$newProfileUserName = filter_input($newProfileUserName, FILTER_SANITIZE_STRING);
		if($newProfileUserName === false) {
			throw(new \UnexpectedValueException("Profile UserName not vaild"));
		}


		//Convert and store the Profile UserName
		$this->profileUserName = $newProfileUserName;
	}


	/**
	 * accessor method for Profile Email
	 *
	 * @return string for Profile Email
	 */
	public function getProfileEmail() {
		return $this->profileEmail;
	}

	/**
	 * mutator method for Profile Email
	 *
	 * @param string $newProfileEmail new sting of Profile Email
	 * @throws \UnexpectedValueException if $newProfileEmail is not a string
	 */

	public function setProfileEmail( string $newProfileEmail) {
		$newProfileEmail = filter_input($newProfileEmail, FILTER_SANITIZE_STRING);
		if($newProfileEmail === false)	{
			throw(new \UnexpectedValueException("Profile Email Invalid"));
		}


		//Convert and store the Profile
		$this->profileEmail = $newProfileEmail;
	}

	/**
	 * accessor method for Profile Hash
	 *
	 * @return int for Profile Hash
	 */
	public function getProfileHash() {
		return $this->profileHash;
	}
	/**
	 * mutator method for Profile Hash
	 *
	 * @param string $newProfileHash new string of Profile Hash
	 * @throws \UnexpectedValueException if $newProfileHash is not string
	 */
	public function setProfileHash(string $newProfileHash) {
		// verify the profile hash content
		$newProfileHash = trim($newProfileHash);
		$newProfileHash = strtolower($newProfileHash);
		if(ctype_xdigit($newProfileHash) === false)	{
			throw(new \UnexpectedValueException("Hash Invalid"));
		}
		// verify the profile hash content will fit in the database
		if(strlen($newProfileHash) !== 128) {
			throw(new \RangeException("hash content incorrect"));
		}
		//Convert and store the Profile Hash
		$this->profileHash = $newProfileHash;
	}

	/**
	 * accessor method for Profile Salt
	 *
	 * @return int for Profile Salt
	 */
	public function getProfileSalt() {
		return $this->profileSalt;
	}

	/**
	 * mutator method for Profile Salt
	 *
	 * @param string $newProfileSalt new string for Profile Salt
	 * @throws \UnexpectedValueException if $newProfileSalt is not a string
	 */
	public function setProfileSalt(string $newProfileSalt) {
		// verify the profile salt content
		$newProfileSalt = trim($newProfileSalt);
		$newProfileSalt = strtolower($newProfileSalt);
		if(ctype_xdigit($newProfileSalt)=== false)	{
			throw(new \UnexpectedValueException("salt content incorrect"));
		}
		//Convert and store the Profile Salt
		$this->profileSalt = $newProfileSalt;
	}
	/**
	 * accessor method for Profile Activation
	 *
	 * @return string for Profile Activation
	 */
	public function getProfileActivation() {
		return $this->profileActivation;
	}
	/**
	 * mutator method for Profile Activation
	 *
	 * @param string $newProfileActivation new string of Profile Activation
	 * @throws \UnexpectedValueException if $newProfileActivation is not string
	 */
	public function setProfileActivation(string $newProfileActivation) {
		// verify the profile activation content
		$newProfileActivation = trim($newProfileActivation);
		$newProfileActivation = strtolower($newProfileActivation);
		if(ctype_xdigit($newProfileActivation) === false)	{
			throw(new \UnexpectedValueException("activation content incorrect"));
		}

		//Convert and store the Profile Activation
		$this->profileActivation = $newProfileActivation;
	}

}






