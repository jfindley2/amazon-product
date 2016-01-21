<?php

/**
 * Class Review
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 */

class Review {
	/**
	 * id for Review; this is the primary key
	 * @var int $reviewId
	 */
	private $reviewId;
	/**
	 * id of the product this is a review of; this is a foreign key
	 * @var int $productId
	 */
	private $productId;
	/**
	 * id of the profile that wrote the review; this is a foreign key
	 * @var int $profileId
	 */
	private $profileId;
	/**
	 * content of the review
	 * @var string $reviewText
	 */
	private $reviewText;
	/**
	 * How many stars the review gave the product
	 * @var int $starVote
	 */
	private $starVote;
	/**
	 * Date the review was written
	 * @var DateTime $reviewDate
	 */
	private $reviewDate;

	/**
	 * accessor method for $reviewId
	 *
	 * @return int value of $reviewId
	 */
	public function getReviewId() {
		return $this->reviewId;
	}
	/**
	 * Mutator method for $reviewId
	 *
	 * @param int $newReviewId
	 * @throws UnexpectedValueException if $newReviewId is not a proper int
	 * @throws RangeException if $newReviewId is not positive
	 */
	public function setReviewId($newReviewId) {
		$this->reviewId = $newReviewId;
	}
}