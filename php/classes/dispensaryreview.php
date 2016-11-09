<?php
/**
 * List of review per individual dispensary.
 *
 *
 * @author <hlozano2@cnm.edu>
 * @version 1.0.0
 */


class DispensaryReview{
	/**
	 * id for this dispensary review; this is the primary key
	 * @var int $dispensaryReviewId
	 **/
	private $dispensaryReviewId;
	/**
	 * This is the id of the review left by specific profile and it's a unique atribute.
	 * @var int $dispensaryReviewProfileId
	 **/
	private $dispensaryReviewProfileId;
	/**
	 * This is the id that identifies the dispensary a specific review was left for
	 * @var $dispensaryReviewDispensaryId
	 **/
	private $dispensaryReviewDispensaryId;
	/**
	 * This is the date and time stamp
	 * @var $dispensaryReviewDateTime
	 **/
	private $dispensaryReviewDateTime;
	/**
	 * This is the review content
	 * @var $dispensaryReviewTxt
	 **/
	private $dispensaryReviewTxt

	// CONSTRUCTOR GOES HERE LATER

	/**
	 * Accesor method for dispensaryReviewId
	 *
	 * @return int|null value of dispensary review id
	 **/
	public function getDispensaryReiewId() {
		return($this->dispensaryReviewId);
	}

	/**
	 * mutator method for dispensary review id
	 *
	 * @param int|null $newDispensaryReviewId new value of dispensary review id
	 * @throws \RangeException if $newDispensaryReviewId is not positive
	 * @thows \TypeError if $newDispensaryReviewId is not an integer
	 **/

	public function setDispensaryReviewId(int $newDispensaryReviewId = null) {
		// base case: if the dispensary review id is null, this is a new dispensary review without a mySQL assigned id (yet)
		if($newDispensaryReviewIdId === null) {
			$this->dispensaryReviewId = null;
			return;
		}

		// verify the dispensary review id is positive
		if($newDispensaryId <= 0) {
			throw(new \RangeException("dispensary review id is not positive"));
		}
		// convert and store the dispensary review id
		$this->dispensaryReviewId = $newDispensaryReviewId;

	}