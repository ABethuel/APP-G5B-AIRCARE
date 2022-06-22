<?php 

// Sécurité vérifiant que l'on a bien été connecté à la base de données
try{
    // On initialise la base de données dans le projet
    $database = new PDO(
        'mysql:host=herogu.garageisep.com;dbname=RC8iyte0AP_aircare;charset=utf8;',
        'tsEogmQYJi_aircare',
        'EKKFifatsT7KupJe'
    );
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?> 