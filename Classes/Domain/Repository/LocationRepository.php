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
class LocationRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findAll($startingPoint = null, $type = null, $zip = null)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);


        $conditions = [];

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
        }
        if ($type > 0) {
            $conditions[] = $query->equals('type', $type);
        }

        if ($zip !== null && $type == 0) {
            // show only special type
            $conditions[] = $query->logicalOr(
                [
                    $query->equals('type', 2),
                ]
            );
            $conditions[] = $query->equals('zip', $zip);
        }

        $locations = $query->matching(
            $query->logicalAnd(
                $conditions
            )
        )->execute();


        return $locations;
    }


    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findByDistrictuid($startingPoint = null, $district = '', $type = null)
    {

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $conditions = [];

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
            $conditions[] = $query->equals('district', $district);
        }

        if ($type > 0) {
            $conditions[] = $query->equals('type', $type);
        }

        $locations = $query->matching(
            $query->logicalAnd(
                $conditions
            )
        )->execute();

        return $locations;
    }

    /**
     * Returns all objects of this repository.
     *
     * @return QueryResultInterface|array
     * @api
     */
    public function findZip(
        $startingPoint = null,
        $latitude = 0,
        $longitude = 0,
        $locationsByDistance = false,
        $type = null
    ) {

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $conditions = [];

        if ($startingPoint !== null) {
            $conditions[] = $query->in('pid', GeneralUtility::trimExplode(',', $startingPoint, true));
        }
        if ($type > 0) {
            $conditions[] = $query->equals('type', $type);
        }

        $locations = $query->matching(
            $query->logicalAnd(
                $conditions
            )
        )->execute();


        if (is_float($longitude) && $longitude != 0 && is_float($latitude) && $latitude != 0) {

            // perimeter in Km
            $perimeter = 35;

            // earthradius in Km
            $radius = 6368;
            $latitude = deg2rad($latitude);
            $longitude = deg2rad($longitude);

            $locationsArray = array();
            $locationsByUids = array();
            foreach ($locations as $location) {
                $lat = deg2rad($location->getCoordinatex());
                $lng = deg2rad($location->getCoordinatey());

                $calc = acos(
                        sin($latitude) * sin($lat) + cos($latitude) * cos($lat) * cos($longitude - $lng)
                    ) * $radius;
                if ($calc <= $perimeter) {
                    $distanceCalc = round($calc * 10);
                    $locationsArray[$location->getUid()] = $distanceCalc;
                }
            }

            foreach ($locationsArray as $key => $locationByUid) {
                $locationsByUids[] = $key;
            }

            if ($locationsByDistance == true) {
                return $locationsByUids;
            }

            $query = $this->createQuery();
            $query->getQuerySettings()->setRespectSysLanguage(false);
            $query->getQuerySettings()->setRespectStoragePage(false);

            if (count($locationsByUids) == 0) {
                $locationsByUids[] = 0;
            }

            $constraint = $query->logicalAnd(
                $query->in('uid', $locationsByUids)
            );

            $query->matching($constraint);

            $locations = $query->execute();


        }

        return $locations;
    }

}
