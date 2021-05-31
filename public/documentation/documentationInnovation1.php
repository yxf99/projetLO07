<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentVaccinMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
      ?>
      <p>J'ai constaté que le contrôleur peut seulement déclencher qu'une requête comme <b> $result </b>(ex:
          $results = ModelVin::getAll();) donc c'est impossible si on veut obtenir 2 résultats dérivent d'une requête sql,
          c'est à dire return 2 éléments comme $result dans les fonctions de Model.
      </p>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewAll -->
  