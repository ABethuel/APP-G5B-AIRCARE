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
error_reporting(0);
ini_set('display_errors', 0);
$first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
        
            $first_letter_fname = substr($first_name, 0, 1);
            $first_letter_lname = substr($last_name, 0, 1);
            if(isset($_GET['id']) AND !empty($_GET['id'])){
                $getid = $_GET['id'];
                $recupUser = $database->prepare('SELECT * FROM users WHERE id = ?');
                $recupUser->execute(array($getid));
                if($recupUser->rowCount()>0){
                    $userInfos = $recupUser->fetch();
                    $user_mail = $userInfos['email'];
                    $user_last_name = $userInfos['last_name'];
                    $user_first_name = $userInfos['first_name'];
                    $user_role = $userInfos['role'];
            
                    
                    if(isset($_POST['valider'])){
                        $mail_saisie = htmlspecialchars($_POST['email']);
                        $role_saisie = htmlspecialchars($_POST['role']);
                        $nom_saisie = htmlspecialchars($_POST['nom']);
                        $prenom_saisie = htmlspecialchars($_POST['prenom']);
                
                        $updateUser= $database->prepare('UPDATE users SET email = ?, role = ?, last_name= ?, first_name = ? WHERE id=?');
                        $updateUser->execute(array($mail_saisie,$role_saisie,$nom_saisie,$prenom_saisie,$getid));
                        
                        header('Location: admin.php?msg=3');
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
                <a href="a_law.php"  class="active">
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
                    Modification d'un profil
                </h2>

                <div class="recent-grids">
                    <h1>Modification du profil de l'utilisateur n°<?= $getid ?></h1>
                    <form action="" method="POST">
            <input type="mail" name="email" value="<?= $user_mail ?>" style="width:100%;height:40px"><br>
            <br>
            <select name="role" value="<?php $userInfos['role']; ?>" style="width:100%;height:40px">
                <option value="user">user</option>
                <option value="manager">manager</option>
                <option value="administrator">admin</option>
            </select><br>
            <br>
            <input type="text" name="nom" value="<?= $user_last_name ?>" style="width:100%;height:40px"><br>
            <br>
            <input type="text" name="prenom" value="<?= $user_first_name ?>" style="width:100%;height:40px"><br>
            <br>
            <input type="submit" name="valider" style="width:100%; padding: 10px 20px; border-radius : 5px 5px; border:none; background-color: #213C70; color:white;">
        </form>
                    <a href="a_law.php">Retournez sur la gestion d'utilisateurs </a>
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

            
        </div>
    </div>
    <script src="./scripts/index.js"></script>
    
</body>

</html>
