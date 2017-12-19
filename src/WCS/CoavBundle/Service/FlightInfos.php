<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 18/12/17
 * Time: 11:33
 */

namespace WCS\CoavBundle\Service;


use WCS\CoavBundle\Entity\PlanetModel;

class FlightInfos
{
    const EARTH_RADIUS = 6371;

    /**
     * @var string
     */
    private $unit;

    public function __construct($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @param $latitudeFrom
     * @param $longitudeFrom
     * @param $latitudeTo
     * @param $longitudeTo
     * @return float
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $d = 0;
        $dLat = deg2rad($latitudeTo - $latitudeFrom);
        $dLon = deg2rad($longitudeTo - $longitudeFrom);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));


        switch ($this->unit) {
            case 'km':
                $d = $c * self::EARTH_RADIUS;
                break;
            case 'mi':
                $d = $c * self::EARTH_RADIUS / 1.609344;
                break;
            case 'nmi':
                $d = $c * self::EARTH_RADIUS / 1.852;
                break;
        }

        return $d;
    }

    public function getDuration($distance, $cruiseSpeed)
    {
        $duration = $distance / $cruiseSpeed ;
        return $duration;
    }
}