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

    private function SetIsPost($post = null)
    {
        curl_setopt($this->handle, CURLOPT_POSTFIELDS,          http_build_query($post));
    }

    public function CurlIt($path = "", $isPost = false, $post = null)
    {
        $curlOptUrl = $this->site->getBaseUrl() . ':' . $this->site->getPort() . "$path";


        if($isPost)
        {
            $this->SetIsPost($post);
        }


        curl_setopt($this->handle, CURLOPT_USERAGENT,           "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5" );
        //curl_setopt($this->handle, CURLOPT_COOKIE,              'connect.sid');
        curl_setopt($this->handle, CURLOPT_COOKIEFILE,          __DIR__ . './connect.sid');
        curl_setopt($this->handle, CURLOPT_COOKIEJAR,           __DIR__ . './connect.sid');
        curl_setopt($this->handle, CURLOPT_HEADER,              0);
        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER,      1);
        curl_setopt($this->handle, CURLOPT_URL,                 $curlOptUrl);
        curl_setopt($this->handle, CURLOPT_FOLLOWLOCATION,      1);

        /*
        curl_setopt
                   (
                    $this->handle, CURLOPT_HTTPHEADER,          array
                                                                (
                                                                    'Content-Type: application/json',
                                                                )
                   );
        */

        $this->scrapedData = curl_exec($this->handle);

        return $this->scrapedData;
    }
}
