<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-30
 * Time: 21:39
 */

namespace view;


class FullView
{
    private $availableCalendar;
    private $cinemaCalendar;

    public function GetAvailableCalendar()
    {
        return $this->availableCalendar;
    }

    public function GetCinemaCalendar()
    {
        return $this->cinemaCalendar;
    }

    public function __construct
    (
        \view\AvailableCalendar $availableCalendar,
        \view\CinemaCalendar $cinemaCalendar
    )
    {
        $this->availableCalendar    = $availableCalendar;
        $this->cinemaCalendar       = $cinemaCalendar;
    }
}