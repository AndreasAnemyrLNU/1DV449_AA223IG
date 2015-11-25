<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:40
 */

namespace model;

class XpathQuery
{
    private $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function getQuery()
    {
        return $this->query;
    }
}