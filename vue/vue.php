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

function afficherDirecteur(){
  $contenuAffichage='<form action="garage.php" method="post"><button name="employe" type="submit" ><img src="vue/style/img/employee.svg" width="100" height="100"/>
</button>';
     foreach($interventions as $ligne){
    $contenuAffichage.="<option value='.$ligne->num.'>$ligne->nomType</option>";
    }
    $contenuAffichage.="</select><p></form>";
    require_once('gabarit.php');
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
	$contenuAffichage='CONNECTE MECANICIEN';
	require_once('gabarit.php');
}

function afficherErreur($erreur){
  $contenuAffichage=$erreur.'</br><a href="garage.php">Revenir à l\'accueil</a>';
  require_once('gabarit.php');
}

function controleEmploye(){
    $contenuAffichage='<h1>Modification des employés</h1>
    <form action="garage.php" method="post">
						           <fieldset>
							                <legend>Créer un nouvel employe</legend>
                               <p> <label for="nom">Nom :</label> <input type="text" id="nom" name="nomEmploye"/> </p>
                               <p> <label for="login">Login:</label> <input type="text" id="prenom" name="login"/> </p>
                               <p> <label for="MotDePasse">Mot De Passe :</label> <input type="text" name="password"/> </p>
                               <p><label for="categorie">Categorie</label><br/>
                               <select name="categorie" id="categorie">
                               <option value="mecanicien">Mecanicien</option>
                               <option value="agent">Agent</option>
                               <option value"directeur">Directeur</option>
                               </select></p>
<p class="bouton"> <input type="submit" value="Créer" name="ajouterEmploye" /></p>
                               </form>';
    
    
    require_once('gabarit.php');
}
