<?php
namespace RN\Rncontacts\Domain\Model;

/***
 *
 * This file is part of the "People Database" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Rico Neumann <info@rico-neumann.info>
 *
 ***/

/**
 * Contact
 */
class Contact extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * contacttype
     *
     * @var string
     */
    protected $contacttype = '';

    /**
     * management
     *
     * @var int
     */
    protected $management = 0;


    /**
     * presence
     *
     * @var int
     */
    protected $presence = 0;

    /**
     * openingHours
     *
     * @var string
     */
    protected $openingHours = '';

    /**
     * district
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\District>
     * @cascade remove
     */
    protected $district = null;

    /**
     * activityConsultant
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityConsultant>
     * @cascade remove
     */
    protected $activityConsultant = null;

    /**
     * activityProject
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityProject>
     * @cascade remove
     */
    protected $activityProject = null;

    /**
     * activityConsulting
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityConsulting>
     * @cascade remove
     */
    protected $activityConsulting = null;

    /**
     * topic
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Topic>
     * @cascade remove
     */
    protected $topic = null;

    /**
     * paper
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Paper>
     * @cascade remove
     */
    protected $paper = null;

    /**
     * targetgroup
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Targetgroup>
     * @cascade remove
     */
    protected $targetgroup = null;

	/**
	 * locations
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Location>
	 * @cascade remove
	 */
	protected $locations = null;



	/**
	 * Gender
	 * @var string
	 */
	protected $gender;

	/**
	 * Name
	 * @var string
	 */
	protected $name;

	/**
	 * First Name
	 * @var string
	 */
	protected $firstName;

	/**
	 * Middle Name
	 * @var string
	 */
	protected $middleName;

	/**
	 * Last Name
	 * @var string
	 */
	protected $lastName;

	/**
	 * Birthday
	 * @var \DateTime
	 */
	protected $birthday;

	/**
	 * Title
	 * @var string
	 */
	protected $title;

	/**
	 * Address
	 * @var string
	 */
	protected $address;

	/**
	 * Building
	 * @var string
	 */
	protected $building;

	/**
	 * Room
	 * @var string
	 */
	protected $room;

	/**
	 * Phone
	 * @var string
	 */
	protected $phone;

	/**
	 * Fax
	 * @var string
	 */
	protected $fax;

	/**
	 * Mobile
	 * @var string
	 */
	protected $mobile;

	/**
	 * www
	 * @var string
	 */
	protected $www;

	/**
	 * Email
	 * @var string
	 */
	protected $email;

	/**
	 * Organization
	 * @var string
	 */
	protected $company;

	/**
	 * Position
	 * @var string
	 */
	protected $position;

	/**
	 * City
	 * @var string
	 */
	protected $city;

	/**
	 * Zipcode
	 * @var string
	 */
	protected $zip;

	/**
	 * Region/State
	 * @var string
	 */
	protected $region;

	/**
	 * Country
	 * @var string
	 */
	protected $country;

	/**
	 * Image
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @cascade remove
	 */
	protected $image = null;

	/**
	 * Description
	 * @var string
	 */
	protected $description;



	/**
	 * sets the gender attribute
	 *
	 * @param string $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * returns the gender attribute
	 *
	 * @return string
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * sets the name attribute
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * returns the name attribute
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * sets the firstName attribute
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}

	/**
	 * returns the firstName attribute
	 *
	 * @return string
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * sets the middleName attribute
	 *
	 * @param string $middleName
	 * @return void
	 */
	public function setMiddleName($middleName) {
		$this->middleName = $middleName;
	}

	/**
	 * returns the middleName attribute
	 *
	 * @return string
	 */
	public function getMiddleName() {
		return $this->middleName;
	}

	/**
	 * sets the lastName attribute
	 *
	 * @param string $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * returns the lastName attribute
	 *
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * sets the birthday attribute
	 *
	 * @param \DateTime $birthday
	 * @return void
	 */
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	/**
	 * returns the birthday attribute
	 *
	 * @return \DateTime
	 */
	public function getBirthday() {
		return $this->birthday;
	}

	/**
	 * sets the title attribute
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * returns the title attribute
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * sets the address attribute
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * returns the address attribute
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * sets the building attribute
	 *
	 * @param string $building
	 * @return void
	 */
	public function setBuilding($building) {
		$this->building = $building;
	}

	/**
	 * returns the building attribute
	 *
	 * @return string
	 */
	public function getBuilding() {
		return $this->building;
	}

	/**
	 * sets the room attribute
	 *
	 * @param string $room
	 * @return void
	 */
	public function setRoom($room) {
		$this->room = $room;
	}

	/**
	 * returns the room attribute
	 *
	 * @return string
	 */
	public function getRoom() {
		return $this->room;
	}

	/**
	 * sets the phone attribute
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}

	/**
	 * returns the phone attribute
	 *
	 * @return string
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * sets the fax attribute
	 *
	 * @param string $fax
	 * @return void
	 */
	public function setFax($fax) {
		$this->fax = $fax;
	}

	/**
	 * returns the fax attribute
	 *
	 * @return string
	 */
	public function getFax() {
		return $this->fax;
	}

	/**
	 * sets the mobile attribute
	 *
	 * @param string $mobile
	 * @return void
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	/**
	 * returns the mobile attribute
	 *
	 * @return string
	 */
	public function getMobile() {
		return $this->mobile;
	}

	/**
	 * sets the www attribute
	 *
	 * @param string $www
	 * @return void
	 */
	public function setWww($www) {
		$this->www = $www;
	}

	/**
	 * returns the www attribute
	 *
	 * @return string
	 */
	public function getWww() {
		return $this->www;
	}


	/**
	 * sets the email attribute
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * returns the email attribute
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * sets the company attribute
	 *
	 * @param string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * returns the company attribute
	 *
	 * @return string
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * sets the position attribute
	 *
	 * @param string $position
	 * @return void
	 */
	public function setPosition($position) {
		$this->position = $position;
	}

	/**
	 * returns the position attribute
	 *
	 * @return string
	 */
	public function getPosition() {
		return $this->position;
	}

	/**
	 * sets the city attribute
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * returns the city attribute
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * sets the zip attribute
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * returns the zip attribute
	 *
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * sets the region attribute
	 *
	 * @param string $region
	 * @return void
	 */
	public function setRegion($region) {
		$this->region = $region;
	}

	/**
	 * returns the region attribute
	 *
	 * @return string
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * sets the country attribute
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * returns the country attribute
	 *
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}


	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage()
	{
		return $this->image;
	}

	/**
	 * sets the description attribute
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * returns the description attribute
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * sets the latitude attribute
	 *
	 * @param string $latitude
	 * @return void
	 */
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * returns the latitude attribute
	 *
	 * @return string
	 */
	public function getLatitude() {
		return $this->latitude;
	}

	/**
	 * sets the longitude attribute
	 *
	 * @param string $longitude
	 * @return void
	 */
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}

	/**
	 * returns the longitude attribute
	 *
	 * @return string
	 */
	public function getLongitude() {
		return $this->longitude;
	}


    /**
     * Returns the contacttype
     *
     * @return string $contacttype
     */
    public function getContacttype()
    {
        return $this->contacttype;
    }

    /**
     * Sets the contacttype
     *
     * @param string $contacttype
     * @return void
     */
    public function setContacttype($contacttype)
    {
        $this->contacttype = $contacttype;
    }

    /**
     * Returns the management
     *
     * @return int $management
     */
    public function getManagement()
    {
        return $this->management;
    }

    /**
     * Sets the management
     *
     * @param int $management
     * @return void
     */
    public function setManagement($management)
    {
        $this->management = $management;
    }
    



    /**
     * Returns the presence
     *
     * @return int $presence
     */
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * Sets the presence
     *
     * @param int $presence
     * @return void
     */
    public function setPresence($presence)
    {
        $this->presence = $presence;
    }

    /**
     * Returns the openingHours
     *
     * @return string $openingHours
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    /**
     * Sets the openingHours
     *
     * @param string $openingHours
     * @return void
     */
    public function setOpeningHours($openingHours)
    {
        $this->openingHours = $openingHours;
    }

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->district = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->activityConsultant = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->activityProject = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->activityConsulting = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->topic = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->paper = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->targetgroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->location = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a District
     *
     * @param \RN\Rncontacts\Domain\Model\District $district
     * @return void
     */
    public function addDistrict(\RN\Rncontacts\Domain\Model\District $district)
    {
        $this->district->attach($district);
    }

    /**
     * Removes a District
     *
     * @param \RN\Rncontacts\Domain\Model\District $districtToRemove The District to be removed
     * @return void
     */
    public function removeDistrict(\RN\Rncontacts\Domain\Model\District $districtToRemove)
    {
        $this->district->detach($districtToRemove);
    }

    /**
     * Returns the district
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\District> $district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the district
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\District> $district
     * @return void
     */
    public function setDistrict(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $district)
    {
        $this->district = $district;
    }

    /**
     * Adds a ActivityConsultant
     *
     * @param \RN\Rncontacts\Domain\Model\ActivityConsultant $activityConsultant
     * @return void
     */
    public function addActivityConsultant(\RN\Rncontacts\Domain\Model\ActivityConsultant $activityConsultant)
    {
        $this->activityConsultant->attach($activityConsultant);
    }

    /**
     * Removes a ActivityConsultant
     *
     * @param \RN\Rncontacts\Domain\Model\ActivityConsultant $activityConsultantToRemove The ActivityConsultant to be removed
     * @return void
     */
    public function removeActivityConsultant(\RN\Rncontacts\Domain\Model\ActivityConsultant $activityConsultantToRemove)
    {
        $this->activityConsultant->detach($activityConsultantToRemove);
    }

    /**
     * Returns the activityConsultant
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityConsultant> $activityConsultant
     */
    public function getActivityConsultant()
    {
        return $this->activityConsultant;
    }

    /**
     * Sets the activityConsultant
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityConsultant> $activityConsultant
     * @return void
     */
    public function setActivityConsultant(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $activityConsultant)
    {
        $this->activityConsultant = $activityConsultant;
    }

    /**
     * Adds a ActivityProject
     *
     * @param \RN\Rncontacts\Domain\Model\ActivityProject $activityProject
     * @return void
     */
    public function addActivityProject(\RN\Rncontacts\Domain\Model\ActivityProject $activityProject)
    {
        $this->activityProject->attach($activityProject);
    }

    /**
     * Removes a ActivityProject
     *
     * @param \RN\Rncontacts\Domain\Model\ActivityProject $activityProjectToRemove The ActivityProject to be removed
     * @return void
     */
    public function removeActivityProject(\RN\Rncontacts\Domain\Model\ActivityProject $activityProjectToRemove)
    {
        $this->activityProject->detach($activityProjectToRemove);
    }

    /**
     * Returns the activityProject
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityProject> $activityProject
     */
    public function getActivityProject()
    {
        return $this->activityProject;
    }

    /**
     * Sets the activityProject
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityProject> $activityProject
     * @return void
     */
    public function setActivityProject(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $activityProject)
    {
        $this->activityProject = $activityProject;
    }

    /**
     * Adds a ActivityConsulting
     *
     * @param \RN\Rncontacts\Domain\Model\ActivityConsulting $activityConsulting
     * @return void
     */
    public function addActivityConsulting(\RN\Rncontacts\Domain\Model\ActivityConsulting $activityConsulting)
    {
        $this->activityConsulting->attach($activityConsulting);
    }

    /**
     * Removes a ActivityConsulting
     *
     * @param \RN\Rncontacts\Domain\Model\ActivityConsulting $activityConsultingToRemove The ActivityConsulting to be removed
     * @return void
     */
    public function removeActivityConsulting(\RN\Rncontacts\Domain\Model\ActivityConsulting $activityConsultingToRemove)
    {
        $this->activityConsulting->detach($activityConsultingToRemove);
    }

    /**
     * Returns the activityConsulting
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityConsulting> $activityConsulting
     */
    public function getActivityConsulting()
    {
        return $this->activityConsulting;
    }

    /**
     * Sets the activityConsulting
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\ActivityConsulting> $activityConsulting
     * @return void
     */
    public function setActivityConsulting(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $activityConsulting)
    {
        $this->activityConsulting = $activityConsulting;
    }

    /**
     * Adds a Topic
     *
     * @param \RN\Rncontacts\Domain\Model\Topic $topic
     * @return void
     */
    public function addTopic(\RN\Rncontacts\Domain\Model\Topic $topic)
    {
        $this->topic->attach($topic);
    }

    /**
     * Removes a Topic
     *
     * @param \RN\Rncontacts\Domain\Model\Topic $topicToRemove The Topic to be removed
     * @return void
     */
    public function removeTopic(\RN\Rncontacts\Domain\Model\Topic $topicToRemove)
    {
        $this->topic->detach($topicToRemove);
    }

    /**
     * Returns the topic
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Topic> $topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Sets the topic
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Topic> $topic
     * @return void
     */
    public function setTopic(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Adds a Paper
     *
     * @param \RN\Rncontacts\Domain\Model\Paper $paper
     * @return void
     */
    public function addPaper(\RN\Rncontacts\Domain\Model\Paper $paper)
    {
        $this->paper->attach($paper);
    }

    /**
     * Removes a Paper
     *
     * @param \RN\Rncontacts\Domain\Model\Paper $paperToRemove The Paper to be removed
     * @return void
     */
    public function removePaper(\RN\Rncontacts\Domain\Model\Paper $paperToRemove)
    {
        $this->paper->detach($paperToRemove);
    }

    /**
     * Returns the paper
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Paper> $paper
     */
    public function getPaper()
    {
        return $this->paper;
    }

    /**
     * Sets the paper
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Paper> $paper
     * @return void
     */
    public function setPaper(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $paper)
    {
        $this->paper = $paper;
    }

    /**
     * Adds a Targetgroup
     *
     * @param \RN\Rncontacts\Domain\Model\Targetgroup $targetgroup
     * @return void
     */
    public function addTargetgroup(\RN\Rncontacts\Domain\Model\Targetgroup $targetgroup)
    {
        $this->targetgroup->attach($targetgroup);
    }

    /**
     * Removes a Targetgroup
     *
     * @param \RN\Rncontacts\Domain\Model\Targetgroup $targetgroupToRemove The Targetgroup to be removed
     * @return void
     */
    public function removeTargetgroup(\RN\Rncontacts\Domain\Model\Targetgroup $targetgroupToRemove)
    {
        $this->targetgroup->detach($targetgroupToRemove);
    }

    /**
     * Returns the targetgroup
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Targetgroup> $targetgroup
     */
    public function getTargetgroup()
    {
        return $this->targetgroup;
    }

    /**
     * Sets the targetgroup
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Targetgroup> $targetgroup
     * @return void
     */
    public function setTargetgroup(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $targetgroup)
    {
        $this->targetgroup = $targetgroup;
    }


	/**
	 * Adds a Locations
	 *
	 * @param \RN\Rncontacts\Domain\Model\Location $locations
	 * @return void
	 */
	public function addLocations(\RN\Rncontacts\Domain\Model\Location $locations)
	{
		$this->locations->attach($locations);
	}

	/**
	 * Removes a Locations
	 *
	 * @param \RN\Rncontacts\Domain\Model\Location $locationsToRemove The Location to be removed
	 * @return void
	 */
	public function removeLocations(\RN\Rncontacts\Domain\Model\Location $locationsToRemove)
	{
		$this->locations->detach($locationsToRemove);
	}

	/**
	 * Returns the locations
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Location> $locations
	 */
	public function getLocations()
	{
		return $this->locations;
	}

	/**
	 * Sets the locations
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Location> $locations
	 * @return void
	 */
	public function setLocations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $locations)
	{
		$this->locations = $locations;
	}



}
