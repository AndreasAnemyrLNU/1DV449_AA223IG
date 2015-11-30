<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:57
 */

namespace controller;



use model\CinemaStatus;

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

            $this->DoScrapeCinema();

            $this->DoScrapeDinner();

    }

    private function DoScrapeCalendar()
    {
        //TODO start DRY code 999 here
        $agent = new \model\Agent($this->site);
        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/ol/li[1]/a/@href"));
        $domNodeList = $agent->ScrapeSite();

        $domNode = $domNodeList[0];
        $domNode = $this->GetTypeDOMNode($domNode);
        //localhost:8080/calendar/
        $link = $domNode->nodeValue;

        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/div/div/ul//li/a/@href"));
        $domNodeList = $agent->ScrapeSite($link);
        // TODO end dry, fix it later....

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

        //var_dump($this->PersonCollection->GetPersons()[0]->GetDayCollection());
    }

    private function DoScrapeCinema()
    {
        $agent = new \model\Agent($this->site);
        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/ol/li[2]/a/@href"));
        $domNodeList = $agent->ScrapeSite();

        $domNode = $domNodeList->item(0);
        $domNode = $this->GetTypeDOMNode($domNode);
        //localhost:8080/cinema/
        $link = $domNode->nodeValue;

        $days   = $this->GetDaysInFormForDoScrapeCinema($agent, $link);
        $movies  = $this->GetFilmsInFormForDoScrapeCinema($agent, $link);


        foreach($days as $day)
        {

            $statusCollection = new \model\CinemaStatusCollection();

            foreach($movies as $movie)
            {
                $url = "$link/check?day=" . $day['value'] . '&movie=' . $movie['value'];

                $response = $agent->ScrapeSite($url, true);

                $json = json_decode($response, true);

                for($i = 0; $i < count($json); $i++)
                {
                    $status = new \model\CinemaStatus
                    (
                        $json[$i]['status'],
                        $json[$i]['time'],
                        $json[$i]['movie']
                    );

                    $statusCollection->AddStatus($status);
                }
            }

            //print_r($statusCollection);
        }
    }

    private function DoScrapeDinner()
    {
        $agent = new \model\Agent($this->site);
        $agent->SetXpathQuery(new \model\XpathQuery("/html/body/ol/li[3]/a/@href"));
        $domNodeList = $agent->ScrapeSite();

        $domNode = $domNodeList->item(0);
        $domNode = $this->GetTypeDOMNode($domNode);
        //[host]:[port]/dinner/
        $link = $domNode->nodeValue;

        // Only get if is available!
        $agent->SetXpathQuery(new \model\XpathQuery("//input[@name='group1']"));
        $domNodeList = $agent->ScrapeSite($link);

        foreach($domNodeList as $domNode)
        {
            $domNode = $this->GetTypeDOMNode($domNode);

            $value = $domNode->attributes->getNamedItem('value')->nodeValue;
            $day    = substr($value, 0, 3);
            $time   = substr($value, 3, 4);
        }
    }

    // Used for /Calendar/
    private function ConvertStringToBool($string)
    {
        if($string === 'ok')
            return true;
        return false;
    }

    private function GetDaysInFormForDoScrapeCinema(\model\Agent $agent, $link)
    {
        $agent->SetXpathQuery(new \model\XpathQuery("//select[@id='day']//option[position() > 1]"));
        $domNodeList = $agent->ScrapeSite($link);

        $days = Array();

        foreach ($domNodeList as $domNode) {
            $domNode = $this->GetTypeDOMNode($domNode);
            array_push
            (
                $days,
                ['day' => $domNode->nodeValue, 'value' => $domNode->attributes->getNamedItem('value')->nodeValue]
            );
        }
        return $days;
    }

    private function GetFilmsInFormForDoScrapeCinema(\model\Agent $agent, $link)
    {
        $agent->SetXpathQuery(new \model\XpathQuery("//select[@id='movie']//option[position() > 1]"));
        $domNodeList = $agent->ScrapeSite($link);

        $films = Array();

        foreach ($domNodeList as $domNode) {
            $domNode = $this->GetTypeDOMNode($domNode);
            array_push
            (
                $films,
                ['film' => $domNode->nodeValue, 'value' => $domNode->attributes->getNamedItem('value')->nodeValue]
            );
        }
        return $films;
    }

    private function GetTypeDOMNode(\DOMNode $DOMNode)
    {
        return $DOMNode;
    }
}
