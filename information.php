<?php
function displayFAQ () {
    require("./config/database.php");
    $sqlQuery = 'SELECT * FROM FAQ';
    $statement = $database ->prepare($sqlQuery);
    $statement -> execute();

    $elementsFAQ = $statement ->fetchAll();
    foreach ($elementsFAQ as $FAQ) {
        ?>

            <div class="dropdown">
                    <h3 class="deroul"> <?php echo $FAQ["question"]?> </h3>
                <div class="dropdown-content">
                    <p class="text"> <?php echo $FAQ["answer"]?>
                        </p>
                </div>
            </div>
            
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_info.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Informations</title>
    </head>
    
    <body>

    <?php include_once('./Components/header.php'); ?>
        <div class="page">
        
            <div class="first_section">
                <h1 class="text_produit">PRODUIT</h1>  

                <div class="conteneur">
                    
                    <p class="text_photo1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu purus placerat est pulvinar aliquet. Nam scelerisque bibendum ex ut sollicitudin. Etiam nec placerat est. Vivamus feugiat sapien sodales ultricies dapibus. 
                    </p>
                    <img class ="photo1" src= "./Assets/images/capteur-2.png"/>
                </div>
                
                <div class="conteneur2">
                    <img class ="photo2" src="./Assets/images/capteur-2.png"/>
                    <div class="text_photo2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu purus placerat est pulvinar aliquet. Nam scelerisque bibendum ex ut sollicitudin. Etiam nec placerat est. Vivamus feugiat sapien sodales ultricies dapibus. </div>
                    </div>
            </div>
            <div class="second_section">

                <h2 class="text_equipe">ÉQUIPE</h2>
                <p class="text_principal">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu purus placerat est pulvinar aliquet. Nam scelerisque bibendum ex ut sollicitudin. Etiam nec placerat est. Vivamus feugiat sapien sodales ultricies dapibus. 
                </p>
                

                <div class="conteneur3">
                    <img class ="photo_profil" src="./Assets/images/profil_connexion.png"/>
                    <img class ="photo_profil" src="./Assets/images/profil_connexion.png"/>
                    <img class ="photo_profil" src="./Assets/images/profil_connexion.png"/>
                    <img class ="photo_profil" src="./Assets/images/profil_connexion.png"/>
                    <img class ="photo_profil" src="./Assets/images/profil_connexion.png"/>
                
                </div>
                <div class="conteneur3">
                    <p class="poste"> Nom Prénom <br> Poste </p>
                    <p class="poste"> Nom Prénom <br> Poste </p>
                    <p class="poste"> Nom Prénom <br> Poste </p>
                    <p class="poste"> Nom Prénom <br> Poste </p>
                    <p class="poste"> Nom Prénom <br> Poste </p>
                
                </div>


        

            </div>
            <div class="troi_section">
                <h2 class="text_equipe">QUESTION FRÉQUENTES</h2>
                
                <?php displayFAQ()?>
            </div>
        </div>
        <?php include_once('./Components/footer.php'); ?>
</body>   
    
</html>
