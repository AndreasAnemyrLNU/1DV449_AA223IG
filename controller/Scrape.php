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
    private $PersonCollection;

    private $site;

    public function __construct()
    {
        $this->site = new \model\Site("10.0.2.2", "weekend-booking-web-site", 8080);
        $this->PersonCollection = new \model\PersonCollection();
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

            $dayCollection = new \model\DayCollection();
            // Friday
            $dayCollection->AddDay(new \model\Day(4, 'Friday', $this->ConvertStringToBool(strtolower($agent->ScrapeSite($tmpLink)[0]->nodeValue))));
            // Saturday
            $dayCollection->AddDay(new \model\Day(5, 'Saturday', $this->ConvertStringToBool(strtolower($agent->ScrapeSite($tmpLink)[1]->nodeValue))));
            // Sunday
            $dayCollection->AddDay(new \model\Day(6, 'Sunday', $this->ConvertStringToBool(strtolower($agent->ScrapeSite($tmpLink)[2]->nodeValue))));

            $person = new \model\Person($name, $dayCollection);

            $this->PersonCollection->AddPerson($person);
        }

        var_dump($this->PersonCollection->GetPersons()[0]->GetDayCollection());
    }

    private function GetTypeDOMNode(\DOMNode $DOMNode)
    {
        return $DOMNode;
    }

    private function ConvertStringToBool($string)
    {
        if($string === 'ok')
            return true;
        return false;
    }
}
