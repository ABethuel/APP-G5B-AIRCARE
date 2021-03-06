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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Espace Administration</title>
    <!-- ICONS -->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <!-- STYLESHEET  -->
    <link rel="stylesheet" href="admin.css">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $.post("get.php", {data:'get'}, function (data){
                    if(data>0){
                        $("span#count").show();
                        $("span#count").text(data);
                    }
                });
            },1000);
        });
    </script>
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <a href="index.php"><img src="Assets/images/logo.png" alt="Logo"></a>
                    <a href="index.php"><h2>AirCare</h2></a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="admin.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="a_law.php">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Utilisateurs</h3>
                </a>
                <a href="a_capteur.php">
                    <span class="material-icons-sharp">cable</span>
                    <h3>Capteurs</h3>
                </a>
                <a href="a_news.php">
                    <span class="material-icons-sharp">feed</span>
                    <h3>Actualit??s</h3>
                </a>
                <a href="a_message.php">
                    <span class="material-icons-sharp">email</span>
                    <h3>Messages</h3>
                    <span class="message-count" id="count"></span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Forum</h3>
                </a>
                <a href="a_FAQ.php"  class="active" >
                    <span class="material-icons-sharp">quiz</span>
                    <h3>FAQ</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Equipe</h3>
                </a>
                <a href="change_profile.php">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Modifier son profil</h3>
                </a>
                <a href="authentication/logout_action.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Se d??connecter</h3>
                </a>
            </div>
        </aside>
        <!-- MAIN CONTENT -->
        <main>
            <h1>Espace d'Administration</h1>
            <div class="date">
                <p class="date-p"><?php echo date("j/n/Y");?></p>
            </div>
            
            <div class="">
                <h2>
                    Gestion de la FAQ
                </h2>
                <div class="recent-grids">
                    <div class="users">
                            <div class="card">
                                <div class="card-header">
                                    <h2>FAQ</h2>
                                    <a href="information.php">Voir rendu</a>
                                </div>
                                <div class="card-body">
                                <?php
                                    $recupFAQ = $database->query('SELECT * FROM faq');
                                    while($faq = $recupFAQ->fetch()){
                                        ?>
                                        <div class="FAQ">
                                            <h1><?= $faq['question']; ?></h1>
                                            <br>
                                            <p><?= $faq['answer']; ?></p>
                                            <br>
                                            <div class="buttonFAQ">
                                                <a class="modifier" href="a_modifierFAQ.php?id=<?= $faq['id']; ?>" >Modifier cette question-r??ponse</a>
                                                <form enctype="multipart/form-data" method="post" action="a_deleteFAQ.php?id=<?= $faq['id']; ?>">
                                                <button  class="supprimer" id="supprimerFAQ"  onclick="if(confirm('Etes-vous s??r de vouloir supprimer cette question/r??ponse ?')){}else{return false;}">Supprimer cette question-r??ponse</button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </main>
        <!-- RIGHT -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Salut, <b>Admin</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <span class="material-icons-sharp">account_circle</span>
                    </div>
                </div>
            </div>
            <div class="news-list" style="margin-top: 30rem;">
                <a href="a_publierFAQ.php">
                    <div class="item add-news">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <h3>Ajouter</h3>
                        </div>
                    
                    </div> 
                </a>
            </div>
            
        </div>
    </div>
    <script src="./scripts/index.js"></script>
    
</body>

</html>
