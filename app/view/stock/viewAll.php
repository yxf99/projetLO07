
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

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre_id</th>
          <th scope = "col">vaccin_id</th>
          <th scope = "col">quantite</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des centres est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td></tr>", $element->getCentre_id(), 
             $element->getVaccin_id(), $element->getQuantite());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  