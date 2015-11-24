<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:30
 */

namespace model;


class Site
{
    private $baseUrl;
    private $name;
    private $port;

    public function __construct($baseUrl, $name, $port)
    {
        $this->baseUrl  = $baseUrl;
        $this->name     = $name;
        $this->port     = $port;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPort()
    {
        return $this->port;
    }
}