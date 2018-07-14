<?php

$settings = \TYPO3\TtAddress\Utility\SettingsUtility::getSettings();

$version7 = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >= \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('7.0');
$version8 = \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) >= \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('8.0');

$generalLanguageFilePrefix = $version8 ? 'LLL:EXT:lang/Resources/Private/Language/' : 'LLL:EXT:lang/';


return [
    'ctrl' => [
        'title' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'type,title,street,hnr,zip,city,coordinatex,coordinatey,district,phone,email,management,',
        'iconfile' => 'EXT:rncontacts/Resources/Public/Icons/tx_rncontacts_domain_model_location.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, street, hnr, zip, city,phone,email,management, coordinatex, coordinatey, district',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, type,street, hnr, zip, city,phone,email,management, coordinatex, coordinatey, district, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_rncontacts_domain_model_location',
                'foreign_table_where' => 'AND tx_rncontacts_domain_model_location.pid=###CURRENT_PID### AND tx_rncontacts_domain_model_location.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'type' => [
            'exclude' => true,
            'onChange' => 'reload',
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Bitte wählen', 0],
                    ['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.type.1', 1],
                    ['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.type.2', 2],
                    ['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.type.3', 3],
                    ['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.type.4', 4]
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'street' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'hnr' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.hnr',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone' => [
            'label' => $generalLanguageFilePrefix . 'locallang_general.xml:LGL.phone',
            'displayCond' => [
                'OR' => [
                    'FIELD:type:IN:1',
                    'FIELD:type:IN:3',
                    'FIELD:type:IN:4'
                ],
            ],
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'size' => '20',
                'max' => '30'
            ]
        ],
        'management' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.management',
            'displayCond' =>  'FIELD:type:IN:3',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '30'
            ]
        ],
        'email' => [
            'label' => $generalLanguageFilePrefix . 'locallang_general.xml:LGL.email',
            'displayCond' => [
                'OR' => [
                    'FIELD:type:IN:1',
                    'FIELD:type:IN:3',
                    'FIELD:type:IN:4'
                ],
            ],
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
                'max' => '255',
                'softref' => 'email'
            ]
        ],
        'coordinatex' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.coordinatex',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'coordinatey' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.coordinatey',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'district' => [
            'exclude' => true,
            'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_location.district',
			'config' => [
					'type' => 'select',
					'renderType' => 'selectSingle',
					'foreign_table' => 'tx_rncontacts_domain_model_district',
					'maxitems' => 9999,
			],
        ],

    ],
];
