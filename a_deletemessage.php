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
<<<<<<< HEAD:a_deleteResponse.php
            header('Location: a_response.php?msg=1');
=======
            header('Location: a_message.php?msg=1');
>>>>>>> e61445531ddbbe4e96f55d9d1048e43ef6b608c7:a_deletemessage.php
        }else{
            var_dump($getid);
        }
    }else{
        echo "Le message n'a pas été récupéré";
    }
?>