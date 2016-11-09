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