<?php

function afficherConnexion(){
  $contenuAffichage= '<p> <label> Login : </label> <input type="text" name="login"> </p> <p> <label> Password : </label> <input type="text" name="psw" /> </p> <p class="bouton"> <input type="submit" value="Connexion" name= "connexion" /></p> <p class="bouton"> <input type="reset" value="Reset" name= "reset" /> </p> ';
  return $contenuAffichage;
}

try{
    require_once("gabarit.php");
    echo afficherConnexion();
  }catch(PDOException $e) {
    $msg = 'ERREUR PDO Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
    exit($msg);
  }
