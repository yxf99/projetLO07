<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
      <p>J'ai constaté que le contrôleur peut seulement déclencher qu'une requête comme <b> $result </b>(ex:
          $results = ModelVin::getAll();) donc c'est impossible si on veut obtenir 2 résultats dérivent d'une requête sql,
          c'est à dire return 2 éléments comme $result dans les fonctions de Model.
      </p>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  