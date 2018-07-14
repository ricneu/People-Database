<?php
namespace RN\Rncontacts\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Rico Neumann <info@rico-neumann.info>
 */
class ContactTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \RN\Rncontacts\Domain\Model\Contact
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \RN\Rncontacts\Domain\Model\Contact();
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
    public function getManagementReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getManagement()
        );
    }

    /**
     * @test
     */
    public function setManagementForIntSetsManagement()
    {
        $this->subject->setManagement(12);

        self::assertAttributeEquals(
            12,
            'management',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPresenceReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPresence()
        );
    }

    /**
     * @test
     */
    public function setPresenceForIntSetsPresence()
    {
        $this->subject->setPresence(12);

        self::assertAttributeEquals(
            12,
            'presence',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOpeningHoursReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOpeningHours()
        );
    }

    /**
     * @test
     */
    public function setOpeningHoursForStringSetsOpeningHours()
    {
        $this->subject->setOpeningHours('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'openingHours',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDistrictReturnsInitialValueForDistrict()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getDistrict()
        );
    }

    /**
     * @test
     */
    public function setDistrictForObjectStorageContainingDistrictSetsDistrict()
    {
        $district = new \RN\Rncontacts\Domain\Model\District();
        $objectStorageHoldingExactlyOneDistrict = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneDistrict->attach($district);
        $this->subject->setDistrict($objectStorageHoldingExactlyOneDistrict);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneDistrict,
            'district',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addDistrictToObjectStorageHoldingDistrict()
    {
        $district = new \RN\Rncontacts\Domain\Model\District();
        $districtObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $districtObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($district));
        $this->inject($this->subject, 'district', $districtObjectStorageMock);

        $this->subject->addDistrict($district);
    }

    /**
     * @test
     */
    public function removeDistrictFromObjectStorageHoldingDistrict()
    {
        $district = new \RN\Rncontacts\Domain\Model\District();
        $districtObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $districtObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($district));
        $this->inject($this->subject, 'district', $districtObjectStorageMock);

        $this->subject->removeDistrict($district);
    }

    /**
     * @test
     */
    public function getActivityConsultantReturnsInitialValueForActivityConsultant()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getActivityConsultant()
        );
    }

    /**
     * @test
     */
    public function setActivityConsultantForObjectStorageContainingActivityConsultantSetsActivityConsultant()
    {
        $activityConsultant = new \RN\Rncontacts\Domain\Model\ActivityConsultant();
        $objectStorageHoldingExactlyOneActivityConsultant = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneActivityConsultant->attach($activityConsultant);
        $this->subject->setActivityConsultant($objectStorageHoldingExactlyOneActivityConsultant);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneActivityConsultant,
            'activityConsultant',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addActivityConsultantToObjectStorageHoldingActivityConsultant()
    {
        $activityConsultant = new \RN\Rncontacts\Domain\Model\ActivityConsultant();
        $activityConsultantObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $activityConsultantObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($activityConsultant));
        $this->inject($this->subject, 'activityConsultant', $activityConsultantObjectStorageMock);

        $this->subject->addActivityConsultant($activityConsultant);
    }

    /**
     * @test
     */
    public function removeActivityConsultantFromObjectStorageHoldingActivityConsultant()
    {
        $activityConsultant = new \RN\Rncontacts\Domain\Model\ActivityConsultant();
        $activityConsultantObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $activityConsultantObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($activityConsultant));
        $this->inject($this->subject, 'activityConsultant', $activityConsultantObjectStorageMock);

        $this->subject->removeActivityConsultant($activityConsultant);
    }

    /**
     * @test
     */
    public function getActivityProjectReturnsInitialValueForActivityProject()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getActivityProject()
        );
    }

    /**
     * @test
     */
    public function setActivityProjectForObjectStorageContainingActivityProjectSetsActivityProject()
    {
        $activityProject = new \RN\Rncontacts\Domain\Model\ActivityProject();
        $objectStorageHoldingExactlyOneActivityProject = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneActivityProject->attach($activityProject);
        $this->subject->setActivityProject($objectStorageHoldingExactlyOneActivityProject);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneActivityProject,
            'activityProject',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addActivityProjectToObjectStorageHoldingActivityProject()
    {
        $activityProject = new \RN\Rncontacts\Domain\Model\ActivityProject();
        $activityProjectObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $activityProjectObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($activityProject));
        $this->inject($this->subject, 'activityProject', $activityProjectObjectStorageMock);

        $this->subject->addActivityProject($activityProject);
    }

    /**
     * @test
     */
    public function removeActivityProjectFromObjectStorageHoldingActivityProject()
    {
        $activityProject = new \RN\Rncontacts\Domain\Model\ActivityProject();
        $activityProjectObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $activityProjectObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($activityProject));
        $this->inject($this->subject, 'activityProject', $activityProjectObjectStorageMock);

        $this->subject->removeActivityProject($activityProject);
    }

    /**
     * @test
     */
    public function getActivityConsultingReturnsInitialValueForActivityConsulting()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getActivityConsulting()
        );
    }

    /**
     * @test
     */
    public function setActivityConsultingForObjectStorageContainingActivityConsultingSetsActivityConsulting()
    {
        $activityConsulting = new \RN\Rncontacts\Domain\Model\ActivityConsulting();
        $objectStorageHoldingExactlyOneActivityConsulting = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneActivityConsulting->attach($activityConsulting);
        $this->subject->setActivityConsulting($objectStorageHoldingExactlyOneActivityConsulting);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneActivityConsulting,
            'activityConsulting',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addActivityConsultingToObjectStorageHoldingActivityConsulting()
    {
        $activityConsulting = new \RN\Rncontacts\Domain\Model\ActivityConsulting();
        $activityConsultingObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $activityConsultingObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($activityConsulting));
        $this->inject($this->subject, 'activityConsulting', $activityConsultingObjectStorageMock);

        $this->subject->addActivityConsulting($activityConsulting);
    }

    /**
     * @test
     */
    public function removeActivityConsultingFromObjectStorageHoldingActivityConsulting()
    {
        $activityConsulting = new \RN\Rncontacts\Domain\Model\ActivityConsulting();
        $activityConsultingObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $activityConsultingObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($activityConsulting));
        $this->inject($this->subject, 'activityConsulting', $activityConsultingObjectStorageMock);

        $this->subject->removeActivityConsulting($activityConsulting);
    }

    /**
     * @test
     */
    public function getTopicReturnsInitialValueForTopic()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTopic()
        );
    }

    /**
     * @test
     */
    public function setTopicForObjectStorageContainingTopicSetsTopic()
    {
        $topic = new \RN\Rncontacts\Domain\Model\Topic();
        $objectStorageHoldingExactlyOneTopic = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTopic->attach($topic);
        $this->subject->setTopic($objectStorageHoldingExactlyOneTopic);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTopic,
            'topic',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTopicToObjectStorageHoldingTopic()
    {
        $topic = new \RN\Rncontacts\Domain\Model\Topic();
        $topicObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $topicObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($topic));
        $this->inject($this->subject, 'topic', $topicObjectStorageMock);

        $this->subject->addTopic($topic);
    }

    /**
     * @test
     */
    public function removeTopicFromObjectStorageHoldingTopic()
    {
        $topic = new \RN\Rncontacts\Domain\Model\Topic();
        $topicObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $topicObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($topic));
        $this->inject($this->subject, 'topic', $topicObjectStorageMock);

        $this->subject->removeTopic($topic);
    }

    /**
     * @test
     */
    public function getPaperReturnsInitialValueForPaper()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPaper()
        );
    }

    /**
     * @test
     */
    public function setPaperForObjectStorageContainingPaperSetsPaper()
    {
        $paper = new \RN\Rncontacts\Domain\Model\Paper();
        $objectStorageHoldingExactlyOnePaper = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePaper->attach($paper);
        $this->subject->setPaper($objectStorageHoldingExactlyOnePaper);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePaper,
            'paper',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPaperToObjectStorageHoldingPaper()
    {
        $paper = new \RN\Rncontacts\Domain\Model\Paper();
        $paperObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $paperObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($paper));
        $this->inject($this->subject, 'paper', $paperObjectStorageMock);

        $this->subject->addPaper($paper);
    }

    /**
     * @test
     */
    public function removePaperFromObjectStorageHoldingPaper()
    {
        $paper = new \RN\Rncontacts\Domain\Model\Paper();
        $paperObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $paperObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($paper));
        $this->inject($this->subject, 'paper', $paperObjectStorageMock);

        $this->subject->removePaper($paper);
    }

    /**
     * @test
     */
    public function getTargetgroupReturnsInitialValueForTargetgroup()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getTargetgroup()
        );
    }

    /**
     * @test
     */
    public function setTargetgroupForObjectStorageContainingTargetgroupSetsTargetgroup()
    {
        $targetgroup = new \RN\Rncontacts\Domain\Model\Targetgroup();
        $objectStorageHoldingExactlyOneTargetgroup = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneTargetgroup->attach($targetgroup);
        $this->subject->setTargetgroup($objectStorageHoldingExactlyOneTargetgroup);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneTargetgroup,
            'targetgroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addTargetgroupToObjectStorageHoldingTargetgroup()
    {
        $targetgroup = new \RN\Rncontacts\Domain\Model\Targetgroup();
        $targetgroupObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $targetgroupObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($targetgroup));
        $this->inject($this->subject, 'targetgroup', $targetgroupObjectStorageMock);

        $this->subject->addTargetgroup($targetgroup);
    }

    /**
     * @test
     */
    public function removeTargetgroupFromObjectStorageHoldingTargetgroup()
    {
        $targetgroup = new \RN\Rncontacts\Domain\Model\Targetgroup();
        $targetgroupObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $targetgroupObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($targetgroup));
        $this->inject($this->subject, 'targetgroup', $targetgroupObjectStorageMock);

        $this->subject->removeTargetgroup($targetgroup);
    }
}
