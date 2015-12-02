<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 13:31
 */

namespace controller;


//use model\DOMXpath;

class Master
{
    public function DoApp()
    {
        $scrape = new \controller\Scrape();
        $scrape->DoScrape();

        $fullView = new \view\FullView
        (
            new \view\AvailableCalendar
            (
                $scrape->GetPersonCollection()
            ),
            new \view\CinemaCalendar
            (
                $scrape->GetCinemaStatusCollection(),
                $scrape->GetPersonCollection(),
                $scrape->GetDinnerStatusCollection()
            )
        );

        return $fullView;
    }
}