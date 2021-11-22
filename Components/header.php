)=<!-- header.php 
Header à ajouter sur chaque page le nécéssitant-->

<?php 

session_start();
require('./config/database.php');

/** Si l'utilisateur est authentifié, on affiche son nom dans le header, 
    Sinon on affiche un lien "se connecter" */

function displayProfilOrConnexion(){

    try{
        if ($_SESSION['auth'] == true){
            $first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
        
            $first_letter_fname = substr($first_name, 0, 1);
            $first_letter_lname = substr($last_name, 0, 1);
            ?>
            <div class="connected">
                <div class="profil_circle">
                    <a class="first_letters"><?php echo $first_letter_fname, $first_letter_lname; ?></a>
                </div>
                <div class="dropdown">
                    <a class="name_profile"><?php echo $first_name . ' '. $last_name; ?></a>
                    <div class="dropdown-content">
                        <a href="../authentication/logout_action.php">Se déconnecter</a>
                        <a href="#">Modifier son profil</a>
                    </div>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="connexion">
                <img class="profil" src="../Assets/images/profil_connexion.png">
                <a class="connect_yourself" href="../connexion.php">Se connecter</a>
            </div>
            <?php
        }
    }
    catch(Exception $e) {
        ?>
        <div class="connexion">
            <img class="profil" src="../Assets/images/profil_connexion.png">
            <a class="connect_yourself" href="../connexion.php">Se connecter</a>
        </div>
        <?php
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
            <?php displayProfilOrConnexion();?>

            <!--<div class="connexion">
                <img class="profil" src="../Assets/images/profil_connexion.png">
                <a href="../connexion.php">Se connecter</a>
            </div> -->
                
            <!--<div class="research">
                <form>
                    <input class="research_input" type="text" name="search" placeholder="Search">
                </form>
            </div> -->
        
        </div>
    </nav>
</header>





