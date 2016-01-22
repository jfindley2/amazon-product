<?php
require_once(dirname(__DIR__) . "/date-utils.php");

/**
 * Class Question
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 *
 * On a product's page, questions about the product can be asked.
 */
class Question {
	/**
	 * id for the Question; this is the primary key
	 * @var int $questionId
	 */
	private $questionId;

	/**
	 * id for the Product; this is a foreign key
	 * @var int $productId
	 */
	private $productId;

	/**
	 * id for the Profile; this is a foreign key
	 * @var int $profileId
	 */
	private $profileId;

	/**
	 * The text content of the question
	 * @var string $questionText
	 */
	private $questionText;

	/**
	 * When the question was submitted
	 * @var DateTime $questionDate
	 */
	private $questionDate;

	/**
	 * @param int $newQuestionId Id of the question, primary key
	 * @param int $newProductId The foreign key of the product Id
	 * @param int $newProfileId The foreign key of the user Id (Who asked the question)
	 * @param string $newQuestionText What the text in the question is
	 * @param mixed $newQuestionDate When the question was submitted
	 * @throws InvalidArgumentException If the data types are not valid
	 * @throws RangeException if data values are out of bounds
	 * @throws Exception if some other exception is thrown
	 */
	public function __constructor($newQuestionId, $newProductId, $newProfileId, $newQuestionText, $newQuestionDate = null) {
		try {
			$this->setQuestionId($newQuestionId);
			$this->setProductId($newProductId);
			$this->setProfileId($newProfileId);
			$this->setQuestionText($newQuestionText);
			$this->setQuestionDate($newQuestionDate);
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
		if($newQuestionId === null) {
			$this->questionId = null;
			return;
		}

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
	 * Accessor method for $questionText
	 * @return string value of $questionText
	 */
	public function getQuestionText() {
		return $this->questionText;
	}

	/**
	 * Mutator method for $questionText
	 *
	 * @param string $newQuestionText
	 * @throws InvalidArgumentException if $newQuestionText is not a valid string
	 */
	public function setQuestionText($newQuestionText) {
		//Verify the data is of the right type
		$newQuestionText = trim($newQuestionText);
		$newQuestionText = filter_var($newQuestionText, FILTER_SANITIZE_STRING);
		if (empty($newQuestionText) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->questionText = $newQuestionText;
	}


	/**
	 * Accessor method for $questionDate
	 * @return DateTime value of question date
	 */
	public function getQuestionDate() {
		return $this->questionDate;
	}


	/**
	 * Mutator method for $questionDate
	 *
	 * @param mixed $newQuestionDate questionDate as a DateTime object or string (Or null to load the current time)
	 * @throws InvalidArgumentException if $newQuestionDate is not a valid object or string
	 * @throws RangeException if $newQuestionDate is a date that does not exist
	 * @throws Exception for any other exception
	 */
	public function setQuestionDate($newQuestionDate) {
		//base case: if the date is null, use the current date and time
		if($newQuestionDate === null) {
			$this->questionDate = new DateTime();
			return;
		}
		//store the question date
		try {
			$newQuestionDate = validateDate($newQuestionDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw (new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->questionDate = $newQuestionDate;
	}


	/**
	 * This is the toString method of the class. Currently it displays the text of the question.
	 * In the future I will attempt to include the date the question was asked, who asked the question, and what product the question was about.
	 * @return string
	 */
	public function __toString() {
		return "A question was asked. This is the question: \"" . $this->getQuestionText() . "\"";
	}
}