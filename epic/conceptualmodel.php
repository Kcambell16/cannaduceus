<!DOCTYPE HTML>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Conceptual Model</title>
	</head>
	<body>

		<header>

			<h1>Conceptual Model</h1>

		</header>

		<main>

			<h2>Attributes and Entities</h2>

			<h4>Profile</h4>

			<ul>

				<li>profileId (primary key)</li>
				<li>profileUserName(unique)</li>
				<li>profileEmail(unique)</li>
				<li>profileHash</li>
				<li>profileSalt</li>
				<li>profileActivation</li>

			</ul>

			<h2>Dispensary</h2>

			<ul>
				<li>dispensaryId(primary key)</li>
				<li>dispensaryAttention</li>
				<li>dispensaryCity</li>
				<li>dispensaryEmail</li>
				<li>dispensaryName</li>
				<li>dispensaryPhone </li>
				<li>dispensaryStreet</li>
				<li>dispensaryStreet1</li>
				<li>dispensaryUrl</li>
				<li>dispensaryZipCode</li>
			</ul>

			<h2>dispensaryReview(weak)</h2>

			<ul>
				<li>dispensaryReviewId(primary)</li>
				<li>dispensaryReviewProfileId(foreign key)</li>
				<li>dispensaryReviewDispensaryId(foreign key)</li>
				<li>dispensaryReviewDateTime</li>
				<li>dispensaryReviewTxt</li>
			</ul>

			<h2>dispensaryLeafRating</h2>

			<ul>
				<li>dispensaryLeafRatingDispensaryId(foreign key)</li>
				<li>dispensaryLeafRatingProfileId(foreign key)</li>
				<li>dispensaryLeafRatingRating</li>
			</ul>

			<h2>dispensaryFavorite</h2>

			<ul>
				<li>dispensaryFavoriteProfileId(primary)</li>
				<li>dispensaryFavoriteDispensaryId(foreign key)</li>
			</ul>

			<h2>StrainLeafRating</h2>

			<ul>
			<li>strainLeafRatingStrainId(foreign key)</li>
			<li>strainLeafRatingUserId(foreign key)</li>
			<li>strainLeadRatingRating</li>
			</ul>




			<h2>Strain</h2>

			<ul>
				<li>strainId(primary key)</li>
				<li>strainCbd</li>
				<li>strainDescription</li>
				<li>strainName</li>
				<li>strainThc</li>
				<li>strainType</li>
			</ul>

			<h2>StrainReview(weak)</h2>
			<!-- not sure if primary key or if it remains weak -->
			<ul>
				<li>strainReviewId(primary?)</li>
				<li>strainReviewProfileId(foreign key)</li>
				<li>strainReviewStrainId(foreign key)</li>
				<li>strainReviewDateTime</li>
				<li>strainReviewTxt</li>
				<li>strainReviewStrainId</li>

			</ul>

			<h2>strainFavorite(weak)</h2>

			<ul>

				<li>strainFavoriteProfileId(foreign key)</li>
				<li>strainFavoriteStrainId(foreign key)</li>

				</ul>

			<h2>Relations</h2>

			<ul>

				<li>many profile can write many dispensary reviews (m to n)</li>
				<li>many profiles can favorite many dispensaries (m to n)</li>
				<li>many profiles can rate many dispensary (m to n) </li>
				<li>many profile can write many strains reviews (m to n)</li>
				<li>many profile can favorite strains (m to n)</li>
				<li>many profile can rate many strains (m to n)</li>
				<li>many profiles can favorite many dispensaries (m to n)</li>
				<li>many profiles can rate dispensary</li>


			</ul>





		</main>



	</body>






</html>