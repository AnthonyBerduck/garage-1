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

  <button name="client" type="submit" ><img src="vue/style/img/employee.svg" width="100" height="100"/><br/>Clients</button>

  <button name="paiements" type="submit" ><img src="vue/style/img/settings.svg" width="100" height="100"/><br/>Paiements</button>

  <button name="priseRDV" type="submit" ><img src="vue/style/img/edit.svg" width="100" height="100"/><br/>Prise de RDV</button></p>';
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
    $contenuAffichage.='<p><input type="checkbox" name="'.$ligne->id.'"/><input type="text" size="100" value="'.$ligne->nom.' '.$ligne->prenom.' habite au '.$ligne->adresse.' joignable au '.$ligne->numTel.' ou à l adresse mail '.$ligne->mail.' possède un découvert de'.$ligne->montantMax.' €" readonly="readonly  "/></p>';
  }
  $contenuAffichage.='<input type="submit" name="modifierClient" value="Modifier un client"/>
                      </fieldset>';
  require_once('gabaritControleClient.php');
}

function afficherModifierClient($client){
  foreach ($client as $unclient) {
  $contenuAffichage='<fieldset>
                      <legend>Modification du client </legend>
                      <p><label for="idClient">Id du client:</label> <input type="text" id="nomClient" name="idClient" value="'.$unclient->id.'" readonly="readonly"/></p>
                      <p><label for="nomClient">Nom du client:</label> <input type="text" id="nomClient" name="nomClient" value="'.$unclient->nom.'"/></p>
                      <p><label for="prenomClient">Prenom du client:</label> <input type="text" id="prenomClient" name="prenomClient" value="'.$unclient->prenom.'"/></p>
                      <p><label for="adresseClient">Adresse du client:</label> <input type="text" id="adresseClient" name="adresseClient" value="'.$unclient->adresse.'"/></p>
                      <p><label for="numTelClient">NumTel du client:</label> <input type="text" id="numTelClient" name="numTelClient" value="'.$unclient->numTel.'"/></p>
                      <p><label for="mailClient">Mail du client:</label> <input type="text" id="mailClient" name="mailClient" value="'.$unclient->mail.'"/></p>
                      <p><label for="montantClient">Montant max du client:</label> <input type="text" id="montantClient" name="montantClient" value="'.$unclient->montantMax.'"/></p>
                      <p><input type="submit" name="modifierLeClient" value="Modifier le client"/></p>

                      </fieldset>';
                    }
  require_once('gabaritControleClient.php');

}

//FONCTIONS A TRIER


function afficherPlanning($mecanicien,$interventions){
    setlocale(LC_TIME, "French");
    $contenuAffichage=
    '<form action=garage.php> <id class="stockage"> <input type="text" name="nomEmp" value='. $mecanicien->nomEmploye.' /> </id>
    <id class=""> <p> Bienvenue '. $mecanicien->nomEmploye.' . Voici votre planning du '. strftime("%A %d %B").' : </p> </id>';
    $heure=4;
    $contenuAffichage.= '<div> <table> <tr>';
    while($heure!=22){
      $contenuAffichage .= '<td>'. $heure .'H </td>';
      $heure +=1;
    }
    $contenuAffichage.= '</tr>';
    $heure=4;
    $cpt=0;
    while($heure!=22){
      $x=true;
      foreach($interventions as $value){
        if($value->heure == $heure){
            $contenuAffichage .= '<td>'. $value->nomType .' : </br>'. $value->listeElem .'</td>';
            $cpt+=1;
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


function afficherToutesLesTypesInterventions($interventions){
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
