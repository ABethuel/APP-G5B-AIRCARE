<?php
    session_start();
    
    require("./config/database.php") ;
    if($_SESSION['role'] != 'administrator'){
        header('Location: index.php');
    }
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getid = $_GET['id'];
        $recupFAQ = $database->prepare('SELECT * FROM news WHERE id=?');
        $recupFAQ->execute(array($getid));
        if($recupFAQ->rowCount() > 0){
            $deleteFAQ = $database->prepare('DELETE FROM news WHERE id=?');
            $deleteFAQ->execute(array($getid));
            header('Location: a_news.php?msg=1');
        }else{
            echo "Aucun FAQ trouvé";
        }
    }else{
        echo "Aucun identifiant trouvé";
    }
?>