<?php
function afficherAccueil(){
    $contenuAffichage= '
  <form action="garage.php" method="post">
  <p> <label> Login : </label> <input type="text" name="login"/> </p>
  <p> <label> Password : </label> <input type="password" name="psw" /> </p>
  <p class="bouton"> <input type="submit" value="Connexion" name="connexion" /></p>
  <p class="bouton"> <input type="reset" value="Reset" name="reset" /> </p>
  </form>';
    require_once("gabarit.php");
}
function afficherDirecteur($directeur){
    $contenuAffichage='Bienvenue '.$directeur->nomEmploye.'
  <p><form action="garage.php" method="post">
  <button name="employe" type="submit" ><img src="vue/style/img/employee.svg" width="100" height="100"/><br/>Employés</button>
  <button name="typeInterventions" type="submit" ><img src="vue/style/img/settings.svg" width="100" height="100"/><br/> Interventions</button>
  <button name="necessaires" type="submit" ><img src="vue/style/img/edit.svg" width="100" height="100"/><br/>Nécessaires aux interventions</button></p>
';
    $contenuAffichage.="</form>";
    require_once('gabarit.php');
}
//FONCTIONS AGENTS
function afficherAgent($agent){
    $contenuAffichage='Bienvenue '.$agent->nomEmploye.'
  <p><form action="garage.php" method="post">
  <button name="client" type="submit" ><img src="vue/style/img/Onizuka_grimace.jpg" width="100" height="100"/><br/>Clients et Prise de RDV</button>
  <button name="paiements" type="submit" ><img src="vue/style/img/Onizuka_grimace.jpg" width="100" height="100"/><br/>Paiements</button>';
    $contenuAffichage.="</form>";
    require_once('gabarit.php');
}
  function controleClient(){
    $contenuAffichage="";
    require_once('gabaritControleClient.php');
}
function afficherTousLesClients($clients){
    $contenuAffichage='<fieldset>
                      <legend>Liste des clients</legend>';
  foreach($clients as $ligne){
    $contenuAffichage.='<p><input type="checkbox" name="'.$ligne->id.'"/> [ '.$ligne->nom.' '.$ligne->prenom.' né le '.$ligne->dateNaissance.' habite au '.$ligne->adresse.' joignable au '.$ligne->numTel.' ou à l adresse mail '.$ligne->mail.' possède un découvert de'.$ligne->montantMax.' € ]</p>';
  }
  $contenuAffichage.='<input type="submit" name="afficherModifierClient" value="Modifier un client"/>
                      </fieldset>';
    require_once('gabaritControleClient.php');
}
function afficherModifierClient($client){
  $contenuAffichage='<fieldset>
                      <legend>Modification du client </legend>
                      <p><label for="idClient">Id du client:</label> <input type="text" id="nomClient" name="idClient" value="'.$client->id.'" readonly="readonly"/></p>
                      <p><label for="nomClient">Nom du client:</label> <input type="text" id="nomClient" name="nomClient" value="'.$client->nom.'"/></p>
                      <p><label for="prenomClient">Prenom du client:</label> <input type="text" id="prenomClient" name="prenomClient" value="'.$client->prenom.'"/></p>
                      <p><label for="dateNaissanceClient">Date naissance du client:</label> <input type="date" id="dateNaissanceClient" name="dateNaissanceClient" value="'.$client->dateNaissance.'"/></p>
                      <p><label for="adresseClient">Adresse du client:</label> <input type="text" id="adresseClient" name="adresseClient" value="'.$client->adresse.'"/></p>
                      <p><label for="numTelClient">NumTel du client:</label> <input type="text" id="numTelClient" name="numTelClient" value="'.$client->numTel.'"/></p>
                      <p><label for="mailClient">Mail du client:</label> <input type="text" id="mailClient" name="mailClient" value="'.$client->mail.'"/></p>
                      <p><label for="montantClient">Montant max du client:</label> <input type="text" id="montantClient" name="montantClient" value="'.$client->montantMax.'"/></p>
                      <p><input type="submit" name="modifierLeClient" value="Modifier le client"/></p>
                      </fieldset>';

  require_once('gabaritControleClient.php');
}

