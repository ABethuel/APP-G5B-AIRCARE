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
        $recupUser = $database->prepare('SELECT * FROM users WHERE id=?');
        $recupUser->execute(array($getid));
        if($recupUser->rowCount()>0){
            $bannirUser = $database->prepare('DELETE FROM users WHERE id=?');
            $bannirUser->execute(array($getid));
            header('Location: admin.php?msg=1');
        }else{
            var_dump($getid);
        }
    }else{
        echo "L'identifiant n'a pas été récupéré";
    }
?>
