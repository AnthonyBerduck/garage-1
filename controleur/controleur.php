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
                        ctlAfficherMecanicien($ligne);
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


function ctlAfficherPageAgent(){
    afficherAgent();
}

function ctlAfficherMecanicien($ligne){
  $interventions=chercherToutesLesInterventionMecaJour($ligne->nomEmploye,strftime("%Y-%m-%d"));
  afficherMecanicien($ligne,$interventions);
  //afficherPlanning($mecanicien->nomEmploye,strftime("%Y-%m-%d"));
}

function ctlChercherUneInterventionMeca($mecanicien,$heure2){
  $inter=chercherUneInterventionMeca($mecanicien->nomEmploye,$heure2,strftime("%Y-%m-%d"));
  return $inter;
}

function ctlAjouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax) && (strlen((string)$numTel))==10){
        ajouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax);
    }
    else {
        throw new Exception("Un ou plusieurs champs sont invalides");
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

function ctlModifierClient($id,$nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax) && (strlen((string)$numTel))==10){
        modifierClient($id,$nom,$prenom,$adresse,$numTel,$mail,$montantMax);
    }
    else{
        throw new Exception("Un des champs est vide");
    }
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
class ExceptionControleEmploye extends Exception{
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
