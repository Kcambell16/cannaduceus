<?php
/**
 * Created by PhpStorm.
 * User: Kcampbell
 * Date: 11/8/16
 * Time: 1:15 PM
 */

namespace Edu\Cnm\Cannaduceus;
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

	/** accessor method for dispensary name
	 *
	 * @return string value of dispensary name
	 **/
	public function getDispensaryName() {
		return($this->dispensaryName);
	}

	/**
	 * mutator method for dispensary name
	 *
	 * @param string $newDispensaryName new value of dispensary name
	 * @throws \InvalidArgumentException if $newDispensaryName is not a string or insecure
	 * @throws \RangeException if $newDispensaryName is > 140 characters
	 * @throws \TypeError if $newDispensaryName is not a string
	 **/
	public function setDispensaryName(string $newDispensaryName) {
		//verify the dispensary name is secure
		$newDispensaryName = trim($newDispensaryName);
		$newDispensaryName = filter_var($newDispensaryName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newDispensaryName) === true) {
			throw(new \InvalidArgumentException("dispensary name is empty or insecure"));
		}
		//verify the dispensary email will fit in the database
		if(strlen($newDispensaryName) > 140) {
			throw(new \RangeException("dispensary email too large"));
		}

		//store dispensary name
		$this->dispensaryName = $newDispensaryName;
	}

/**
 *accessor method for dispensary phone
 *
 * @return int|null value of dispensary phone
 **/
public function getDispensaryPhone() {
	return($this->dispensaryPhone);
}
/**
 * mutator method for dispensary phone
 *
 * @param int/null $newDispensaryPhone new value of dispensary phone
 * @throws \RangeException if $newDispenaryPhone is not positive
 * @throws \TypeError if $newDispensaryPhone is not an interger
 **/
public function setDispensaryPhone(int $newDispensaryPhone = null) {
	// base case: if the dispensary phone, this is a new dispensary phone without a mySQL assigned id (yet)
	if($newDispensaryPhone === null) {
		$this->dispensaryPhone = null;
		return;
	}

	//verify the dispensary phone is positive
	if($newDispensaryPhone <= 0) {
		throw(new \RangeException("dispensary phone is not positive"));
	}

	// convert and store the dispensary phone
	$this->dispensaryPhone = $newDispensaryPhone;
}
/**
 * accessor method for dispensary street
 *
 * @return string value of dispensary street
 **/
public function getDispensaryStreet() {
	return($this->dispensaryStreet);
}

/**
 * mutator method for dispensary street
 *
 * @param string $newDispensaryStreet new value of dispensary street
 * @throws \InvalidArgumentException if $newDispensaryStreet is not a string or insecure
 * @throws \RangeException if $newDispensaryStreet is > 140 characters
 * @throws \TypeError if $newDispensaryStreet is not a string
 **/
	public function setDispensaryStreet(string $newDispensaryStreet) {
		//verify the street is secure
		$newDispensaryStreet = trim($newDispensaryStreet);
		$newDispensaryStreet = filter_var($newDispensaryStreet, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newDispensaryStreet) === true) {
			throw(new \RangeException("dispensary street is empty or insecure"));
		}
		// verify the dispensary street will fit in the database
		if(strlen($newDispensaryStreet) >140) {
			throw(new \RangeException("dispensary street too large"));
		}

		// store the dispensary street
		$this->dispensaryStreet = $newDispensaryStreet;
	}

	/**
 *accessor method for dispensary street1
 *
 * @return string value of dispensary street1
 **/
public function getDispensaryStreet1() {
	return($this->dispensaryStreet1);
}

/**
 * mutator method for dispensary street1
 *
 * @param string $newDispensaryStreet1 new value of dispensary street
 * @throws \InvalidArgumentException if $newDispensaryStreet1 is not a string or insecure
 * @throws \RangeException if $newDispensaryStreet1 is > 140 characters
 * @throws \TypeError if $newDispensaryStreet1 is not a string
 **/
public function setDispensaryStreet1(string $newDispensaryStreet1) {
	//verify the street is secure
	$newDispensaryStreet1 = trim($newDispensaryStreet1);
	$newDispensaryStreet1 = filter_var($newDispensaryStreet1, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newDispensaryStreet1) === true) {
		throw(new \RangeException("dispensary street1 is empty or insecure"));
	}
	// verify the dispensary street1 will fit in the database
	if(strlen($newDispensaryStreet1) >140) {
		throw(new \RangeException("dispensary street1 too large"));
	}

	// store the dispensary street1
	$this->dispensaryStreet1 = $newDispensaryStreet1;
}

/**
 * accessor method for dispensary Url
 *
 * @return string value of dispensary Url
 **/
public function getDispensaryUrl() {
	return($this->dispensaryUrl);
}

/**
 * mutator method for dispensary Url
 * @param string $newDispensaryUrl new value of dispensary url
 * @throws \InvalidArgumentException if $newDispensaryUrl is not a string or insecure
 * @throws \RangeException if $newDispensaryUrl is > 140 characters
 * @throws \TypeError if $newDispensaryUrl is not a string
 **/
public function setDispensaryUrl(string $newDispensaryUrl) {
	//verify the dispensary url is secure
	$newDispensaryUrl = trim($newDispensaryUrl);
	$newDispensaryUrl = filter_var($newDispensaryUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newDispensaryUrl) === true) {
		throw(new \InvalidArgumentException("dispensary url is empty or insecure"));
	}
	//verify the dispensary url will fit in the database
	if(strlen($newDispensaryUrl) > 140) {
		throw(new \RangeException("dispensary url content too large"));
	}
	//store the dispensary url
	$this->dispensaryUrl = $newDispensaryUrl;
}
/** accessor method for dispensary zip code
 *
 * @return int|null value of dispensary zip code
 **/
	public function getDispensaryZipCode() {
		return($this->dispensaryZipCode);
	}

	/**
	 * mutator method for dispensary zip code
	 * @param int/null $newDispensaryZipCode new value of dispensary zip code
	 * @throws \RangeException if $newDispenaryZipCode is not positive
	 * @throws \TypeError if $newDispensaryZipCode is not an interger
	 */
	public function setDispensaryZipCode(int $newDispensaryZipCode = null) {
		// base case: if the zip code is null, this is a new dispensary without a mySQL assigned id (yet)
		if($newDispensaryZipCode === null){
			$this->dispensaryZipCode = null;
			return;
		}
		// verify the dispensary zip code is positive
		if($newDispensaryZipCode <= 0) {
			throw(new \RangeException("dispensary zip code is not positive"));
		}
		// convert and store the dispensary zip code
		$this->dispensaryZipCode = $newDispensaryZipCode;
	}
	}