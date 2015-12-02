<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-30
 * Time: 16:27
 */

namespace model;


class DinnerStatus
{
    private $value;
    private $time;
    private $day;

    public function __construct($value, $time, $day)
    {
        $this->value    = $value;
        $this->time     = $time;
        $this->day      = $day;
    }

    public function GetValue()
    {
        return $this->value;
    }

    public function GetTime()
    {
        return $this->time;
    }

    public function GetDay()
    {
        return $this->day;
    }
}