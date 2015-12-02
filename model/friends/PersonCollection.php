<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-27
 * Time: 16:06
 */

namespace model;


class PersonCollection
{
    private $persons;

    public function GetPersons()
    {
        return $this->persons;
    }

    public function AddPerson(\model\Person $person)
    {
        if ($person instanceof \model\Person) {
            $this->persons[] = $person;
        } else {
            throw new \Exception('Object to add must be of typ \model\Person');
        }
    }

    public function GetTheDaysWhenAllPersonsIsAvailable()
    {
        $days =
        [
            0 => false,
            1 => false,
            2 => false,
            3 => false,
            4 => false,
            5 => false,
            6 => false
        ];

        foreach ($this->GetPersons() as $person) {
            $person = $this->GetTypePerson($person);

            $calenderDayStatusCollection = $person->GetCalendarDayStatusCollection();
            $calenderDayStatusCollection = $this->GetTypeCalenderDayStatusCollection($calenderDayStatusCollection)->GetCalendarDayStatusCollection();

            foreach($calenderDayStatusCollection as $calenderDayStatus)
            {
                $days[$this->GetTypeCalenderDayStatus($calenderDayStatus)->GetNr()][] = $this->GetTypeCalenderDayStatus($calenderDayStatus)->GetIsAvailable();
            }
        }

        for($i = 0; $i <= 6; $i++)
        {
            if(is_array($days[$i]))
            {
                if(!in_array(false, $days[$i]))
                {
                    $days[$i] = true;
                }
                else
                {
                    $days[$i] = false;
                }
            }
        }
        return $days;
    }

    private function GetTypePerson(\model\Person $person)
    {
        return $person;
    }

    private function GetTypeCalenderDayStatusCollection(\model\CalendarDayStatusCollection $calendarDayStatusCollection)
    {
        return $calendarDayStatusCollection;
    }

    private function GetTypeCalenderDayStatus(\model\CalendarDayStatus $calendarDayStatus)
    {
        return $calendarDayStatus;
    }
}