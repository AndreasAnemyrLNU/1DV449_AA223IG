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
    private $name;

    private $baseUrl;

    public function __construct($name, $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }


}