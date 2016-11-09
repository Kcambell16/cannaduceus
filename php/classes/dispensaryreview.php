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
	public function getDispensaryReviewId() {
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
		if($newDispensaryReviewId === null) {
			$this->dispensaryReviewId = null;
			return;
		}

		// verify the dispensary review id is positive
		if($newDispensaryReviewId <= 0) {
			throw(new \RangeException("dispensary review id is not positive"));
		}
		// convert and store the dispensary review id
		$this->dispensaryReviewId = $newDispensaryReviewId;

	}

		/**
		 * Accesor method for dispensaryReviewProfileId
		 *
		 * @return int|null value of dispensary review profile id
		 **/
	public function getDispensaryReviewProfileId() {
		return($this->dispensaryReviewProfileId);
	}

	/**
	 * mutator method for dispensary review profile id
	 *
	 * @param int|null $newDispensaryReviewProfileId new value of dispensary review profile id
	 * @throws \RangeException if $newDispensaryReviewProfileId is not positive
	 * @throws \TypeError if $newDispensaryReviewProfileId is not an integer
	 **/

	public function setDispensaryReviewProfileId(int $newDispensaryReviewProfileId = null) {
		// base case: if the dispensary review profile id is null, this is a new dispensary review profile id without a mySQL assigned id (yet)
		if($newDispensaryReviewProfileId === null) {
			$this->dispensaryReviewProfileId = null;
			return;
		}

		// verify the dispensary review profile id is positive
		if($newDispensaryReviewProfileId <= 0) {
			throw(new \RangeException("dispensary review profile id is not positive"));
		}
		// convert and store the dispensary review profile id
		$this->dispensaryReviewProfileId = $newDispensaryReviewProfileId;

	}

			/**
			 * Accesor method for dispensaryReviewDispensaryId
			 *
			 * @return int|null value of dispensary review dispensary id
			 **/
	public function getDispensaryReviewDispensaryId() {
		return($this->dispensaryReviewDispensaryId);
	}

		/**
		 * mutator method for dispensary review dispensary id
		 *
		 * @param int|null $newDispensaryReviewDispensaryId new value of dispensary review dispensary id
		 * @throws \RangeException if $newDispensaryReviewDispensaryId is not positive
		 * @throws \TypeError if $newDispensaryReviewDispensaryId is not an integer
		 **/

		public function setDispensaryReviewDispensaryId(int $newDispensaryReviewDispensaryId = null) {
		// base case: if the dispensary review dispensary id is null, this is a new dispensary review dispensary id without a mySQL assigned id (yet)
		if($newDispensaryReviewDispensaryId === null) {
			$this->dispensaryReviewProfileId = null;
			return;
		}

		// verify the dispensary review dispensary id is positive
		if ($newDispensaryReviewDispensaryId <= 0) {
			throw(new \RangeException("dispensary review dispensary id is not positive"));
		}
		// convert and store the dispensary review dispensary id
			$this->dispensaryReviewDispensaryId = $newDispensaryReviewDispensaryId;

}

			/**
 			* accessor method for dispensary review date
			 *
 			* @return \DateTime value of dispensary review date
 			**/
	public function getDispensaryReviewDate() {
		return($this->dispensaryReviewDate);
	}

			/**
	 		* mutator method for dispensary review date
			 *
	 		* @param \DateTime|string|null $newDispensaryReviewDate dispensary review date as 			a DateTime object or string (or null to load the current time)
	 		* @throws \InvalidArgumentException if $newDispensaryReviewDate is not a valid 			object or string
	 * @throws \RangeException if $newDispensaryReviewDate is a date that does not exist
	 **/
	public function setDispensaryReviewDate($newDispensaryReviewDate = null) {
		// base case: if the date is null, use the current date and time
		if($newDispensaryReviewDate === null) {
			$this->dispensaryReviewDate = new \DateTime();
			return;
		}

		// store the dispensary review date
		try {
			$newDispensaryReviewDate = self::validateDateTime($newDispensaryReviewDate);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		$this->dispensaryReviewDate = $newDispensaryReviewDate;
	}

		/**
		 *
		 * Accesor method for dispensaryReviewText
		 * @return int|null value of dispensary review text
		 **/

	public function getDispensaryReviewText() {
		return ($this->dispensaryReviewText);
	}




