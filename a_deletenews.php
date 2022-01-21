<?php
    
    session_start();
	ini_set('display_error',1);
	require("./config/database.php") ;
    if ($_SESSION['role'] !== "administrator"){
		header('Location: index.php');
		exit;
	}
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        $getid = $_GET['id'];
        $recupnews = $database->prepare('SELECT * FROM news WHERE id=?');
        $recupnews->execute(array($getid));
        if($recupnews->rowCount()>0){
            $bannirnews = $database->prepare('DELETE FROM news WHERE id=?');
            $bannirnews->execute(array($getid));
            header('Location: a_actu.php?msg=1');
        }else{
            var_dump($getid);
        }
    }else{
        echo "L'actualité n'a pas été récupéré";
    }
?>