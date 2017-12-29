<?php
require_once("modele/modele.php");
require_once("vue/vue.php");

function ctlConnexion(){
    if(!empty($_POST['login']) && !empty($_POST['psw'])){
        $resultat = chercherTousLesEmployes();
        foreach ($resultat as $ligne){
            if( $ligne->login == $_POST['login'] && $ligne->password == $_POST['psw']){
                if( $ligne->categorie == 'agent'){
                    afficherAgent($ligne);
                    break;
                }else if( $ligne->categorie == 'mecanicien'){
                    afficherMecanicien($ligne);
                    break;
                }else if( $ligne->categorie == 'directeur'){
                    afficherDirecteur($ligne);
                    break;
                }
            }
        }
    }else{
        throw new Exception("Login et/ou password invalides");
    }
}

function ctlAfficherConnexion(){
    afficherConnexion();
}


function ctlAjouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax) && (strlen((string)$numTel))==10){
        ajouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax);
    }
    else {
        throw new Exception("Un ou plusieurs champs sont invalides");
    }
}

function ctlAjouterEmploye($nomEmp,$login,$mdp,$categorie){
    if(!empty($nomEmp) && !empty($login) && !empty($mdp) && !empty($categorie)){
        ajouterEmploye($nomEmp,$login,$mdp,$categorie);
    }
    else {
        throw new Exception("Un ou plusieurs champs sont incorrects");
    }
}

function ctlErreur($erreur){
    afficherErreur($erreur);
}

function ctlListeInterventions(){
    $resultat=chercherToutesLesInterventions();
    afficherInterventions($resultat);
}

