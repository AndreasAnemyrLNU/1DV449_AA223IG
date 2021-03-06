<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-30
 * Time: 21:16
 */

namespace view;


class AvailableCalendar
{
    private $personCollection;

    public function __construct(\model\PersonCollection $personCollection)
    {
        $this->personCollection = $personCollection;
    }

    public function GetHTML()
    {
        $html = "";
        $html.= "<div class='row'>";
        $html.= "<div class='jumbotron'>";
        $html.= "<p class='text-muted text-center'>Available is marked with <span class='text-capitalize text-success'>green</span> and busy is <span class='text-capitalize text-danger'>red</span>!</p>";
        foreach($this->personCollection->GetPersons() as $person)
        {
            $person =$this->GetTypePerson($person);
            $html .=
            "
            <div class='col-sm-4 col-lg-4 col-md-4 col-xs-4'>
                <div class='panel panel-default'>
                    <div class='panel-heading panel-info btn-success'>
                        <h3>{$person->GetName()}</h3>
                    </div>
                    <div class='panel-body'>
                        <!-- Render daycollection here... -->
                        <table class='table table-responsive'>
                            <thead>
                                <h5 class='text-right'>Calendar</h5>
                            </thead>
                                {$this->RenderPersonsTable($person)}
                        </table>
                    </div>
                </div>
            </div>
            ";
        }
        $html.= "</div>";
        $html.= "</div>";
        return $html;
    }

    private function RenderClassRegardingBooleanValuenInIsAvailable($isAvailable)
    {
        if($isAvailable)
            return "class='success'";
        return "class='danger'";
    }

    private function RenderPersonsTable(\model\Person $person)
    {
        $calenderDayStatusCollection = $person->GetCalendarDayStatusCollection();
        $calenderDayStatusCollection = $this->GetTypeCalendarDayStatusCollection($calenderDayStatusCollection)->GetCalendarDayStatusCollection();

        $html = "";
        $html.= '<tbody>';

        foreach($calenderDayStatusCollection as $calenderDayStatus)
        {
            $calenderDayStatus = $this->GetTypeCalendarDayStatus($calenderDayStatus);

            $html.=
            "
            <tr class='text-success'>
                <td {$this->RenderClassRegardingBooleanValuenInIsAvailable($calenderDayStatus->GetIsAvailable())}>{$calenderDayStatus->GetName()}</td>
            </tr>
            ";
        }

        $html.= '</tbody>';
        return $html;
    }

    private function GetTypeCalendarDayStatus(\model\CalendarDayStatus $calendarDayStatus)
    {
        return $calendarDayStatus;
    }

    private function GetTypeCalendarDayStatusCollection(\model\CalendarDayStatusCollection $calendarDayStatusCollection)
    {
        return $calendarDayStatusCollection;
    }

    private function GetTypePerson(\model\Person $person)
    {
        return $person;
    }
}