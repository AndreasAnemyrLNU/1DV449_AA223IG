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
    private $m_curl;
    private $result;
    private $site;
    private $scrapedData;
    private $m_xpathQuery;


    public function GetResult()
    {
        return $this->result;
    }

    public function __construct(\model\Site $site)
    {
        $this->m_curl = new Curl($site);
        $this->site = $site;
    }

    private function CreateDomNodeListFromScrapedDataWithXpathQuery()
    {
        $domDocument = new \model\DOMDOMDocument($this->GetScrapedData());

        $xpath = new DOMXpath($domDocument);
        $domNodeList = $xpath->GetDomAfterFiltration($this->m_xpathQuery);
        return $domNodeList;
    }

    public function SetXpathQuery(\model\XpathQuery $xpathQuery)
    {
        $this->m_xpathQuery = $xpathQuery;
    }

    private function GetScrapedData()
    {
        return $this->scrapedData;
    }

    public function ScrapeSite($path = "")
    {

        $this->scrapedData = $this->m_curl->CurlIt($path);
        $domNodeList = $this->result = $this->CreateDomNodeListFromScrapedDataWithXpathQuery();
        return $domNodeList;
    }
}