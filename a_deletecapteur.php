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
        $recupcaptors = $database->prepare('SELECT * FROM captors WHERE id=?');
        $recupcaptors->execute(array($getid));
        if($recupcaptors->rowCount()>0){
            $bannircaptors = $database->prepare('DELETE FROM captors WHERE id=?');
            $bannircaptors->execute(array($getid));
            header('Location: admin.php?msg=1');
        }else{
            var_dump($getid);
        }
    }else{
        echo "Le capteur n'a pas été récupéré";
    }
?>
