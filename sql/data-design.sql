-- drop table statements go here
DROP TABLE IF EXISTS strainfavorite;
DROP TABLE IF EXISTS strainleafrating;
DROP TABLE IF EXISTS strainreview;
DROP TABLE IF EXISTS dispensaryfavorite;
DROP TABLE IF EXISTS dispensaryleafrating;
DROP TABLE IF EXISTS dispensaryreview;
DROP TABLE IF EXISTS strain;
DROP TABLE IF EXISTS dispensary;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile
(
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileUserName VARCHAR(32) NOT NULL,
	profileEmail VARCHAR(128) NOT NULL,
	profileHash VARCHAR(32) NOT NULL,
	profileSalt VARCHAR(32) NOT NULL,
	profileActivation VARCHAR(32) NOT NULL,
	UNIQUE (profileUserName),
	UNIQUE (profileEmail),
	INDEX (profileUserName),
	INDEX (profileEmail),
	INDEX (profileHash),
	INDEX (profileSalt),
	INDEX (profileActivation),
	PRIMARY KEY (profileId)
);

CREATE TABLE dispensary
(
	dispensaryId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	dispensaryName VARCHAR(32) NOT NULL,
	dispensaryAttention VARCHAR(32) NOT NULL,
	dispensaryStreet1 VARCHAR(32) NOT NULL,
	dispensaryStreet2 VARCHAR(32) NOT NULL,
	dispensaryCity VARCHAR(32) NOT NULL,
	dispensaryState VARCHAR(32),
	dispensaryZipCode VARCHAR(32) NOT NULL,
	dispensaryEmail VARCHAR(128) NOT NULL,
	dispensaryPhone VARCHAR(32) NOT NULL,
	dispensaryUrl VARCHAR(128),
	PRIMARY KEY (dispensaryId)
);

CREATE TABLE strain
(
	strainId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	strainName VARCHAR(32) NOT NULL,
	strainDescription VARCHAR(128) NOT NULL,
	strainType VARCHAR(32) NOT NULL,
	strainThc VARCHAR(32) NOT NULL,
	strainCbd VARCHAR(32) NOT NULL,
	INDEX (strainName),
	INDEX (strainDescription),
	INDEX (strainType),
	INDEX (strainThc),
	INDEX (strainCbd),
	PRIMARY KEY (strainId)
);

CREATE TABLE dispensaryreview
(
	dispensaryReviewId INT UNSIGNED NOT NULL,
	dispensaryReviewProfileId INT UNSIGNED NOT NULL,
	dispensaryReviewDispensaryId INT UNSIGNED NOT NULL,
	dispensaryReviewDateTime INT UNSIGNED NOT NULL,
	dispensaryReviewTxt VARCHAR(256) NOT NULL,
	INDEX (dispensaryReviewProfileId),
	INDEX (dispensaryReviewDispensaryId),
	INDEX (dispensaryReviewDateTime),
	INDEX (dispensaryReviewTxt),
	FOREIGN KEY (dispensaryReviewProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (dispensaryReviewDispensaryId) REFERENCES dispensary (dispensaryId),
	PRIMARY KEY (dispensaryReviewDispensaryId, dispensaryReviewProfileId)
);

CREATE TABLE dispensaryleafrating
(
	dispensaryLeafRatingDispensaryId INT UNSIGNED NOT NULL,
	dispensaryLeafRatingProfileId INT UNSIGNED NOT NULL,
	dispensaryLeafRatingRating INT UNSIGNED NOT NULL,
	INDEX (dispensaryLeafRatingDispensaryId),
	INDEX (dispensaryLeafRatingProfileId),
	FOREIGN KEY (dispensaryLeafRatingProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (dispensaryLeafRatingRating) REFERENCES dispensary (dispensaryId),
	PRIMARY KEY (dispensaryLeafRatingProfileId, dispensaryLeafRatingDispensaryId)
);

CREATE TABLE dispensaryfavorite
(
	dispensaryFavoriteProfileId INT UNSIGNED NOT NULL,
	dispensaryFavoriteDispensaryId INT UNSIGNED NOT NULL,
	INDEX (dispensaryFavoriteProfileId),
	INDEX (dispensaryFavoriteDispensaryId),
	FOREIGN KEY (dispensaryFavoriteProfileId), REFERENCES profile (profileId),
	FOREIGN KEY (dispensaryFavoriteDispensaryId), REFERENCES dispensary (dispensaryId),
	PRIMARY KEY (dispensaryFavoriteProfileId, dispensaryFavoriteDispensaryId)
);

CREATE TABLE strainreview
(
	strainReviewId INT UNSIGNED NOT NULL,
	strainReviewProfileId INT UNSIGNED NOT NULL,
	strainReviewStrainId INT UNSIGNED NOT NULL,
	strainReviewDateTime VARCHAR(32)
	strainReviewTxt VARCHAR (256)

);

CREATE TABLE strainleafrating
(
	strainLeafRatingStrainId INT UNSIGNED NOT NULL,
	strainLeafRatingProfileId INT UNSIGNED NOT NULL,
	strainLeafRatingRating INT UNSIGNED NOT NULL,
	INDEX (strainLeafRatingStrainId),
	INDEX (strainLeafRatingProfileId),
	FOREIGN KEY (strainLeafRatingProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (strainLeafRatingRating) REFERENCES  (),
	PRIMARY KEY (strainLeafRatingProfileId, strainLeafRatingRating)
);

	CREATE TABLE strainfavorite
	(

	)