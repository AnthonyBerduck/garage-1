<?php
  require_once("modele/modele.php");
  require_once("vue/vue.php");

  function ctlAjouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax)) && (strlen((string)$numTel))==10){
      ajouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax);
    }
    else {
      throw new Exception("Un ou plusieurs champs sont invalides");
    }
  }

  function ctlSAjouterEmploye($)

  function ctlErreur($erreur){
    afficherErreur($erreur);
  }
