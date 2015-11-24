<?php
/**
 * Created by PhpStorm.
 * User: AndreasAnemyr
 * Date: 2015-11-24
 * Time: 12:58
 */

//Load Model Model Module "Friends"
require_once("model/friends/load.php");
// Load Controllers
require_once("./controller/load.php");


require_once("./view/SinglePage.php");


$master = new \controller\Master();
$master->DoApp();

//$singlePage = new \view\SinglePage();
//$singlePage->GetHTML($returnenViewFromController);


//phpinfo();