<?php 
    
if (!isset($_SESSION)){
    session_start();
}

if($_SESSION['role'] != 'administrator'){
    header('Location: index.php');
}
require("./config/database.php") ;

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupNews = $database->prepare('SELECT * FROM news WHERE id = ?');
    $recupNews->execute(array($getid));
    if($recupNews->rowCount()>0){
        $newsInfos = $recupNews->fetch();
        $image = $newsInfos['image'];
        $title = $newsInfos['title'];
        $description = $newsInfos['description'];
        
        if(isset($_POST['valider'])){
            $image_link = htmlspecialchars($_POST['image']);
            $title_saisie = htmlspecialchars($_POST['title']);
            $description_saisie = nl2br(htmlspecialchars($_POST['description']));

            $updateNews = $database->prepare('UPDATE news SET image=?, title = ?, description = ? WHERE id=?');
            $updateNews->execute(array($image_link,$title_saisie,$description_saisie,$getid));
            
            header('Location: a_news.php');
        }
    }else{

    }
}else{
    echo "Aucun identifiant trouvé";
}
?>

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
                    <h1>Modification de l'article n°<?= $getid ?></h1>
                    <form action="" method="POST">
                            <input type="text" name="title" value="<?= $title; ?>" style="width:100%;height:40px"><br>
                            <br>
                            <input type="text" name="image" value="<?= $image; ?>" style="width:100%;height:40px"><br>
                            <br>
                            <textarea name="description" style="width:100%; min-height:200px;"><?= $description; ?></textarea>
                            <br>
                            <input type="submit" name="valider" style="width:100%; padding: 10px 20px; border-radius : 5px 5px; border:none; background-color: #213C70; color:white;">
                    </form>
                    <a href="a_news.php">Retournez sur la gestion des articles </a>
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
