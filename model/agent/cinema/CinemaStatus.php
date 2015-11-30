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
    private $status;
    private $time;
    private $movie;

    public function __construct($status, $time, $movie)
    {
        $this->status = $status;
        $this->time = $time;
        $this->movie = $movie;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getMovie()
    {
        return $this->movie;
    }
}