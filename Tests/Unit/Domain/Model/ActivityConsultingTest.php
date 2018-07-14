<?php
namespace RN\Rncontacts\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Rico Neumann <info@rico-neumann.info>
 */
class ActivityConsultingTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \RN\Rncontacts\Domain\Model\ActivityConsulting
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \RN\Rncontacts\Domain\Model\ActivityConsulting();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
}
