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
                    <img src="vue/style/img/ryuji.jpg" width="30" height="30" >
                    Garage en Y</a></li>
            </ul>
        </nav>
        <h1>Modification des interventions</h1>
        <img class="banner" src="vue/style/img/intervention.jpeg" >
        <form action="garage.php" method="post">
            <fieldset>
                <legend>Créer une nouvelle intervention</legend>
                <p> <label for="nomType">Nom du type :</label> <input type="text" id="nom" name="nomType"/> </p>
                <p> <label for="listeElem">Liste des élèments:</label> <textarea rows="8" cols="40" name="listeElem"></textarea></p>
                <p> <label for="montant">Montant :</label> <input type="number" name="montant"/> </p>
                <p class="bouton"> <input type="submit" value="Créer" name="ajouterTypeIntervention" /></p></fieldset>
            <p>
            <fieldset><legend>Recherche</legend>
                <p><input type="text" name="valeurRecherche"/></p><p><input type="submit" value="Recherche une intervention pour la modifier" name="boutonRechercheTypeIntervention"/><input type="submit" value="Afficher toutes les interventions pour en supprimer" name="afficherTousLesTypesInterventions" /></p></fieldset>

        <fieldset><legend>Intervention</legend>
             <?php echo $contenuAffichage ?>
            </fieldset>
        </form>

            </body>

        </html>
