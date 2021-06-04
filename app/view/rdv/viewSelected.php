
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
    ?>
    <!-- ===================================================== -->
     <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre_id</th>
          <th scope = "col">patient_id</th>
          <th scope = "col">injection</th>
          <th scope = "col">vaccin_id</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des centres est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getCentre_id(), 
             $element->getPatient_id(), $element->getInjection(), $element->getVaccin_id());
          }
          ?>
      </tbody>
    </table>
    <?php
    include $root . '/app/view/fragment/fragmentVaccinFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    
