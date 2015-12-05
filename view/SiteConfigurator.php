<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-12-03
 * Time: 13:01
 */

namespace view;


class SiteConfigurator
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function GetHTML()
    {
        return
        "
        <div class='container'>
            <h4>{$this->message}</h4>
            <div class='well well-sm'>
                <form method='post'>
                  <div class='form-group'>
                    <label for='ip''>Ip Adress</label>
                    <input type='text' class='form-control' id='ip' name='ip' placeholder='255.255.255.255' value='{$this->LoadDataFromCookie('url')}'>
                  </div>
                  <div class='form-group'>
                    <label for='port''>Webserver port to request</label>
                    <input type='number' class='form-control' id='port' name='port' placeholder='80, 8080 etc' value='{$this->LoadDataFromCookie('port')}'>
                    <input type='hidden' name='action' value='doSiteConfig'>
                  </div>
                  <button type='submit' class='btn btn-default'>Submit</button>
                </form>
            </div>
        </div>
        ";
    }

    private function LoadDataFromCookie($string)
    {
        if(isset($_COOKIE[$string]))
        {
            return  $_COOKIE[$string];
        }
        else
        {
            return "";
        }
    }
}