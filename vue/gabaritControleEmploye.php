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
        <h1>Modification des employés</h1>
        <form action="garage.php" method="post">
            <fieldset>
                <legend>Créer un nouvel employe</legend>
                <p> <label for="nom">Nom :</label> <input type="text" id="nom" name="nomEmploye"/> </p>
                <p> <label for="login">Login:</label> <input type="text" id="prenom" name="login"/></p>
                <p> <label for="MotDePasse">Mot De Passe :</label> <input type="text" name="password"/> </p>
                <p><label for="categorie">Categorie</label><br/>
                    <select name="categorie" id="categorie">
                        <option value="mecanicien">Mecanicien</option>
                        <option value="agent">Agent</option>
                        <option value="directeur">Directeur</option>
                    </select></p>
                <p class="bouton"> <input type="submit" value="Créer" name="ajouterEmploye" /></p></fieldset>
            <p>
            <fieldset><legend>Recherche</legend>
                <p><input type="text" name="valeurRecherche"/></p><p><input type="submit" value="Recherche" name="boutonRecherche"/><input type="submit" value="Afficher Tous les Employes" name="afficherTousLesEmployes" /></p></fieldset>
        
        <fieldset><legend>Employés</legend>
             <?php echo $contenuAffichage ?>
            </fieldset>
        </form>

            </body>

        </html>
