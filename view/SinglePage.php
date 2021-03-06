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
    private $view;

    private $errorMessage;

    public function __construct(\view\FullView $view)
    {
        $this->view = $view;
    }

    public function GetHTML($errorMessage = false)
    {
        $this->errorMessage =  $errorMessage;

        return
        "
        <!DOCTYPE html>
        <html lang='sv'>
            <title>My WebCrawler!</title>
            <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' href='view/bootstrap-3.3.6-dist/css/bootstrap.css'>
                <link rel='stylesheet' href='view/bootstrap-3.3.6-dist/css/bootstrap-theme.css'

            </head>
            <body>
            <div class='jumbotron navbar-inverse navbar-static-top'>
                <div>
                    <nav>
                        <h3 class='text-info text-muted text-center'>Time for party calender....</h3>
                    </nav>
                </div>
            </div>
            <div class='container'>
                <div class='panel panel-primary'>
                    <!-- when exception exists.....-->
                    {$this->HasErrorOccured()}
                </div>
                <div class='row'>
                    {$this->view->GetSiteConfigurator()->GetHTML()}
                </div>
                <div class='row'>
                    {$this->ReturnEmptyStringIfObjectIsNull($this->view->GetAvailableCalendar())}
                </div>
            </div>
            <div class='container'>
                <div class='row'>
                    {$this->ReturnEmptyStringIfObjectIsNull($this->view->GetCinemaCalendar())}
                </div>
            </div>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
            <script src='view/bootstrap-3.3.6-dist/js/bootstrap.js'></script>
            </body>
        </html>
        ";
    }

    private function ReturnEmptyStringIfObjectIsNull($object)
    {
        if($object === null)
        {
            return "";
        }
        else
        {
            return $object->GetHTML();
        }
    }

    private function HasErrorOccured()
    {
        if($this->errorMessage !== false)
        {
            return
            "
            <div class='panel-heading'>An error occured!</div>
            <div class='panel-body'>
                    <p class='text-muted text-capitalize'>{$this->errorMessage}</p>
            </div>
            ";
        }
    }

}