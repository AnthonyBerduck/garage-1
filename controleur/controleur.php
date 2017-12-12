<?php
require_once("modele/modele.php");
require_once("vue/vue.php");

function ctlConnexion(){
  if(isset($_POST['connexion']) && !empty($_POST['login']) && !empty($_POST['psw'])){
    $resultat = chercherTousLesEmployes();
    foreach ($resultat as $ligne){
      if( $ligne->login == $_POST['login'] && $ligne->password == $_POST['psw']){
        if( $ligne->categorie == 'agent'){
          afficherAgent($ligne);
        }else if( $ligne->categorie == 'mecanicien'){
          afficherMecanicien($ligne);
        }else if( $ligne->categorie == 'directeur'){
          afficherDirecteur($ligne);
        }
      }
    }
  }else{
    throw new Exception("Champs invalides");
  }
}
