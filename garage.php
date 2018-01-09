<?php

require_once('controleur/controleur.php');
require_once('vue/vue.php');

try{
<<<<<<< HEAD
    if(isset($_POST['connexion'])){
            ctlConnexion();
        
        //BOUTONS AGENT
        
    }else if (isset($_POST['client'])){
        ctlControleClient();
    }else if (isset($_POST['ajouterClient'])) {
        ctlAjouterClient($_POST['nom'],$_POST['prenom'],$_POST['dateNaissance'],$_POST['adresse'],$_POST['numTel'],$_POST['mail'],$_POST['montantMax']);//appelle 
    }else if (isset($_POST['supprimerClient'])){
        ctlSupprimerClient();
    }else if(isset($_POST['afficherClient'])){
        ctlAfficherTousLesClients();
    }else if(isset($_POST['afficherModifierClient'])){
        ctlAfficherModifierClient();
    }else if(isset($_POST['modifierLeClient'])){
        ctlModifierClient($_POST['idClient'],$_POST['nomClient'],$_POST['prenomClient'],$_POST['dateNaissanceClient'],$_POST['adresseClient'],$_POST['numTelClient'],$_POST['mailClient'],$_POST['montantClient']);
    }else if(isset($_POST['afficherSyntheseClient'])){
        ctlAfficherSyntheseClient();
    }else if(isset($_POST['syntheseClient'])){
        ctlSyntheseClient($_POST['idSyntheseClient']);
    }else if(isset($_POST['afficherRechercherClient'])){
        ctlAfficherRechercherClient();
    }else if(isset($_POST['rechercherClient'])){
        ctlRechercherClient($_POST['nomClientRecherche'],$_POST['dateClientRecherche']);
    }else if(isset($_POST['afficherRechercherMecanicien']) || isset($_POST['rechercherAutrePlanning'])){
        ctlAfficherRechercherMecanicien();
    }else if(isset($_POST['afficherClientAgent'])){
        ctlAfficherClientAgent();
    }else if(isset($_POST['afficherMecanicienAgent'])){
        ctlAfficherMecanicienAgent();
    }else if(isset($_POST['rechercherPlanning'])){
        ctlAfficherPlanningRDV($_POST['nomMecanicien'],$_POST['datePlanning']);
    }elseif (isset($_POST['prendreRDVClient'])) {
        ctlAfficherPrendreRDV();
    }else if(isset($_POST['ajouterRDV'])){
        ctlAjouterIntervention($_POST['intervention'],$_POST['nomEmploye'],$_POST['idClient'],$_POST['dateRDV'],$_POST['heureRDV']);
        
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
    }else if (isset($_POST['afficherTousLesTypesInterventions'])){
        ctlAfficherTousLesTypesInterventions();
    }else if (isset($_POST['supprimerTypeIntervention'])){
        ctlSupprimerTypeIntervention();
    }else if(isset($_POST['paiements'])){
        ctlAfficherPaiements();
    }else if(isset($_POST['afficherClientAgentPaiement'])){
        ctlAfficherClientAgentPaiement();
    }else if(isset($_POST['recherchePaiementClient'])){
        ctlRecherchePaiementClient($_POST['idClientPaiement']);
    }else if(isset($_POST['payer'])){
        ctlPayer();
    }else if(isset($_POST['differe'])){
        ctlDiffere($_POST['idClient']);
        
        
        //BOUTONS MECANICIEN
        /*}else if(isset($_POST['detailsInter'])){
    ctlAfficherDetail
  }*/
=======
  if(isset($_POST['connexion'])){
    ctlConnexion();
    // Boutons Agent
  } else if (isset($_POST['client'])){
    ctlControleClient();
  } else if (isset($_POST['ajouterClient'])) {
    ctlAjouterClient($_POST['nom'],$_POST['prenom'],$_POST['dateNaissance'],$_POST['adresse'],$_POST['numTel'],$_POST['mail'],$_POST['montantMax']);
  }else if (isset($_POST['supprimerClient'])){
    ctlSupprimerClient();
  } else if(isset($_POST['afficherClient'])){
    ctlAfficherTousLesClients();
  }else if(isset($_POST['afficherModifierClient'])){
    ctlAfficherModifierClient();
  }else if(isset($_POST['modifierLeClient'])){
    ctlModifierClient($_POST['idClient'],$_POST['nomClient'],$_POST['prenomClient'],$_POST['dateNaissanceClient'],$_POST['adresseClient'],$_POST['numTelClient'],$_POST['mailClient'],$_POST['montantClient']);
  }else if(isset($_POST['afficherSyntheseClient'])){
    ctlAfficherSyntheseClient();
  }else if(isset($_POST['syntheseClient'])){
    ctlSyntheseClient($_POST['idSyntheseClient']);
  }else if(isset($_POST['afficherRechercherClient'])){
    ctlAfficherRechercherClient();
  }else if(isset($_POST['rechercherClient'])){
    ctlRechercherClient($_POST['nomClientRecherche'],$_POST['dateClientRecherche']);
  }else if(isset($_POST['afficherRechercherMecanicien']) || isset($_POST['rechercherAutrePlanning'])){
    ctlAfficherRechercherMecanicien();
  }else if(isset($_POST['afficherClientAgent'])){
    ctlAfficherClientAgent();
  }else if(isset($_POST['afficherMecanicienAgent'])){
    ctlAfficherMecanicienAgent();
  }else if(isset($_POST['rechercherPlanning'])){
    ctlAfficherPlanningRDV($_POST['nomMecanicien'],$_POST['datePlanning']);
  }elseif (isset($_POST['prendreRDVClient'])) {
    ctlAfficherPrendreRDV();
  }else if(isset($_POST['ajouterRDV'])){
    ctlAjouterIntervention($_POST['intervention'],$_POST['nomEmploye'],$_POST['idClient'],$_POST['dateRDV'],$_POST['heureRDV']);
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
  }else if (isset($_POST['afficherTousLesTypesInterventions'])){
    ctlAfficherTousLesTypesInterventions();
  }else if (isset($_POST['supprimerTypeIntervention'])){
    ctlSupprimerTypeIntervention();
  }else if(isset($_POST['paiements'])){
    ctlAfficherPaiements();
  }else if(isset($_POST['afficherClientAgentPaiement'])){
    ctlAfficherClientAgentPaiement();
  }else if(isset($_POST['recherchePaiementClient'])){
    ctlRecherchePaiementClient($_POST['idClientPaiement']);
  }else if(isset($_POST['payer'])){
    ctlPayer();
  }else if(isset($_POST['differe'])){
    ctlDiffere($_POST['idClient']);
>>>>>>> master
  }else if(isset($_POST['planningDate'])){ // Visionner le planning d'une autre date
    ctlAfficherMecanicienDate($_POST['nomEmp'],$_POST['date1']);
  }else if(isset($_POST['planningMeca'])){ // Visionner le planning d'une autre date d'un autre mécanicien
    ctlAfficherMecanicienDate($_POST['nomMeca'],$_POST['date']);
  }else if(isset($_POST['formation'])){ // Ajouter une formation
    ctlAjouterFormation($_POST['nomEmp'],$_POST['date2'],$_POST['heureFormation']);
        
        
        
  }else{
    $y=false;
    for ($i=4;$i<22;$i++){
      if(isset($_POST[$i])){
        // Si une des cases du tableau a été cliqué
        ctlAfficherMecanicienDateDetail($_POST['nomEmp'],$_POST['dateUtil'],$i);
        $y=true;
      }
    }
    if(!$y){
      ctlAccueil();
    }
  }
    
    
}catch (Exception $e){
  if($e instanceof ExceptionControleEmploye){
    ctlErreurControleEmploye($e);
  }else if($e instanceof ExceptionControleTypeIntervention){
    ctlErreurControleTypeIntervention($e);
  }else if($e instanceof ExceptionControleClient){
    ctlErreurControleClient($e);
  }else if($e instanceof ExceptionControleRDV){
    ctlErreurControleRDV($e);
  }else if($e instanceof ExceptionPaiement){
    ctlErreurExceptionPaiement($e);
  }else{
    ctlErreur($e);
  }
}
