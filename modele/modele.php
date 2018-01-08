<?php

function getConnect(){
  require_once('connect.php');
  $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connexion->query('SET NAMES UTF8');
  return $connexion;
}

#FONCTIONS AGENT

function ajouterClient($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax){
  $connexion=getConnect();
  $requete="INSERT INTO client (nom,prenom,dateNaissance,adresse,numTel,mail,montantMax) VALUES('$nom','$prenom','$dateNaissance','$adresse','$numTel','$mail',$montantMax)";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function modifierClient($id,$nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax){
  $connexion=getConnect();
  $requete="UPDATE client SET nom='$nom', prenom='$prenom', dateNaissance='$dateNaissance', adresse='$adresse', numTel='$numTel', mail='$mail', montantMax=$montantMax WHERE id=$id";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function ajouterIntervention($nomType,$NomEmploye,$idClient,$dateIntervention,$heure){
  $connexion=getConnect();
  $requete="INSERT INTO intervention (nomType,NomEmploye,idClient,dateIntervention,heure) VALUES ('$nomType','$NomEmploye',$idClient,'$dateIntervention',$heure)";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function paiement($id) {
  $connexion=getConnect();
  $requete="UPDATE intervention SET etat='paye' WHERE num='$id'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();

}

function differe($id){
  $connexion=getConnect();
  $requete="UPDATE intervention SET etat='differe' WHERE num='$id'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}


#FONCTIONS DIRECTEUR

function ajouterEmploye($NomEmploye,$login,$password,$categorie){
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


#TYPEINTERVENTIONS
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
  $requete="SELECT id,nom,prenom,dateNaissance,adresse,numTel,mail,montantMax FROM client";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetchAll();
  $resultat->closeCursor();
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

function chercherUnClient($id){
  $connexion=getConnect();
  $requete="SELECT id,nom,prenom,dateNaissance,adresse,numTel,mail,montantMax FROM client WHERE id=$id";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetch();
  $resultat->closeCursor();
  return $client;
}

function chercherUnClientNomDate($nom,$dateNaissance){
  $connexion=getConnect();
  $requete="SELECT id,nom,prenom,dateNaissance,adresse,numTel,mail,montantMax FROM client WHERE nom='$nom' AND dateNaissance='$dateNaissance'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetch();
  $resultat->closeCursor();
  return $client;
}

function chercherUnMecanicien($nomEmploye){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='mecanicien'" ;
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $mecanicien=$resultat->fetch();
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
  $requete="SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

function chercherUneIntervention($nomType){
  $connexion=getConnect();
  $requete="SELECT * FROM ((SELECT * FROM intervention WHERE nomType='$nomType') T1 JOIN typeIntervention T2 on T1.nomType=T2.nomType )";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $intervention=$resultat->fetch();
  $resultat->closeCursor();
  return $intervention;
}

function chercherTousLesTypesInterventions(){
  $connexion=getConnect();
  $requete="SELECT nomType,listeElem,montant FROM typeIntervention";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}
function chercherMontantMaxClient($idClient){
  $connexion=getConnect();
  $requete="SELECT montantMax FROM client WHERE id='$idClient'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetch();
  $resultat->closeCursor();
  return $interventions;
}


function chercherToutesLesInterventionMecaJour($nomEmp,$date){ // Cherche toutes les interventions d'une journée d'un mécanicien
  $connexion=getConnect();
  $requete="SELECT T1.nomType,listeElem,heure FROM
  ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure FROM intervention where nomEmploye='$nomEmp' and dateIntervention='$date')
  T1 JOIN typeintervention T2 on T1.nomType=T2.nomType)";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $intervention=$resultat->fetchAll();
  $resultat->closeCursor();
  return $intervention;
}

function chercherInterventionsClientPasPaye($idClient){
  $connexion=getConnect();
  $requete="SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention where idClient=$idClient AND (etat='differe' OR etat='attente')";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}


function chercherUnTypeInterventionMeca($nomType){
  $connexion=getConnect();
  $requete="SELECT nomType,listeElem,montant FROM typeIntervention where nomType='$nomType' ";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $typeIntervention=$resultat->fetch();
  $resultat->closeCursor();
  return $typeIntervention;
}

function chercherInterventionsClient($id){
  $connexion=getConnect();
  $requete="SELECT num,T1.nomType as nomType,nomEmploye,idClient,dateIntervention,heure,montant,etat FROM ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention where idClient=$id) T1 JOIN typeIntervention T2 on T1.nomType=T2.nomType )";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

function chercherInterventionsDiffereesClient($id){
  $connexion=getConnect();
  $requete="SELECT num,T1.nomType as nomType,nomEmploye,idClient,dateIntervention,heure,montant,etat FROM ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention where idClient=$id AND etat='differe') T1 JOIN typeIntervention T2 on T1.nomType=T2.nomType )";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

function chercherToutesLesFormations(){
  $connexion=getConnect();
  $requete="SELECT * FROM formation";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $formations=$resultat->fetchAll();
  $resultat->closeCursor();
  return $formations;
}

function ajouterUneFormation($nomEmp,$date,$heure){
  $connexion=getConnect();
  $requete="INSERT INTO formation (idFormation,nomEmploye,date,heure) VALUES(NULL,'$nomEmp','$date','$heure')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

function chercherUneInterventionJourHeure($nomMeca,$date,$heure){
  $connexion=getConnect();
  $requete="SELECT T1.nomType,listeElem,heure FROM
  ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure FROM intervention where nomEmploye='$nomMeca' and dateIntervention='$date' and heure='$heure')
  T1 JOIN typeintervention T2 on T1.nomType=T2.nomType)";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $intervention=$resultat->fetch();
  $resultat->closeCursor();
  return $intervention;
}

function chercherFormationJourHeure($nomEmp,$date,$heure){
  $connexion=getConnect();
  $requete="SELECT * FROM formation where nomEmploye='$nomEmp' and date='$date' and heure='$heure'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $formationHeure=$resultat->fetch();
  $resultat->closeCursor();
  return $formationHeure;
}

function chercherToutesLesFormationsMecaJour($nomEmp,$date){
  $connexion=getConnect();
  $requete="SELECT * FROM formation where nomEmploye='$nomEmp' and date='$date'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $formationHeure=$resultat->fetchAll();
  $resultat->closeCursor();
  return $formationHeure;
}
