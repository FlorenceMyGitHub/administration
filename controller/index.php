<?php
require '../model/Membre.php';


session_start();
$erreurConnexion = "";
//error_reporting(0);
if(isset($_POST['submit'])){

    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    
    /* creation function */
    function testPass($p, $pseudo){
        $membre = new Membre($_POST['email']);
        $mdp = $membre->getMdp();
        if($p != $mdp){
            throw new Exception('invalid password or email');
        } else {
            $_SESSION['statut'] = "administrateur";
            header("Location: index.php?page=write");
        }
    }
    /* fin fonction */
    
    try{
        testPass($password, $email);
    }
    catch(Exception $e){
        $erreurConnexion = "Mauvais mot de passe !";
        'error :'.$e->getMessage();
    }
  	
} elseif (isset($_SESSION['statut']) && $_SESSION['statut'] == "administrateur" && !isset($_GET['page'])) {
     header("Location: index.php?page=write");
}


$afficher ="<div class='card-panel'  style='max-width: 360px; margin: 4em auto;'>
            <h4 style='text-align:left; padding: 0;'>Se connecter</h4>
           
            <p style='color:red'>".$erreurConnexion."</p>
            <br/>
            <form method='post'>
               
                    <div style='width: 100px'>
                        <label for='email'>Adresse email</label>
                        <input type='text' id='email' name='email' placeholder='admin@exemple.fr' style='padding: 5px;'/>
                    </div>

                    <div style='width: 100px'>
                         <label for='password'>Mot de passe</label>
                        <input type='password' id='password' name='password' value='' style='padding: 5px;'/>                       
                    </div>
               
                    <br/><br/>
                    <button type='submit' name='submit' class='waves-effect waves-light btn light-blue'>
                        Se connecter
                    </button>
                    <br/><br/>
             
            </form>
        </div>";



require '../view/index.php';

         

?>