<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-12-01
 * Time: 14:51
 */

namespace view;


class CinemaCalendar
{
    private $cinemaStatusCollectionArray;

    public function __construct(Array $cinemaStatusCollectionArray)
    {
        $this->cinemaStatusCollectionArray  = $cinemaStatusCollectionArray;
    }

    public function GetHTML()
    {
        $html = "";
        $html.= "<div class='row'>";
        $html.= "<div class='jumbotron'>";
        $html.= "<p class='text-muted text-center'>This is <strong>CinemaStatusCollection</strong></p>";
        $html.= "<div class='row'>";

        foreach($this->cinemaStatusCollectionArray as $cinemaStatusCollection)
        {
            $cinemaStatusCollection = $this->GetTypeCinemaStatusCollection($cinemaStatusCollection);

            $html .=
            "
            <div class='col-sm-6 col-lg-6 col-md-6 col-xs-6'>
                <div class='panel panel-default'>
                    <div class='panel-heading panel-info btn-success'>
                       <h3>{$cinemaStatusCollection->GetNameOfCollection()}</h3>
                    </div>
                    <div class='panel-body'>
                        <table class='table table-responsive table-striped'>
                            {$this->RenderTable($cinemaStatusCollection)}
                        </table>
                    </div>
                </div>
            </div>
            ";
        }

        $html.= "</div>";
        $html.= "</div>";
        $html.= "</div>";
        return $html;
    }

    private function RenderTable(\model\CinemaStatusCollection $cinemaStatusCollection)
    {
        $cinemaStatusCollection =$this->GetTypeCinemaStatusCollection($cinemaStatusCollection);

        $html = "";
        foreach($cinemaStatusCollection->GetCollection() as $cinemaStatus)
        {
            $cinemaStatus = $this->GetTypeCinemaStatus($cinemaStatus);
            $html.=
            "
            <tbody>
                <td class='text-left'>{$cinemaStatus->GetTime()}</td>
                <td class='text-right'>{$cinemaStatus->GetName()}</td>
                <td>{$this->RenderBookButton($cinemaStatus->GetStatus())}</td>
            </tbody>
            ";
        }
        return $html;
    }

    private function RenderBookButton($status)
    {
        if($status)
        {
            return
            "
                <a class='btn btn-block btn-success'>Book Now!</a>
            ";
        }
        else
        {
            return
            "
                <a class='btn btn-block btn-danger disabled'>Sold out!</a>
            ";
        }
    }

    private function GetTypeCinemaStatus(\model\CinemaStatus $cinemaStatus)
    {
        return $cinemaStatus;
    }

    private function GetTypeCinemaStatusCollection(\model\CinemaStatusCollection $cinemaStatusCollection)
    {
        return $cinemaStatusCollection;
    }
}