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

          <h1>Modification des clients</h1>
          <form action="garage.php" method="post">
            <fieldset>
              <legend>Ajouter Client</legend>
               <p> <label for="nom">Nom :</label> <input type="text" id="nom" name="nom"/> </p>
               <p> <label for="prenom">Prenom :</label> <input type="text" id="prenom" name="prenom"/> </p>
                <p> <label for="dateNaissance">Date de naissance :</label> <input type="date" id="dateNaissance" name="dateNaissance"/> </p>
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
              <input type="submit" name="afficherSyntheseClient" value="Obtenir la synthèse d'un client" />
              <input type="submit" name="afficherRechercherClient" value="Rechercher un client" />
              <input type="submit" name="afficherRechercherMecanicien" value="Rechercher planning d'un mécanicien"/>
              <input type="submit" name="afficherMecanicienAgent" value="Liste des mécaniciens"/>
              <input type="submit" name="afficherClientAgent" value="Prendre rendez vous avec un client"/>
            </p>
            </fieldset>

            <?php echo $contenuAffichage ?>
      </form>
    </body>
    </html>
