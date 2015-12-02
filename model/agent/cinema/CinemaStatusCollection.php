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
        $day = Array();

        if($this->nameOfCollection == 'Fredag')
        {
            return
            $day =
            [
                'name' => 'Friday',
                'id'        => 4
            ];
        }


        if($this->nameOfCollection == 'Lördag')
        {
            return
            $day =
            [
                'name' => 'Saturday',
                'id'        => 5
            ];
        }
        if($this->nameOfCollection == 'Söndag')
        {
            return
            $day =
            [
                'name' => 'Sunday',
                'id'        => 6
            ];
        }


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