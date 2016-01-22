<?php
require_once(dirname(__DIR__) . "/date-utils.php");

/**
 * Class Review
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 *
 * The review of a product.
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
	 * constructor for this Review
	 *
	 * @param int $newReviewId Id of the review, primary key
	 * @param int $newProductId The foreign key of the product Id (What the review is a review of)
	 * @param int $newProfileId The foreign key of the user Id (Who wrote the review)
	 * @param string $newReviewText What the text in the review is
	 * @param int $newStarVote Between 1 and 5 stars, what the review rated the product
	 * @param mixed $newReviewDate When the review was submitted.
	 * @throws InvalidArgumentException If the data types are not valid
	 * @throws RangeException if data values are out of bounds
	 * @throws Exception if some other exception is thrown
	 */

	public function __construct($newReviewId, $newProductId, $newProfileId, $newReviewText, $newStarVote, $newReviewDate = null) {
		try {
			$this->setReviewId($newReviewId);
			$this->setProductId($newProductId);
			$this->setProfileId($newProfileId);
			$this->setReviewText($newReviewText);
			$this->setStarVote($newStarVote);
			$this->setReviewDate($newReviewDate);
		} catch(InvalidArgumentException $invalidArgument) {
			//rethrow the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			//Rethrow the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			//Rethrow generic exception.
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
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

		if($newReviewId === null) {
			//If the Primary Key Id is null, it is a new object without an assigned Id
			$this->reviewId = null;
			return;
		}

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
	 * Accessor method for productId
	 *
	 * @return int value of productId
	 */
	public function getProductId() {
		return($this->productId);
	}

	/**
	 * Mutator method for Product ID
	 *
	 * @param int $newProductId
	 * @throws InvalidArgumentException if $newProductId is not a proper int
	 * @throws RangeException if $newProductId is not positive
	 */
	public function setProductId($newProductId) {
		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProductId === false) {
			throw(new InvalidArgumentException("Product Id is not a proper int"));
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
	 * Accessor method for $reviewText
	 * @return string value of $reviewText
	 */
	public function getReviewText() {
		return $this->reviewText;
	}

	/**
	 * Mutator method for $reviewText
	 *
	 * @param string $newReviewText
	 * @throws InvalidArgumentException if $newReviewText is not a valid string
	 */
	public function setReviewText($newReviewText) {
		//Verify the data is of the right type
		$newReviewText = trim($newReviewText);
		$newReviewText = filter_var($newReviewText, FILTER_SANITIZE_STRING);
		if(empty($newReviewText) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->reviewText = $newReviewText;
	}


	/**
	 * Accessor method for $starVote
	 *
	 * @return int value of $starVote
	 */
	public function getStarVote() {
		return $this->starVote;
	}

	/**
	 * Mutator method for $starVote
	 *
	 * @param int $newStarVote
	 * @throws InvalidArgumentException if $newStarVote is not a proper int
	 * @throws RangeException if $newStarVote is not within the proper range
	 */
	public function setStarVote($newStarVote) {
		$newStarVote = filter_var($newStarVote, FILTER_VALIDATE_FLOAT);
		//If filter_var rejects the variable, throw an exception
		if($newStarVote === false) {
			throw(new InvalidArgumentException("Star Vote is not a proper int"));
		}
		if($newStarVote < 1 || $newStarVote > 5) {
			throw(new RangeException("Star Vote must be between 1 and 5"));
		}
		$this->starVote = $newStarVote;
	}


	/**
	 * Accessor method for $reviewDate
	 *
	 * @return DateTime value of review date
	 */
	public function getReviewDate() {
		return $this->reviewDate;
	}

	/**
	 * Mutator method for $reviewDate
	 *
	 * @param mixed $newReviewDate reviewDate as a DateTime object or string (Or null to load the current time)
	 * @throws InvalidArgumentException if $newReviewDate is not a valid object or string
	 * @throws RangeException if $newReviewDate is a date that does not exist
	 * @throws Exception for any other exception
	 */
	public function setReviewDate($newReviewDate) {
		//base case: if the date is null, use the current date and time
		if($newReviewDate === null) {
			$this->reviewDate = new DateTime();
			return;
		}
		//store the review date
		try {
			$newReviewDate = validateDate($newReviewDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw (new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->reviewDate = $newReviewDate;
	}


	/**
	 * This is the toString method of the class. Currently it displays the text of the review.
	 * In the future it will include the date the review was given, the name of the user who wrote the review, and the name of the product the review was about.
	 * @return string
	 */
	public function __toString() {
		return "A review was given. This is what was said: " . $this->getReviewText();
	}

	/**
	 * Inserts this Review into mySQL
	 *
	 * @param PDO $pdo PDO connection Object
	 * @throws PDOException when mySQL related errors occur
	 */
	public function insert(PDO $pdo) {
		//Enforce that the profileId is null (Id est, don't insert a review that already exists)
		if($this->reviewId !== null) {
			throw(new PDOException("Not a new review"));
		}

		//create query template
		$query = "INSERT INTO review(productId, profileId, reviewText, starVote, reviewDate) VALUES(:productId, :profileId, :reviewText, :starVote, :reviewDate)";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holders in the template
		$formattedDate = $this->reviewDate->format("Y-m-d H:i:s");
		$parameters = array("productId" => $this->productId, "profileId" => $this->profileId, "reviewText" => $this->reviewText, "starVote" => $this->starVote, "reviewDate" => $formattedDate);
		$statement->execute($parameters);

		//update the null reviewId with what mySQL just gave us
		$this->reviewId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Review from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 */
	public function delete(PDO $pdo) {
		//Enforce that the Primary Key is not null (You can't delete that which does not exist)
		if($this->reviewId === null) {
			throw(new PDOException("Unable to delete a review that doesn't exist"));
		}

		//create query template
		$query = "DELETE FROM review WHERE reviewId = :reviewId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder in the template
		$parameters = array("reviewId" => $this->reviewId);
		$statement->execute($parameters);
	}

	public function update(PDO $pdo) {
		//Enforce that the primary key is not null. You can't update something that does not exist
		if($this->reviewId === null) {
			throw(new PDOException("Unable to update a review that doesn't exist"));
		}

		//create query template
		$query = "UPDATE review SET productId = :productId, profileId = :profileId, reviewText = :reviewText, starVote = :starVote, reviewDate = :reviewDate WHERE reviewId = :reviewId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holders in the template
		$formattedDate = $this->reviewDate->format("Y-m-d H:i:s");
		$parameters = array("productId" => $this->productId, "profileId" => $this->profileId, "reviewText" => $this->reviewText, "starVote" => $this->starVote, "reviewDate" => $formattedDate, "reviewId" => $this->reviewId);
		$statement->execute($parameters);
	}
}