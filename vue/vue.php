<?php

function afficherConnexion(){
  $contenuAffichage= '<form action="garage.php" method="post">
  <p> <label> Login : </label> <input type="text" name="login"> </p>
  <p> <label> Password : </label> <input type="password" name="psw" /> </p>
  <p class="bouton"> <input type="submit" value="Connexion" name="connexion" /></p>
  <p class="bouton"> <input type="reset" value="Reset" name= "reset" /> </p>
  </form>';
  require_once("gabarit.php");
}

function afficherErreur($erreur){
  $contenuAffichage=$erreur.'</br><a href="garage.php">Revenir à l\'accueil</a>';
  require_once('gabarit.php');
}

function afficherPageDirecteur($directeur){
  afficherInterventions();
  require_once('gabarit.php');
}

function afficherInterventions($interventions){
    $contenuAffichage='<form method="post" action="garage.php"><p>
    <label for="interventions">Liste Des Interventions<label><br/>
     <select name="interventions" id="interventions">';
    foreach($interventions as $ligne){
    $contenuAffichage.="<option value="$ligne->num">'$ligne->nomEmp'</option>";
    }
    contenuAffichage.="</select><p></form>";
    require_once('gabarit.php');
}

