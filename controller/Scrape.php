<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:57
 */

namespace controller;

class Scrape
{

    public function DoScrape()
    {
        $agent = new \model\Agent
        (
            new \model\Site("10.0.2.2", "weekend-booking-web-site", 8080),
            new \model\XpathQuery("//li")
        );

        $this->scrapedData = $agent->ScrapeSite();
    }
}
