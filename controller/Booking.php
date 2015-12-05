<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-12-02
 * Time: 21:48
 */

namespace controller;


class Booking
{
    public function DoBookingTable(\model\Site $site)
    {
        $curl = new \model\Curl($site);


        $response =$curl->CurlIt('/dinner/login', true, $_POST);

        var_dump($response);

    }
}

