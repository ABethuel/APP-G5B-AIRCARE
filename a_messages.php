<?php 
    
if (!isset($_SESSION)){
    session_start();
}

if($_SESSION['role'] != 'administrator'){
    header('Location: index.php');
}
require("./config/database.php") ;
$display_messages = $database->prepare("SELECT * FROM messages WHERE topic_id=?");
$display_messages -> execute(array($_GET['id']));
$display_messages = $display_messages->fetchAll();

$first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
        
            $first_letter_fname = substr($first_name, 0, 1);
            $first_letter_lname = substr($last_name, 0, 1);

$get_topics=$database ->prepare("SELECT * FROM topics WHERE id = ?" );
$get_topics -> execute(array($_GET['id']));

if ($get_topics->rowCount() > 0){
    $topics = $get_topics -> fetch();
    $title_topics= $topics['title'];
}

?>


<!DOCTYPE html>
<html lang="fr">
	<head>
    <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <link rel="stylesheet" href="style_index.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <title>Espace Administrateur</title>
	</head>
	<body>
        <input type="checkbox" name="" id="nav-toggle">
        <div class="sidebar">

            <div class="sidebar-brand">
             <a href="index.php"><img src="Assets/images/logo_inverse.png"></a>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="admin.php"><span class="fas fa-igloo"></span>
                        <span>Tableau de bord</span></a>
                    </li>
                    <li>
                        <a href="a_law.php"><span class="fas fa-users"></span>
                        <span>Gérer les utilisateurs</span></a>
                    </li>   
                    <li>
                        <a href="a_capteur.php"><span class="fab fa-phabricator"></span>
                        <span>Gérer les Capteurs</span></a>
                    </li>
                    <li>
                        <a href="a_FAQ.php"><span class="fas fa-question"></span>
                        <span>FAQ</span></a>
                    </li>  
                    <li>
                        <a href="a_actu.php"><span class="fas fa-book"></span>
                        <span>Actualités</span></a>
                    </li>
                    <li>
                        <a href="a_forum.php" class="active"><span class="fas fa-comment-alt"></span>
                        <span>Forum</span></a>
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
                                <h2><?php echo $title_topics ?></h2>
                                
                            </div>
                            <div class="card-body">
                                    <table>
                                        <thead>
                                            <td>Id</td>
                                            <td>Contenu</td>      
                                            <td>Date</td>
                                            <td>Utilisateur</td>
                                            <td>Supprimer</td>
                                        </thead>
                                    <?php foreach($display_messages as $dm){?>
                                          <tr>  
                                            <td><?= $dm['id'] ?></td>        
                                            <td><?= $dm['content'] ?></td>
                                            <td><?= $dm['date'] ?></td>
                                            <td><?= $dm['user_name'] ?></td>
                                            <td><a href="a_deletemessages.php?id=<?= $dm['id'] ?>">Supprimer le message</a></td>
                                            </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                                  
            </main>
        </div>
	</body>
</html>