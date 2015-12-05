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
    private $siteConfigurator;

    public function GetAvailableCalendar()
    {
        return $this->availableCalendar;
    }

    public function GetCinemaCalendar()
    {
        return $this->cinemaCalendar;
    }

    public function GetSiteConfigurator()
    {
        return $this->siteConfigurator;
    }

    public function __construct
    (
        \view\AvailableCalendar $availableCalendar = null,
        \view\CinemaCalendar $cinemaCalendar = null,
        \view\SiteConfigurator $siteConfigurator = null
    )
    {
        $this->availableCalendar    = $availableCalendar;
        $this->cinemaCalendar       = $cinemaCalendar;
        $this->siteConfigurator     = $siteConfigurator;
    }
}