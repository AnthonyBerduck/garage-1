<?php

require_once('controleur/controleur.php');
require_once('vue/vue.php');

try{
  if(isset($_POST['connexion'])){
    ctlConnexion();
  } else if (isset($_POST['ajouterClient'])) {
    ctlAjouterClient($_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['tel']);
  }else if (isset($_POST['supprimerClient'])){
    ctlSupprimerClient();
  } else if(isset($_POST['chercherClient'])){
    ctlChercherClient($_POST['search']);
  }else{
    ctlAccueil();
  }

}catch (Exception $e){
  ctlErreur($e);
}
