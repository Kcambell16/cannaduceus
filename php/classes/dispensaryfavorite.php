<?php
namespace Edu\Cnm\nsanchez121\cannaduceus;

/**
 * this is going to be a cross section for the dispensary favorite info
 *
 * this is just one of the dispensary favorites out of the many that will be favorited
 *
 * @author Nathan A Sanchez (nsanchez121@cnm.edu)
 *
 */

class DispensaryFavorite {

	/**
	 * id for the DispensaryFavoriteProfileId this is the foreign keys used to make a primary key
	 * @var int $dispensaryFavoriteProfileId
	 */
	private $dispensaryFavoriteProfileId;

	/**
	 * id for the DispensaryFavoriteDispensaryId this is one of the foreign keys used to make a primary key
	 *
	 * @var int $dispensaryFavoritesDispensaryId
	 */
	private $dispensaryFavoritedispensaryId;

	/** Constructor for the new dispensaryFavorite
	 *
	 * @param int | null $newDispensaryFavoriteId id of the profile from profile class
	 * @param int | null $newDispensaryFavoriteDispensaryId id of the dispensary from the dispensary class
	 * @throws \InvalidArgumentException if data types are not vaild
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newDispensaryFavoriteId = null, int $newDispensaryFavoriteDispensaryId) {
	}









}