<?php

namespace RN\Rncontacts\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Rico Neumann <info@rico-neumann.info>
 */
class ContactControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \RN\Rncontacts\Controller\ContactController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\RN\Rncontacts\Controller\ContactController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllContactsFromRepositoryAndAssignsThemToView()
    {

        $allContacts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $contactRepository = $this->getMockBuilder(\RN\Rncontacts\Domain\Repository\ContactRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $contactRepository->expects(self::once())->method('findAll')->will(self::returnValue($allContacts));
        $this->inject($this->subject, 'contactRepository', $contactRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('contacts', $allContacts);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenContactToView()
    {
        $contact = new \RN\Rncontacts\Domain\Model\Contact();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('contact', $contact);

        $this->subject->showAction($contact);
    }
}
