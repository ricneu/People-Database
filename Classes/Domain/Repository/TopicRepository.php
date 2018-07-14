<?php

namespace RN\Rncontacts\Domain\Repository;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * The repository for Locations
 */
class TopicRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findAll($startingPoint = null)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $conditions = [];

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
        }

        return $query->execute();
    }


}
