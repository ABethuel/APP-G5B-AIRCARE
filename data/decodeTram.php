<?php 

require('./data/getTrame.php');

//Récupération séquence en hexadécimal
$trame = getTrameValue();

//var_dump($trame);

//décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);

// $o = valeur de la trame

// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
//echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");

$numbTra = $t;
$idPage = $o;
$typeRequest = $r;
$typeSensor = $c;
$numbSensor = $n; //Numéro d'appareil. Sera associé à l'ID du patient [RÉGLER CE SOUCI : PEU D'ESPACE DANS LA TRAME, ON PEUT FAIRE ÇA QUE SUR 2 CARACTERES GRAND MAX]
$value = $v;
$value = hexdec($value);
$tim = $a;
$checkseum = $x;
$date = $day . '-' . $month . '-' . $year;
$dateTimestamp = strtotime($date);

//var_dump($typeSensor);
//var_dump($dateTimestamp);

$finalDate = date('Y-m-d', $dateTimestamp);

//var_dump($finalDate);

$finalTime = $hour . ':' . $min . ':' . $sec;

//var_dump($finalTime);

$finalDateTime = $finalDate . ' ' . $finalTime;

    
?>