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
    private $site;

    public function __construct()
    {
        $this->site = new \model\Site("10.0.2.2", "weekend-booking-web-site", 8080);
    }

    public function DoScrape()
    {
            $this->DoScrapeCalendar();
    }

    private function DoScrapeCalendar()
    {
        //Get fir
        $agent = new \model\Agent($this->site);
        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/ol/li[1]/a/@href"));
        $domNodeList = $agent->ScrapeSite();

        $domNode = $domNodeList[0];
        $domNode = $this->GetTypeDOMNode($domNode);
        $linkCalendar = $domNode->nodeValue;

        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/div/div/ul//li/a/@href"));
        $domNodeList = $agent->ScrapeSite($linkCalendar);

        foreach($domNodeList as $domNode)
        {
            $domNode = $this->GetTypeDOMNode($domNode);
            //$link here is link to persons individual calendar.
            $link = $linkCalendar . '/' . $domNode->nodeValue;

            $agent->SetXpathQuery(new \model\XpathQuery("/html/body/table/tbody/tr//td"));
            $domNodeList = $agent->ScrapeSite($link);

            var_dump($domNodeList[0]);
        }
    }

    private function GetTypeDOMNode(\DOMNode $DOMNode)
    {
        return $DOMNode;
    }


}
