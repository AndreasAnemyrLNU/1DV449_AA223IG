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

    public function __construct(\model\DOMDOMDocument $domDocument)
    {
        $this->m_domDocument = $domDocument;
    }

    public function GetDomAfterFiltration(\model\XpathQuery $xpathQuery)
    {
        $this->m_xpath =  new \DOMXPath($this->m_domDocument->GetDOMDocument());

        return $this->m_xpath->query($xpathQuery->getQuery());
    }
}