<?php

namespace Edu\Cnm\hlozano2\DataDesign;

require_once("autoload.php");

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
	 * id of the Strain that is being reviewed; this is a foreign key
	 * @var int $strainReviewId
	 **/
	private $strainReviewProfileId;
	/**
	 * strain being reviewed by a specific profile
	 * @var string $strainReviewStrainId
	 **/
	private $strainReviewStrainId;
	/**
	 * date and time this Review was sent, in a PHP DateTime object
	 * @var \DateTime $strainReviewDateTime
	 **/
	private $strainReviewDateTime;
	/**
	 * actual textual review for this strain
	 * @var string $strainReviewTxt
	 **/
	private $strainReviewTxt;





// El CONSTRUCTOR VA AQUI YA

	/**
	 * StrainReview constructor.
	 * @param int|null $newStrainReviewId Id of this strain review or null if new strain review
	 * @param int|null $newStrainReviewProfileId Id of this strain review profile or null if new strain review profile
	 * @param int|null $newStrainReviewStrainId Id of this strain review strain or null if new strain review strain
	 * @param string $newStrainReviewDateTime string contains actual strain review date
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


