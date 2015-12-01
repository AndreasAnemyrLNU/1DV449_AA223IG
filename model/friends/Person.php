<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:09
 */

namespace model;


class Person
{

    private $calendarDayStatusCollection;

    private $name;

    public function __construct($name, \model\CalendarDayStatusCollection $calendarDayStatusCollection)
    {
        $this->name = $this->SetName($name);

        $this->calendarDayStatusCollection = $this->SetCalendarDayStatusCollection($calendarDayStatusCollection);
    }

    public function GetCalendarDayStatusCollection()
    {
        return $this->calendarDayStatusCollection;
    }

    public function SetCalendarDayStatusCollection($calendarDayStatusCollection)
    {
        if(!$calendarDayStatusCollection instanceof \model\CalendarDayStatusCollection)
            throw new \Exception('Instance must be of type \model\DayCollection');

        return $calendarDayStatusCollection;
    }

    public function GetName()
    {
        return $this->name;
    }

    public function SetName($name)
    {
        if(!is_string($name) || $name == "")
        {
            throw new \Exception('Name can\'t be an empty string or in another type than string');
        }
        return $name;
    }


}