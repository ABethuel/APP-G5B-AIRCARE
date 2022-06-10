<?php 

// Sécurité vérifiant que l'on a bien été connecté à la base de données
try{
    // On initialise la base de données dans le projet
    $database = new PDO(
<<<<<<< HEAD
        'mysql:host=localhost;dbname=db_aircare;charset=utf8;',
        'root',
        ''
=======
        'mysql:host=herogu.garageisep.com;dbname=piuoeb_aircare;charset=utf8;',
        'cslzpu_aircare',
        'otdnvfcasrrwxvqm'
>>>>>>> 330095cff54e6d7507f3ccb0c4630a9f38afc180
    );
}catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}

?> 