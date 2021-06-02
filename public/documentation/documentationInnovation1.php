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
      <p>Pour la première innovation, j'ai réalisé une suppression du patient. Quand les patients ont terminé tous les
          injections,on peut les enlever de la liste.
      </p>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewAll -->
  