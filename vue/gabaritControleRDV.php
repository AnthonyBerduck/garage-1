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
                    <h1>Garage en Y</h1></a></li>
            </ul>
        </nav>

        <h1>Prise de rendez-vous</h1>
        <form action="garage.php" method="post">
          <fieldset>
            <legend>Rechercher un mécanicien</legend>
              <p><label for="nom">Nom :</label> <input type="text" id="nom" name="nomMecanicien"/>
                <label for="datePlanning">Date :</label> <input type="date" id="datePlanning" name="datePlanning"/></p>
              <input type="submit" name="rechercherPlanning" value="Rechercher le planning"/></p>
            </fieldset>
            <p><input type="submit" name="afficherClientAgent" value="Prendre rendez vous avec un client"/></p>
            <p><input type="submit" name="afficherMecanicienAgent" value="Liste des mécaniciens"/></p>
            <?php echo $contenuAffichage ?>
        </form>
    </body>
  </html>
