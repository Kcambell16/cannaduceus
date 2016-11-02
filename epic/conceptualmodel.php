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
				<li>userName</li>
				<li>userEmail</li>
				<li>userHash</li>
				<li>userSalt</li>

			</ul>

			<h2>Dispensary</h2>

			<ul>
				<li>dispesaryId(primary key)</li>
				<li>dispensaryName</li>
				<li>dispesaryAddress</li>
				<li>dispensaryE-mail</li>
				<li>dispesaryPhone #</li>
				<li>dispesaryUrl</li>
			</ul>

			<h2>dispensaryReview(weak)</h2>

			<ul>
				<li>dispensaryReviewId</li>
				<li>dispensaryReviewTxt</li>
				<li>dispensaryDateTime</li>
			</ul>

			<h2>dispensaryLeafRating</h2>

			<ul>
				<li>dispenaryLeafratingId</li>
				<li>userId</li>
			</ul>



			<h2>Strain</h2>

			<ul>
				<li>strainId(primary key)</li>
				<li>strainEmail</li>
				<li>strainName</li>
			</ul>

			<h2>StrainReview(weak)</h2>
			<ul>

				<li>strainReviewId(weak)</li>
				<li>strainReviewDateTime</li>
				<li>strainReviewTxt</li>

			</ul>

			<h2>strainFavorite(weak)</h2>

			<ul>

				<li>strainFavoriteuserId</li>
				<li>strainFavoritestrainId</li>

			</ul>

			<h2>strainLeafRating(weak)</h2>
			<ul>

				<li>strainLeafRatingId</li>
				<li>strainLeafRatingstrainId</li>
				<li>strainLeafRatinguserId</li>


			</ul>

			<h2>Relations</h2>

			<ul>

				<li>one user can write many reviews (1 to n)</li>
				<li>many users can rate many reviews (m to n)</li>
				<li>many reviews can have many ratings (m to n)</li>

			</ul>





		</main>



	</body>






</html>