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


        <?php
          echo $contenuAffichage;
        ?>

        <form action="garage.php" method="post">
          <p class="text"> <input type="text" placeholder="aaaa/mm/jj" /> </p>
          <p class="bouton1"> <input type="submit" value="Voir le planning d'une autre date" name="date"/> </p>
          <p class="bouton"> <input type="submit" value="Voir le planning d'un autre mécanicien" name="visuPlanning"/> </p>
          <p class="bouton"> <input type="submit" value="Ajouter Une Formation" name="formation"/> </p>
        </form>

        <?php
          echo $contenuAffichage2;
         ?>

    </body>

</html>
