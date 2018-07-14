<?php

namespace RN\Rncontacts\Controller;

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
 * ContactController
 */
class ContactController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * contactRepository
     *
     * @var \RN\Rncontacts\Domain\Repository\ContactRepository
     * @inject
     */
    protected $contactRepository = null;

    /**
     * locationRepository
     *
     * @var \RN\Rncontacts\Domain\Repository\TargetgroupRepository
     * @inject
     */
    protected $targetgroupRepository = null;

    /**
     * districtRepository
     *
     * @var \RN\Rncontacts\Domain\Repository\DistrictRepository
     * @inject
     */
    protected $districtRepository = null;

    /**
     * topicRepository
     *
     * @var \RN\Rncontacts\Domain\Repository\TopicRepository
     * @inject
     */
    protected $topicRepository = null;

    /**
     * locationRepository
     *
     * @var \RN\Rncontacts\Domain\Repository\LocationRepository
     * @inject
     */
    protected $locationRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $cObj = $this->configurationManager->getContentObject();
        $pid = $cObj->data['pages'];
        $header = $cObj->data['header'];
        $subheader = $cObj->data['subheader'];
        $contactDetail = $this->settings['cardDetail'] ? $this->settings['cardDetail'] : $this->settings['cardDetailDefault'];

        // data for the filter
        $targetgroups = $this->targetgroupRepository->findAll($pid);
        $districts = $this->districtRepository->findAll($pid);
        $topics = $this->topicRepository->findAll($pid);

        //just all members
        $locationsMember = $this->locationRepository->findAll($pid, 2);
        // just all consultants
        $locationsConsultant = $this->locationRepository->findAll($pid, 3);

        $filterParameter = array();

        // set default to ID 2 when empty.
        $filterParameter['contacttype'] = $this->request->hasArgument('contacttype') ? intval(
            $this->request->getArgument('contacttype')
        ) : 2;

        if ($filterParameter['contacttype'] == 4) {
            $filterParameter['topic'] = $this->request->hasArgument('topic') ? intval(
                $this->request->getArgument('topic')
            ) : null;
            $filterParameter['targetgroup'] = $this->request->hasArgument('targetgroup') ? intval(
                $this->request->getArgument('targetgroup')
            ) : null;
            $filterParameter['district'] = $this->request->hasArgument('district') ? intval(
                $this->request->getArgument('district')
            ) : null;
        }


        if ($filterParameter['contacttype'] == 2) {
            $filterParameter['location_1'] = $this->request->hasArgument('location_1') ? intval(
                $this->request->getArgument('location_1')
            ) : null;
            $filterParameter['letter_1'] = $this->request->hasArgument('letter_1') ? strval(
                $this->request->getArgument('letter_1')
            ) : null;
        }
        if ($filterParameter['contacttype'] == 3) {
            $filterParameter['location_2'] = $this->request->hasArgument('location_2') ? intval(
                $this->request->getArgument('location_2')
            ) : null;
            $filterParameter['letter_2'] = $this->request->hasArgument('letter_2') ? strval(
                $this->request->getArgument('letter_2')
            ) : null;
        }
        if ($filterParameter['contacttype'] == 4) {
            $filterParameter['location_3'] = $this->request->hasArgument('location_3') ? intval(
                $this->request->getArgument('location_3')
            ) : null;
            $filterParameter['letter_3'] = $this->request->hasArgument('letter_3') ? strval(
                $this->request->getArgument('letter_3')
            ) : null;
        }

        $contacts = $this->contactRepository->findAll($pid, $filterParameter);

        $this->view->assignMultiple(
            array(
                'header' => $header,
                'subheader' => $subheader,
                'contacts' => $contacts,
                'targetgroups' => $targetgroups,
                'locationsMember' => $locationsMember,
                'locationsConsultant' => $locationsConsultant,
                'topics' => $topics,
                'districts' => $districts,
                'contactDetail' => $contactDetail,
                'filterParameter' => $filterParameter,
            )
        );
    }

    /**
     * action show
     *
     * @param \RN\Rncontacts\Domain\Model\Contact $contact
     * @return void
     */
    public function showAction(\RN\Rncontacts\Domain\Model\Contact $contact)
    {
        $this->view->assign('contact', $contact);
    }
}
