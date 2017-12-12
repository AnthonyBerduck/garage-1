<?php

function getConnect(){
    require_once('connect.php');
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}


function ajouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    $connexion=getConnect();
    $requete="INSERT INTO client (nom,prenom,adresse,numTel,mail,montantMax) VALUES($nom,$prenom,$adresse,$numTel,$mail,$montantMax)";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function chercherTousLesClients(){
    $connexion=getConnect();
    $requete="SELECT id,nom,prenom,adresse,numTel,mail,montantMax FROM client";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=resultat->fetchAll();
    $resultat->$closeCursor();
    return $client;
}

function chercherUnClient($nom){
    $connexion=getConnect();
    $requete="SELECT id,nom,prenom,adresse,numTel,mail,montantMax FROM client WHERE nom=$nom";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchAll();
    $resultat->closeCursor();
    return $client;
}

function modifierClient($id,$nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    $connexion=getConnect();
    $requete="UPDATE client SET nom='$nom', prenom='$prenom', adresse='$adresse', numTel='$numTel', mail='$mail', montantMax='$montantMax' WHERE id='$id'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function supprimerClient($id){
    $connexion=getConnect();
    $requete="DELETE FROM client WHERE id=$id";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function ajouterEmploye($nomEmploye,$login,$password,$categorie){
    $connexion=getConnect();
    $requete="INSERT INTO employe (nomEmploye,login,password,categorie) VALUES($nomEmploye,$login,$password,$categorie)";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function chercherTousLesEmployes(){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=resultat->fetchAll();
    $resultat->closeCursor();
    return $client;
}

function modifierClient($nomEmploye,$login,$password,$categorie){
    $connexion=getConnect();
    $requete="UPDATE employe SET nomEmploye='$nomEmploye', login='$login', password='$password', categorie='$categorie' WHERE nomEmploye='$nomEmploye'";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function supprimerEmploye($nomEmploye){
    $connexion=getConnect();
    $requete="DELETE FROM employe WHERE nomEmploye=$nomEmploye";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function chercherTousLesMecaniciens(){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='mecanicien'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=resultat->fetchAll();
    $resultat->closeCursor();
    return $mecanicien;
}

function chercherUnMecanicien($nomEmploye){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='mecanicien'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchAll();
    $resultat->closeCursor();
    return $mecanicien;
}

function chercherTousLesAgents(){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='agent'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=resultat->fetchAll();
    $resultat->closeCursor();
    return $agent;
}

function chercherUnAgent($nomEmploye){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='agent'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchAll();
    $resultat->closeCursor();
    return $agent;
}

function chercherTousLesDirecteurs(){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='directeur'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=resultat->fetchAll();
    $resultat->closeCursor();
    return $directeur;
}

function chercherUnDirecteur($nomEmploye){
    $connexion=getConnect();
    $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='directeur'" ;
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchAll();
    $resultat->closeCursor();
    return $directeur;
}