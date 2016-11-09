<?php
/**
 * Created by PhpStorm.
 * User: Kcampbell
 * Date: 11/8/16
 * Time: 1:15 PM
 */

namespace Edu\Cnm\kcampbell16\cannaduceus;
/**
 * Cross section of cannaduceus dispensary class
 *
 * This is just one dispensary  out of many that will be reviewed and catagorized
 *
 * @author Kelly Campbell <kcampbell16@cnm.edu>
 *
 **/


class Dispensary {

	/**
	 * id for the strain; this is the primary key
	 * @var int $dispensaryId
	 **/
	private $dispensaryId;

	/**
	 * attention to specific dispensary
	 * @var string $dispensaryAttention
	 */
	private $dispensaryAttention;

	/**
	 * actual city of dispensary
	 * @var string $dispensaryCity
	 **/
	private $dispensaryCity;

	/**
	 * actual dispensary email address
	 * @var string $dispensaryEmail
	 **/
	private $dispensaryEmail;

	/**
	 * favorites for dispensary give by users
	 * @var int $dispensaryFavorite
	 **/
	private $dispensaryFavorite;

	/**
	 * actual name of dispensary
	 * @var string $dispensaryName
	 **/
	private $dispensaryName;

		/**
		 * phone number of specific dispensary
		 * @var int $dispensaryPhone
		 **/
		private $dispensaryPhone;

	/**
	 * actual street address for dispensary
	 * @var string $dispensaryStreet
	 **/
	private $dispensaryStreet;

	/**
	 * cross streets for dispensary
	 * @var string $dispensaryStreet1
	 **/
	private $dispensaryStreet1;

	/**
	 * actual URL/ web address for dispensary
	 * @var string $dispensaryUrl
	 **/private $dispensaryUrl;

		/**
		 * actual zip code for dispensary
		 * @var int $dispensaryZipCode
		 **/
		private $dispensaryZipCode;

	/**
	 * constructor for dispensary
	 *
	 * @param int|null $dispensaryId id of this Dispensay or null if a dispensary
	 * @param string $dispensaryAttention where dispensary is addressed
	 * @param string $dispensaryCity string actual city of dispensary
	 * @param string $dispensaryEmail string email of dispensary
	 * @param int $dispensaryFavorite rating of dispensary by user
	 * @param string $dispensaryName name of dispensary
	 * @param int $dispensaryPhone number of dispensary
	 * @param string $dispensaryStreet address of dispensary
	 * @param string $dispensaryStreet1 cross streets of dispensary for google plugin
	 * @param string $dispensaryUrl web address of dispensary
	 * @param int $dispensaryZipCode zip code of dispensary
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */
	/**
	 * @return string
	 */
	public function __construct(int $newDispensaryId = null, string $newDispensaryAttention, string $newDispensaryCity, string $newDispensaryEmail, int $newDispensaryFavorite, string $newDispensaryName, int $newDispensaryPhone, string $newDispensaryStreet, string $newDispensaryStreet1, string $newDispensaryUrl, int $newDispensaryZipCode) {
		try {
			$this->setDispensaryId($newDispensaryId);
			$this->dispensaryAttention($newDispensaryAttention);
			$this->dispensaryCity($newDispensaryCity);
			$this->dispensaryEmail($newDispensaryEmail);
			$this->dispensaryFavorite($newDispensaryFavorite);
			$this->dispensaryName($newDispensaryName);
			$this->dispensaryPhone($newDispensaryPhone);
			$this->dispensaryStreet($newDispensaryStreet);
			$this->dispensaryStreet1($newDispensaryStreet1);
		} catch(\InvalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgumentException->getCode(), 0, $invalidArgumentException));
		} catch(\RangeException $range) {
			//rethrow the exception to the caller
			throw(new \RangeException($range->getCode(), 0, $range));
		} catch(\TypeError $typeError){
			//rethrow the exception to the caller
			throw(new \TypeError($typeError->getCode(), 0, $typeError));
		}	catch(\TypeError $typeError) {

		}
	}

	/**
	 * accessor method for dispensary id
	 *
	 * @return  int/null value of dispensary id
	 **/
	public function getDispensaryId() {
		return($this->dispensaryId);
	}
	/**
	 * mutator method for dispensary id
	 *
	 * @param int/null $newDispensaryId new value of dispensary id
	 * @throws \RangeException if $newDispenaryId is not positive
	 * @throws \TypeError if $newDispensaryId is not an interger
	 **/
	public function setDispensaryId(int $newDispensaryId = null){
		// base case: if the dispensary id is null, this new dispensary without a mySQL assigned id (yet) if($newDispensaryId === null) {
				$this->dispensaryId = null;
				return;

	//verify the dispensary id is positive
	if($newDispensaryId <= 0) {
	throw(new \RangeException("dispensary id is not positive"));
}

	//convert and store the dispensary id
	$this->dispensaryId = $newDispensaryId;
}