function afficherSyntheseClient($clients){
  $contenuAffichage='<fieldset>
                      <legend>Voici les clients de la base de données</legend>';
  foreach($clients as $ligne){
    $contenuAffichage.='<p>ID du client :  '.$ligne->id.' | Nom du Client :  '.$ligne->nom.' | Prénom du client :  '.$ligne->prenom.' | Date de naissance : '.$ligne->dateNaissance.'</p>';
  }
  $contenuAffichage.='</fieldset>
                        <fieldset>
                        <legend> Recherche synthèse client</legend>
                          <p><label for=idSyntheseClient>Id du client :</label>
                             <input type ="text" name="idSyntheseClient" id="idSyntheseClient"/></p>
                          <p><input type="submit" name="syntheseClient" value="Obtenir la synthese"/></p>
                          </fieldset>';
  require_once('gabaritControleClient.php');
}

function syntheseClientSansIntervention($client){
  $contenuAffichage='<fieldset>
                      <legend>Voici la synthèse du client</legend>';
  $contenuAffichage.='<p>ID du client :  '.$client->id.' | Nom du Client :  '.$client->nom.' | Prénom du client :  '.$client->prenom.' | Adresse du client :'.$client->adresse.' | </p> <p> | Numéro de téléphone :  '.$client->numTel.' | Mail client '.$client->mail.' | Montant Max '.$client->montantMax.' |</p>';
  $contenuAffichage.='<p> Le client n\' a pas encore fait d\'interventions dans notre garage </p>';
  require_once('gabaritControleClient.php');
}

function syntheseClientAvecIntervention($client,$interventions,$interventionsDifferees){
  $contenuAffichage='<fieldset>
                      <legend>Voici la synthèse du client</legend>';
  $contenuAffichage.='<p>ID du client :  '.$client->id.' | Nom du Client :  '.$client->nom.' | Prénom du client :  '.$client->prenom.' | Adresse du client :'.$client->adresse.' | Numéro de téléphone :  '.$client->numTel.' | Mail client '.$client->mail.' | Montant Max '.$client->montantMax.'</p>';
  $contenuAffichage.='<p>Les interventions réalisées : </p>
                        <ul>';
  foreach($interventions as $ligne){
    $contenuAffichage.='<li>'.$ligne->nomType.' réalisée par '.$ligne->nomEmp.' a coûté '.$ligne->montant.' Le paiement de cette intervention est '.$ligne->etat.' </li>';
  }
    $montantDiffere=0;
    foreach($interventionsDifferees as $ligne){
      $montantDiffere+= $ligne->montant;
    }
    $montantRestant=$client->montantMax - $montantDiffere;
    $contenuAffichage.='</ul>
                        <p> Le client possède '.$montantDiffere.' € de montant différé et '.$montantRestant.' de montant disponible pour d\'autre différé</p>';
  require_once('gabaritControleClient.php');
}

function afficherRechercherClient($clients){
  $contenuAffichage='<fieldset>
                      <legend>Voici les clients de la base de données</legend>';
  foreach($clients as $ligne){
    $contenuAffichage.='<p>Nom du Client :  '.$ligne->nom.' | Prénom du client :  '.$ligne->prenom.' | Date de naissance : '.$ligne->dateNaissance.'</p>';
  }
  $contenuAffichage.='</fieldset>
                      <fieldset>
                      <legend>Recherche d\'un client</legend>
                        <p>
                        <label for="nomClientRecherche">Nom du client : </label>
                        <input type ="text" name="nomClientRecherche" id="nomClientRecherche"/>
                        <label for="dateClientRecherche">Date de naissance</label>
                        <input type ="date" name="dateClientRecherche" id="dateClientRecherche"/></p>
                        <p>
                        <input type="submit" name="rechercherClient" value="Rechercher"/>
                        </p>
                      </fieldset>';
require_once('gabaritControleClient.php');
}


function ajouterClientOK(){
     $contenuAffichage='Votre client a été ajouté à la base ! Félicitations !';
      require_once('gabaritControleClient.php');
}

function modifierClientOK(){
      $contenuAffichage='Votre client a été modifié ! Félicitations !';
       require_once('gabaritControleClient.php');
 }

function afficherRechercherMecanicien(){
  $contenuAffichage='<fieldset>
    <legend>Rechercher un mécanicien</legend>
      <p><label for="nom">Nom :</label> <input type="text" id="nom" name="nomMecanicien"/>
        <label for="datePlanning">Date :</label> <input type="date" id="datePlanning" name="datePlanning"/></p>
      <input type="submit" name="rechercherPlanning" value="Rechercher le planning"/></p>
    </fieldset>';
    require_once('gabaritControleClient.php');
}

