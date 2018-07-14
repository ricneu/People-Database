<?php
namespace RN\Rncontacts\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Rico Neumann <info@rico-neumann.info>
 */
class LocationTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \RN\Rncontacts\Domain\Model\Location
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \RN\Rncontacts\Domain\Model\Location();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForIntSetsType()
    {
        $this->subject->setType(12);

        self::assertAttributeEquals(
            12,
            'type',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStreetReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetForStringSetsStreet()
    {
        $this->subject->setStreet('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'street',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getHnrReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getHnr()
        );
    }

    /**
     * @test
     */
    public function setHnrForStringSetsHnr()
    {
        $this->subject->setHnr('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'hnr',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZipReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function setZipForStringSetsZip()
    {
        $this->subject->setZip('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zip',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity()
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'city',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCoordinatexReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCoordinatex()
        );
    }

    /**
     * @test
     */
    public function setCoordinatexForStringSetsCoordinatex()
    {
        $this->subject->setCoordinatex('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'coordinatex',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCoordinateyReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCoordinatey()
        );
    }

    /**
     * @test
     */
    public function setCoordinateyForStringSetsCoordinatey()
    {
        $this->subject->setCoordinatey('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'coordinatey',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDistrictReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDistrict()
        );
    }

    /**
     * @test
     */
    public function setDistrictForIntSetsDistrict()
    {
        $this->subject->setDistrict(12);

        self::assertAttributeEquals(
            12,
            'district',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getContactsReturnsInitialValueForContact()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getContacts()
        );
    }

    /**
     * @test
     */
    public function setContactsForObjectStorageContainingContactSetsContacts()
    {
        $contact = new \RN\Rncontacts\Domain\Model\Contact();
        $objectStorageHoldingExactlyOneContacts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneContacts->attach($contact);
        $this->subject->setContacts($objectStorageHoldingExactlyOneContacts);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneContacts,
            'contacts',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addContactToObjectStorageHoldingContacts()
    {
        $contact = new \RN\Rncontacts\Domain\Model\Contact();
        $contactsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($contact));
        $this->inject($this->subject, 'contacts', $contactsObjectStorageMock);

        $this->subject->addContact($contact);
    }

    /**
     * @test
     */
    public function removeContactFromObjectStorageHoldingContacts()
    {
        $contact = new \RN\Rncontacts\Domain\Model\Contact();
        $contactsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $contactsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($contact));
        $this->inject($this->subject, 'contacts', $contactsObjectStorageMock);

        $this->subject->removeContact($contact);
    }
}
