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
      <p>Pour la deuxième innovation, j'ai réalisé un renouvellement de l'adresse du patient.
          ça sera utile quand le patient a déménagé.
      </p>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewAll -->
  