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
				<li>profileName(unique)</li>
				<li>profileEmail(unique)</li>
				<li>profileHash</li>
				<li>profileSalt</li>

			</ul>

			<h2>Dispensary</h2>

			<ul>
				<li>dispensaryId(primary key)</li>
				<li>dispensaryName</li>
				<li>dispensaryEmail</li>
				<li>dispensaryPhone </li>
				<li>dispensaryUrl</li>
				<li>dispensaryAttention</li>
				<li>dispensaryStreet1</li>
				<li>dispensaryStreet2</li>
				<li>dispensaryCity</li>
				<li>dispensaryZipCode</li>
				<li>dispensaryPhoneNumber</li>
				<li>dispensaryFavorite</li>
			</ul>

			<h2>dispensaryReview(weak)</h2>

			<ul>
				<li>dispensaryReviewId</li>
				<li>dispensaryReviewTxt</li>
				<li>dispensaryReviewDateTime</li>
				<li>dispensaryReviewUserId</li>
				<li>dispensaryReviewDispensaryId</li>
			</ul>

			<h2>dispensaryLeafRating</h2>

			<ul>
				<li>dispensaryLeafRatingId</li>
				<li>dispensaryLeafRatingProfileId</li>
				<li>dispensaryLeafRatingRating</li>
				<li>dispensaryLeafRatingDispensaryId</li>
			</ul>

			<h2>dispensaryFavorite</h2>

			<ul>
				<li>dispensaryFavoriteUserId</li>
				<li>dispensaryFavoriteDispensaryId</li>
			</ul>




			<h2>Strain</h2>

			<ul>
				<li>strainId(primary key)</li>
				<li>strainName</li>
				<li>strainThc</li>
				<li>strainCbd</li>
				<li>strainDescription</li>
				<li>strainType</li>
			</ul>

			<h2>StrainReview(weak)</h2>
			<ul>

				<li>strainReviewId(weak)</li>
				<li>strainReviewDateTime</li>
				<li>strainReviewTxt</li>
				<li>strainReviewUserId</li>
				<li>strainReviewStrainId</li>

			</ul>

			<h2>strainFavorite(weak)</h2>

			<ul>

				<li>strainFavoriteUserId</li>
				<li>strainFavoriteStrainId</li>

				</ul>

			<h2>Relations</h2>

			<ul>

				<li>one user can write many reviews (1 to n)</li>
				<li>many users can rate many reviews (m to n)</li>
				<li>many reviews can have many ratings (m to n)</li>
				<li>many users can review many strains (m to n)</li>
				<li>many users can favorite strains (m to n)</li>


			</ul>





		</main>



	</body>






</html>