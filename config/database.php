<?php 

// Sécurité vérifiant que l'on a bien été connecté à la base de données
try{
    // On initialise la base de données dans le projet
    $database = new PDO(
        'mysql:host=localhost;dbname=db_aircare;charset=utf8;',
        'root',
        ''
    );
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?> 