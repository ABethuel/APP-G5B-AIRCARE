<?php 
    
if (!isset($_SESSION)){
    session_start();
}

if($_SESSION['role'] != 'administrator'){
    header('Location: index.php');
}
require("./config/database.php") ;
$afficher_profil = $database->query("SELECT * FROM users");
$afficher_profil = $afficher_profil->fetchAll();

$first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
        
            $first_letter_fname = substr($first_name, 0, 1);
            $first_letter_lname = substr($last_name, 0, 1);
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
    <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <link rel="stylesheet" href="style_index.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="FAQ.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <title>Espace Administrateur</title>
	</head>
	<body>
        <input type="checkbox" name="" id="nav-toggle">
        <div class="sidebar">

            <div class="sidebar-brand">
             <a href="index.php"><img src="Assets/images/logo.png"></a>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="admin.php"><span class="fas fa-igloo"></span>
                        <span>Tableau de bord</span></a>
                    </li>
                    <li>
                        <a href="a_law.php" ><span class="fas fa-users"></span>
                        <span>Gérer les utilisateurs</span></a>
                    </li>   
                        
                    <li>
                        <a href=""><span class="fas fa-tablet"></span>
                        <span>Gérer les Capteurs</span></a>
                    </li>
                    <li>
                        <a href="a_FAQ.php" class="active"><span class="fas fa-question"></span>
                        <span>FAQ</span></a>
                    </li>      
                </ul>
            </div>

            <div class="sidebar-change">
                
                <li><a href="authentication/logout_action.php">Se déconnecter</a></li>
            </div>
        </div>
        <div class="main-content">
            <header>
                <h1>
                    <label for="nav-toggle"><i class="fas fa-bars"></i></label>
                    Tableau de bord
                </h1>
           
                <div class="search-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="search" placeholder="Rechercher"/> 
                </div>
                <div class="user-wrapper">
                <div class="connected">
                <div class="profil_circle">
                    <a class="first_letters"><?php echo $first_letter_fname, $first_letter_lname; ?></a>
                </div>
                <div class="dropdown">
                    <a class="name_profile"><?php echo $first_name . ' '. $last_name; ?></a>
                    <div class="dropdown-content">
                        <?php if($_SESSION['role'] == 'administrator'){ ?>
                        <a href="admin.php">Espace administrateur</a>
                        <?php }?>
                        <a href="authentication/logout_action.php">Se déconnecter</a>
                        <a href="change_profile.php">Modifier son profil</a>
                    </div>
                </div>
            </div>
                </div>
            </header>

            <main>
                <div class="recent-grids">
                    <div class="users">
                        <div class="card">
                            <div class="card-header">
                                <h2>FAQ</h2>
                                <a href="a_publierFAQ.php"> + Ajouter</a>
                                <a href="FAQ.php">Voir rendu</a>
                            </div>
                            <div class="card-body">
                            <?php
                                $recupFAQ = $database->query('SELECT * FROM faq');
                                while($faq = $recupFAQ->fetch()){
                                    ?>
                                    <div class="FAQ">
                                        <h1><?= $faq['question']; ?></h1>
                                        <br>
                                        <p><?= $faq['reponse']; ?></p>
                                        <br>
                                        <div class="buttonFAQ">
                                            <a class="supprimer" id="supprimerFAQ" href="a_deleteFAQ.php?id=<?= $faq['id']; ?>"><button>Supprimer cette question-réponse</button></a>
                                            <a class="modifier" href="a_modifierFAQ.php?id=<?= $faq['id']; ?>"><button>Modifier cette question-réponse</button></a>
                                        </div>
                                        
                                    </div>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
                                  
            </main>
          
        </div>
	</body>
</html>