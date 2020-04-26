<?php
if (mysql_real_escape_string($_GET["energie"])) {
    require(__DIR__ . "/helpers/generateJson.php");

    echo "
                         <div id='chartCanvas'>
                         <canvas id='canvas'></canvas>
                         <br>
                        </div>";
}
