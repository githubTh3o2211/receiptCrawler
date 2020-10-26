<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 09.10.2020
 * Time: 13:23
 */
define("url", "https://verbraucher.org");

require_once "mysqlConnector.php";
require_once "receiptObj.php";
require_once "simplehtmldom/simple_html_dom.php";
require_once "worker.php";

$receipt = new receiptObj();
$ajaxStr = $_GET["q"];


if (!empty($ajaxStr))
{
    $receipt->getStarted($ajaxStr);

    
    # EXAMPLE HOW TO RETURN DATA
    echo "<tr><td>hallo</td><td>du</td><td>da</td><td><input type='button' name='ID_123' value='save'></td><td><input type='button' value='remove' name='ID_432'></td></tr>";
}

