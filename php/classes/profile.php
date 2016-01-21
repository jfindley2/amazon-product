<?php

/**
 * Class Profile
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 */
class Profile {
	/**
	 * id for Profile; this is the primary key
	 * @var int $profileId
	 */
	private $profileId;

	/**
	 * The user's name
	 * @var string $name
	 */
	private $name;
	/**
	 * The user's location
	 * @var string $location
	 */
	private $location;
	/**
	 * What the user has written about themselves
	 * @var string $blurb
	 */
	private $blurb;

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
	 * Accessor method for $name
	 * @return string value of $name
	 */
	public function getName() {
		return $this->name;
	}
	/**
	 * Mutator method for $name
	 *
	 * @param string $newName
	 * @throws InvalidArgumentException if $newName is not a proper string
	 */
	public function setName($newName) {
		//Verify the data is of the right type
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_STRING);
		if (null($newName) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->name = $newName;
	}
	/**
	 * Accessor method for $location
	 * @return string value of $location
	 */
	public function getLocation() {
		return $this->location;
	}
	/**
	 * Mutator method for $location
	 *
	 * @param string $newLocation
	 * @throws InvalidArgumentException if $newLocation is not a proper string
	 */
	public function setLocation($newLocation) {
		//Verify the data is of the right type
		$newLocation = trim($newLocation);
		$newLocation = filter_var($newLocation, FILTER_SANITIZE_STRING);
		if (null($newLocation) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->location = $newLocation;
	}

	/**
	 * Accessor method for $blurb
	 * @return string value of $blurb
	 */
	public function getBlurb() {
		return $this->blurb;
	}
	/**
	 * Mutator method for $blurb
	 *
	 * @param string $newBlurb
	 * @throws InvalidArgumentException if $newBlurb is not a proper string
	 */
	public function setBlurb($newBlurb) {
		//Verify the data is of the right type
		$newBlurb = trim($newBlurb);
		$newBlurb = filter_var($newBlurb, FILTER_SANITIZE_STRING);
		if (null($newBlurb) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->blurb = $newBlurb;
	}
}