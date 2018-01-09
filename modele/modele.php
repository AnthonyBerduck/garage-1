<?php

function getConnect(){
  require_once('connect.php');
  $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connexion->query('SET NAMES UTF8');
  return $connexion;
}

#FONCTIONS AGENT

//Ajoute un client dans la base

function ajouterClient($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax){
  $connexion=getConnect();
  $requete="INSERT INTO client (nom,prenom,dateNaissance,adresse,numTel,mail,montantMax) VALUES('$nom','$prenom','$dateNaissance','$adresse','$numTel','$mail',$montantMax)";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//Modifie un client dans la base

function modifierClient($id,$nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax){
  $connexion=getConnect();
  $requete="UPDATE client SET nom='$nom', prenom='$prenom', dateNaissance='$dateNaissance', adresse='$adresse', numTel='$numTel', mail='$mail', montantMax=$montantMax WHERE id=$id";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//AJoute une intervention à la base

function ajouterIntervention($nomType,$NomEmploye,$idClient,$dateIntervention,$heure){
  $connexion=getConnect();
  $requete="INSERT INTO intervention (nomType,NomEmploye,idClient,dateIntervention,heure) VALUES ('$nomType','$NomEmploye',$idClient,'$dateIntervention',$heure)";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//MOdifie l'état du paiement en payé d'une intervention id dans la base

function paiement($id) {
  $connexion=getConnect();
  $requete="UPDATE intervention SET etat='paye' WHERE num='$id'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();

}

//Modifie l'état du paiement en différé d'une intervnetion id dans la base

function differe($id){
  $connexion=getConnect();
  $requete="UPDATE intervention SET etat='differe' WHERE num='$id'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}


#FONCTIONS DIRECTEUR

//Ajoute un employé dans la base

function ajouterEmploye($NomEmploye,$login,$password,$categorie){
  $connexion=getConnect();
  $requete="INSERT INTO employe (nomEmploye,login,password,categorie) VALUES('$nomEmploye','$login','$password','$categorie')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//Modifie un employé dans la base

function modifierEmploye($nomEmploye,$login,$password,$categorie){
  $connexion=getConnect();
  $requete="UPDATE employe SET nomEmploye='$nomEmploye', login='$login', password='$password', categorie='$categorie' WHERE nomEmploye='$nomEmploye'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//Supprime un employé dans la base grace à son nomEmployé

function supprimerEmploye($nomEmploye){
  $connexion=getConnect();
  $requete="DELETE FROM employe WHERE nomEmploye='$nomEmploye'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

#MECANICIEN 

//Ajoute une formation dans la base

function ajouterUneFormation($nomEmp,$date,$heure){
  $connexion=getConnect();
  $requete="INSERT INTO formation (idFormation,nomEmploye,date,heure) VALUES(NULL,'$nomEmp','$date','$heure')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

#TYPEINTERVENTIONS

//Ajoute un type intervention à la base

function ajouterTypeIntervention($nomType,$listeElem,$montant){
  $connexion=getConnect();
  //addslashes permet d'accepter les apostrophes//
  $listeElem=addslashes($listeElem);
  $requete="INSERT INTO typeintervention (nomType,listeElem,montant) VALUES('$nomType','$listeElem','$montant')";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//Modifie un type intervention dans la base

function modifierTypeIntervention($nomType,$listeElem,$montant){
  $connexion=getConnect();
  //addslashes permet d'accepter les apostrophes//
  $listeElem=addslashes($listeElem);
  $requete="UPDATE typeintervention SET nomType='$nomType', listeElem='$listeElem', montant='$montant' WHERE nomType='$nomType'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

//Modifie un type intervention dans la base

function supprimerTypeIntervention($nomType){
  $connexion=getConnect();
  $requete="DELETE FROM typeintervention WHERE nomType='$nomType'";
  $resultat=$connexion->query($requete);
  $resultat->closeCursor();
}

#FONCTIONS RECHERCHE

//Cherche tous les clients dans la base puis retourne un tableau des clients

function chercherTousLesClients(){
  $connexion=getConnect();
  $requete="SELECT id,nom,prenom,dateNaissance,adresse,numTel,mail,montantMax FROM client";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetchAll();
  $resultat->closeCursor();
  return $client;
}

//Cherche tous les employés dans la base puis retourne un tableau des employés

function chercherTousLesEmployes(){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $employe=$resultat->fetchAll();
  $resultat->closeCursor();
  return $employe;
}

//Cherche tous les agents dans la base et retourne un tableau des agents

function chercherTousLesAgents(){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='agent'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $agent=$resultat->fetchAll();
  $resultat->closeCursor();
  return $agent;
}

//Cherche tous les directeurs dans la base puis retourne un tableau des direteurs

function chercherTousLesDirecteurs(){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='directeur'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $directeur=$resultat->fetchAll();
  $resultat->closeCursor();
  return $directeur;
}

//Cherche tous les mecaniciens dans la base puis retourne un tableau des mécaniciens

function chercherTousLesMecaniciens(){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE categorie='mecanicien'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $mecanicien=$resultat->fetchAll();
  $resultat->closeCursor();
  return $mecanicien;
}

//Cherche un client à partir de son id puis le retourne

function chercherUnClient($id){
  $connexion=getConnect();
  $requete="SELECT id,nom,prenom,dateNaissance,adresse,numTel,mail,montantMax FROM client WHERE id=$id";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetch();
  $resultat->closeCursor();
  return $client;
}

//Cherche un client à partir de son nom et de sa date puis le retourne 

function chercherUnClientNomDate($nom,$dateNaissance){
  $connexion=getConnect();
  $requete="SELECT id,nom,prenom,dateNaissance,adresse,numTel,mail,montantMax FROM client WHERE nom='$nom' AND dateNaissance='$dateNaissance'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $client=$resultat->fetch();
  $resultat->closeCursor();
  return $client;
}

//Cherche un mecanicien à partir de son nomEmploye puis le retourne

function chercherUnMecanicien($nomEmploye){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='mecanicien'" ;
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $mecanicien=$resultat->fetch();
  $resultat->closeCursor();
  return $mecanicien;
}

//Cherche un agent à partir de son nomEmploye puis le retourne

function chercherUnAgent($nomEmploye){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='agent'" ;
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $agent=$resultat->fetch();
  $resultat->closeCursor();
  return $agent;
}

//Cherche un directeur à partir de son nomEmploye puis le retourne

function chercherUnDirecteur($nomEmploye){
  $connexion=getConnect();
  $requete="SELECT nomEmploye,login,password,categorie FROM employe WHERE nomEmploye='$nomEmploye' AND categorie='directeur'" ;
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $directeur=$resultat->fetch();
  $resultat->closeCursor();
  return $directeur;
}

//Cherche toutes les interventions dans la base puis les retourne dans un tableau

function chercherToutesLesInterventions(){
  $connexion=getConnect();
  $requete="SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

//Cherche un intervention à partir de son nomType et le retourne

function chercherUneIntervention($nomType){
  $connexion=getConnect();
  $requete="SELECT * FROM ((SELECT * FROM intervention WHERE nomType='$nomType') T1 JOIN typeintervention T2 on T1.nomType=T2.nomType )";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $intervention=$resultat->fetch();
  $resultat->closeCursor();
  return $intervention;
}

//Cherche tous les types d'intervention puis les retourne dan un tableau

function chercherTousLesTypesInterventions(){
  $connexion=getConnect();
  $requete="SELECT nomType,listeElem,montant FROM typeintervention";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

//Cheche un trype d'intervention à partir de son nomType puis le retourne

function chercherUnTypeInterventionMeca($nomType){
  $connexion=getConnect();
  $requete="SELECT nomType,listeElem,montant FROM typeintervention where nomType='$nomType' ";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $typeIntervention=$resultat->fetch();
  $resultat->closeCursor();
  return $typeIntervention;
}

//Cherche le montantMax d'un client à partir de son idCLient

function chercherMontantMaxClient($idClient){
  $connexion=getConnect();
  $requete="SELECT montantMax FROM client WHERE id='$idClient'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetch();
  $resultat->closeCursor();
  return $interventions;
}

//Cherche toutes les interventions d'un jour pour un mécanicien associé à la liste d'éléments à fournir

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

//Cherche toutes les interventions non payées d'un client puis les retourne

function chercherInterventionsClientPasPaye($idClient){
  $connexion=getConnect();
  $requete="SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention where idClient=$idClient AND (etat='differe' OR etat='attente')";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

//Cherche les interventions d'un client à partir de son id puis les retourne dans un tableau

function chercherInterventionsClient($id){
  $connexion=getConnect();
  $requete="SELECT num,T1.nomType as nomType,nomEmploye,idClient,dateIntervention,heure,montant,etat FROM ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention where idClient=$id) T1 JOIN typeintervention T2 on T1.nomType=T2.nomType )";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

//Cherche les interventions différées d'un client à partir de son id puis les retourne dans un tableau

function chercherInterventionsDiffereesClient($id){
  $connexion=getConnect();
  $requete="SELECT num,T1.nomType as nomType,nomEmploye,idClient,dateIntervention,heure,montant,etat FROM ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure,etat FROM intervention where idClient=$id AND etat='differe') T1 JOIN typeintervention T2 on T1.nomType=T2.nomType )";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $interventions=$resultat->fetchAll();
  $resultat->closeCursor();
  return $interventions;
}

//Cherche toutes les formations de la base et les retourne dans un tableau

function chercherToutesLesFormations(){
  $connexion=getConnect();
  $requete="SELECT * FROM formation";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $formations=$resultat->fetchAll();
  $resultat->closeCursor();
  return $formations;
}



//Cherche l'intervention d'un mecanicien à un jour et une heure donnés

function chercherUneInterventionJourHeure($nomMeca,$date,$heure){
  $connexion=getConnect();
  $requete="SELECT T1.nomType,listeElem,heure,idClient FROM
  ((SELECT num,nomType,nomEmploye,idClient,dateIntervention,heure FROM intervention where nomEmploye='$nomMeca' and dateIntervention='$date' and heure='$heure')
  T1 JOIN typeintervention T2 on T1.nomType=T2.nomType)";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $intervention=$resultat->fetch();
  $resultat->closeCursor();
  return $intervention;
}

//Cherche la formation d'un mécanicien à un jour et une heure donnés

function chercherFormationJourHeure($nomEmp,$date,$heure){
  $connexion=getConnect();
  $requete="SELECT * FROM formation where nomEmploye='$nomEmp' and date='$date' and heure='$heure'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $formationHeure=$resultat->fetch();
  $resultat->closeCursor();
  return $formationHeure;
}

//Cherche toutes les formation d'un mécanicien à un jour donnée

function chercherToutesLesFormationsMecaJour($nomEmp,$date){
  $connexion=getConnect();
  $requete="SELECT * FROM formation where nomEmploye='$nomEmp' and date='$date'";
  $resultat=$connexion->query($requete);
  $resultat->setFetchMode(PDO::FETCH_OBJ);
  $formationHeure=$resultat->fetchAll();
  $resultat->closeCursor();
  return $formationHeure;
}
