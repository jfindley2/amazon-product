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
		$newReviewId = filter_var($newReviewId, FILTER_VALIDATE_INT);
		//If filter_var rejects the variable, throw an exception
		if($newReviewId === false) {
			throw(new UnexpectedValueException("Review Id is not a proper int"));
		}
		//If $newReviewId is not positive, throw an exception
		if($newReviewId <= 0) {
			throw(new RangeException("Review Id must be positive"));
		}
		$this->reviewId = intval($newReviewId);
	}
	/**
	 * accessor method for productId
	 *
	 * @return int value of productId
	 */
	public function getProductId() {
		return($this->productId);
	}

	/**
	 * mutator method for Product ID
	 *
	 * @param int $newProductId
	 * @throws UnexpectedValueException if $newProductId is not a proper int
	 * @throws RangeException if $newProductId is not positive
	 */
	public function setProductId($newProductId) {
		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProductId === false) {
			throw(new UnexpectedValueException("Product Id is not a proper int"));
		}
		//If $newProductId is not positive, throw an exception.
		if($newProductId <= 0) {
			throw(new RangeException("Product ID must be positive"));
		}
		$this->productId = intval($newProductId);
	}
	/**
	 * Accessor method for $profileId
	 * @return int value of $profileId
	 */
	public function getProfileId() {
		return $this->profileId;
	}
	/**
	 * mutator method for $profileId
	 *
	 * @param int $newProfileId
	 * @throws UnexpectedValueException if $newProfileId is not a proper int
	 * @throws RangeException if $newProfileId is not positive
	 */
	public function setProfileId($newProfileId) {
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProfileId === false) {
			throw(new UnexpectedValueException("Profile Id is not a proper int"));
		}
		//If $newProfileId is out of range, throw an exception.
		if($newProfileId <= 0) {
			throw(new RangeException("Profile ID must be positive"));
		}
		$this->profileId = $newProfileId;
	}
}