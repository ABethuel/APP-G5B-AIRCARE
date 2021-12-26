<?php 

// On importe l'initialisaton de la database
require('./config/database.php');

if(isset($_GET['id']) && !empty($_GET['id'])){

    $idCaptor = $_GET['id'];

    $checkIfCaptorExists = $database->prepare("SELECT * FROM captors WHERE id = ?");
    $checkIfCaptorExists->execute(array($idCaptor));

    if ($checkIfCaptorExists->rowCount() > 0){

        $captorInfos = $checkIfCaptorExists->fetch();

        $captor_title = $captorInfos['title'];
        $captor_place = $captorInfos['place'];
        $captor_author = $captorInfos['user_name'];
        $captor_id_author = $captorInfos['user_id'];
        $captor_description = $captorInfos['description'];
        $captor_date = $captorInfos['date'];
        $captor_image = $captorInfos['image'];

        // On séléctionne le dernier élément pour un capteur donné
        $checkParticles = $database->prepare("SELECT * FROM fine_particles WHERE captor_id = ? ORDER BY id DESC LIMIT 1");
        $checkParticles->execute(array($idCaptor)); 

        $checkMonoxide = $database->prepare("SELECT * FROM carbon_monoxide WHERE captor_id = ? ORDER BY id DESC LIMIT 1");
        $checkMonoxide->execute(array($idCaptor)); 

        $checkNitrogen = $database->prepare("SELECT * FROM nitrogen_dioxide WHERE captor_id = ? ORDER BY id DESC LIMIT 1");
        $checkNitrogen->execute(array($idCaptor)); 

        // On vérifie qu'il existe des données de gaz pour un capteur en particulier
        if ($checkParticles->rowCount() > 0 && $checkMonoxide->rowCount() > 0 && $checkNitrogen->rowCount() > 0 ) {

            //On récupère les infos
            $particlesInfos = $checkParticles->fetch();
            $nitrogenInfos = $checkNitrogen->fetch();
            $monoxideInfos = $checkMonoxide->fetch();

            // données particules fines
            $particle_id = $particlesInfos['id'];
            $particle_captor = $particlesInfos['captor_id'];
            $particle_value = $particlesInfos['value'];
            $particle_percentage = $particlesInfos['percentage'];

            // données monoxyde de carbonne
            $monoxide_id = $monoxideInfos['id'];
            $monoxide_captor = $monoxideInfos['captor_id'];
            $monoxide_value = $monoxideInfos['value'];
            $monoxide_percentage = $monoxideInfos['percentage'];

            // données dioxyde d'azote
            $nitrogen_id = $nitrogenInfos['id'];
            $nitrogen_captor = $nitrogenInfos['captor_id'];
            $nitrogen_value = $nitrogenInfos['value'];
            $nitrogen_percentage = $nitrogenInfos['percentage'];

        }else{
            $errorMsg = "Aucune donnée n'existe pour ce capteur";
        }

    }else{
        $errorMsg = "Ce capteur existe pas frr";
    }

}else{
    $errorMsg =  "Erreur frr";
}
?>

