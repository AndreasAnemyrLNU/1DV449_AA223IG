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
    private $path;
    private $site;
    private $scrapedData;

    public function __construct(\model\Site $site)
    {
        $this->handle = curl_init();
        $this->site = $site;
    }

    public function CurlIt($path = "")
    {
        $curlOptUrl = $this->site->getBaseUrl() . ':' . $this->site->getPort() . "$path";

        curl_setopt($this->handle, CURLOPT_COOKIE,              __DIR__ . './connect.sid');
        curl_setopt($this->handle, CURLOPT_COOKIEFILE,          __DIR__ . './connect.sid');
        curl_setopt($this->handle, CURLOPT_COOKIEJAR,           __DIR__ . './connect.sid');
        curl_setopt($this->handle, CURLOPT_HEADER,              0);
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER,      1);
        curl_setopt($this->handle, CURLOPT_URL,                 $curlOptUrl);
        curl_setopt($this->handle, CURLOPT_FOLLOWLOCATION,      1);

        curl_setopt
                   (
                    $this->handle, CURLOPT_HTTPHEADER,          array
                                                                (
                                                                    'Content-Type: application/json',
                                                                    'Accept: application/json'
                                                                )
                   );


        $this->scrapedData = curl_exec($this->handle);

        return $this->scrapedData;
    }
}
