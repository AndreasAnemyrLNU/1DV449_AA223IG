<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 12:58
 */

//Load Models
// Module "Friends"
require_once("./model/agent/load.php");
require_once("./model/friends/load.php");
// Load Views
require_once("./view/SinglePage.php");
// Load Controllers
require_once("./controller/load.php");


$master = new \controller\Master();
$master->DoApp();


//$singlePage = new \view\SinglePage();
//$singlePage->GetHTML($returnenViewFromController);


//phpinfo();