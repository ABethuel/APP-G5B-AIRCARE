<?php 
    
if (!isset($_SESSION)){
    session_start();
}

if($_SESSION['role'] != 'administrator'){
    header('Location: index.php');
}
require("./config/database.php") ;
$news_item = $database->query("SELECT * FROM news");
$news_item = $news_item->fetchAll();

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
            
            <div class="users-list-main">
                <h2>
                    Gestion des Actualités
                </h2>
                <div class="search-input">
                    <input type="text" name="search" id="search" placeholder="Rechercher..." style="float:right;"/>
                </div>
                
                <table id="tableNews">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Image</th>

                            <th>Description</th>

                            <th>Lien</th>

                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($news_item as $news){?>
                        <tr class="tr_clicks">
                            <td><?= $news['id'] ?></td>
                            <td><?= $news['title'] ?></td>
                            <td><img src="<?= $news['image'] ?>" style="margin:auto;border-radius: 50%;width: 100px;"></td>

                            <td><?= $news['description'] ?></td>
                            <td><?= $news['link'] ?></td>

                            <td class="success"><a href="a_modifierarticle.php?id=<?= $news['id'] ?>">Modifier</a></td>
                            <td class="danger"><form enctype="multipart/form-data" method="post" action="a_deleteArticle.php?id=<?= $news['id'] ?>"><button class="danger" style="background:none;" onclick="if(confirm('Etes-vous sûr de vouloir supprimer cette article ?')){}else{return false;}">Supprimer</button></form></td>
                        </tr>
                    <?php  } ?>
                    </tbody>
                </table>
                
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
                <a href="a_ajoutarticle.php">
                    <div class="item add-news">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <h3>Ajouter une nouvelle actualité</h3>
                        </div>
                    
                    </div> 
                </a>
            </div>
            
        </div>
    </div>
    <script src="./scripts/index.js"></script>
    <script>
            var value = document.querySelectorAll('td');
            $(document).ready(function() {
            $('#search').off('keyup');
            $('#search').on('keyup', function() {
                var searchTerm = $('#search').val();
                var tr = [];
                $('#tableNews').find('td').each(function() {
                    var value = $(this).html();
                    if (value.includes(searchTerm)) {
                        tr.push($(this).closest(".tr_clicks"));
                    }
                });

                if ( searchTerm == '') {
                    $(".tr_clicks").show();
                } else {
                    // Else, hide all rows except those added to the array
                    $(".tr_clicks").not('thead tr').hide();
                    tr.forEach(function(el) {
                        el.show();
                    });
                }
            });
        });
    </script>
</body>

</html>