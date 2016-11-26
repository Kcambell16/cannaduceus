-- drop table statements go here
DROP TABLE IF EXISTS strainFavorite;
DROP TABLE IF EXISTS strainLeafRating;
DROP TABLE IF EXISTS strainReview;
DROP TABLE IF EXISTS dispensaryFavorite;
DROP TABLE IF EXISTS dispensaryLeafRating;
DROP TABLE IF EXISTS dispensaryReview;
DROP TABLE IF EXISTS strain;
DROP TABLE IF EXISTS dispensary;
DROP TABLE IF EXISTS profile;

CREATE TABLE profile
(
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileUserName VARCHAR(32) NOT NULL,
	profileEmail VARCHAR(128) NOT NULL,
	profileHash CHAR(128) NOT NULL,
	profileSalt CHAR(64) NOT NULL,
	profileActivation CHAR(32) NOT NULL,
	UNIQUE (profileUserName),
	UNIQUE (profileEmail),
	PRIMARY KEY (profileId)
);

CREATE TABLE dispensary
(
	dispensaryId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	dispensaryAttention VARCHAR(32),
	dispensaryCity VARCHAR(48) NOT NULL,
	dispensaryEmail VARCHAR(128),
	dispensaryName VARCHAR(32) NOT NULL,
	dispensaryPhone VARCHAR(32) NOT NULL ,
	dispensaryState CHAR(2) NOT NULL,
	dispensaryStreet1 VARCHAR(48) NOT NULL,
	dispensaryStreet2 VARCHAR(48),
	dispensaryUrl VARCHAR(128),
	dispensaryZipCode VARCHAR(10) NOT NULL,
	PRIMARY KEY (dispensaryId)
);

CREATE TABLE strain
(
	strainId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	strainName VARCHAR(32) NOT NULL,
	strainType VARCHAR(16) NOT NULL,
	strainThc DECIMAL(8,6) NOT NULL,
	strainCbd DECIMAL(8,6) NOT NULL,
	strainDescription VARCHAR(255) NOT NULL,
	PRIMARY KEY (strainId)
);

CREATE TABLE dispensaryReview
(
	dispensaryReviewId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	dispensaryReviewProfileId INT UNSIGNED NOT NULL,
	dispensaryReviewDispensaryId INT UNSIGNED NOT NULL,
	dispensaryReviewDateTime DATETIME,
	dispensaryReviewTxt VARCHAR(255) NOT NULL,
	INDEX (dispensaryReviewProfileId),
	INDEX (dispensaryReviewDispensaryId),
	UNIQUE (dispensaryReviewId),
	FOREIGN KEY (dispensaryReviewProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (dispensaryReviewDispensaryId) REFERENCES dispensary (dispensaryId),
	PRIMARY KEY (dispensaryReviewDispensaryId, dispensaryReviewProfileId)
);

CREATE TABLE dispensaryLeafRating
(
	dispensaryLeafRatingRating TINYINT UNSIGNED NOT NULL,
	dispensaryLeafRatingDispensaryId INT UNSIGNED NOT NULL,
	dispensaryLeafRatingProfileId INT UNSIGNED NOT NULL,
	INDEX (dispensaryLeafRatingDispensaryId),
	INDEX (dispensaryLeafRatingProfileId),
	FOREIGN KEY (dispensaryLeafRatingProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (dispensaryLeafRatingDispensaryId) REFERENCES dispensary (dispensaryId),
	PRIMARY KEY (dispensaryLeafRatingProfileId, dispensaryLeafRatingDispensaryId)
);

CREATE TABLE dispensaryFavorite
(
	dispensaryFavoriteProfileId INT UNSIGNED NOT NULL,
	dispensaryFavoriteDispensaryId INT UNSIGNED NOT NULL,
	INDEX (dispensaryFavoriteProfileId),
	INDEX (dispensaryFavoriteDispensaryId),
	FOREIGN KEY (dispensaryFavoriteProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (dispensaryFavoriteDispensaryId) REFERENCES dispensary (dispensaryId),
	PRIMARY KEY (dispensaryFavoriteProfileId, dispensaryFavoriteDispensaryId)
);

CREATE TABLE strainReview
(
	strainReviewId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	strainReviewProfileId INT UNSIGNED NOT NULL,
	strainReviewStrainId INT UNSIGNED NOT NULL,
	strainReviewDateTime DATETIME,
	strainReviewTxt VARCHAR (255),
	INDEX (strainReviewProfileId),
	INDEX (strainReviewStrainId),
	UNIQUE (strainReviewId),
	FOREIGN KEY (strainReviewProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (strainReviewStrainId) REFERENCES strain (strainId),
	PRIMARY KEY (strainReviewProfileId, strainReviewStrainId)


);

CREATE TABLE strainLeafRating
(
	strainLeafRatingRating TINYINT UNSIGNED NOT NULL,
	strainLeafRatingStrainId INT UNSIGNED NOT NULL,
	strainLeafRatingProfileId INT UNSIGNED NOT NULL,
	INDEX (strainLeafRatingStrainId),
	INDEX (strainLeafRatingProfileId),
	FOREIGN KEY (strainLeafRatingProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (strainLeafRatingStrainId) REFERENCES  strain (strainId),
	PRIMARY KEY (strainLeafRatingProfileId, strainLeafRatingStrainId)
);

CREATE TABLE strainFavorite
(
	strainFavoriteProfileId INT UNSIGNED NOT NULL,
	strainFavoriteStrainId INT UNSIGNED NOT NULL,
	INDEX (strainFavoriteProfileId),
	INDEX (strainFavoriteStrainId),
	FOREIGN KEY (strainFavoriteProfileId) REFERENCES profile (profileId),
	FOREIGN KEY (strainFavoriteStrainId) REFERENCES strain (strainId),
	PRIMARY KEY (strainFavoriteProfileId, strainFavoriteStrainId)

);
