<?php
  require_once("modele/modele.php");
  require_once("vue/vue.php");

  function ctlConnexion(){
    if(!empty($_POST['login'] && !empty($_POST['psw'])){
      connexion();
    }
  }
