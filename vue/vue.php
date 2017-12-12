<?php

try{
    require_once("gabarit.php");
    $requete="select * from forum";
    $connection=getConnect();
    $resultat=$connection->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    while( $ligne = $resultat->fetch() ) {
      Echo '[' . $ligne->id . '] ' . $ligne->nom . ' : ' . $ligne->msg .'</br>';
    }
    $resultat->closeCursor();
  }catch(PDOException $e) {
    $msg = 'ERREUR PDO Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
    exit($msg);
  }
