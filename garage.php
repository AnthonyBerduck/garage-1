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
    }else if (isset($_POST['ajouterEmploye'])){
        ctlAjouterEmploye($_POST['nomEmploye'],$_POST['login'],$_POST['password'],$_POST['categorie']);
    }else if(isset($_POST['supprimerEmploye'])){
        ctlSupprimerEmploye();
    }else if(isset($_POST['modifierEmploye'])){
        ctlModifierEmploye($_POST['nomEmploye'],$_POST['login'],$_POST['password'],$_POST['categorie']);
    }else if (isset($_POST['employe'])){
        ctlControleEmploye();
    }else if(isset($_POST['boutonRecherche'])){
        ctlRechercheEmploye($_POST['valeurRecherche']);
    }else if (isset($_POST['afficherTousLesEmployes'])){
        ctlAfficherTousLesEmployes();
  }else if (isset($_POST['ajouterTypeIntervention'])){
        ctlAjouterTypeIntervention($_POST['nomType'],$_POST['listeElem'],$_POST['montant']);

    }else if (isset($_POST['typeInterventions'])){
        ctlControleTypeInterventions();
    }else if(isset($_POST['modifierTypeIntervention'])){
        ctlModifierTypeIntervention($_POST['nomType'],$_POST['listeElem'],$_POST['montant']);
    }else if(isset($_POST['boutonRechercheTypeIntervention'])){
        ctlRechercheTypeIntervention($_POST['valeurRecherche']);
    }else if (isset($_POST['afficherToutesLesTypesInterventions'])){
        ctlAfficherToutesLesTypesInterventions();
    }else if (isset($_POST['supprimerTypeIntervention'])){
        ctlSupprimerTypeIntervention();
    }else{
        ctlAccueil();
    }

}catch (Exception $e){
    if($e instanceof ExceptionControleEmploye){
        ctlErreurControleEmploye($e);
    }else if($e instanceof ExceptionControleTypeIntervention){
        ctlErreurControleTypeIntervention($e);
    }else{
        ctlErreur($e);
    }
}
