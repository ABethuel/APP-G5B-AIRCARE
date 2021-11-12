<!-- header.php 

Header à ajouter sur chaque page le nécéssitant-->

<header>
    <nav>
        <div class="left">
            <div>
                <a href="../index.php"><img class="logo" src="../Assets/images/logo.png"></a>
            </div>
            <div class="menu">
                <a href="../index.php">ACCEUIL</a>
                <a href="../information.php">INFORMATIONS</a>
                <a href="../liste_capteurs.php">CAPTEURS</a>
                <a href="../forum_sujet.php">FORUM</a>
                <a href="../quiz.php">QUIZ</a>
            </div>
        </div>
        <div class="right">
            <!-- Bouton se connecter : changera d'apparence en fonction du statut de connexion avec 
            le php -->
            <div class="connexion">
                <img class="profil" src="../Assets/images/profil_connexion.png">
                <a href="../connexion.php">Se connecter</a>
            </div> 
                
            <div class="research">
                <form>
                    <input class="research_input" type="text" name="search" placeholder="Search">
                </form>
            </div> 
        
        </div>
    </nav>
</header>





