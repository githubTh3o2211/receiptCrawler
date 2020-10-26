<?php
/**
 * Created by PhpStorm.
 * User: Theo
 * Date: 09.10.2020
 * Time: 13:23
 */
define("url", "https://verbraucher.org");

require_once "mysqlConnector.php";
require_once "simplehtmldom/simple_html_dom.php";
require_once "worker.php";

$ajaxStr = $_GET["q"];


if (!empty($ajaxStr))
{

    # SUCHEN AUF DER ÖFFENTLICHEN WEBSEITE
    $getContant = htmlWorker::getDOM(url, $ajaxStr);

    # GIBT ALLE UL ELEMENTE
    $shtml = $getContant->find("ul");


    foreach ($shtml as $ulKey => $ulValue)
    {
        $ulAttr     = $ulValue->attr["class"];

        # GIB BITTE NUR DIE REZEPTE
        if ($ulAttr != "mod-rezept-list")
            continue;

        htmlWorker::extractToInsert($ulValue);

    }

    
    # EXAMPLE HOW TO RETURN DATA
    echo "<tr><td>hallo</td><td>du</td><td>da</td><td><input type='button' name='ID_123' value='save'></td><td><input type='button' value='remove' name='ID_432'></td></tr>";
}

