<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-28
 * Time: 07:45
 */

namespace model;


class CalendarDayStatusCollection
{
    private $calendarDayStatusCollection;

    public function __construct(\model\CalendarDayStatusCollection $dayCollection = null)
    {
        if($dayCollection !== null)
        {
            if(!$dayCollection instanceof \model\CalendarDayStatusCollection)
                throw new \Exception('Collection must be of type \model\Daycollection');
        }

        $this->calendarDayStatusCollection = $dayCollection;
    }

    public function AddDay(\model\CalendarDayStatus $day)
    {

        if(!$day instanceof \model\CalendarDayStatus)
            throw new \Exception('Object to add must be of type \model\day');

        $this->calendarDayStatusCollection[] = $day;
    }

    public function GetCalendarDayStatusCollection()
    {
        return $this->calendarDayStatusCollection;
    }

    private function GetTypCalendarDayStatus(\model\CalendarDayStatus $calendarDayStatus)
    {
        return $calendarDayStatus;
    }
}