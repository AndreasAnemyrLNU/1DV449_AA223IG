<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-27
 * Time: 16:06
 */

namespace model;


class PersonCollection
{
    private $persons;

    public function GetPersons()
    {
        return $this->persons;
    }

    private function AddPerson(\model\Person $person)
    {
        if($person instanceof \model\Person)
            $this->persons[] = $person;

        throw new \Exception('Object to add must be of typ \model\Person');
    }
}