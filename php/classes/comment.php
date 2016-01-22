<?php
require_once(dirname(__DIR__) . "/date-utils.php");

/**
 * Class Comment
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 *
 * Comments on the review of the product.
 */

class Comment {
	/**
	 * id for Comment; this is the primary key
	 * @var int $commentId
	 */
	private $commentId;
	/**
	 * id for Profile; this is a foreign key
	 * @var int $profileId
	 */
	private $profileId;
	/**
	 * id for Review; this is a foreign key
	 * @var int $reviewId
	 */
	private $reviewId;

	/**
	 * The text that composes the comment
	 * @var string $commentText
	 */
	private $commentText;

	/**
	 * When the comment was written
	 * @var DateTime $commentDate
	 */
	private $commentDate;

	/**
	 * @param int $newCommentId Id of the comment, primary key
	 * @param int $newProfileId Id of the profile that wrote the comment, foreign key
	 * @param int $newReviewId Id of the review the comment is commenting on, foreign key
	 * @param string $newCommentText text content of the comment
	 * @param mixed $newCommentDate when the comment was written
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds
	 * @throws Exception if some other exception is thrown.
	 */

	public function __constructor($newCommentId, $newProfileId, $newReviewId, $newCommentText, $newCommentDate = null) {
		try {
			$this->setCommentId($newCommentId);
			$this->setProfileId($newProfileId);
			$this->setReviewId($newReviewId);
			$this->setCommentText($newCommentText);
			$this->setCommentDate($newCommentDate);
		} catch(InvalidArgumentException $invalidArgument) {
			//rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			//Rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			//Rethrow generic exception. Should not happen here.
			throw(new Exception($exception->getMessage(), 0, $exception));
		}


	}

	/**
	 * Accessor method for $commentId
	 * @return int value of $commentId
	 */
	public function getCommentId() {
		return $this->commentId;
	}

	/**
	 * mutator method for $commentId
	 *
	 * @param int $newCommentId
	 * @throws InvalidArgumentException if $newCommentId is not a valid int
	 * @throws RangeException if $newCommentID is not positive
	 */
	public function setCommentId($newCommentId) {
		$newCommentId = filter_var($newCommentId, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newCommentId === false) {
			throw(new InvalidArgumentException("Comment Id is not a proper int"));
		}
		//If $newCommentId is out of range, throw an exception.
		if($newCommentId <= 0) {
			throw(new RangeException("Comment ID must be positive"));
		}
		$this->commentId = $newCommentId;
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
	 * Accessor method for $commentText
	 * @return string value of $commentText
	 */
	public function getCommentText() {
		return $this->commentText;
	}

	/**
	 * Mutator method for $commentText
	 *
	 * @param string $newCommentText
	 * @throws InvalidArgumentException throws if $newCommentText is not a valid string
	 */
	public function setCommentText($newCommentText) {
		//Verify the data is of the right type
		$newCommentText = trim($newCommentText);
		$newCommentText = filter_var($newCommentText, FILTER_SANITIZE_STRING);
		if (empty($newCommentText) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->commentText = $newCommentText;
	}

	/**
	 * accessor method for $commentDate
	 *
	 * @return DateTime value of comment date
	 */
	public function getCommentDate() {
		return $this->commentDate;
	}
	/**
	 * mutator method for $commentDate
	 *
	 * @param mixed $newCommentDate commentDate as a DateTime object or string (Or null to load the current time)
	 * @throws InvalidArgumentException if $newCommentDate is not a valid object or string
	 * @throws RangeException if $newCommentDate is a date that does not exist
	 * @throws Exception for any other exception
	 */
	public function setCommentDate($newCommentDate) {
		//base case: if the date is null, use the current date and time
		if($newCommentDate === null) {
			$this->commentDate = new DateTime();
			return;
		}
		//store the comment date
		try {
			$newCommentDate = validateDate($newCommentDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw (new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->commentDate = $newCommentDate;
	}
	public function __toString() {
		return "A comment on a review was given. This is what was said: " . $this->getCommentText();
	}
}
