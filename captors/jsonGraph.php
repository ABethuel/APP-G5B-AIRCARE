<?php 
header('Content-Type: application/json');

// On importe l'initialisaton de la database
require('../config/database.php');
session_start();

$idCaptor = $_SESSION['id_captor'];

$query = sprintf("SELECT result, date from air_quality where id_captor = $idCaptor ORDER BY id");

$result = $database->query($query);

//On boucle dans la data récupérée
$data = array();
foreach($result as $row){
    $data[] = $row;
}

echo json_encode($data);



?>
