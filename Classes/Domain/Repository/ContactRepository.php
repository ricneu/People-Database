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


/**
 * The repository for Contacts
 */
class ContactRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findWithoutZip($startingPoint = null)
    {

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $conditions = [];

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
        }

        return $query->matching(
            $query->logicalAnd(
                $conditions
            )
        )->execute();
    }


    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findAll($startingPoint = null, $filterParameter = array())
    {

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $conditions = [];

        // no persons from the management in this view
        $conditions[] = $query->equals('management', 0);

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
        }

        if ($filterParameter['letter_1'] !== null) {
            $conditions[] = $query->like('last_name', $filterParameter['letter_1'].'%');
        }
        if ($filterParameter['letter_2'] !== null) {
            $conditions[] = $query->like('last_name', $filterParameter['letter_2'].'%');
        }
        if ($filterParameter['letter_3'] !== null) {
            $conditions[] = $query->like('last_name', $filterParameter['letter_3'].'%');
        }

        if ($filterParameter['contacttype'] !== null && $filterParameter['contacttype'] != 'all') {
            $conditions[] = $query->contains('contacttype', $filterParameter['contacttype']);
        }

        if ($filterParameter['targetgroup'] !== null && $filterParameter['targetgroup'] != 'all') {
            $conditions[] = $query->contains('targetgroup', $filterParameter['targetgroup']);
        }

        if ($filterParameter['topic'] !== null && $filterParameter['topic'] != 'all') {
            $conditions[] = $query->contains('topic', $filterParameter['topic']);
        }

        if ($filterParameter['district'] !== null && $filterParameter['district'] != 'all') {
            $conditions[] = $query->contains('district', $filterParameter['district']);
        }


        if (empty(array_filter($filterParameter)) && $filterParameter['contacttype'] != 'all') {
            //default value with no parameter
            $conditions[] = $query->contains('contacttype', 1);
        }

        return $query->matching(
            $query->logicalAnd(
                $conditions
            )
        )->execute();
    }

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findWithLocation($startingPoint = null, $location = null)
    {

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);


        $conditions = [];

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
            $conditions[] = $query->equals('locations', $location);
            // only special contacttypes
            $conditions[] = $query->logicalOr(
                $query->contains('contacttype', 2),
                $query->contains('contacttype', 3)
            );
        }

        $contacts = $query->matching(
            $query->logicalAnd(
                $conditions
            )
        )->execute();

        return $contacts;

    }

    // Order by BE sorting
    protected $defaultOrderings = array(
        'management' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        'last_name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
    );


}
