<?php
#kommentar
defined('TYPO3_MODE') or die();	
	
call_user_func(function()
{

	$pluginSignature = 'rncontacts_locationmap';

	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:rncontacts/Configuration/FlexForms/flexform.xml');

    $pluginSignature = 'rncontacts_contactlist';

    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:rncontacts/Configuration/FlexForms/flexform_contacts.xml');

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'RN.Rncontacts',
            'Contactlist',
            'Kontakt-Liste'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'RN.Rncontacts',
            'Locationmap',
            'Interaktive Karte'
        );
        
        
});