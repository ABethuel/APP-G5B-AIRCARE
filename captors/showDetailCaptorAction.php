<?php 

// On importe l'initialisaton de la database
require('./config/database.php');
require('./data/decodeTram.php');

session_start();

if(isset($_GET['id']) && !empty($_GET['id']) && isset($_SESSION['id'])){

    $idCaptor = $_GET['id'];
    $_SESSION['id_captor'] = $_GET['id'];

    $idUSer = $_SESSION['id'];

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

        $checkNitrogen = $database->prepare("SELECT * FROM nitrogen_dioxide WHERE captor_id = ? ORDER BY id DESC LIMIT 1");
        $checkNitrogen->execute(array($idCaptor)); 

        // Détection de gaz
        if($typeSensor == 3){ 
            $valuePercentage = ($value / 300) * 100; 
        
            $insertGazFromTramOnDb = $database->prepare("INSERT INTO carbon_monoxide(captor_id, value, percentage) VALUES(?, ?, ?)");
            $insertGazFromTramOnDb->execute(array($idCaptor, $value, $valuePercentage));
        }

        $checkMonoxide = $database->prepare("SELECT * FROM carbon_monoxide WHERE captor_id = ? ORDER BY id DESC LIMIT 1");
        $checkMonoxide->execute(array($idCaptor)); 

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

            $idMonaoxide = $database->prepare("SELECT * FROM carbon_monoxide WHERE captor_id = ? ORDER BY id DESC LIMIT 1");
            $checkMonoxide->execute(); 

            if ($typeSensor == 3){
                
                $quality = "";
                $air_quality_percentage = ($monoxide_percentage + $particle_percentage + $nitrogen_percentage) / 3;
                if ($air_quality_percentage > 90 && $air_quality_percentage < 110){
                    $quality = "Mauvaise";
                }else if ($air_quality_percentage >= 111){
                    $quality = "Très mauvaise";
                }else if ($air_quality_percentage <= 89){
                    $quality = "Bonne";
                }
                $date = date("d/m"); // Affiche la date du jour

                $insertNewAirQuality = $database->prepare("INSERT INTO air_quality(id_captor, place, result, quality, date) VALUES(?, ?, ?, ?, ?)");
                $insertNewAirQuality-> execute(array($idCaptor, "Salle d'hospitalisation", $air_quality_percentage, $quality, $date));
            
            }     
            //On récupère la qualité globale de l'air
            $checkQuality = $database->prepare('SELECT * FROM air_quality WHERE id_captor = ? ORDER BY id DESC LIMIT 1');
            $checkQuality->execute(array($idCaptor));

            if ($checkQuality->rowCount() > 0) {

                //Infos
                $airInfos = $checkQuality->fetch();

                $air_result = $airInfos['result'];
                $air_place = $airInfos['place'];
                $air_quality = $airInfos['quality'];

                //On récupère toutes les valeurs de la qualité, pas uniquement la dernière
                $checkAllQuality = $database->prepare('SELECT * FROM air_quality WHERE id_captor = ?');
                $checkAllQuality->execute(array($idCaptor));

                if ($checkAllQuality->rowCount() >= 3){
                    
                    $allAirInfos = $checkAllQuality->fetch();
                    
                    $checkIfBpmExists = $database->prepare('SELECT * from bpm WHERE id_user = ? ORDER BY id DESC LIMIT 1');
                    $checkIfBpmExists->execute(array($idUSer));

                    if ($checkIfBpmExists->rowCount() > 0){
                        
                        $bpmInfos = $checkIfBpmExists->fetch();
                        
                        $bpm = $bpmInfos['value'];
                        $bpm_quality = $bpmInfos['quality'];

                        if ($bpm >= 100 ){

                            $text_bpm = "Si vous vous trouvez dans la zone du capteur, nous vous conseillons de vous déplacer";
                        }
                    }
                }

            }else{
                $errorMsg = "Erreur lors de la détermination de la qualité de l'air";
            }

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

