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
            <fieldset>
              <legend>Ajouter Client</legend>
               <p> <label for="nom">Nom :</label> <input type="text" id="nom" name="nom"/> </p>
               <p> <label for="prenom">Prenom :</label> <input type="text" id="prenom" name="prenom"/> </p>
               <p> <label for="adresse">Adresse :</label> <input type="text" id="adresse" name="adresse"/> </p>
               <p> <label for="numTel">Numéro de téléphone :</label> <input type="number" id="numTel" name="numTel"/> </p>
               <p> <label for="mail">Mail :</label> <input type="text" id="mail" name="mail"/> </p>
               <p> <label for="montantMax">Montant Max :</label> <input type="number" id="montantMax" name="montantMax"/> </p>
               <p> <input type="submit" name="ajouterClient" value="Ajouter un client" />
                   <input type="reset" value="Reset" />
               </p>
            </fieldset>
            <fieldset>
            <legend>Que voulez vous faire ?</legend>
            <p> <input type="submit" name="afficherClient" value="Afficher les clients" />
              <input type="submit" name="syntheseClient" value="Obtenir la synthèse client" />
            </p>
            </fieldset>
            <?php echo $contenuAffichage ?>
      </form>

    </body>

</html>
