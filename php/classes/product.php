<?php

/**
 * Class Product
 * @author Jacob Findley <jfindley2@cnm.edu>
 */

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
	 * @throws RangeException if $newProductId is not positive
	 */
	public function setProductId($newProductId) {
		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProductId === false) {
			throw(new UnexpectedValueException("Product Id is not a proper int"));
		}
		//If $newProductId is out of range, throw an exception.
		if($newProductId <= 0) {
			throw(new RangeException("Product ID must be positive"));
		}
		$this->productId = intval($newProductId);
	}
	/**
	 * accessor method for productImage
	 * @return string value of productImage
	 */
	public function getProductImage() {
		return($this->productImage);
	}
	/**
	 * mutator method for productImage
	 *
	 * @param string $newProductImage
	 * @throws UnexpectedValueException if newProductImage is not valid
	 */
	public function setProductImage($newProductImage) {
		//Verify the data is of the right type
		$newProductImage = trim($newProductImage);
		$newProductImage = filter_var($newProductImage, FILTER_SANITIZE_STRING);
		if (null($newProductImage) === true) {
			throw(new UnexpectedValueException("Content is empty or insecure"));
		}
		$this->productImage = $newProductImage;
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
	 * @throws RangeException If Product Price is not positive
	 */
	public function setProductPrice($newProductPrice) {
		$newProductPrice = filter_var($newProductPrice, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProductPrice === false) {
			throw(new UnexpectedValueException("Product Price is not a proper int"));
		}
		//if $newProductPrice is out of range, throw an exception
		if($newProductPrice <= 0) {
			throw(new RangeException("Price must be positive"));
		}
		$this->productPrice = intval($newProductPrice);
	}
	/**
	 * accessor method for additionalInfo
	 * @return string value of additionalInfo
	 */
	public function getAdditionalInfo() {
		return($this->additionalInfo);
	}
	/**
	 * mutator method for additionalInfo
	 *
	 * @param string $newAdditionalInfo
	 * @throws UnexpectedValueException if newAdditionalInfo is not valid
	 */
	public function setAdditionalInfo($newAdditionalInfo) {
		//Verify the data is of the right type
		$newAdditionalInfo = trim($newAdditionalInfo);
		$newAdditionalInfo = filter_var($newAdditionalInfo, FILTER_SANITIZE_STRING);
		if (null($newAdditionalInfo) === true) {
			throw(new UnexpectedValueException("Content is empty or insecure"));
		}
		$this->additionalInfo = $newAdditionalInfo;
	}
	/**
	 * accessor method for description
	 * @return string value of description
	 */
	public function getDescription() {
		return($this->description);
	}
	/**
	 * mutator method for description
	 *
	 * @param string $newDescription
	 * @throws UnexpectedValueException if newDescription is not valid
	 */
	public function setDescription($newDescription) {
		//Verify the data is of the right type
		$newDescription = trim($newDescription);
		$newDescription = filter_var($newDescription, FILTER_SANITIZE_STRING);
		if (null($newDescription) === true) {
			throw(new UnexpectedValueException("Content is empty or insecure"));
		}
		$this->description = $newDescription;
	}
	/**
	 * accessor method for technicalDetails
	 * @return string value of technicalDetails
	 */
	public function getTechnicalDetails() {
		return($this->technicalDetails);
	}
	/**
	 * mutator method for technicalDetails
	 *
	 * @param string $newTechnicalDetails
	 * @throws UnexpectedValueException if $newTechnicalDetails is not valid
	 */
	public function setTechnicalDetails($newTechnicalDetails) {
		//Verify the data is of the right type
		$newTechnicalDetails = trim($newTechnicalDetails);
		$newTechnicalDetails = filter_var($newTechnicalDetails, FILTER_SANITIZE_STRING);
		if (null($newTechnicalDetails) === true) {
			throw(new UnexpectedValueException("Content is empty or insecure"));
		}
		$this->technicalDetails = $newTechnicalDetails;
	}
	/**
	 * accessor method for productName
	 * @return string value of productName
	 */
	public function getProductName() {
		return($this->productName);
	}
	/**
	 * mutator method for description
	 *
	 * @param string $newProductName
	 * @throws UnexpectedValueException if $newProductName is not valid
	 */
	public function setProductName($newProductName) {
		//Verify the data is of the right type
		$newProductName = trim($newProductName);
		$newProductName = filter_var($newProductName, FILTER_SANITIZE_STRING);
		if (null($newProductName) === true) {
			throw(new UnexpectedValueException("Content is empty or insecure"));
		}
		$this->productName = $newProductName;
	}
}