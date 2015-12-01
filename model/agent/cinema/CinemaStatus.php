<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-30
 * Time: 14:35
 */

namespace model;


class CinemaStatus
{
    private $movie;
    private $name;
    private $status;
    private $time;

    public function __construct($name, $status, $time, $movie)
    {
        $this->movie        = $movie;
        $this->name         = $name;
        $this->status       = $status;
        $this->time         = $time;
    }

    public function GetName()
    {
        return $this->name;
    }

    public function GetStatus()
    {
        return $this->status;
    }

    public function GetTime()
    {
        return $this->time;
    }

    public function GetMovie()
    {
        return $this->movie;
    }
}