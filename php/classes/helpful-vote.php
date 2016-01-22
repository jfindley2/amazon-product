<?php

/**
 * Class HelpfulVote
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 *
 * So, this class refers to how a review can be voted as either, "Helpful," or, "Not helpful." Thus giving the user the ability to organise the reviews seen by their quality.
 */
class HelpfulVote {

	/**
	 * id for the Profile; this is a part of the primary key (Composite key)
	 * @var int $profileId
	 */
	private $profileId;

	/**
	 * id for the Review; this is a part of the primary key (Composite key)
	 * @var int $reviewId
	 */
	private $reviewId;

	/**
	 * The value of the vote, as a bool.
	 * @var bool $theVote
	 */
	private $theVote;

	/**
	 * @param int $newProfileId
	 * @param int $newReviewId
	 * @param bool $newTheVote
	 * @throws Exception
	 */
	public function __construct($newProfileId, $newReviewId, $newTheVote) {
		try {
			$this->setProfileId($newProfileId);
			$this->setReviewId($newReviewId);
			$this->setTheVote($newTheVote);
		} catch(RangeException $range) {
			//Rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			//Rethrow generic exception.
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
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
	 * @throws InvalidArgumentException if $newProfileId is not a proper int
	 * @throws RangeException if $newProfileId is not positive
	 */
	public function setProfileId($newProfileId) {
		$newProfileId = filter_var($newProfileId, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProfileId === false) {
			throw(new InvalidArgumentException("Profile Id is not a proper int"));
		}
		//If $newProfileId is out of range, throw an exception.
		if($newProfileId <= 0) {
			throw(new RangeException("Profile ID must be positive"));
		}
		$this->profileId = $newProfileId;
	}
	/**
	 * Accessor method for $reviewId
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
	 * @throws InvalidArgumentException if $newReviewId is not a proper int
	 * @throws RangeException if $newReviewId is not positive
	 */
	public function setReviewId($newReviewId) {
		$newReviewId = filter_var($newReviewId, FILTER_VALIDATE_INT);
		//If filter_var rejects the variable, throw an exception
		if($newReviewId === false) {
			throw(new InvalidArgumentException("Review Id is not a proper int"));
		}
		//If $newReviewId is not positive, throw an exception
		if($newReviewId <= 0) {
			throw(new RangeException("Review Id must be positive"));
		}
		$this->reviewId = intval($newReviewId);
	}

	/**
	 * Accessor method for $theVote
	 * @return int the value of $theVote
	 */
	public function getTheVote() {
		return $this->theVote;
	}

	/**
	 * Mutator method for $theVote
	 *
	 * @param bool $newTheVote
	 */
	public function setTheVote($newTheVote) {
		$newTheVote = filter_var($newTheVote, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
		//if filter_var rejects the variable, throw an exception
		if($newTheVote === null) {
			throw(new InvalidArgumentException("The vote given is not applicable"));
		}
		$this->theVote = $newTheVote;
	}
}