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
    private $handle;
    private $site;
    private $scrapedData;

    public function __construct(\model\Site $site)
    {
        $this->handle = curl_init();
        $this->site = $site;
    }

    public function CurlIt()
    {
        curl_setopt($this->handle, CURLOPT_URL, $this->site->getBaseUrl() . ':' . $this->site->getPort());
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, 1);
        $this->scrapedData = curl_exec($this->handle);
        return $this->scrapedData;
    }


}