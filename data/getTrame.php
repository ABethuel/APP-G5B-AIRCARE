<?php 

function getTrameValue() : string
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G5B1");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);

    $data_tab = str_split($data,33);

    end($data_tab);
    $lastValue = prev($data_tab);
    $trame = $lastValue;

    return $trame;
}


?>  