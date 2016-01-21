<?php
/**
 * Put the name of the thing, I suppose?
 *
 * Write in a blurb here.
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 * @author Author Two
 * Author tag describes who wrote the code. With coauthorship, write multiple lines.
 *
 * This is a doc block for a class.
 *
 */

class Hypospray {
	/**
	 * id for this Hypospray; this is the primary key
	 * @var int $hyposprayId
	 */
	private $hyposprayId;
	/**
	 * cooldown, in seconds
	 * @var int $cooldown
	 */
	private $cooldown;

	/**
	 * accessor method for hypospray id
	 *
	 * @return int value of hypospray id
	 */
	public function getHyposprayId() {
		return($this->hyposprayId);
	}
	/**
	 * mutator method for hypospray id
	 *
	 * @param int $newHyposprayId new value of hyposprayid
	 * @throws InvalidArgumentException if hyposprayid is not an integer
	 * @throws RangeException if hyposprayid is negative
	 */
	public function setHyposprayId($newHyposprayId) {

	}

}




class Review {
	/**
	 * id for Review; this is the primary key
	 * @var int $reviewId
	 */
	private $reviewId;
}
class Answer {
	/**
	 * id for Answer; this is the primary key
	 * @var int $answerId
	 */
	private $answerId;
}
class Question {
	/**
	 * id for Question; this is the primary key
	 * @var int $questionId
	 */
	private $questionId;
}
