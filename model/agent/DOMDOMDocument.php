<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-25
 * Time: 09:02
 */

namespace model;


class DOMDOMDocument
{
    private $m_domDocument;

    public function __construct($result)
    {
        $this->m_domDocument = new \DOMDocument();

        @$this->m_domDocument->loadHTML($result);
    }

    public function GetDOMDocument()
    {
        return $this->m_domDocument;
    }
}