/**
 * accessor method for the dispensary attention
 *
 * @return string value of the dispensary attention
 **/
public function getDispensaryAttention() {
	return($this->dispensaryAttention);
}

/**
 * mutator method for dispensary attention
 *
 * @param string $newdispensaryAttention new vlaue of dispensary attention
 * @throws \InvalidArgumentExceptionif $newdispensaryAttention is not a string or insecure
 * @throws \RangeException if $newdispensaryAttention is > 140 characters
 * @throws \TypeError if $newdispensaryAttention is not a string
 **/
public function setDispensaryAttention(string $newDispensaryAttention) {
	// verify the diespensary attention is secure
	$newDispensaryAttention = trim($newDispensaryAttention);
	$newDispensaryAttention = filter_var($newDispensaryAttention, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newDispensaryAttention) === true) {
	throw(new \InvalidArgumentException("dispensary attention is emprt or insecure"));
	}
	// verify the dispensary attention will fit in the database
	if(strlen($newDispensaryAttention) > 140) {
	throw(new \RangeException("dispensary attention too large"));
	}
	//store the dispensary attention
	$this->dispensaryAttention = $newDispensaryAttention;
}
/** accessor method for dispensary city
 *
 * @return string value of dispensary city
 **/
public function getDispensaryCity(): string {
	return $this->dispensaryCity;
}

/**
 * mutator method for dispensary city
 *
 * @param string $newdispensaryCity new vlaue of dispensary city
 * @throws \InvalidArgumentException if $newDispensaryCity is not a string or insecure
 * @throws \RangeException if $newDispensaryCity is > 140 characters
 * @throws \TypeError if $newDispensaryCity is not a string
 **/
	public function setDispensaryCity(string $newDispensaryCity) {
		//verify the city content is secure
		$newDispensaryCity = trim($newDispensaryCity);
		$newDispensaryCity = filter_var($newDispensaryCity, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newDispensaryCity) === true) {
			throw(new \InvalidArgumentException("dispensary city is empty or insecure"));
		}
	//verify the dispensary city will fit in the database
	if(strlen($newDispensaryCity) > 50) {
	throw(new \RangeException("dispensary city too large"));
}

//store the dispensary city
$this->dispensaryCity = $newDispensaryCity;
	}

	/** accessor method for dispensary email
	 *
	 * @return string value of dispensary email
	 **/
	public function getDispensaryEmail(): string {
		return $this->dispensaryEmail;
	}

	/**
	 * mutator method for dispensary email
	 *
	 * @param string $newDispensaryEmail new value of dispensary email
	 * @throws \InvalidArgumentException if $newDispensaryEmail is not a string or insecure
	 * @throws \RangeException if $newDispensaryEmail is > 250 characters
	 * @throws \TypeError if $newDispensaryEmail is not a string
	 **/
	public function setDispensaryEmail(string $newDispensaryEmail) {
		//verify the dispensary email is secure
		$newDispensaryEmail = trim($newDispensaryEmail);
		$newDispensaryEmail = filter_var($newDispensaryEmail,FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newDispensaryEmail) === true) {
			throw(new \InvalidArgumentException("dispensary email is empty or insecure"));
		}
		//verify the dispensary email is secure
		$newDispensaryEmail = trim($newDispensaryEmail);
		$newDispensaryEmail = filter_var($newDispensaryEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newDispensaryEmail) === true) {
			throw(new \InvalidArgumentException("dispensary email is empty or insecure"));
		}
		//verify the dispensary email will fit in the database
		if(strlen($newDispensaryEmail) > 250) {
			throw(new \RangeException("dispensary email too large"));
		}

		//store the email
		$this->dispensaryEmail = $newDispensaryEmail;
	}

	/** accessor method for dispensary favorite
	 *
	 * @return
	 **/