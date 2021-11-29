<?php 
session_start();
$_SERVER = [];
session_destroy();
header('Location: ../connexion.php');
?>