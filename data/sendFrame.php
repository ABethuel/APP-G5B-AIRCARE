<?php

if (isset($_POST['validate'])){
    echo "test";
    $beginingFrame = "1G5B12"; //Début de la chaîne où on spécifie le nom du fichier log, et le type de requête voulue, ici requête en écriture
    $valueSensorSensitivity = 5; //Type de capteur
    
    $valueSensitivity = 1; //Valeur de la sensibilité à envoyer
    $timestampSensitivity = time(); //Timestamp de l'envoi
    
    //Création du checksum
    $brutChecksum = crc32($beginingFrame . $valueSensorSensitivity . $_GET['id_patient'] . $valueSensitivity . $timestampSensitivity);
    $finalChecksum = $brutChecksum % 256; //Checksum de la trame (somme de tous les caractères modulo 256)
    
    //Date et heure de la trame
    $daySensitivity = date('d');
    $monthSensitivity = date('m');
    $yearSensitivity = date('Y');
    $hourSensitivity = date('H');
    $minuteSensitivity = date('i');
    $secondSensitivity = date('s');
    
    //Concaténation des variables précédentes en une trame finale prête à l'envoi
    $finalFrame = $beginingFrame . $valueSensorSensitivity . $_GET['id_patient'] . $valueSensitivity . $timestampSensitivity . $finalChecksum . $yearSensitivity . $monthSensitivity . $daySensitivity . $hourSensitivity . $minuteSensitivity . $secondSensitivity;
    
    echo $valueSensitivity;
    echo $valueSensorSensitivity;
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G5B1&TRAME=1G5B121010012',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
}


?>