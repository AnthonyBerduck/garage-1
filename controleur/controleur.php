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

  function ctlAjouterEmploye($nomEmp,$login,$mdp,$categorie){
    if(!empty($nomEmp) && !empty($login) && !empty($mdp) && !empty($categorie)){
      ajouterEmploye($nomEmp,$login,$mdp,$categorie);
    }
    else {
      throw new Exception("Un ou plusieurs champs sont incorrects");
    }
  }

  function ctlErreur($erreur){
    afficherErreur($erreur);

  function ctlConnexion(){
    if(!empty($_POST['login'] && !empty($_POST['psw'])){
      connexion();
    }

  }
