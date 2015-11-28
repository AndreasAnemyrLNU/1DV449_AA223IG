<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-28
 * Time: 07:45
 */

namespace model;


class DayCollection
{
    private $dayCollection;

    public function __construct(\model\DayCollection $dayCollection = null)
    {
        if($dayCollection !== null)
        {
            if(!$dayCollection instanceof \model\DayCollection)
                throw new \Exception('Collection must be of type \model\Daycollection');
        }

        $this->dayCollection = $dayCollection;
    }

    public function AddDay(\model\Day $day)
    {

        if(!$day instanceof \model\Day)
            throw new \Exception('Object to add must be of type \model\day');

        $this->dayCollection[] = $day;
    }

    public function GetDayCollection()
    {
        return $this->dayCollection;
    }
}