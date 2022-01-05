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
                    $user_mail = $userInfos['mail'];
                    $user_last_name = $userInfos['last_name'];
                    $user_first_name = $userInfos['first_name'];
                    $user_role = $userInfos['role'];
            
                    
                    if(isset($_POST['valider'])){
                        $mail_saisie = htmlspecialchars($_POST['mail']);
                        $role_saisie = htmlspecialchars($_POST['role']);
                        $nom_saisie = htmlspecialchars($_POST['last_name']);
                        $prenom_saisie = htmlspecialchars($_POST['first_name']);
                
                        $updateUser= $database->prepare('UPDATE users SET mail = ?, role = ?, last_name= ?, first_name = ? WHERE id=?');
                        $updateUser->execute(array($mail_saisie,$role_saisie,$nom_saisie,$prenom_saisie,$getid));
                        
                        header('Location: admin.php?msg=3');
                    }
                }else{
        
                }
            }else{
                echo "Aucun identifiant trouvé";
            }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <link rel="stylesheet" href="style_index.css">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
        <title>Espace Administrateur</title>
    </head>

    <body>
    <div class="sidebar">

<div class="sidebar-brand">
    <a href="index.php"><img src="Assets/images/logo.png"></a>
</div>

<div class="sidebar-menu">
    <ul>
        <li>
            <a href="admin.php" class="active"><span class="fas fa-igloo"></span>
            <span>Tableau de bord</span></a>
        </li>
        <li>
            <a href="a_law.php"><span class="fas fa-users"></span>
            <span>Gérer les utilisateurs</span></a>
        </li>   
        <li>
            <a href=""><span class="fas fa-tablet"></span>
            <span>Gérer les Capteurs</span></a>
        </li>
        <li>
            <a href="a_FAQ.php"><span class="fas fa-question"></span>
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
        Espace Admin
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
            <form action="" method="POST">
            <input type="mail" name="mail" value="<?php $userInfos['mail']; ?>">
            <br>
            <select name="role" value="<?php $userInfos['role']; ?>">
                <option value="user">user</option>
                <option value="manager">manager</option>
            </select>
            <input type="text" name="nom" value="<?php $userInfos['last_name']; ?>">
            <br>
            <input type="text" name="prenom" value="<?php $userInfos['first_name']; ?>">
            <br>
            <input type="submit" name="valider">
        </form>
                        </div>
            </main>
        
    </body>
</html>