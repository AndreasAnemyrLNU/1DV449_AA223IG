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
require_once("./view/load.php");

// Load Controllers
require_once("./controller/load.php");


$master = new \controller\Master();
$fullView = $master->DoApp();


$singlePage = new \view\SinglePage($fullView);
echo $singlePage->GetHTML();