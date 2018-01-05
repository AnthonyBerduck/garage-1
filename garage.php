<?php

require_once('controleur/controleur.php');
require_once('vue/vue.php');

try{
    if(isset($_POST['connexion'])){
        ctlConnexion();
    } else if (isset($_POST['client'])){
        ctlControleClient();
    } else if (isset($_POST['ajouterClient'])) {
        ctlAjouterClient($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['numTel'],$_POST['tel'],$_POST['mail'],$_POST['montantMax']);
    }else if (isset($_POST['supprimerClient'])){
        ctlSupprimerClient();
    } else if(isset($_POST['afficherClient'])){
        ctlAfficherTousLesClients();
    }else if(isset($_POST['modifierClient'])){
        ctlAfficherModifierClient();
    }else if(isset($_POST['modifierLeClient'])){
          ctlModifierClient($_POST['idClient'],$_POST['nomClient'],$_POST['prenomClient'],$_POST['adresseClient'],$_POST['numTelClient'],$_POST['mailClient'],$_POST['montantClient']);
    }else if(isset($_POST['syntheseClient'])){
        ctlSyntheseClient();

//BOUTONS  DIRECTEUR

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
    }else if(isset($_POST['paiements'])){
        ctlAfficherPaiments();
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
