<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-28
 * Time: 07:45
 */

namespace model;


class Day
{
    // #0 is Monday, #1 is Tuesday .. #6 is Sunday
    private $nr;
    // Monday, Tuesday etc etc
    private         $name;
    private static  $nameMaxLength = 24;
    // Represents if friend is "ok" to go out...
    private $isAvailable;

    /**
     * Day constructor.
     * @param $nr
     * @param $name
     * @param $isAvailable
     */
    public function __construct($nr, $name, $isAvailable)
    {
        $this->nr           = $this->SetNr($nr);
        $this->name         = $this->SetName($name);
        $this->isAvailable  = $this->SetIsAvailable($isAvailable);
    }

    public function GetNr()
    {
        return $this->nr;
    }

    public function SetNr($nr)
    {
        if(!is_int($nr))
            throw new \Exception('A number must me an int');

        if($nr < 0 || $nr > 6)
            throw new \ Exception("The number of a day must be between 0 and 6");

        return $nr;
    }

    public function GetName()
    {
        return $this->name;
    }

    public function SetName($name)
    {
        if(!is_string($name))
            throw new \Exception('A name must be of type string');

        if(count_chars($name) === 0)
            throw new \Exception('A name can\'t consist of Zero letters');

        if(count($name) > self::$nameMaxLength)
            echo count($name);
            //throw new \Exception('Max length for a name of Person is ' . self::$nameMaxLength);

            return $name;
    }

    public function GetIsAvailable()
    {
        return $this->isAvailable;
    }

    public function SetIsAvailable($isAvailable)
    {
        if(!is_bool($isAvailable))
            throw new \Exception("Isavailable must be of type bool when it come's to construct...");

        return $isAvailable;
    }
}