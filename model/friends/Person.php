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

    private $dayCollection;

    private $name;

    public function __construct($name, \model\DayCollection $dayCollection)
    {
        $this->name = $this->SetName($name);

        $this->dayCollection = $this->SetDayCollection($dayCollection);
    }

    public function GetDayCollection()
    {
        return $this->dayCollection;
    }

    public function SetDayCollection($dayCollection)
    {
        if(!$dayCollection instanceof \model\DayCollection)
            throw new \Exception('Instance must be of type \model\DayCollection');

        return $dayCollection;
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