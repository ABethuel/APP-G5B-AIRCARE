<?php 

// Sécurité vérifiant que l'on a bien été connecté à la base de données
try{
    // On initialise la base de données dans le projet
    $database = new PDO(
        'mysql:host=herogu.garageisep.com;dbname=piuoeb_aircare;charset=utf8;',
        'cslzpu_aircare',
        'otdnvfcasrrwxvqm'
    );
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?> 