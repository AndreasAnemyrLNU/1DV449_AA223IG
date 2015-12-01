<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-30
 * Time: 14:38
 */

namespace model;

class CinemaStatusCollection
{
    private $cinemaStatusCollection;

    private $nameOfCollection;

    public function SetNameOfCollection($nameOfCollection)
    {
        $this->nameOfCollection = $nameOfCollection;
    }

    public function GetNameOfCollection()
    {
        return $this->nameOfCollection;
    }

    public function AddStatus(\model\CinemaStatus $status)
    {
        $this->cinemaStatusCollection[] = $status;
    }

    public function GetCollection()
    {
        return $this->cinemaStatusCollection;
    }
}