?php

namespace Edu\Cnm\hlozano2\DataDesign;

require_once("autoload.php");

/**
* Small Cross Section of a Dispensary Review
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
* id of the Strain being review; this is a foreign key
* @var int $StrainReviewId
**/
private $strainReviewProfileId;
/**
* dispensary being reviewed by a specific profile
* @var string $dispensaryReviewDispensaryId
**/
private $dispensaryReviewDispensaryId;
/**
* date and time this Review was sent, in a PHP DateTime object
* @var \DateTime $dispensaryReviewDate
**/
private $dispensaryReviewDateTime;
/**
* actual textual review for this dispensary
* @var string $tweetContent
**/
private $dispensaryReviewTxt;





// CONSTRUCTOR GOES HERE LATER


