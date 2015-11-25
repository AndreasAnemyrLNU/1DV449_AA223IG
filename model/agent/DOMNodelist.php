<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-25
 * Time: 12:26
 */

namespace model;


class DOMNodelist
{

    private $m_domNodeList;

    public function __construct(\DOMNodeList $domNodeList)
    {
        $this->m_domNodeList = $domNodeList;
    }
}