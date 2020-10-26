<?php
$title = "blablibblubb schubi dubbi dub";

echo "<!DOCTYPE html>";
echo "<HTML>";
    echo "<HEAD>";
        echo "<TITLE>" . $title . "</TITLE>";
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>";
        echo "<script src='js/lolader.js'></script>";
    echo "</HEAD>";
    echo "<BODY>";
        echo "<FORM name='search' action='index.php' method='post'>";
            echo "<input type='text' name='searchbar' id='search' onkeyup='checkup(this.value)'>";
        echo "</FORM>";
        echo "<TABLE border='1px' id='resultTable'>";
            echo "<tr>";
                echo "<th>Rezept</th>";
                echo "<th>Zutaten</th>";
                echo "<th>Link</th>";
                echo "<th>save</th>";
                echo "<th>remove</th>";
            echo "</tr>";
        echo "</TABLE>";
    echo "</BODY>";
echo "</HTML>";