function afficherClientAgent($clients){
  $contenuAffichage='<fieldset>
                      <legend>Liste des clients</legend>
                        <p> Pour quel client prendre rendez vous ? </p>';
  foreach($clients as $ligne){
    $contenuAffichage.='<p><input type="checkbox" name="'.$ligne->id.'"/> [ '.$ligne->nom.' '.$ligne->prenom.'  ]</p>';
  }
  $contenuAffichage.='<p><input type="submit" name="prendreRDVClient" value="Prendre RDV"/></p>
                      </fieldset>';
  require_once('gabaritControleClient.php');
}

function afficherMecanicienAgent($mecaniciens){
  $contenuAffichage='<fieldset>
                      <legend>Liste des mécaniciens</legend>
                      <ul>';
  foreach($mecaniciens as $ligne){
    $contenuAffichage.='<li> Nom du mécanicien : '.$ligne->nomEmploye.' </li>';
  }
  $contenuAffichage.='</ul>
                      </fieldset>';
  require_once('gabaritControleClient.php');
}


 function afficherPlanningRDV($nom,$interventions,$date){
   $contenuAffichage='<p>Planning de '.$nom.' du '. $date.' : </p>';
   $heure=4;
   $contenuAffichage.= '<div> <table> <tr>';
   while($heure!=22){
     $contenuAffichage .= '<td>'.$heure.'H </td>';
     $heure +=1;
   }
   $contenuAffichage.= '</tr>';
   $heure=4;
   while($heure!=22){
     $x=true;
     foreach($interventions as $value){
       if($value->heure == $heure){
           $contenuAffichage .= '<td>'. $value->nomType .' : </br>'. $value->listeElem .'</td>';
           $x=false;
         }
     }
     if($x){ // Si il n'y a pas d'intervention à cette heure.
       $contenuAffichage .= '<td> X </td>';
     }
     $heure +=1;
   }
   $contenuAffichage .= '</tr> </table> </div>';;
   require_once('gabaritControleClient.php');
 }

function afficherPrendreRDV($client,$interventions,$mecaniciens){
  $contenuAffichage='<fieldset>
                          <legend>Espace rendez vous</legend>
                        <p> Rendez vous pour : '.$client->nom.' '.$client->prenom.'</p>
                        <p><label for="idClient">Id du client :</label><input type="text" name="idClient" id="idClient" value="'.$client->id.'" readonly="readonly" /></p>
                        <p>Nom de l\'employé :
                        <select name="nomEmploye">';
                        foreach($mecaniciens as $value){
                            $contenuAffichage.='<option value="'.$value->nomEmploye.'">'.$value->nomEmploye.'</option> </br>';
                        }
    $contenuAffichage.= '</select></p>
                        <p><label for="dateRDV">Date du RDV :</label><input type="date" name="dateRDV" id="dateRDV"  /></p>
                        <p><label for="heureRDV">Heure du RDV :</label><input type="text" name="heureRDV" id="heureRDV" /></p>
                        <p>Interventions à faire :
                          <select name="intervention">';
                        foreach($interventions as $value){
                            $contenuAffichage.='<option value="'.$value->nomType.'">'.$value->nomType.'</option> </br>';
                        }
  $contenuAffichage.='</select>
                      </p>
                        <p><input type="submit" name="ajouterRDV" value="Confirmer le rendez vous"/></p>';

  require_once('gabaritControleClient.php');
}

function ajouterInterventionOK($interventionAjoutee){
     $contenuAffichage='Votre intervention a été ajouté à la base ! Félicitations !
                        <p> Voici la liste des éléments à fournir : '.$interventionAjoutee->listeElem.' </p>';
      require_once('gabaritControleClient.php');
}


function afficherClientAgentPaiement($clients){
  $contenuAffichage='<fieldset>
                      <legend>Liste des clients</legend>';
  foreach($clients as $ligne){
    $contenuAffichage.='<p>[ ID : '.$ligne->id.' Nom : '.$ligne->nom.' Prenom : '.$ligne->prenom.'  ]</p>';
  }
  $contenuAffichage.='</fieldset>';
  require_once('gabaritPaiements.php');
}



