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

            if(isset($_POST['envoi'])){
                if(!empty($_POST['title']) AND !empty($_POST['image']) AND !empty($_POST['description']) AND !empty($_POST['link'])){
                    $title = htmlspecialchars($_POST['title']);
                    $image = htmlspecialchars($_POST['image']);
                    $description = nl2br(htmlspecialchars($_POST['description']));
                    $link = htmlspecialchars($_POST['link']);

                    $insererNews = $database->prepare("INSERT INTO news (title,image,description, link) VALUES (?,?,?,?)");
                    $insererNews->execute(array($title, $image, $description, $link));
                    $ajout = '<p class="success">Article bien ajouté !</p>';
                }else{
                    echo "Veuillez compléter tous les champs...";
                }
            }
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
                    <img src="Assets/images/logo.png" alt="Logo">
                    <h2>AirCare</h2>
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
                <a href="#">
                    <span class="material-icons-sharp">cable</span>
                    <h3>Capteurs</h3>
                </a>
                <a href="a_news.php" class="active">
                    <span class="material-icons-sharp">feed</span>
                    <h3>Actualités</h3>
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
                <a href="a_FAQ.php"  >
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
                    <h3>Se déconnecter</h3>
                </a>
            </div>
        </aside>
        <!-- MAIN CONTENT -->
        <main>
            <h1>Espace d'Administration</h1>
            <div class="date">
                <p class="date-p"><?php echo date("j/n/Y");?></p>
            </div>
            
            <div class="users-list-main">
                <h2>
                    Gestion des articles
                </h2>

                <div class="recent-grids">
                    <h1>Publication d'un article</h1>
                    <?php if(isset($ajout)){ echo $ajout;} ?>
                    <form action="" method="POST">
                        <input type="text" name="title" style="width:100%;height:40px" placeholder="Titre de l'article">
                        <br>
                        <input type="text" name="image" style="width:100%;height:40px" placeholder="Lien de l'image">
                        <br>
                        <input type="text" name="link" style="width:100%;height:40px" placeholder="Lien de l'article">
                        <br>
                        <textarea name="description" style="width:100%; min-height:200px;" placeholder="description"></textarea>
                        <br>
                        <input type="submit" name="envoi" style="width:100%; padding: 10px 20px; border-radius : 5px 5px; border:none; background-color: #213C70; color:white;">
                    </form>
                    <a href="a_news.php">Retournez sur la page de gestion des articles </a>
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
