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
 * LocationController
 */
class LocationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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


    public function initializeAction()
    {
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $addJsMethod = 'addJs';

        // add google maps key
        $googleMapsLibrary = 'https://maps.google.com/maps/api/js?v=3&key='.$this->settings['gmapskey'];

        //add js for ajax and google maps request
        $pageRenderer->{$addJsMethod.'Library'}(
            'googleMaps',
            $googleMapsLibrary,
            'text/javascript',
            false,
            false,
            '',
            true
        );

        $scripts[] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath(
                $this->request->getControllerExtensionKey()
            ).'Resources/Public/Scripts/AjaxRequest.js';
        foreach ($scripts as $script) {

            $pageRenderer->{'addJsFooterFile'}($script);
        }
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {

        $filterParameter = [];
        $type = $this->settings['type'];

        $cObj = $this->configurationManager->getContentObject();
        $pid = $cObj->data['pages'] ? $cObj->data['pages'] : 938;

        $filterParameter['zip'] = $this->request->hasArgument('zip') ? $this->request->getArgument('zip') : null;

        if ($filterParameter['zip'] == null) {
            $filterParameter['zip'] = '';
        }

        if ($filterParameter['zip']) {
            if ($type == 0) {
                $locations = $this->locationRepository->findAll($pid, $type, $filterParameter['zip']);
            } else {
                $districtsByPLZ = $this->districtRepository->findByZip($pid, $filterParameter['zip'], $type);
                foreach ($districtsByPLZ as $districtUid) {
                    $locationsByDistrict[] = $this->locationRepository->findByDistrictuid($pid, $districtUid, $type);
                }
                $locations = $locationsByDistrict[0];
            }

        } else {
            if ($type == 0) {
                // if no type is set, take member as default type
                $locations = $this->locationRepository->findAll($pid, 2, null);
            } else {
                $locations = $this->locationRepository->findAll($pid, $type, null);
            }

        }

        $mapsCookie = intval($_COOKIE['mapsCookie']);

        $this->view->assignMultiple(
            array(
                'locations' => $locations,
                'mapsCookie' => $mapsCookie,
                'zip' => $filterParameter['zip'],
            )
        );
    }

    /**
     * action ajaxlist
     *
     * @return void
     */
    public function ajaxlistAction()
    {

        $filterParameter = [];

        $cObj = $this->configurationManager->getContentObject();
        $pid = $cObj->data['pages'] ? $cObj->data['pages'] : 938;


        $filterParameter['location'] = $this->request->hasArgument('location') ? intval(
            $this->request->getArgument('location')
        ) : null;


        if (!is_numeric($filterParameter['location']) OR $filterParameter['location'] == null) {
            $filterParameter['location'] = '';
        }

        $contacts = null;
        if ($filterParameter['location']) {
            $contacts = $this->contactRepository->findWithLocation($pid, $filterParameter['location']);
            $location = $this->locationRepository->findByUid($filterParameter['location'], $type);
            $locationTitle = $location->getTitle();
        }


        $this->view->assignMultiple(
            array(
                'contacts' => $contacts,
                'locationTitle' => $locationTitle,
                'zip' => $filterParameter['zip'],
            )
        );
    }

    /**
     * action show
     *
     * @param \RN\Rncontacts\Domain\Model\Location $location
     * @return void
     */
    public function showAction(\RN\Rncontacts\Domain\Model\Location $location)
    {
        $this->view->assign('location', $location);
    }
}
