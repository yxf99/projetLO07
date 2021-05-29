
<!-- ----- début viewRegion -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

   <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Liste sans doublon des régions</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des producteurs est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td></tr>",$element);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewRegion -->
