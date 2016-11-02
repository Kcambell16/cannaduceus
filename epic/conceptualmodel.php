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

			<h4>User</h4>

			<ul>

				<li>userId (primary key)</li>
				<li>userName(unique)</li>
				<li>userEmail(unique)</li>
				<li>userHash</li>
				<li>userSalt</li>

			</ul>

			<h2>Dispensary</h2>

			<ul>
				<li>dispensaryId(primary key)</li>
				<li>dispensaryName</li>
				<li>dispensaryAddress</li>
				<li>dispensaryEmail</li>
				<li>dispensaryPhone #</li>
				<li>dispensaryUrl</li>
				<li>dispensaryAttention</li>
				<li>dispensaryStreet1</li>
				<li>dispensaryStreet2</li>
				<li>dispensaryCity</li>
				<li>dispensaryZipCode</li>
				<li>dispensaryPhoneNumber</li>
				<li>dispensaryCord</li>
			</ul>

			<h2>dispensaryReview(weak)</h2>

			<ul>
				<li>dispensaryReviewId</li>
				<li>dispensaryReviewTxt</li>
				<li>dispensaryDateTime</li>
			</ul>

			<h2>dispensaryLeafRating</h2>

			<ul>
				<li>dispensaryLeafRatingId</li>
				<li>dispensaryUserId</li>
				<li>dispensaryLeafRatingRating</li>
				<li>dispensaryLeafRatingDispensaryId</li>
			</ul>



			<h2>Strain</h2>

			<ul>
				<li>strainId(primary key)</li>
				<li>strainRating</li>
				<li>strainName</li>
				<li>strainThc</li>
				<li>strainCbd</li>
				<li>strainDescription</li>
			</ul>

			<h2>StrainReview(weak)</h2>
			<ul>

				<li>strainReviewId(weak)</li>
				<li>strainReviewDateTime</li>
				<li>strainReviewTxt</li>

			</ul>

			<h2>strainFavorite(weak)</h2>

			<ul>

				<li>strainFavoriteUserId</li>
				<li>strainFavoriteStrainId</li>

			</ul>

			<h2>strainLeafRating(weak)</h2>
			<ul>

				<li>strainLeafRatingId</li>
				<li>strainLeafRatingStrainId</li>
				<li>strainLeafRatingUserId</li>
				<li>strainLeafRatingRating</li>
				<li>strainLeafRatingStrainId</li>



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