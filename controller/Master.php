<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 13:31
 */

namespace controller;


class Master
{
    private $navigation;

    public function DoApp()
    {
        if($this->navigation->ClientWantSystemToScrapeSite)
        {
            new \controller\Scrape();
        }
    }

}