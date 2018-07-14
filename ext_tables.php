<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'rncontacts',
            'Configuration/TypoScript',
            'People Database'
        );


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_location',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_location.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_location'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_paper',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_paper.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_paper'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_activityproject',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_activityproject.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_activityproject'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_activityconsulting',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_activityconsulting.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_activityconsulting'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_activityconsultant',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_activityconsultant.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_activityconsultant'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_targetgroup',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_targetgroup.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_targetgroup'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_topic',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_topic.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_topic'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_rncontacts_domain_model_district',
            'EXT:rncontacts/Resources/Private/Language/locallang_csh_tx_rncontacts_domain_model_district.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_rncontacts_domain_model_district'
        );


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
            'rncontacts',
            'tx_rncontacts_domain_model_location'
        );

    }
);
