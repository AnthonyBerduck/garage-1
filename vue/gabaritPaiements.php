<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Garage</title>
        <meta charset="utf-8">
        <link rel="stylesheet"  href="vue/style/style.css" />
    </head>

    <body>
        <nav class="menu">
            <ul>
                <li><a href="garage.php">
                    <img src="vue/style/img/icon-van.svg" width="30" height="30" >
                    Garage en Y</a></li>
            </ul>
        </nav>
<form action="garage.php" method="post">
                     <fieldset><legend>Recherche du client :</legend>
                         (Veuillez saisir son identitifiant)
                <p><input type="text" name="idClientPaiement"/></p><p><input type="submit" value="Recherche" name="recherchePaiementClient"/></p></fieldset>
            <fieldset>
            <legend>Paiements des interventions</legend>
            <p>  <?php echo $contenuAffichage ?>
            </p>
            </fieldset>
           
      </form>

    </body>

</html>
