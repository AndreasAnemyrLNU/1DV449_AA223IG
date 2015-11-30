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
    private $statusCollection;

    public function AddStatus(\model\CinemaStatus $status)
    {
        $this->statusCollection[] = $status;
    }

    public function getStatusCollection()
    {
        return $this->statusCollection;
    }
}