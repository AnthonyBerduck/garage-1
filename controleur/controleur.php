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
                        ctlAfficherPageDirecteur($ligne);
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

function ctlAjouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax) && (strlen((string)$numTel))==10){
        ajouterClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax);
    }
    else {
        throw new Exception("Un ou plusieurs champs sont invalides");
    }
}

function ctlModifierClient($nom,$prenom,$adresse,$numTel,$mail,$montantMax){
    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($numTel) && !empty($mail) && !empty($montantMax)){
        modifierClient($id,$nom,$prenom,$adresse,$numTel,$mail,$montantMax);
    }
    else{
        throw new Exception("Un des champs est vide");
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

function ctlModifierEmploye($nomEmploye,$login,$password,$categorie){
    if(!empty($nomEmploye) && !empty($login) && !empty($password) && !empty($categorie)){
        modifierEmploye($nomEmploye,$login,$password,$categorie);
    }
    else{
        throw new Exception("Un des champs est vide");
    }
}

function ctlSupprimerEmploye($login,$mdp){
    if(!empty($login) && !empty($mdp)){
        supprimerEmploye($login,$mdp);
    }
    else{
        throw new Exception("Champs invalides");
    }
}

function ctlErreur($erreur){
    afficherErreur($erreur);
}

function ctlAfficherPageDirecteur($directeur){
afficherDirecteur();
}

function ctlControleEmploye(){
    controleEmploye();
}

function ctlAfficherPageAgent(){
    afficherAgent();
}