<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:56
 */

namespace model;


class DOMXpath
{
    private $m_domDocument;
    private $m_xpath;

    public function __construct(\model\DOMDocument $domDocument)
    {
        $this->m_domDocument = $domDocument;
    }

    public function GetDomAfterFiltration()
    {
        $xpath =  new \DOMXPath($this->m_domDocument->GetDOMDocument());

        $result =  $xpath->query("/html");
    }
}