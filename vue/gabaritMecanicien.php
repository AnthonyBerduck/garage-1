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
 <fieldset>
     <h1></h1>
     <legend>Recherche Client</legend>
                <p><input type="text" name="valeurRecherche"/></p><p><input type="submit" value="Recherche une intervention pour la modifier" name="boutonRechercheTypeIntervention"/><input type="submit" value="Afficher toutes les interventions pour en supprimer" name="afficherToutesLesTypesInterventions" /></p></fieldset>
        <?php
          echo $contenuAffichage;
          afficherPlanning($mecanicien);
        ?>S

    </body>

</html>
