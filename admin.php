<?php 
    
if (!isset($_SESSION)){
    session_start();
}

if($_SESSION['role'] != 'administrator'){
    header('Location: index.php');
}
require("./config/database.php") ;
$afficher_profil = $database->query("SELECT * FROM users WHERE role != 'administrator' LIMIT 8");
$afficher_profil = $afficher_profil->fetchAll();

$news_item = $database->query("SELECT * FROM news LIMIT 3");
$news_item = $news_item->fetchAll();
error_reporting(0);
ini_set('display_errors', 0);
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
                $('div.updates').load("fetch.php").fadeIn("slow");
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
                <a href="admin.php" class="active">
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
                <a href="a_news.php">
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
                <a href="a_FAQ.php">
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
            <div class="insights">
                <div class="user-count">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Nombres de Candidats</h3>
                            <h1>5</h1>
                        </div>
                    
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Yeah</small>
                </div>
                <div class="manager-count">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Nombres de Candidats</h3>
                            <h1>5</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Yeah</small>
                </div>
                <div class="message-counts">
                    <span class="material-icons-sharp">message</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Nombres de Candidats</h3>
                            <h1>5</h1>
                        </div>
                    
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Yeah</small>
                </div>
            </div>
            <div class="users-list-main">
                <h2>
                    Listes des Utilisateurs
                </h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Rôle</th>
                            <th>Modifier le profil</th>
                            <th>Bannir l'utilisateur</th>
                            <th>Supprimer l'utilisateur</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($afficher_profil as $ap){?>
                        <tr>
                            <td><?= $ap['id'] ?></td>
                            <td><?= $ap['first_name'] ?></td>
                            <td><?= $ap['last_name'] ?></td>
                            <td><?= $ap['role'] ?></td>
                            <td class="success"><a href="a_modifierprofil.php?id=<?= $ap['id'] ?>">Modifier</a></td>
                            <td class="warning">Bannir</td>
                            <td class="danger"><form enctype="multipart/form-data" method="post" action="a_deleteUser.php?id=<?= $ap['id'] ?>"><button class="danger" style="background:none;" href="a_deleteUser.php?id=<?= $ap['id'] ?>" onclick="if(confirm('Etes-vous sûr de vouloir supprimer cet utilisateur ?')){}else{return false;}">Supprimer</button></form></td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                </table>
                <a href="a_law.php">Tout afficher</a>
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
            <div class="recent-updates">
                <h2>Messages Récents</h2>
                <div class="updates">
                    
                </div>
            </div>
            <div class="news-list">
                <h2>Actualités</h2>
                <?php foreach($news_item as $news){?>
                    <div class="item">
                       <div class="icon">
                           <img src="<?= $news['image'] ?>">
                       </div>
                       <div class="right">
                           <div class="info">
                               <h3><?= $news['title'] ?></h3>
                               <small class="text-muted"><?= $news['date_creation'] ?></small>
                           </div>
                       </div>
                    </div>
                <?php  } ?>
                <div class="item add-news">
                    <div>
                        <span class="material-icons-sharp">add</span>
                        <h3>Ajouter une nouvelle actualité</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./scripts/index.js"></script>
    
</body>

</html>