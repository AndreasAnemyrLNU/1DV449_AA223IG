<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:33
 */

namespace model;


class Agent
{
    private $result;
    private $site;
    private $scrapedData;
    private $xpathQuery;

    public function GetResult()
    {
        return $this->result;
    }

    public function __construct(\model\Site $site, \model\XpathQuery $xpathQuery)
    {
        $this->site = $site;
        $this->xpathQuery = $xpathQuery;
    }

    private function GetScrapedData()
    {
        return $this->scrapedData;
    }

    public function ScrapeSite()
    {
        $curl = new Curl($this->site);
        $this->scrapedData = $curl->CurlIt();

        $this->result = $this->CreateDomNodeListFromScrapedDataWithXpathQuery();
    }

    private function CreateDomNodeListFromScrapedDataWithXpathQuery()
    {
        $domDocument = new \model\DOMDocument($this->GetScrapedData());

        $xpath = new DOMXpath($domDocument);
        $domNodeList = $xpath->GetDomAfterFiltration($this->xpathQuery);
    }


}