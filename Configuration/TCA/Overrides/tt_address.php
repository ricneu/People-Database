<?php
defined('TYPO3_MODE') || die();

if (!isset($GLOBALS['TCA']['tt_address']['ctrl']['type'])) {
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['tt_address']['ctrl']['type'] = 'tx_extbase_type';
	$GLOBALS['TCA']['tt_address']['ctrl']['title'] = 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tt_address';
	$tempColumnstx_rncontacts_tt_address = [];
	$tempColumnstx_rncontacts_tt_address[$GLOBALS['TCA']['tt_address']['ctrl']['type']] = [
			'exclude' => true,
			'label'   => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts.tx_extbase_type',
			'config' => [
					'type' => 'select',
					'renderType' => 'selectSingle',
					'items' => [
							['',''],
							['Contact','Tx_Rncontacts_Contact']
					],
					'default' => 'Tx_Rncontacts_Contact',
					'size' => 1,
					'maxitems' => 1,
			]
	];
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $tempColumnstx_rncontacts_tt_address);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
		'tt_address',
		$GLOBALS['TCA']['tt_address']['ctrl']['type'],
		'',
		'after:' . $GLOBALS['TCA']['tt_address']['ctrl']['label']
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', 'contacttype', '', 'after:hidden');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', 'management', '', 'after:contacttype');

$tmp_rncontacts_columns = [

		'contacttype' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.type',
				'onChange' => 'reload',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'items' => [
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.type.1', 1],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.type.2', 2],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.type.3.1', 3],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.type.4', 4],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.type.5', 5]
						],
						'size' => 3,
				],
		],
		'management' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.management',
				'onChange' => 'reload',
                'displayCond' =>  'FIELD:contacttype:IN:3',
				'config' => [
						'type' => 'check',
						'items' => [
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.management', ''],
						],
						'size' => 1,
						'maxitems' => 1,
						'eval' => ''
				],
		],
		'presence' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence',
                'displayCond' => [
                    'OR' => [
                        'FIELD:contacttype:IN:2',
                        'FIELD:contacttype:IN:3'
                    ],
                ],
				'config' => [
						'type' => 'check',
						'items' => [
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.1', '1.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.2', '1.2'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.3', '2.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.4', '2.2'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.5', '3.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.6', '3.2'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.7', '4.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.8', '4.2'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.9', '5.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.10', '5.2'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.11', '6.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.12', '6.2'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.13', '7.1'],
								['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.presence.14', '7.2']
						],
						'cols' => 2,
				],
		],
		'opening_hours' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.opening_hours',
                'displayCond' =>  'FIELD:contacttype:IN:1',
				'config' => [
						'type' => 'text',
						'cols' => 40,
						'rows' => 15,
						'eval' => 'trim'
				]
		],
		'district' => [
				'exclude' => true,
				'displayCond' => 'FIELD:contacttype:IN:4',
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.district',
				'config' => [
						'type' => 'select',
                        'renderType' => 'selectMultipleSideBySide',
						'foreign_table' => 'tx_rncontacts_domain_model_district',
						'maxitems' => 9999,
				],

		],
		'activity_consultant' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.activity_consultant',
				'displayCond' => 'FIELD:contacttype:IN:4',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'foreign_table' => 'tx_rncontacts_domain_model_activityconsultant',
						'maxitems' => 9999,
				],
		],
		'activity_project' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.activity_project',
				'displayCond' => 'FIELD:contacttype:IN:2',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'foreign_table' => 'tx_rncontacts_domain_model_activityproject',
						'maxitems' => 9999,
				],

		],
		'activity_consulting' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.activity_consulting',
				'displayCond' => 'FIELD:contacttype:IN:3',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'foreign_table' => 'tx_rncontacts_domain_model_activityconsulting',
						'maxitems' => 9999,
				],

		],
		'topic' => [
				'exclude' => true,
				'displayCond' => 'FIELD:contacttype:IN:4',
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.topic',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'foreign_table' => 'tx_rncontacts_domain_model_topic',
						'maxitems' => 9999,
				],

		],
		'paper' => [
				'exclude' => true,
				'displayCond' => 'FIELD:contacttype:IN:2',
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.paper',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'foreign_table' => 'tx_rncontacts_domain_model_paper',
						'maxitems' => 9999,
				],

		],
		'targetgroup' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.targetgroup',
				'displayCond' => 'FIELD:contacttype:IN:4',
				'config' => [
						'type' => 'select',
						'renderType' => 'selectMultipleSideBySide',
						'maxitems' => 999,
						'foreign_table' => 'tx_rncontacts_domain_model_targetgroup'
				],
		],
		'locations' => [
				'exclude' => true,
				'label' => 'LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tx_rncontacts_domain_model_contact.location',
                'displayCond' => [
                    'OR' => [
                        'FIELD:contacttype:IN:2',
                        'FIELD:contacttype:IN:3'
                    ],
                ],
				'config' => [
						'type' => 'select',
						'renderType' => 'selectSingle',
						'foreign_table' => 'tx_rncontacts_domain_model_location',
                        'itemsProcFunc' => 'RN\\Rncontacts\\UserFunc\\TcaProcFunc->locationAddressItems',
						'size' => 1
				],
		],

];


