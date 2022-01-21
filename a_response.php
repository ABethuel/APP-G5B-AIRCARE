<?php 
    
if (!isset($_SESSION)){
    session_start();
}

if($_SESSION['role'] != 'administrator'){
    header('Location: index.php');
}
require("./config/database.php") ;
$afficher_profil = $database->query("SELECT * FROM users WHERE role != 'administrator'");
$afficher_profil = $afficher_profil->fetchAll();


$first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
        
            $first_letter_fname = substr($first_name, 0, 1);
            $first_letter_lname = substr($last_name, 0, 1);

        
$display_response = $database -> prepare("SELECT * FROM messages WHERE topic_id=?") ;
$display_response -> execute(array($_GET['id'])) ;

$display_topics=$database ->prepare("SELECT * FROM topics WHERE id = ?" );
$display_topics -> execute(array($_GET['id']));

if ($display_topics->rowCount() > 0){
    $topics = $display_topics -> fetch();
    $title_topics= $topics['title'];
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
                <a href="a_law.php" >
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Utilisateurs</h3>
                </a>
                <a href="a_capteur" >
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
                <a href="a_forum" class="active">
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
               
                <h2><?php echo $title_topics ?></h2>
                
                <div class="search-input">
                    <input type="text" name="search" id="search" placeholder="Rechercher..." style="float:right;"/>
                </div>
                
                <table id="tableUser">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Contenu</th>      
                            <th>Date</th>
                            <th>Utilisateur</th>
                            <th>Supprimer le messages</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($display_response as $dr){?>
                        <tr class="tr_clicks">
                            <th><?= $dr['id'] ?></th>        
                            <th><?= $dr['content'] ?></th>
                            <th><?= $dr['date'] ?></th>
                            <th><?= $dr['user_name'] ?></th>
                            <td class="danger"><form enctype="multipart/form-data" method="post" action="a_deleteRopics.php?id=<?= $dr['id'] ?>"><button class="danger" style="background:none;" href="a_deleteTopics.php?id=<?= $dr['id'] ?>" onclick="if(confirm('Etes-vous sûr de vouloir supprimer le message ?')){}else{return false;}">Supprimer le Message</button></form></td>
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
            <div class="recent-updates">
                
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
                $('#tableUser').find('td').each(function() {
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