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
	 * Mutator method for $commentId
	 *
	 * @param int $newCommentId
	 * @throws InvalidArgumentException if $newCommentId is not a valid int
	 * @throws RangeException if $newCommentID is not positive
	 */
	public function setCommentId($newCommentId) {
		if($newCommentId === null) {
			$this->commentId = null;
			return;
		}

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
	 * Mutator method for $profileId
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
	 * Accessor method for $commentDate
	 *
	 * @return DateTime value of comment date
	 */
	public function getCommentDate() {
		return $this->commentDate;
	}

	/**
	 * Mutator method for $commentDate
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


	/**
	 * This is the toString method of the class. Currently it displays the text of the comment.
	 * In the future I will include the date the comment was given, the name of the user who wrote the comment, the name of the user who wrote the review, and the text of the review.
	 * @return string
	 */
	public function __toString() {
		return "A comment on a review was given. This is what was said: " . $this->getCommentText();
	}

	/**
	 * Inserts this Comment into mySQL
	 *
	 * @param PDO $pdo PDO connection Object
	 * @throws PDOException when mySQL related errors occur
	 */
	public function insert(PDO $pdo) {
		//Enforce that the commentId is null (Id est, don't insert a comment that already exists)
		if($this->commentId !== null) {
			throw(new PDOException("Not a new comment"));
		}

		//create query template
		$query = "INSERT INTO comment(profileId, reviewId, commentText, commentDate) VALUES(:profileId, :reviewId, :commentText, :commentDate)";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holders in the template
		$formattedDate = $this->commentDate->format("Y-m-d H:i:s");
		$parameters = array("profileId" => $this->profileId, "reviewId" => $this->reviewId, "commentText" => $this->commentText, "commentDate" => $formattedDate);
		$statement->execute($parameters);

		//update the null commentId with what mySQL just gave us
		$this->commentId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Comment from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 */
	public function delete(PDO $pdo) {
		//Enforce that the Primary Key is not null (You can't delete that which does not exist)
		if($this->commentId === null) {
			throw(new PDOException("Unable to delete a comment that doesn't exist"));
		}

		//create query template
		$query = "DELETE FROM comment WHERE commentId = :commentId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder in the template
		$parameters = array("commentId" => $this->commentId);
		$statement->execute($parameters);
	}

	public function update(PDO $pdo) {
		//Enforce that the primary key is not null. You can't update something that does not exist
		if($this->commentId === null) {
			throw(new PDOException("Unable to update a comment that doesn't exist"));
		}

		//create query template
		$query = "UPDATE comment SET profileId = :profileId, reviewId = :reviewId, commentText = :commentText, commentDate = :commentDate WHERE commentId = :commentId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holders in the template
		$formattedDate = $this->commentDate->format("Y-m-d H:i:s");
		$parameters = array("profileId" => $this->profileId, "reviewId" => $this->reviewId, "commentText" => $this->commentText, "commentDate" => $formattedDate, "commentId" => $this->commentId);
		$statement->execute($parameters);
	}
}
