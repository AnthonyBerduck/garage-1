<?php

function afficherConnexion(){
  $contenuAffichage= '<form action="garage.php" method="post">
  <p> <label> Login : </label> <input type="text" name="login"> </p>
  <p> <label> Password : </label> <input type="text" name="psw" /> </p>
  <p class="bouton"> <input type="submit" value="Connexion" name="connexion" /></p>
  <p class="bouton"> <input type="reset" value="Reset" name= "reset" /> </p>
  </form>';
  require_once("gabarit.php");
}

function afficherErreur($erreur){
  $contenuAffichage=$erreur.'</br><a href="garage.php">Revenir à l\'accueil</a>';
  require_once('gabarit.php');
}

function afficherDirecteur(){
  $contenuAffichage='CONNECTE TRUMP';
  require_once('gabarit.php');
}
