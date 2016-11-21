<?php
namespace Edu\Cnm\Cannaduceus;

require_once(dirname(__DIR__) . "/classes/autoload.php");
/**
 * this is going to be the cross section for profile info
 *
 *this is just one profile out of the many that will be made.
 * @author Nathan A Sanchez (nsanchez121@cnm.edu)
 * @version 1.0.0
 **/

class Profile implements \JsonSerializable {

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
	 * @param string $newProfileHash the hash for the profile
	 * @param string $newProfileActivation the activation for the profile
	 * @param string $newProfileSalt the salt for the profile
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newProfileId = null, string $newProfileUserName, string $newProfileEmail, string $newProfileHash, string $newProfileSalt, string $newProfileActivation) {

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
	public function setProfileId(int $newProfileId = null) {

		// base case: if the newProfileId is null, this is a new profile without a mySQL assigned ID
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}
		// validate that the new profileId is an integer
		// verify the tweet id is positive
		if($newProfileId <= 0) {
			throw(new \RangeException("profile id is not positive"));
		}



		//Convert and store the profile Id
		$this->profileId = intval($newProfileId);
	}


	/**
	 * accessor method for Profile UserName
	 *
	 * @return string of Profile UserName
	 */
	public function getProfileByProfileUserName() {
		return $this->profileUserName;
	}

	/**
	 * mutator method for Profile UserName
	 *
	 * @param string $newProfileUserName new binary of Profile UserName
	 * @throws /UnexpectedValueException if $newProfileUserName is not a binary
	 */


	public function setProfileUserName(string $newProfileUserName) {
		$newProfileUserName = trim($newProfileUserName);
		$newProfileUserName = filter_var($newProfileUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileUserName) === true) {
			throw(new \InvalidArgumentException("Profile needs a username"));
		}
		if (strlen($newProfileUserName) === true) {
			throw(new \RangeException("Profile needs a username"));
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

	public function setProfileEmail(string $newProfileEmail) {
		$newProfileEmail = filter_var($newProfileEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if($newProfileEmail === false) {
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
		if(ctype_xdigit($newProfileHash) === false) {
			throw(new \InvalidArgumentException("Hash Invalid"));
		}
		// verify the profile hash content will fit in the database
		if(strlen($newProfileHash) !== 128) {
			var_dump($newProfileHash);
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
		if(ctype_xdigit($newProfileSalt) === false) {
			throw(new \UnexpectedValueException("salt content incorrect"));
		}
		// verify salt is 64
		if(strlen($newProfileSalt)!==64 ){
			throw (new \RangeException("salt is not 64 characters"));
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
		if(ctype_xdigit($newProfileActivation) === false) {
			throw(new \UnexpectedValueException("activation content incorrect"));
		}

		//Convert and store the Profile Activation
		$this->profileActivation = $newProfileActivation;
	}

	/**
	 * inserts this Profile into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is to a PDO connection object
	 */
	public function insert(\PDO $pdo) {
		// enforce the profileId is null (i.e., don't insert a profile that already exists)
		if($this->profileId !== null) {
			throw(new\PDOException("not a new profile"));
		}

		// create query template
		$query = "INSERT INTO profile(profileUserName, profileEmail, profileHash, profileSalt, profileActivation) VALUES(:profileUserName, :profileEmail, :profileHash, :profileSalt, :profileActivation)";


		//prepare is used as an extra means of security
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder slots in the template. putting these into an array
		$parameters = ["profileUserName" => $this->profileUserName, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profileSalt" => $this->profileSalt, "profileActivation" => $this->profileActivation];


		//execute the command held in $statement
		$statement->execute($parameters);

		//update the null profileId. Ask mySQL for the primary key value it assigned to this entry
		$this->profileId = intval($pdo->lastInsertId());


	}// insert

	/**
	 * deletes this profile from the mySQL database
	 * @param \PDO $pdo Pdo connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//first check to make sure the profileId isn't null, cant delete something that hasn't been entered into SQL yet
		if($this->profileId === null) {
			throw(new \PDOException("The profile you selected does not exist"));
		}


		//create the query template
		$query = "DELETE FROM profile WHERE profileId = :profileId";
		// prepare is used as an extra means of security
		$statement = $pdo->prepare($query);


		//bind parameters and execute the function
		$parameters = ["profileId" => $this->profileId];

		//execute the command held in $statement
		$statement->execute($parameters);

	}// delete

	/**
	 * PDO statement to update this profile in mySQL
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */

	public function update(\PDO $pdo) {
		//ensure that this profile is not null (hasn't been entered into SQL). can't update something that doesn't exist
		if($this->profileId === null) {
			throw(new \PDOException("Can't update a profile that doesn't exist"));
		}

		//create a query template
		$query = "UPDATE profile SET profileUserName = :profileUserName, profileEmail = :profileEmail, profileHash = :profileHash, profileSalt = :profileSalt, profileActivation = :profileActivation WHERE profileId = :profileId";
		// prepare statement
		$statement = $pdo->prepare($query);

		//bind the variables to the template and execute the SQL command
		$parameters = ["profileId" => $this->profileId, "profileUserName" => $this->profileUserName, "profileEmail" => $this->profileEmail, "profileHash" => $this->profileHash, "profileSalt" => $this->profileSalt, "profileActivation" => $this->profileActivation];
		//execute
		$statement->execute($parameters);
	}



	/**
	 * @param \PDO $pdo
	 * @param int $profileId
	 * @return Profile|null
	 */

	public static function getProfileByProfileId(\PDO $pdo, int $profileId) {

		$profileId = filter_var($profileId);
		if($profileId === false) {
			throw(new \InvalidArgumentException("profile Id is not an integer."));
		}
		if($profileId <= 0) {
			throw(new \RangeException("Profile id is not positive"));
		}

		// prepare query
		$query = "SELECT profileId, profileUserName, profileEmail, profileHash, profileSalt, profileActivation FROM profile WHERE profileId = :profileId";

		$statement = $pdo->prepare($query);
		$parameters = array("profileId" => $profileId);
		$statement->execute($parameters);

		// setup results from query
			try {
				$profile = null;
				$statement->setFetchMode(\PDO:: FETCH_ASSOC);
				$row = $statement->fetch();
				if($row !== false) {
					$profile = new Profile($row["profileId"], $row["profileUserName"], $row["profileEmail"], $row["profileHash"], $row["profileSalt"], $row["profileActivation"]);
				}
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		return ($profile);
	} // getProfileByProfileId






















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