function afficherPaiementsInterventions($interventions,$idClient){
    $contenuAffichage=  '<fieldset>
      <legend>Paiements des interventions</legend>';

    $contenuAffichage.='<input type="text" name="idClient" id="idClientInvisible" value="'.$idClient.'" readonly="readonly"/>';
    foreach($interventions as $value){
        $contenuAffichage.='<p><label><input type="checkbox" name="'.$value->num.'" value="'.$value->nomType.'"/></label><input type="text" value="Nom : '.$value->nomType.' Etat : '.$value->etat.'" readonly="readonly"/></p></br>';
    }
    $contenuAffichage.=' <p class="bouton"> <input type="submit" value="Payer" name="payer"/> </p>
                            <p class="bouton"> <input type="submit" value="Demander differé" name="differe" /> </p>
                              </fieldset>';
    require_once('gabaritPaiements.php');
}


function afficherErreurControleClient($erreur){
      $contenuAffichage=$erreur ;
      require_once('gabaritControleClient.php');
}


function afficherErreurControleRDV($erreur){
      $contenuAffichage=$erreur ;
      require_once('gabaritControleClient.php');
}


//FONCTIONS A TRIER
function afficherMecanicien($mecanicien){
    setlocale(LC_TIME, "French");
    $contenuAffichage='<id class=""> <p> Bienvenue '. $mecanicien->nomEmploye.' . Voici votre planning du
                          '. strftime("%A %d %B").' : </p>
                        </id>';
  require_once('gabaritMecanicien.php');
}

function afficherPaiements(){
    $contenuAffichage="";
    require_once("gabaritPaiements.php");
}

function afficherPaiementsOK(){
    $contenuAffichage="Votre intervention a été payé";
    require_once("gabaritPaiements.php");
}

function afficherDiffereOK($montantMax,$sommeDemande,$sommeDeTout,$sommeDejaDiff){
    $restant=$montantMax-$sommeDeTout;
    $contenuAffichage="<h5>Recapitulatif :</h5>
        Montant maximum autorisé : $montantMax<br/>
        Demande de différé: $sommeDemande<br/>
        Somme déjà en différé : $sommeDejaDiff<br/>
        <p> Total différé : $sommeDeTout<p>
        <p>Montant restant possible: <div id='montantMax'>$restant($montantMax-$sommeDeTout)</div></p><p><div id='montantMax'>Votre intervention a été mise en différée</div></p>";
        require_once("gabaritPaiements.php");
}

function afficherPlanning($mecanicien,$interventions,$date){
    setlocale(LC_TIME, "French");
    $contenuAffichage=
    '<id class="stockage"> <input type="text" name="nomEmp" value="'.$mecanicien.'" /> </id>
    <id class=""> <p> Bienvenue '.$mecanicien.' . Voici votre planning du '. $date.' : </p> </id>';
    $heure=4;
    $contenuAffichage.= '<div> <table> <tr>';
    while($heure!=22){
      $contenuAffichage .= '<td>'.$heure.'H </td>';
      $heure +=1;
    }
    $contenuAffichage.= '</tr>';
    $heure=4;
    while($heure!=22){
      $x=true;
      foreach($interventions as $value){
        if($value->heure == $heure){
            $contenuAffichage .= '<td>'. $value->nomType .' : </br>'. $value->listeElem .'</td>';
            $x=false;
          }
      }
      if($x){ // Si il n'y a pas d'intervention à cette heure.
        $contenuAffichage .= '<td> X </td>';
      }
      $heure +=1;
    }
    $contenuAffichage .= '</tr> </table> </div>';
    require_once("gabaritMecanicien.php");
}


function afficherErreur($erreur){
    $contenuAffichage=$erreur.'</br><a href="garage.php">Revenir à l\'accueil</a>';
    require_once('gabarit.php');
}

function afficherErreurControleEmploye($erreur){
    $contenuAffichage=$erreur;
    require_once('gabaritControleEmploye.php');
}

function afficherErreurPaiement($erreur){
    $contenuAffichage=$erreur;
    require_once('gabaritPaiements.php');
}

