<?php

  function getConnect(){
    require_once('connect.php');
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
  }

  function connexion(){
    $connexion = getConnect();
    $requete="SELECT * FROM employe WHERE login LIKE $_POST['login'] ";
    $resultat=$connexion->query($requete);
    if($requete == null){
      Echo 'Login Incorrecte';
    }else{
      $requete2="SELECT * FROM employee WHERE password LIKE $_POST['psw']"
      $resultat2=$connexion->query($requete2);
      if($requete2 == null){
        Echo 'Password Incorrecte';
      }
    }
    $resultat->closeCursor();
  }
