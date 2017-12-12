<?php
  try{
    include("controleur/controleur.php");
  }
  catch(PDOException $e) {
    $msg = 'ERREUR PDO Ligne' . $e->getLine() . ' : ' . $e->getMessage() ;
    exit($msg);
  }
