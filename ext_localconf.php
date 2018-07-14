<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'RN.Rncontacts',
            'Contactlist',
            [
                'Contact' => 'list',
            ],
            // non-cacheable actions
            [
                'Contact' => 'list',
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'RN.Rncontacts',
            'Locationmap',
            [
                'Location' => 'list,ajaxlist',
            ],
            // non-cacheable actions
            [
                'Location' => 'list,ajaxlist',
            ]
        );
    }
);
