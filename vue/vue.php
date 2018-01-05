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
    require_once('gabaritMecanicien.php');
}


function afficherAgent($agent){
    $contenuAffichage='<form action="garage.php" method="post">
						          <p> AGENT : </p>
						                <fieldset>
							                <legend>Ajouter Client</legend>
                               <p> <label for="nom">Nom :</label> <input type="text" id="nom" name="nom"/> </p>
                               <p> <label for="prenom">Prenom :</label> <input type="text" id="prenom" name="prenom"/> </p>
                               <p> <label for="adresse">Adresse :</label> <input type="text" id="adresse" name="adresse"/> </p>
                               <p> <label for="numTel">Numéro de téléphone :</label> <input type="number" id="numTel" name="numTel"/> </p>
                               <p> <label for="mail">Mail :</label> <input type="text" id="mail" name="mail"/> </p>
                               <p> <label for="montantMax">Montant Max :</label> <input type="number" id="montantMax" name="montantMax"/> </p>
                            </fieldset>
                     </form>';

    require_once('gabarit.php');
}

function afficherMecanicien($mecanicien){
    setlocale(LC_TIME, "French");
    $contenuAffichage='<id class=""> <p> Bienvenue '. $mecanicien->nomEmploye.' . Voici votre planning du
                          '. strftime("%A %d %B").' : </p>
                          <form action="garage.php" method="post">
                            <p class="bouton"> <input type="submit" value="Voir le planning d\'un autre mécanicien" name="visuPlanning"/> </p>
                            <p class="bouton"> <input type="submit" value="Ajouter Une Formation" /> </p>
                          </form>
                        </id>';
                      require_once('gabaritMecanicien.php');
}

function afficherPlanning($mecanicien){
    $heure=4;
    echo '<table>
            <tr>';
    while($heure!=22){
      echo '<td>'. $heure .'H </td>';
      $heure +=1;
    }
    echo '</tr> </table>';
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
