<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-12-02
 * Time: 14:24
 */

namespace view;


class BookingTable
{
    private $dinnerStatusCollection;

    public function __construct(\model\DinnerStatusCollection $dinnerStatusCollection)
    {
        $this->dinnerStatusCollection = $dinnerStatusCollection;
    }

    public function GetHTML()
    {
        $html = "";
        $html.= "<form method='post' action='/?action=booking'>";
        foreach($this->dinnerStatusCollection->GetDinnerStatusCollection() as $dinnerStatus)
        {
            $dinnerStatus = $this->GetTypeDinnerStatus($dinnerStatus);
            if(isset($_GET['day']))
            {
                if($this->ParseDay($dinnerStatus->GetDay()) == $_GET['day'])
                {
                    $html.=
                    "
                    <div>
                        {$this->RenderBookingForm($dinnerStatus)}
                    </div>
                    ";
                }
            }
        }
        $html.=
        "
          <div class='form-group'>
                <label for='username'>Username at Zekes</label>
                <input type='text' class='form-control' name='username' id='username' placeholder='username'>
          </div>
          <div class='form-group'>
                <label for='password'>Password at Zekes</label>
                <input type='password' class='form-control' name='password' id='password' placeholder='password'>
          </div>
          <button type='submit' class='btn btn-default'>Bookt Table Now!</button>
        </form>
        ";
        return $html;
    }

    private function GetTypeDinnerStatus(\model\DinnerStatus $dinnerStatus)
    {
        return $dinnerStatus;
    }

    private function RenderBookingForm(\model\DinnerStatus $dinnerStatus)
    {
        $timeArr = $this->ParseTimeToArray($dinnerStatus->GetTime());

        return
        "
        <div class='radio'>
            <label>
                <input type='radio' name='group1' id={$dinnerStatus->GetValue()}' value='{$dinnerStatus->GetValue()}' checked>
                Dinner at Zekes {$timeArr['start']}:00 - {$timeArr['end']}:00 ({$this->ParseDay($dinnerStatus->GetDay())})
            </label>
        </div>
        ";
    }

    private function ParseDay($day)
    {
        if($day == 'fre')
            return 'Friday';

        if($day == 'lor')
            return 'Saturday';

        if($day == 'son')
            return 'Sunday';

        return false;
    }

    private function ParseTimeToArray($time)
    {
        $timeArray = Array();
        $timeArray['start']  = (int)substr($time, 0, 2);
        $timeArray['end']    = (int)substr($time, 2, 2);
        return  $timeArray;
    }
}