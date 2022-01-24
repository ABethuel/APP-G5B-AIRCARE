<?php 

// Sécurité vérifiant que l'on a bien été connecté à la base de données
try{
    // On initialise la base de données dans le projet
    $database = new PDO(
        'mysql:host=herogu.garageisep.com;dbname=gywulo_aircare;charset=utf8;',
        'ismtlw_aircare',
        'kaejhptlokifzcpd'
    );
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?> 