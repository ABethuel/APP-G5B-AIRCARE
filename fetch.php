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


    $res = $database->query("SELECT * FROM email WHERE status='unseen' ORDER BY id DESC LIMIT 3");
    $re = $database->query("SELECT * FROM email WHERE status='seen' ORDER BY id DESC LIMIT 3");
    if($res->rowCount()>0){
        while($message = $res->fetch()){
            echo '<div class="update">
            <div class="profile-photo">
                <span class="material-icons-sharp">account_circle</span>
            </div>
            <div class="message">
                <p><b>'. $message['email']. ' : </b> . '. $message['sujet'].' </p>
                <small>'.$message['message'].'</small>
            </div>
        </div>';
        }
    }elseif($re->rowCount()>0){
        while($message = $re->fetch()){
            echo '<div class="update">
            <div class="profile-photo">
                <span class="material-icons-sharp">account_circle</span>
            </div>
            <div class="message">
                <p><b>'. $message['email']. ' : </b> . '. $message['sujet'].' </p>
                <small>'.$message['message'].'</small>
            </div>
        </div>';
        }
    }else{
        echo '<p>Aucun Message disponible</p>';
    }
