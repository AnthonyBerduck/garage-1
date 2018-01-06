<?php
require_once("modele/modele.php");
require_once("vue/vue.php");

function ctlConnexion(){
    if(!empty($_POST['login']) && !empty($_POST['psw'])){
        $resultat = chercherTousLesEmployes();
        foreach ($resultat as $ligne){
            if($ligne->login == $_POST['login'] && $ligne->password == $_POST['psw']){
                $cat=$ligne->categorie;
                switch ($cat) {
                    case 'agent':
                        afficherAgent($ligne);
                        break;
                    case 'mecanicien':
                        afficherMecanicien($ligne);
                        break;
                    case 'directeur':
                        afficherDirecteur($ligne);
                        break;
                }
            }
        }
    }else{
        throw new Exception("Login et/ou pwd invalides");
    }
}
function ctlAfficherConnexion(){
    afficherConnexion();
}

function ctlAccueil(){
    afficherAccueil();
}

//FONCTIONS AGENT

function ctlControleClient(){
    controleClient();
}



function ctlAjouterClient($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($dateNaissance) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax) && (strlen((string)$numTel))==10){
        ajouterClient($nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax);
        ajouterClientOK();
    }
    else {
        throw new ExceptionControleClient("Un ou plusieurs champs sont invalides");
    }
}

function ctlAfficherTousLesClients(){
   $clients=chercherTousLesClients();
   afficherTousLesClients($clients);
}

function ctlAfficherModifierClient(){
  foreach($_POST as $key => $value){
    if(is_int($key) && !empty($_POST[$key])){
      $client=chercherUnClient($key);
      afficherModifierClient($client);
    }
  }
}

function ctlModifierClient($id,$nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($dateNaissance) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax) && (strlen((string)$numTel))==10){
        modifierClient($id,$nom,$prenom,$dateNaissance,$adresse,$numTel,$mail,$montantMax);
        modifierClientOK();
    }
    else{
        throw new ExceptionControleClient("Un des champs est vide");
    }
}

function ctlAfficherSyntheseClient(){
  $clients=chercherTousLesClients();
  afficherSyntheseClient($clients);
}

function ctlSyntheseClient($id){
  if(is_numeric($id) && !empty($id)){
    $client=chercherUnClient($id);
    if($client==null){
      throw new ExceptionControleClient("Le client n'existe pas");
    }
    else{
      $interventions=chercherInterventionsClient($id);
      if ($interventions==null) {
        syntheseClientSansIntervention($client);
      }
      else{
        $interventionsDifferees=chercherInterventionsDiffereesClient($id);
        syntheseClientAvecIntervention($client, $interventions, $interventionsDifferees);
      }
    }
  }
  else {
    throw new ExceptionControleClient("Le champ est invalide, veuillez réessayer.");
  }
}


function ctlAfficherRechercherClient(){
    $clients=chercherTousLesClients();
    afficherRechercherClient($clients);
}

function ctlRechercherClient($nom,$dateNaissance){
  if(!empty($nom) && !empty($dateNaissance)){
    $client=chercherUnClientNomDate($nom,$dateNaissance);
    afficherModifierClient($client);
  }
  else {
      throw new ExceptionControleClient("Un ou plusieurs champs sont invalides");
  }
}

function ctlControleRDV(){
    controleRDV();
}

function ctlAfficherRechercherMecanicien(){
  afficherRechercherMecanicien();
}

function ctlAfficherClientAgent(){
  $clients=chercherTousLesClients();
  afficherClientAgent($clients);
}

function ctlAfficherMecanicienAgent(){
  $mecaniciens=chercherTousLesMecaniciens();
  afficherMecanicienAgent($mecaniciens);
}

function ctlAfficherPlanningRDV($nom,$date){
  $interventions=rechercheTypeIntervention($nom,$date);
  afficherPlanningRDV($interventions);
}

function ctlAfficherPrendreRDV(){
  foreach($_POST as $key => $value){
    if(is_int($key) && !empty($_POST[$key])){
      $client=chercherUnClient($key);
      $interventions=chercherToutesLesTypesInterventions();
      $mecaniciens=chercherTousLesMecaniciens();
      afficherPrendreRDV($client,$interventions,$mecaniciens);
    }
  }
}

function ctlAjouterIntervention($nomType,$nomEmp,$idClient,$dateIntervention,$heure){
  if(!empty($nomType) && !empty($nomEmp) && !empty($idClient) && !empty($dateIntervention) &&!empty($heure)){
    $interventions=chercherToutesLesInterventions();
    $formations=chercherToutesLesFormations();
    $cpt=0;
    foreach($interventions as $ligne){
      if($ligne->nomEmp==$nomEmp && $ligne->dateIntervention==$dateIntervention && $ligne->heure==$heure){
        throw new ExceptionControleRDV("Le mécanicien est déjà en intervention à cet horaire ci, veuillez réessayer.");
      }
    }
    foreach($formations as $ligne){
      if($ligne->nomEmploye==$nomEmp && $ligne->date==$dateIntervention && $ligne->heure==$heure){
        throw new ExceptionControleRDV("Le mécanicien a une formation à cet horaire ci, veuillez réessayer.");
      }
    }
    ajouterIntervention($nomType,$nomEmp,$idClient,$dateIntervention,$heure);
    $interventionAjoutee=chercherUneIntervention($nomType);
    ajouterInterventionOK($interventionAjoutee);
  }
  else
    throw new ExceptionControleRDV("Un des champs est invalides");

}

