<?php
/**
 * this is going to be the cross section for Amazon reviews
 *
 *this Review can be considered a small example of what servies like Amazon use
 * @author Nathan A Sanchez
 * @v   ;yv;   ersion 1.0.0
 **/

class Profile {

	/**
	 * id for for this profile; this is the primary key
	 * @var int $profileId
	 */
	private $profileId;
	/**
	 * id of the that sent this ; this is a foreign key
	 * @var int $ProfileId
	 **/
	private $profileUserName;
	/**
	 * actual name
	 * @var string $
	 **/
	private $reviewContent;
	/**
	 * date time this Review was sent, in PHP DateTime object
	 * @var \DateTime $reviewDate
	 */
	private $reviewDate;






