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

        <form action=garage.php method="post">

        <?php
          echo $contenuAffichage;
        ?>

          <p class="text"> <input type="date" name="date1"/> </p>
          <p class="bouton1"> <input type="submit" value="Voir le planning d'une autre date" name="planningDate"/> </p>
          <p class="bouton"> <input type="submit" value="Voir le planning d'un autre mécanicien" name="planningMeca"/> </p>
          <p class="bouton"> <input type="submit" value="Ajouter Une Formation" name="formation"/> </p>
        </form>

    </body>

</html>
