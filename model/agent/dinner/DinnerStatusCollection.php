<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-30
 * Time: 16:27
 */

namespace model;


class DinnerStatusCollection
{
    private $dinnerStatusCollection;

    public function AddDinnerStatus(\model\DinnerStatus $dinnerStatus)
    {
        $this->dinnerStatusCollection[] = $dinnerStatus;
    }

    public function GetDinnerStatusCollection()
    {
        return $this->dinnerStatusCollection;
    }



}