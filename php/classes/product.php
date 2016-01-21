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
	 * constructor for this Product
	 *
	 * @param int $newProductId Id of the product, primary key
	 * @param string $newProductImage image url of the product
	 * @param int $newProductPrice the price of the product
	 * @param string $newAdditionalInfo whatever additional information the product has
	 * @param string $newDescription the description of the product
	 * @param string $newTechicalDetails the product's technical details
	 * @param string $newProductName the name of the product
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds
	 * @throws Exception if some other exception is thrown.
	 */
	public function __construct($newProductId, $newProductImage, $newProductPrice, $newAdditionalInfo, $newDescription, $newTechicalDetails, $newProductName) {
		try {
			$this->setProductId($newProductId);
			$this->setProductImage($newProductImage);
			$this->setProductPrice($newProductPrice);
			$this->setAdditionalInfo($newAdditionalInfo);
			$this->setDescription($newDescription);
			$this->setTechnicalDetails($newTechicalDetails);
			$this->setProductName($newProductName);
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
	 * @throws InvalidArgumentException if newProductImage is not valid
	 */
	public function setProductImage($newProductImage) {
		//Verify the data is of the right type
		$newProductImage = trim($newProductImage);
		$newProductImage = filter_var($newProductImage, FILTER_SANITIZE_STRING);
		if (empty($newProductImage) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
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
	 * @throws InvalidArgumentException if $newProductPrice is not a proper int
	 * @throws RangeException if $newProductPrice is not positive
	 */
	public function setProductPrice($newProductPrice) {
		$newProductPrice = filter_var($newProductPrice, FILTER_VALIDATE_INT);
		//if filter_var rejects the variable, throw an exception
		if($newProductPrice === false) {
			throw(new InvalidArgumentException("Product Price is not a proper int"));
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
	 * @throws InvalidArgumentException if newAdditionalInfo is not valid
	 */
	public function setAdditionalInfo($newAdditionalInfo) {
		//Verify the data is of the right type
		$newAdditionalInfo = trim($newAdditionalInfo);
		$newAdditionalInfo = filter_var($newAdditionalInfo, FILTER_SANITIZE_STRING);
		if (empty($newAdditionalInfo) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
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
	 * @throws InvalidArgumentException if newDescription is not valid
	 */
	public function setDescription($newDescription) {
		//Verify the data is of the right type
		$newDescription = trim($newDescription);
		$newDescription = filter_var($newDescription, FILTER_SANITIZE_STRING);
		if (empty($newDescription) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
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
	 * @throws InvalidArgumentException if $newTechnicalDetails is not valid
	 */
	public function setTechnicalDetails($newTechnicalDetails) {
		//Verify the data is of the right type
		$newTechnicalDetails = trim($newTechnicalDetails);
		$newTechnicalDetails = filter_var($newTechnicalDetails, FILTER_SANITIZE_STRING);
		if (empty($newTechnicalDetails) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
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
	 * @throws InvalidArgumentException if $newProductName is not valid
	 */
	public function setProductName($newProductName) {
		//Verify the data is of the right type
		$newProductName = trim($newProductName);
		$newProductName = filter_var($newProductName, FILTER_SANITIZE_STRING);
		if (empty($newProductName) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->productName = $newProductName;
	}
}