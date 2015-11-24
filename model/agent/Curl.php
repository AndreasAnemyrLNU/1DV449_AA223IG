<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 21:49
 */

namespace model;


class Curl
{

    private $site;

    public function __construct(\model\Site $site)
    {
        $this->site = $site;
    }

    public function CurlIt()
    {


        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $this->site->getBaseUrl() . );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);

        echo $data;
    }
}