$GLOBALS['TCA']['tt_address']['types']['Tx_Rncontacts_Contact'] = [
		'columnsOverrides' => [
				'image' => [
						'displayCond' => [
								'OR' => [
										'FIELD:contacttype:IN:1',
										'FIELD:contacttype:IN:2',
										'FIELD:contacttype:IN:4',
								],
						],
				],
				'description' => [
						'displayCond' => 'FIELD:contacttype:IN:1',
				],
				'company' => [
						'displayCond' => 'FIELD:contacttype:IN:5',
				],
				'title' => [
						'displayCond' => [
								'OR' => [
										'FIELD:contacttype:IN:2',
										'FIELD:contacttype:IN:3',
										'FIELD:contacttype:IN:4',
										'FIELD:management:=:1',
								],
						],
				],
				'first_name' => [
						'displayCond' => [
								'OR' => [
										'FIELD:contacttype:IN:2',
										'FIELD:contacttype:IN:3',
										'FIELD:contacttype:IN:4',
										'FIELD:management:=:1',
								],
						],
				],
				'last_name' => [
						'displayCond' => [
								'OR' => [
										'FIELD:contacttype:IN:2',
										'FIELD:contacttype:IN:3',
										'FIELD:contacttype:IN:4',
										'FIELD:management:=:1',
								],
						],
				],
                'gender' => [
                        'displayCond' => [
                                'OR' => [
                                        'FIELD:contacttype:IN:2',
                                        'FIELD:contacttype:IN:3',
                                        'FIELD:contacttype:IN:4',
                                        'FIELD:management:=:1',
                                ],
                        ],
                ],
                'www' => [
                        'displayCond' => 'FIELD:contacttype:IN:5',
                ],
                'fax' => [
                        'displayCond' => 'FIELD:contacttype:IN:2',
                ],
		]
];


$tmp_rncontacts_columns['location'] = [
		'config' => [
				'type' => 'passthrough',
		]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address',$tmp_rncontacts_columns);

/* inherit and extend the show items from the parent class */

if (isset($GLOBALS['TCA']['tt_address']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['tt_address']['types']['Tx_Rncontacts_Contact']['showitem'] = $GLOBALS['TCA']['tt_address']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['tt_address']['types'])) {
	// use first entry in types array
	$tt_address_type_definition = reset($GLOBALS['TCA']['tt_address']['types']);
	$GLOBALS['TCA']['tt_address']['types']['Tx_Rncontacts_Contact']['showitem'] = $tt_address_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['tt_address']['types']['Tx_Rncontacts_Contact']['showitem'] = '';
}
$GLOBALS['TCA']['tt_address']['types']['Tx_Rncontacts_Contact']['showitem'] .= ',--div--;Extended Contactdata,';
$GLOBALS['TCA']['tt_address']['types']['Tx_Rncontacts_Contact']['showitem'] .= 'locations,presence, opening_hours, district,  activity_consultant,activity_consulting,activity_project, topic, paper, targetgroup,';

$GLOBALS['TCA']['tt_address']['columns'][$GLOBALS['TCA']['tt_address']['ctrl']['type']]['config']['items'][] = ['LLL:EXT:rncontacts/Resources/Private/Language/locallang_db.xlf:tt_address.tx_extbase_type.Tx_Rncontacts_Contact','Tx_Rncontacts_Contact'];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
		'',
		'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);