function ctlErreurControleClient($erreur){
  afficherErreurControleClient($erreur);
}

function ctlErreurControleRDV($erreur){
  afficherErreurControleRDV($erreur);
}

#FONCTIONS DIRECTEUR

function ctlAjouterEmploye($nomEmp,$login,$mdp,$categorie){
    if(!empty($nomEmp) && !empty($login) && !empty($mdp) && !empty($categorie)){
        $employe=chercherTousLesEmployes();
        foreach($employe as $value){
            if($nomEmp==$value->nomEmploye){
                throw new ExceptionControleEmploye("Un employé du meme nom existe déjà, veuillez réessayer");
            }
        }
        ajouterEmploye($nomEmp,$login,$mdp,$categorie);
        ajouterEmployeOK();
    }
    else {
        throw new ExceptionControleEmploye("Un ou plusieurs champs sont incorrects");
    }
}

function ctlModifierEmploye($nomEmploye,$login,$password,$categorie){
    $employe=chercherTousLesEmployes();
    if(!empty($nomEmploye) && !empty($login) && !empty($password) && !empty($categorie)){
        modifierEmploye($nomEmploye,$login,$password,$categorie);
        modifierEmployeOK();
    }
    else{
        throw new ExceptionControleEmploye("Un des champs est vide, veuillez réessayer");
    }
}

function ctlSupprimerEmploye(){
    $employe=chercherTousLesEmployes();
    foreach ($employe as $ligne){
        if(isset($_POST[$ligne->nomEmploye])){
            supprimerEmploye($ligne->nomEmploye);
        }
    }
    supprimerEmployeOK();
}

function ctlErreurControleEmploye($erreur){
    afficherErreurControleEmploye($erreur);
}

function ctlRechercheEmploye($valeurRecherche){
    $i=0;
    $employe=chercherTousLesEmployes();
    foreach ($employe as $ligne){
        if($valeurRecherche==$ligne->nomEmploye){
            $i++;
            rechercheEmploye($ligne);
        }
    }
    if($i==0){
        throw new ExceptionControleEmploye("Aucun employé ne correspond dans notre base");
    }
}


function ctlControleEmploye(){
    controleEmploye();
}

function ctlAfficherTousLesEmployes(){
    $employe=chercherTousLesEmployes();
    afficherTousLesEmployes($employe);
}

#INTERVENTIONS

function ctlControleTypeInterventions(){
    $contenuAffichage="";
    controleTypeIntervention();
}


function ctlAjouterTypeIntervention($nomType,$listeElem,$montant){
    if(!empty($nomType) && !empty($listeElem) && !empty($montant)){
        $interventions=chercherToutesLesTypesInterventions();
        foreach($interventions as $value){
            if($nomType==$value->nomType){
                throw new ExceptionControleTypeIntervention("Une intervention du meme nom existe déjà, veuillez réessayer");
            }
        }
        ajouterTypeIntervention($nomType,$listeElem,$montant);
        ajouterTypeInterventionOK();
    }
    else {
        throw new ExceptionControleTypeIntervention("Un ou plusieurs champs sont incorrects");
    }
}

function ctlAfficherToutesLesTypesInterventions(){
    $interventions=chercherToutesLesTypesInterventions();
    afficherToutesLesTypesInterventions($interventions);
}

function ctlErreurControleTypeIntervention($erreur){
    afficherErreurControleTypeIntevention($erreur);
}

function ctlRechercheTypeIntervention($valeurRecherche){
    $i=0;
    $interventions=chercherToutesLesTypesInterventions();
    foreach ($interventions as $ligne){
        if($valeurRecherche==$ligne->nomType){
            $i++;
            rechercheTypeIntervention($ligne);
        }
    }
    if($i==0){
        throw new ExceptionControleTypeIntervention("Aucune intervention ne correspond dans notre base");
    }
}


function ctlModifierTypeIntervention($nomType,$listeElem,$montant){
    $interventions=chercherToutesLesTypesInterventions();
    if(!empty($nomType) && !empty($listeElem) && !empty($montant)){
        modifierTypeIntervention($nomType,$listeElem,$montant);
        modifierTypeInterventionOK();
    }
    else{
        throw new ExceptionControleTypeIntervention("Un des champs est vide, veuillez réessayer");
    }
}

function ctlSupprimerTypeIntervention(){
    $interventions=chercherToutesLesTypesInterventions();
    foreach ($interventions as $ligne){
        if(isset($_POST[$ligne->nomType])){
            supprimerTypeIntervention($ligne->nomType);
        }
    }
    supprimerTypeInterventionOK();
}

#FONCTIONS GENERALES


function ctlErreur($erreur){
    afficherErreur($erreur);
}

class ExceptionControleClient extends Exception{
    public function __construct($message, $code = 0){
        parent::__construct($message, $code);
    }
    public function __toString(){
        return $this->message;
    }
}

class ExceptionControleEmploye extends Exception{
    public function __construct($message, $code = 0){
        parent::__construct($message, $code);
    }
    public function __toString(){
        return $this->message;
    }
}

class ExceptionControleRDV extends Exception{
    public function __construct($message, $code = 0){
        parent::__construct($message, $code);
    }
    public function __toString(){
        return $this->message;
    }
}

class ExceptionControleTypeIntervention extends Exception{
    public function __construct($message, $code = 0){
        parent::__construct($message, $code);
    }
    public function __toString(){
        return $this->message;
    }
}
