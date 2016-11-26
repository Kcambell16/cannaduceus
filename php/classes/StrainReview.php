<?php

namespace Edu\Cnm\Cannaduceus;
require_once(dirname(__DIR__) . "/classes/autoload.php");
require_once(dirname(__DIR__) . "/classes/ValidateDate.php");


/**
 * Small Cross Section of a Strain Review
 *
 *
 * @author Hector Lozano <hlozano2@cnm.edu>
 * @version 4.2.0
 **/

class StrainReview implements \JsonSerializable {
	use ValidateDate;
	/**
	 * id for this StrainReview; this is the primary key
	 * @var int $strainReviewId
	 **/
	private $strainReviewId;
	/**
	 * id of the Profile that reviewed this strain; this is a foreign key
	 * @var int $strainReviewId
	 **/
	private $strainReviewProfileId;
	/**
	 * strain being reviewed by a specific profile
	 * @var int $strainReviewDispensaryId
	 **/
	private $strainReviewStrainId;
	/**
	 * date and time this Review was sent, in a PHP DateTime object
	 * @var \DateTime $strainReviewDateTime
	 **/
	private $strainReviewDateTime;
	/**
	 * actual textual review for this dispensary
	 * @var string $tweetContent
	 **/
	private $strainReviewTxt;





	// CONSTRUCTOR GOES HERE RIGHT NOW RIGHT NOW NOT LATER LATER

	/**
	 * DispensaryReview constructor.
	 * @param int|null $newStrainReviewId Id of this strain review or null if new strain review
	 * @param int|null $newStrainReviewProfileId Id of this strain review profile or null if new strain review profile
	 * @param int|null $newStrainReviewStrainId Id of this strain review strain or null if new strain review strain
	 * @param string $newStrainReviewDateTime string contains actual strain review dateTime
	 * @param string $newStrainReviewTxt string contains actual strain review txt
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g. strings too long, negative integers)
	 * @throws \TypeError if data violates type hints
	 * @throws \Exception if any other exception occurs
	 **/

	public function __construct(int $newStrainReviewId = null, int $newStrainReviewProfileId, int $newStrainReviewStrainId, string $newStrainReviewDate, string $newStrainReviewTxt) {
		try {
			$this->setStrainReviewId($newStrainReviewId);
			$this->setStrainReviewProfileId($newStrainReviewProfileId);
			$this->setStrainReviewStrainId($newStrainReviewStrainId);
			$this->setStrainReviewDate($newStrainReviewDate);
			$this->setStrainReviewTxt($newStrainReviewTxt);
		} catch(\InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw (new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $rangeException) {
			// rethrow the exception to the caller
			throw (new \RangeException($rangeException->getMessage(), 0, $rangeException));
		} catch(\TypeError $typeError) {
			// rethrow the exception to the caller
			throw (new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			// rethrow the exception to the caller
			throw (new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * Accesor method for strainReviewId
	 *
	 * @return int|null value of strain review id
	 **/
	public function getStrainReviewId() {
		return ($this->strainReviewId);
	}

	/**
	 * mutator method for strain review id
	 *
	 * @param int|null $newStrainReviewId new value of strain review id
	 * @throws \RangeException if $newStrainReviewId is not positive
	 * @thows \TypeError if $newStrainReviewId is not an integer
	 **/

	public function setStrainReviewId(int $newStrainReviewId = null) {
		// base case: if the strain review id is null, this is a new strain review without a mySQL assigned id (yet)
		if($newStrainReviewId === null) {
			$this->strainReviewId = null;
			return;
		}

		// verify the strain review id is positive
		if($newStrainReviewId <= 0) {
			throw(new \RangeException("strain review id is not positive"));
		}
		// convert and store the strain review id
		$this->strainReviewId = $newStrainReviewId;

	}