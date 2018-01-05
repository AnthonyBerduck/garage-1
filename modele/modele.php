<?php

  function getConnect(){
      require_once('connect.php');
      $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $connexion->query('SET NAMES UTF8');
      return $connexion;
  }

  #FONCTIONS AGENT

  function ajouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    $connexion=getConnect();
    $requete="INSERT INTO client (nom,prenom,adresse,numTel,mail,montantMax) VALUES($nom,$prenom,$adresse,$numTel,$mail,$montantMax)";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function chercherUnClient($id){
    $connexion=getConnect();
    $requete="SELECT id,nom,prenom,adresse,numTel,mail,montantMax FROM client WHERE id=$id";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchAll();
    $resultat->closeCursor();
    return $client;
  }

  function modifierClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    $connexion=getConnect();
    $requete="UPDATE client SET nom='$nom', prenom='$prenom', adresse='$adresse', numTel='$numTel', mail='$mail', montantMax='$montantMax' WHERE id='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function paiement() {


  }

  function verifMontantDiffere(){

  }


 #FONCTIONS DIRECTEUR

  function ajouterEmploye($nomEmploye,$login,$password,$categorie){
    $connexion=getConnect();
    $requete="INSERT INTO employe (nomEmploye,login,password,categorie) VALUES('$nomEmploye','$login','$password','$categorie')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function modifierEmploye($nomEmploye,$login,$password,$categorie){
    $connexion=getConnect();
    $requete="UPDATE employe SET nomEmploye='$nomEmploye', login='$login', password='$password', categorie='$categorie' WHERE nomEmploye='$nomEmploye'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function supprimerEmploye($nomEmploye){
    $connexion=getConnect();
    $requete="DELETE FROM employe WHERE nomEmploye='$nomEmploye'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }
#INTERVENTIONS
  function ajouterTypeIntervention($nomType,$listeElem,$montant){
    $connexion=getConnect();
      //addslashes permet d'accepter les apostrophes//
     $listeElem=addslashes($listeElem);
    $requete="INSERT INTO typeIntervention (nomType,listeElem,montant) VALUES('$nomType','$listeElem','$montant')";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function modifierTypeIntervention($nomType,$listeElem,$montant){
    $connexion=getConnect();
         //addslashes permet d'accepter les apostrophes//
     $listeElem=addslashes($listeElem);
    $requete="UPDATE typeIntervention SET nomType='$nomType', listeElem='$listeElem', montant='$montant' WHERE nomType='$nomType'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  function supprimerTypeIntervention($nomType){
    $connexion=getConnect();
    $requete="DELETE FROM typeIntervention WHERE nomType='$nomType'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
  }

  #FONCTIONS RECHERCHE

  function chercherTousLesClients(){
    $connexion=getConnect();
    $requete="SELECT id,nom,prenom,adresse,numTel,mail,montantMax FROM client";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchAll();
    $resultat->$closeCursor();
    return $client;
  }

  function chercherTousLesEmployes(){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $employe=$resultat->fetchAll();
    $resultat->closeCursor();
    return $employe;
  }

  function chercherTousLesAgents(){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='agent'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $agent=$resultat->fetchAll();
    $resultat->closeCursor();
    return $agent;
  }

  function chercherTousLesDirecteurs(){

    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='directeur'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $directeur=$resultat->fetchAll();
    $resultat->closeCursor();
    return $directeur;
  }

  function chercherTousLesMecaniciens(){

    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='mecanicien'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $mecanicien=$resultat->fetchAll();
    $resultat->closeCursor();
    return $mecanicien;
  }

  function chercherUnMecanicien($nomEmploye){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='mecanicien'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $mecanicien=$resultat->fetchAll();
    $resultat->closeCursor();
    return $mecanicien;
  }

  function chercherUnAgent($nomEmploye){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='agent'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $agent=$resultat->fetchAll();
    $resultat->closeCursor();
    return $agent;
  }

  function chercherUnDirecteur($nomEmploye){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='directeur'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $directeur=$resultat->fetchAll();
    $resultat->closeCursor();
    return $directeur;
  }

  function chercherToutesLesInterventions(){
    $connexion=getConnect();
    $requete="SELECT num,nomType,nomEmp,idClient,date,heure,etat FROM intervention";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $interventions=$resultat->fetchAll();
    $resultat->closeCursor();
    return $interventions;
  }

 function chercherToutesLesTypesInterventions(){
    $connexion=getConnect();
    $requete="SELECT nomType,listeElem,montant FROM typeIntervention";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $interventions=$resultat->fetchAll();
    $resultat->closeCursor();
    return $interventions;
  }

  function chercherUneInterventionMeca($nomEmp,$heure){
    $connexion=getConnect();
    $requete="SELECT num,nomType,nomEmp,idClient,date,heure FROM intervention where nomEmp='$nomEmp' and heure='$heure' "; // Manque la verif date
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $intervention=$resultat->fetchAll();
    $resultat->closeCursor();
    return $intervention;
  }
