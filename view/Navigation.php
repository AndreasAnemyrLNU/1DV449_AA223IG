<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-12-02
 * Time: 21:35
 */

namespace view;

class Navigation
{
    private static $booking = "booking";

    public function CLientIsBookingTable()
    {
        if(isset($_GET['action']) == self::$booking)
            return true;
        return false;
    }

    public function ClientHasNotChoosenIpAndPortForSiteToScrape()
    {
        if( !isset($_COOKIE['url']) && !isset($_COOKIE['port']) )
        {
            return true;
        }
        return false;
    }

    public function ClientDoConfigSite()
    {
        if(isset($_POST['action']))
        {
            if($_POST['action'] == 'doSiteConfig')
            {
                setcookie('url'  , $_POST['ip']);
                setcookie('port', $_POST['port']);
                $_COOKIE['url'] = $_POST['ip'];
                $_COOKIE['port'] = $_POST['port'];
            }
        }
    }

    public function SystemCanLoadSettings()
    {
        if
        (
               isset($_COOKIE['url'])
            && isset($_COOKIE['port'])
        )
        {
            return true;
        }
    }
}