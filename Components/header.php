<!-- header.php 
Header à ajouter sur chaque page le nécéssitant-->

<?php 

session_start();
require('./config/database.php');

/** Si l'utilisateur est authentifié, on affiche son nom dans le header, 
    Sinon on affiche un lien "se connecter" */

function displayProfilOrConnexion(){
    $first_name  = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];

    if ($_SESSION['auth'] == true){
        echo $first_name . ' '. $last_name;
    }else{
        echo '<a href="../connexion.php">Se connecter</a>';
    }
}

?>

<header>
    <nav>
        <div class="left">
            <div>
                <a href="../index.php"><img class="logo" src="../Assets/images/logo.png"></a>
            </div>
            <div class="menu">
                <a href="../index.php">ACCEUIL</a>
                <a href="../information.php">INFORMATIONS</a>
                <a href="../liste_capteurs.php">CAPTEURS</a>
                <a href="../forum_sujet.php">FORUM</a>
                <a href="../quiz.php">QUIZ</a>

            </div>
        </div>
        <div class="right">
            <!-- Bouton se connecter : changera d'apparence en fonction du statut de connexion avec 
            le php -->
            <div class="connexion">
                <img class="profil" src="../Assets/images/profil_connexion.png">
                <?php displayProfilOrConnexion();?>
                <!--<a href="../connexion.php">Se connecter</a>-->
            </div> 
                
            <div class="research">
                <form>
                    <input class="research_input" type="text" name="search" placeholder="Search">
                </form>
            </div> 
        
        </div>
    </nav>
</header>





