<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:56
 */

namespace model;


class Xpath
{

    private $xpath;

    public function __construct(\DOMDocument $DOMDocument)
    {
        $this->xpath =  new \DOMXPath($DOMDocument);
    }
}