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
    private $personCollection;
    private $dinnerStatusCollection;

    public function __construct
    (
        Array $cinemaStatusCollectionArray,
        \model\PersonCollection $personCollection,
        \model\DinnerStatusCollection $dinnerStatusCollection
    )
    {
        $this->cinemaStatusCollectionArray  = $cinemaStatusCollectionArray;
        $this->personCollection = $personCollection;
        $this->dinnerStatusCollection = $dinnerStatusCollection;
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
                       <h3>{$cinemaStatusCollection->GetNameOfCollection()['name']}</h3>
                       <div class='well'>
                        {$this->RenderHeadingPanel($cinemaStatusCollection->GetNameOfCollection()['id'])}
                       </div>
                    </div>
                    <div class='panel-body'>
                        <table class='table table-responsive table-striped'>
                            {$this->RenderTable($cinemaStatusCollection, $cinemaStatusCollection->GetNameOfCollection()['name'])}
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

    private function RenderTable(\model\CinemaStatusCollection $cinemaStatusCollection, $day)
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
                <td>{$this->RenderBookButton($cinemaStatus, $day)}</td>
            </tbody>
            ";
        }
        return $html;
    }

    private function RenderBookButton(\model\CinemaStatus $status, $day)
    {
        if($status->GetStatus())
        {
            if(isset($_GET['start'])  &&  isset($_GET['movie']) && isset($_GET['day']))
            {
                if($_GET['start'] === $status->GetTime() && $_GET['movie'] === $status->GetMovie() && $_GET['day'] == $day)
                {
                    return
                    "
                    <a
                        class='btn btn-block btn-primary'
                        href='?start={$status->GetTime()}&movie={$status->GetMovie()}&day=$day'
                    >
                        Reserved!
                    </a>
                    ";
                }
                else
                {
                    return
                        "
                    <a
                        class='btn btn-block btn-success'
                        href='?start={$status->GetTime()}&movie={$status->GetMovie()}&day=$day'
                    >
                        Book Now!
                    </a>
                ";
                }
            }
            else
            {
                return
                "
                    <a
                        class='btn btn-block btn-success'
                        href='?start={$status->GetTime()}&movie={$status->GetMovie()}&day=$day'
                    >
                        Book Now!
                    </a>
                ";
            }
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

    private function RenderHeadingPanel($id)
    {

        $allPersonIsAvailable =$this->personCollection->GetTheDaysWhenAllPersonsIsAvailable()[$id];

        if($allPersonIsAvailable == true)
        {

            if(isset($_GET['check']))
            {
                if($_GET['check'] == true)
                {
                    $booking = new \view\BookingTable($this->dinnerStatusCollection);
                    return $booking->GetHTML();
                }
            }

            $url = $_SERVER['REQUEST_URI'] . '&check=true';

            return
            "
                <a href='$url' class='btn btn-block btn-warning'>Check Zekes NOW!</a>
            ";
        }
        else
        {
            return
                "
                <a class='btn btn-block btn-warning disabled'>Zekes not a good idea!</a>
            ";
        }
    }
}