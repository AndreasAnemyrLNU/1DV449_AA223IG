<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 13:27
 */

namespace view;


class SinglePage
{
    private $body;

    public function __construct($body = "")
    {
        $this->body = $body;
    }

    public function GetHTML($body)
    {
        return
        "
        <!DOCTYPE html>
        <html lang='sv'>
            <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' href='/view/bootstrap-3.3.6-dist/css/bootstrap.css'>
                <link rel='stylesheet' href='/view/bootstrap-3.3.6-dist/css/bootstrap-theme.css'
                <title>My WebCrawler!</title>
            </head>
            <body>

            <div class='container'>
                <div class ='panel panel-default'>
                    <h1>sadfsadfsdaf<h1>
                </div>
            </div>
            <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script> -->
            <script src='/view/bootstrap-3.3.6-dist/js/bootstrap.js'></script>
            </body>
        </html>
        ";
    }


}