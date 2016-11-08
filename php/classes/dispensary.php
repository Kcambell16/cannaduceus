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
	 * @param string dispensaryCity string actual city of dispensary
	 * @param \DateTime|string|null $newTweetDate date and time Tweet was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */




}