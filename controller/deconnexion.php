<?php 
	session_start();
    session_unset();
    unset($_GET['deconnexion']);
   // var_dump($_SERVER['HTTP_REFERER']);
    header('Location: index.php');

?>