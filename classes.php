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

class Product {
	/**
	 * id for Product; this is the primary key
	 * @var int $productId
	 */
	private $productId;
	/**
	 * The image's url
	 * @var string $productImage
	 */
	private $productImage;
	/**
	 * id for product price; the first two digits (Furthest to the right) are the cents
	 * @var int $productPrice
	 */
	private $productPrice;
	/**
	 * The additional info
	 * @var string $additionalInfo
	 */
	private $additionalInfo;
	/**
	 * The description
	 * @var string $description
	 */
	private $description;
	/**
	 * The technical details
	 * @var string $technicalDetails
	 */
	private $technicalDetails;
	/**
	 * The name of the product
	 * @var string $productName
	 */
	private $productName;

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
	 */
	public function setProductId($newProductId) {
		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);
		if($newProductId === false) {
			throw(new UnexpectedValueException("Product Id is not a proper int"));
		}
		$this->productId = intval($newProductId);
	}
	/**
	 * accessor method for productPrice
	 *
	 * @return int value of productPrice
	 */
	public function getProductPrice() {
		return($this->productPrice);
	}

	/**
	 * mutator method for Product Price
	 *
	 * @param int $newProductPrice
	 * @throws UnexpectedValueException if $newProductPrice is not a proper int
	 */
	public function setProductPrice($newProductPrice) {
		$newProductPrice = filter_var($newProductPrice, FILTER_VALIDATE_INT);
		if($newProductPrice === false) {
			throw(new UnexpectedValueException("Product Price is not a proper int"));
		}
		$this->productPrice = intval($newProductPrice);
	}
}

class Profile {
	/**
	 * id for Profile; this is the primary key
	 * @var int $profileId
	 */
	private $profileId;
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
