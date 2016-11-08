<?php
namespace Edu\Cnm\nsanchez121\cannaduceus;
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
	public function __construct(int $newProfileId = null, string $newProfileUserName, string $newProfileEmail,  ) {
	}


}

	?>




