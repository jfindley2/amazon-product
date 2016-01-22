<?php

/**
 * Class Profile
 *
 * @author Jacob Findley <jfindley2@cnm.edu>
 *
 * This is the, "Person," who performs actions, such as commenting and reviewing and what-have-you.
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
	 * constructor for this Profile
	 *
	 * @param int $newProfileId Id of the profile, primary key
	 * @param string $newName The user's name
	 * @param string $newLocation Where the user is from
	 * @param string $newBlurb What the user has written about themselves
	 * @throws InvalidArgumentException if data types are not valid
	 * @throws RangeException if data values are out of bounds
	 * @throws Exception if some other exception is thrown.
	 */

	public function __construct($newProfileId, $newName, $newLocation, $newBlurb) {
		try {
			$this->setProfileId($newProfileId);
			$this->setName($newName);
			$this->setLocation($newLocation);
			$this->setBlurb($newBlurb);
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
		if($newProfileId === null) {
			$this->profileId = null;
			return;
		}

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
		if (empty($newName) === true) {
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
		if (empty($newLocation) === true) {
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
		if (empty($newBlurb) === true) {
			throw(new InvalidArgumentException("Content is empty or insecure"));
		}
		$this->blurb = $newBlurb;
	}


	/**
	 * This is the toString method of the class. Currently it displays the name of the user, the location of the user, and the user's blurb.
	 * @return string
	 */
	public function __toString() {
		return "The username of this user is " . $this->getName() . ". They are located at " . $this->getLocation() . ". This is what they have to say about themselves: " . $this->getBlurb();
	}
}