<?php
session_start() ;
if ($_SESSION["role"]=="administrator") {

}
else {
    header('Location: index.php') ;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style_back.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <title>Back_office</title>
    <style>

    </style>
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <h3>AirCare</h3>
                <p> <?php echo $_SESSION["first_name"]. " " . $_SESSION["last_name"]    ?></p>
            </div>
            <ul>
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Utilisateurs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Capteurs</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Actualités</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-paper-plane"></i></span>
                        <span class="item">Nous contacter</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-newspaper"></i></span>
                        <span class="item">Forum</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-question"></i></span>
                        <span class="item">FAQ</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-users"></i></span>
                        <span class="item">Equipe</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
  <script>

  </script>
</body>
</html>