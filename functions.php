<?php

if ($clan = $_GET["clan"]) {
    echo getClanTable($clan);
}

function getClanTable($clan)
{
    $result = "";
    $result .= "<table class='table table-striped'><tr><th>Логин</th><th>Статус</th><th>Местоположение</th></tr>";
    $response = unserialize(file_get_contents("https://api.neverfate.ru/sostav.php?cl=" . $clan));
    foreach ($response as $char) {
        $login = iconv('CP1251', 'UTF-8', $char["login"]);
        $status = $char["bossclan"] ? "Глава клана" : iconv('CP1251', 'UTF-8', $char["clanstatus"]);
        $result .= "<tr>";
        $result .= "<td><a target='_blank' href='https://neverfate.ru/inf.php?cid=" . $char["cid"] . "'>" . sprintf("%s [%s]", $login, $char["level"]) . "</a></td><td>" . $status . "</td><td>" . iconv('CP1251', 'UTF-8', $char["room"]) . "</td>";
        $result .= "</tr>";
    }
    $result .= "</table>";

    echo $result;
}

?>