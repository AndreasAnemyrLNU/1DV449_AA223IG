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
    private $site;
    private $expression;

    /**
     * Agent constructor.
     */
    public function __construct(\model\Site $site, \model\Expression $expression)
    {
        $this->url = $site;
        $this->expression = $expression;
    }

    private function ScrapeIt()
    {
        $curledData = new \model\Curl($this->site);
    }
}