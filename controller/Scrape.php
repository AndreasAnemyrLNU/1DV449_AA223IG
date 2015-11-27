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

    private $PersonCollection;

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
        $agent = new \model\Agent($this->site);
        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/ol/li[1]/a/@href"));
        $domNodeList = $agent->ScrapeSite();

        $domNode = $domNodeList[0];
        $domNode = $this->GetTypeDOMNode($domNode);
        //localhost:8080/calendar/
        $link = $domNode->nodeValue;

        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/div/div/ul//li/a/@href"));
        $domNodeList = $agent->ScrapeSite($link);

        foreach($domNodeList as $domNode)
        {
            $domNode = $this->GetTypeDOMNode($domNode);
            //$link here is link to persons individual calendar.
            $tmpLink = $link . '/' . $domNode->nodeValue;

            // scrape name
            $agent->SetXpathQuery(new \model\XpathQuery("/html/body/h2/text()"));
            $name = $agent->ScrapeSite($tmpLink)[0]->nodeValue;

            // scrapes "ok"
            $agent->SetXpathQuery(new \model\XpathQuery("/html/body/table/tbody/tr//td"));

            // Friday
            $days[5]     = strtolower($agent->ScrapeSite($tmpLink)[0]->nodeValue);
            // Saturday
            $days[6]     = strtolower($agent->ScrapeSite($tmpLink)[1]->nodeValue);
            // Sunday
            $days[7]     = strtolower($agent->ScrapeSite($tmpLink)[2]->nodeValue);


            new \model\Person($name, $days);

            new \model\PersonCollection();



        }
    }

    private function GetTypeDOMNode(\DOMNode $DOMNode)
    {
        return $DOMNode;
    }
}
