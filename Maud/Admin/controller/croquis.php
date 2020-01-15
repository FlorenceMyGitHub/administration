<?php 

if ($_SERVER['SERVER_NAME'] == "localhost") {
    $url = 'http://localhost/maud';
} else {
    $url = "http://".$_SERVER['SERVER_NAME'];
}

session_start();

if($_SESSION['statut'] == 'administrateur') { 
    $message ="";
    if (isset($_GET['invalid'])) {
        $message = "Le format est invalide, veuillez rééessayer.";
    }
    if (isset($_GET['size'])) {
        $message = "Le poids du fichier est trop lourd.";
    }
    require '../view/croquis.php'; 
} else { 
    $location = "Location: ".$url."/admin/index.php";
    header($location);
}


?>

