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
				<li>email</li>
				<li>userHash</li>
				<li>userSalt</li>

			</ul>

			<h2>Dispensary</h2>

			<ul>
				<li>dispesaryId(primary key)</li>
				<li>name</li>
				<li>address</li>
				<li>e-mail</li>
				<li>phone #</li>
				<li>url</li>
			</ul>

			<h2>dispensaryReview(weak)</h2>

			<ul>
				<li>dispensaryReviewId</li>
				<li>reviewTxt</li>
				<li>dateTime</li>
			</ul>

			<h2>dispensaryLeafRating</h2>

			<ul>
				<li>dispenaryLeafratingId</li>
				<li>dispesaryId(primary key)</li>
				<li>userId</li>
			</ul>

			<h2>Strain</h2>

			<ul>
				<il>StrainId(primary key)</il>
				<li>email</li>
				<li>Id</li>
				<li>name</li>
			</ul>

			<h2>StrainReview(weak)</h2>
			<ul>

				<li>strainReviewId(weak)</li>
				<li>dateTime</li>
				<li>reviewTxt</li>

			</ul>

			<h2></h2>





		</main>



	</body>






</html>