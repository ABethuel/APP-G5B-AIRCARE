<?php
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

if(isset($_POST['data'])){
    $res = $database->query("SELECT * FROM email WHERE status='unseen'");
    if($res->rowCount()>0){
        echo $res->rowCount();
    }else{
        echo 0;
    }
}