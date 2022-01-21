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
        $recupmessages = $database->prepare('SELECT * FROM email WHERE id=?');
        $recupmessages->execute(array($getid));
        if($recupmessages->rowCount()>0){
            $bannirmessages = $database->prepare('DELETE FROM email WHERE id=?');
            $bannirmessages->execute(array($getid));
            header('Location: a_message.php?msg=1');
        }else{
            var_dump($getid);
        }
    }else{
        echo "Le message n'a pas été récupéré";
    }
?>