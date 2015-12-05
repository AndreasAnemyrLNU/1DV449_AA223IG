<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 13:31
 */

namespace controller;


//use model\DOMXpath;

use view\FullView;

class Master
{
    private $navigation;
    private $site;
    private $siteConfigurator;

    public function __construct()
    {
        $this->navigation = new \view\Navigation();
        //$this->site = new \model\Site("10.0.2.2", "weekend-booking-web-site", 8080);
    }

    public function DoApp()
    {

        $this->navigation->ClientDoConfigSite();

        if($this->navigation->SystemCanLoadSettings())
        {
            $this->site = new \model\Site($_COOKIE['url'],"weekend-booking-web-site", $_COOKIE['port']);
        }

        if($this->navigation->ClientHasNotChoosenIpAndPortForSiteToScrape())
        {
            $this->siteConfigurator = new \view\SiteConfigurator('Do some configuration first...');
            return new FullView
            (
                null,
                null,
                $this->siteConfigurator
            );

        }


        if($this->site !== null)
        {
            $scrape = new \controller\Scrape($this->site);
            $scrape->DoScrape();
        }



        if($this->navigation->CLientIsBookingTable())
        {
            $contoller = new \controller\Booking($this->site);
            $contoller->DoBookingTable($this->site);
        }

        if($this->site !== null)
        {
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
                ),
                new \view\SiteConfigurator('Current settings filled in form. You can update!')
            );
            return $fullView;
        }
        return null;
    }
}