function controleEmploye(){
    $contenuAffichage="";
    require_once('gabaritControleEmploye.php');
}
function afficherTousLesEmployes($employe){
    $contenuAffichage="";
    foreach($employe as $value){
        $contenuAffichage.='<p><label><input type="checkbox" name="'.$value->nomEmploye.'"/></label><input type="text" value="'.$value->nomEmploye.'"readonly="readonly"/></p></br>';
    }
    $contenuAffichage.='<input type="submit" value="Supprimer client" name="supprimerEmploye"/></fieldset>';
    require_once('gabaritControleEmploye.php');
}
function rechercheEmploye($employe){
    $contenuAffichage="";
    $contenuAffichage.='
            <p> <label for="nom">Nom :</label> <input type="text" name="nomEmploye" value="'.$employe->nomEmploye.'"/> </p>
<p> <label for="login">Login:</label> <input type="text" value="'.$employe->login.'"name="login"/></p>
<p> <label for="MotDePasse">Mot De Passe :</label> <input type="text"  value="'.$employe->password.'"name="password"/> </p><p><label for="categorie">Categorie</label><br/>
             <select name="categorie" id="categorie">';
    if($employe->categorie=="mecanicien"){
        $contenuAffichage.='<option value="mecanicien" selected >Mecanicien</option>
                           <option value="agent">Agent</option>
                           <option value="directeur">Directeur</option>';
    } else if($employe->categorie=="agent"){
        $contenuAffichage.='
        <option value="agent" selected >Agent</option>
        <option value="mecanicien">Mecanicien</option>
                           <option value="directeur">Directeur</option>';
    }else{
        $contenuAffichage.='<option value="directeur" selected>Directeur</option>
        <option value="agent">Agent</option>
        <option value="mecanicien">Mecanicien</option>';
    }
    $contenuAffichage.='</select></p><input type="submit" value="Modifier employe" name="modifierEmploye"/></fieldset>';
    require_once('gabaritControleEmploye.php');
}
function ajouterEmployeOK(){
    $contenuAffichage='Votre employé à été ajouté à la base ! Félicitations !';
    require_once('gabaritControleEmploye.php');
}
function supprimerEmployeOK(){
    $contenuAffichage='Votre employé à été supprimé ! Félicitations !';
    require_once('gabaritControleEmploye.php');
}

function modifierEmployeOK(){
      $contenuAffichage='Votre employé à été modifié ! Félicitations !';
       require_once('gabaritControleEmploye.php');
 }
#INTERVENTIONS
function controleTypeIntervention(){
    $contenuAffichage="";
    require_once('gabaritControleTypeIntervention.php');
}
function afficherErreurControleTypeIntevention($erreur){
    $contenuAffichage=$erreur;
    require_once('gabaritControleTypeIntervention.php');
}
function rechercheTypeIntervention($intervention){
    $contenuAffichage='
             <p> <label for="nomType">Nom du type :</label> <input type="text" id="nom" name="nomType" value="'.$intervention->nomType.'"/> </p>
                <p> <label for="listeElem">Liste des élèments:</label>
<textarea rows="4" cols="50" name="listeElem" >'.$intervention->listeElem.'</textarea></p>
                <p> <label for="montant">Montant :</label> <input type="number" name="montant" value="'.$intervention->montant.'"/> </p>
        </select></p><input type="submit" value="Modifier intervention" name="modifierTypeIntervention"/></fieldset>';
    require_once('gabaritControleTypeIntervention.php');
}
function afficherTousLesTypesInterventions($interventions){
    $contenuAffichage="";
    foreach($interventions as $value){
        $contenuAffichage.='<p><label><input type="checkbox" name="'.$value->nomType.'"/></label><input type="text" value="'.$value->nomType.'" readonly="readonly"/></p></br>';
    }
    $contenuAffichage.='<input type="submit" value="Supprimer intervention" name="supprimerTypeIntervention"/></fieldset>';
    require_once('gabaritControleTypeIntervention.php');
}


 function ajouterTypeInterventionOK(){
      $contenuAffichage='Votre intervention à été ajouté à la base ! Félicitations !';
     require_once('gabaritControleTypeIntervention.php');
 }
 function supprimerTypeInterventionOK(){
      $contenuAffichage='Votre intervention à été supprimé ! Félicitations !';
      require_once('gabaritControleTypeIntervention.php');
 }
function modifierTypeInterventionOK(){
    $contenuAffichage='Votre intervention à été modifié ! Félicitations !';
    require_once('gabaritControleTypeIntervention.php');
}
