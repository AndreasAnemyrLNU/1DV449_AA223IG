<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:57
 */

namespace controller;


use model\Agent;

class Scrape
{
    private $agentData;

    public function __construct()
    {
        $this->DoScrape();
    }

    public function DoScrape()
    {
        new Agent()
    }
}