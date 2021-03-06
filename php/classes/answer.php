<?php
require_once(dirname(__DIR__) . "/date-utils.php");

/**
 * Class Answer
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 *
 * Answers to the questions asked on the pages of the products.
 */

class Answer {
	/**
	 * id for the Answer; this is the primary key
	 * @var int $answerId
	 */
	private $answerId;

	/**
	 * id for the Profile; this is a foreign key
	 * @var int $profileId
	 */
	private $profileId;

	/**
	 * id for the Question; this is a foreign key
	 * @var int $questionId
	 */
	private $questionId;

	/**
	 * The text content of the answer
	 * @var string $answerText
	 */
	private $answerText;

	/**
	 * When the answer was submitted
	 * @var DateTime $answerDate
	 */
	private $answerDate;

	/**
	 * @param int $newAnswerId Id of the answer, the primary key
	 * @param int $newProfileId The foreign key of the user Id (Who wrote the answer)
	 * @param int $newQuestionId The foreign key of the question that the answer was a response to
	 * @param string $newAnswerText
	 * @param mixed $newAnswerDate
	 * @throws InvalidArgumentException If the data types are not valid
	 * @throws RangeException if data values are out of bounds
	 * @throws Exception if some other exception is thrown
	 */
	public function __constructor($newAnswerId, $newProfileId, $newQuestionId, $newAnswerText, $newAnswerDate = null) {
		try {
			$this->setAnswerId($newAnswerId);
			$this->setProfileId($newProfileId);
			$this->setQuestionId($newQuestionId);
			$this->setAnswerText($newAnswerText);
			$this->setAnswerDate($newAnswerDate);
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
	 * Accessor method for $answerId
	 * @return int value of $answerId
	 */
	public function getAnswerId() {
		return $this->answerId;
	}

	/**
	 * Mutator method for $answerId
	 *
	 * @param int $newAnswerId
	 * @throws InvalidArgumentException if $newAnswerId is not a proper int
	 * @throws RangeException if $newAnswerId is not positive
	 */
	public function setAnswerId($newAnswerId) {
		if($newAnswerId === null) {
			$this->answerId = null;
			return;
		}

		$newAnswerId = filter_var($newAnswerId, FILTER_VALIDATE_INT);
		//If filter_var rejects the variable, throw an exception
		if($newAnswerId === false) {
			throw(new InvalidArgumentException("Answer Id is not a proper int"));
		}
		//If $newAnswerId is not positive, throw an exception
		if($newAnswerId <= 0) {
			throw(new RangeException("Answer Id must be positive"));
		}
		$this->answerId = $newAnswerId;
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
	 * Accessor Method for $questionId
	 * @return int value of $questionId
	 */
	public function getQuestionId() {
		return $this->questionId;
	}

	/**
	 * Mutator method for $questionId
	 *
	 * @param int $newQuestionId
	 * @throws InvalidArgumentException if $newQuestionId is not a proper int
	 * @throws RangeException if $newQuestionId is not positive
	 */
	public function setQuestionId($newQuestionId) {
		$newQuestionId = filter_var($newQuestionId, FILTER_VALIDATE_INT);
		//If filter_var rejects the variable, throw an exception
		if($newQuestionId === false) {
			throw(new InvalidArgumentException("Question Id is not a proper int"));
		}
		//If $newQuestionId is not positive, throw an exception
		if($newQuestionId <= 0) {
			throw(new RangeException("Question Id must be positive"));
		}
		$this->questionId = $newQuestionId;
	}


	/**
	 * Accessor Method for $answerText
	 * @return string value for $answerText
	 */
	public function getAnswerText() {
		return $this->answerText;
	}

	/**
	 * Mutator method for $answerText
	 *
	 * @param string $newAnswerText
	 * @throws InvalidArgumentException if $newAnswerText is not a valid string
	 */
	public function setAnswerText($newAnswerText) {
		//Verify the data is of the right type
		$newAnswerText = trim($newAnswerText);
		$newAnswerText = filter_var($newAnswerText, FILTER_SANITIZE_STRING);
		if (empty($newAnswerText) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->answerText = $newAnswerText;
	}


	/**
	 * Accessor Method for $answerDate
	 * @return DateTime value of $answerDate
	 */
	public function getAnswerDate() {
		return $this->answerDate;
	}

	/**
	 * Mutator method for $answerDate
	 *
	 * @param mixed $newAnswerDate
	 * @throws InvalidArgumentException if $newAnswerDate is not a valid object or string
	 * @throws RangeException if $newAnswerDate is a date that does not exist
	 * @throws Exception for any other exception
	 */
	public function setAnswerDate($newAnswerDate) {
		//base case: if the date is null, use the current date and time
		if($newAnswerDate === null) {
			$this->answerDate = new DateTime();
			return;
		}
		//store the answer date
		try {
			$newAnswerDate = validateDate($newAnswerDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw (new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->answerDate = $newAnswerDate;
	}


	/**
	 * This is the toString method of the class. Currently it displays the text of the answer.
	 * In the future I will include the date the answer was given, the name of the user who answered the question, the name of the person who asked the question, and the text of the question itself.
	 * @return string
	 */
	public function __toString() {
		return "A question was answered. This is the answer: " . $this->getAnswerText();
	}
	/**
	 * Inserts this Answer into mySQL
	 *
	 * @param PDO $pdo PDO connection Object
	 * @throws PDOException when mySQL related errors occur
	 */
	public function insert(PDO $pdo) {
		//Enforce that the profileId is null (Id est, don't insert a answer that already exists)
		if($this->answerId !== null) {
			throw(new PDOException("Not a new answer"));
		}

		//create query template
		$query = "INSERT INTO answer(profileId, questionId, answerText, answerDate) VALUES(:profileId, :questionId, :answerText, :answerDate)";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holders in the template
		$formattedDate = $this->answerDate->format("Y-m-d H:i:s");
		$parameters = array("profileId" => $this->profileId, "questionId" => $this->questionId, "answerText" => $this->answerText, "answerDate" => $formattedDate);
		$statement->execute($parameters);

		//update the null answerId with what mySQL just gave us
		$this->answerId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Answer from mySQL
	 *
	 * @param PDO $pdo PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 */
	public function delete(PDO $pdo) {
		//Enforce that the Primary Key is not null (You can't delete that which does not exist)
		if($this->answerId === null) {
			throw(new PDOException("Unable to delete an answer that doesn't exist"));
		}

		//create query template
		$query = "DELETE FROM answer WHERE answerId = :answerId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder in the template
		$parameters = array("answerId" => $this->answerId);
		$statement->execute($parameters);
	}

	public function update(PDO $pdo) {
		//Enforce that the primary key is not null. You can't update something that does not exist
		if($this->answerId === null) {
			throw(new PDOException("Unable to update an answer that doesn't exist"));
		}

		//create query template
		$query = "UPDATE answer SET profileId = :profileId, questionId = :questionId, answerText = :answerText, answerDate = :answerDate WHERE answerId = :answerId";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holders in the template
		$formattedDate = $this->answerDate->format("Y-m-d H:i:s");
		$parameters = array("profileId" => $this->profileId, "questionId" => $this->questionId, "answerText" => $this->answerText, "answerDate" => $formattedDate, "answerId" => $this->answerId);
		$statement->execute($parameters);
	}
}