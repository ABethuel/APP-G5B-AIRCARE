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
        $recuptopics = $database->prepare('SELECT * FROM topics WHERE id=?');
        $recuptopics->execute(array($getid));
        if($recuptopics->rowCount()>0){
            $bannirtopics = $database->prepare('DELETE FROM topics WHERE id=?');
            $bannirtopics->execute(array($getid));
            header('Location: a_forum.php?msg=1');
        }else{
            var_dump($getid);
        }
    }else{
        echo "Le topic n'a pas été récupéré";
    }
?>