<?php

namespace RN\Rncontacts\UserFunc;

use TYPO3\CMS\Backend\Utility\BackendUtility as BackendUtilityCore;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\StringUtility;


class TcaProcFunc
{
    /**
     * @param array $config
     * @param $parentObject
     * @return array
     */
    public function locationAddressItems($config)
    {

        if (in_array(2, $config['row']['contacttype']) || in_array(3, $config['row']['contacttype'])) {
            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(
                'tx_rncontacts_domain_model_location'
            );
            $locationByType = $queryBuilder->select('uid', 'title', 'type')->from(
                'tx_rncontacts_domain_model_location'
            )->where($queryBuilder->expr()->in('type', $config['row']['contacttype']))->execute()->fetchAll();

            $itemList[] = ['', 0];
            foreach ($locationByType as $row) {
                $itemList[] = [$row['title'], $row['uid']];
            }

            $config['items'] = $itemList;


        }

        return $config;

    }
}