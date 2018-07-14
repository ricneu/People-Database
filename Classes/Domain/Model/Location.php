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
 * Location
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * type
     *
     * @var int
     */
    protected $type = '';

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Phone
     * @var string
     */
    protected $phone;

    /**
     * Fax
     * @var string
     */
    protected $management;

    /**
     * Email
     * @var string
     */
    protected $email;


    /**
     * street
     *
     * @var string
     */
    protected $street = '';

    /**
     * hnr
     *
     * @var string
     */
    protected $hnr = '';

    /**
     * zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * coordinatex
     *
     * @var string
     */
    protected $coordinatex = '';

    /**
     * coordinatey
     *
     * @var string
     */
    protected $coordinatey = '';

    /**
     * district
     *
     * @var int
     */
    protected $district = '';

    /**
     * contacts
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Contact>
     * @cascade remove
     */
    protected $contacts = null;

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
        $this->contacts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the street
     *
     * @return string $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Sets the street
     *
     * @param string $street
     * @return void
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Returns the hnr
     *
     * @return string $hnr
     */
    public function getHnr()
    {
        return $this->hnr;
    }

    /**
     * Sets the hnr
     *
     * @param string $hnr
     * @return void
     */
    public function setHnr($hnr)
    {
        $this->hnr = $hnr;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * sets the phone attribute
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * returns the phone attribute
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * sets the management attribute
     *
     * @param string $management
     * @return void
     */
    public function setManagement($management)
    {
        $this->management = $management;
    }

    /**
     * returns the management attribute
     *
     * @return string
     */
    public function getManagement()
    {
        return $this->management;
    }

    /**
     * sets the email attribute
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * returns the email attribute
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Returns the coordinatex
     *
     * @return string $coordinatex
     */
    public function getCoordinatex()
    {
        return $this->coordinatex;
    }

    /**
     * Sets the coordinatex
     *
     * @param string $coordinatex
     * @return void
     */
    public function setCoordinatex($coordinatex)
    {
        $this->coordinatex = $coordinatex;
    }

    /**
     * Returns the coordinatey
     *
     * @return string $coordinatey
     */
    public function getCoordinatey()
    {
        return $this->coordinatey;
    }

    /**
     * Sets the coordinatey
     *
     * @param string $coordinatey
     * @return void
     */
    public function setCoordinatey($coordinatey)
    {
        $this->coordinatey = $coordinatey;
    }

    /**
     * Adds a Contact
     *
     * @param \RN\Rncontacts\Domain\Model\Contact $contact
     * @return void
     */
    public function addContact(\RN\Rncontacts\Domain\Model\Contact $contact)
    {
        $this->contacts->attach($contact);
    }

    /**
     * Removes a Contact
     *
     * @param \RN\Rncontacts\Domain\Model\Contact $contactToRemove The Contact to be removed
     * @return void
     */
    public function removeContact(\RN\Rncontacts\Domain\Model\Contact $contactToRemove)
    {
        $this->contacts->detach($contactToRemove);
    }

    /**
     * Returns the contacts
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Contact> $contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Sets the contacts
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\RN\Rncontacts\Domain\Model\Contact> $contacts
     * @return void
     */
    public function setContacts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Returns the type
     *
     * @return int type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the district
     *
     * @return int district
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the district
     *
     * @param string $district
     * @return void
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }
}
