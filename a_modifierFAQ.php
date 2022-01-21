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
            if(isset($_GET['id']) AND !empty($_GET['id'])){
                $getid = $_GET['id'];
                $recupFAQ = $database->prepare('SELECT * FROM faq WHERE id = ?');
                $recupFAQ->execute(array($getid));
                if($recupFAQ->rowCount()>0){
                    $faqInfos = $recupFAQ->fetch();
                    $question = $faqInfos['question'];
                    $reponse = str_replace('<br />', '',$faqInfos['reponse']);
                    
                    if(isset($_POST['valider'])){
                        $question_saisie = htmlspecialchars($_POST['question']);
                        $reponse_saisie = nl2br(htmlspecialchars($_POST['reponse']));
            
                        $updateFAQ = $database->prepare('UPDATE faq SET question = ?, reponse = ? WHERE id=?');
                        $updateFAQ->execute(array($question_saisie,$reponse_saisie,$getid));
                        
                        header('Location: a_FAQ.php');
                    }
                }else{
            
                }
            }else{
                echo "Aucun identifiant trouvé";
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
                        <a href="a_forum.php"><span class="fas fa-comment-alt"></span>
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
                    <h1>Modification de la FAQ n°<?= $getid ?></h1>
                    <form action="" method="POST">
                            <input type="text" name="question" value="<?= $question; ?>" style="width:100%;height:40px"><br>
                            <br>
                            <textarea name="reponse" style="width:100%; min-height:200px;"><?= $reponse; ?></textarea>
                            <br>
                            <input type="submit" name="valider" style="width:100%; padding: 10px 20px; border-radius : 5px 5px; border:none; background-color: #213C70; color:white;">
                    </form>
                </div>
                                  
            </main>
          
        </div>
	</body>
</html>