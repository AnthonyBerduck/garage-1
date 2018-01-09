
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

    <form action=garage.php method="post">

      <?php
      echo $contenuAffichage;
      ?>
<fieldset>
      <p class="text">
        <input type="date" name="date"/> <input type="submit" value="Regarder" name="planningMeca"/>
    </p></fieldset>

      <fieldset>
        <legend> Voir le planning d'une autre date </legend>
        <p class="text"> Date : <input type="date" name="date1"/> <input type="submit" value="Regarder" name="planningDate"/> </p>
      </fieldset>

      <fieldset>
        <legend> Ajouter une formation </legend>
        <p>
          Date :
          <input type="date" name="date2"/>
          Heure :
          <input type="number" name="heureFormation" max="21" min="4"/>
          <input type="submit" value="Ajouter" name="formation"/>
        </p>
      </fieldset>
    </form>

  </body>

</html>
