
<!-- ----- début miseAJour -->
<?php

require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
   <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentVaccinMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
    ?> 
    <form role="form" method='get' action='router.php'>
      <div class="form-group">       
        <input type="hidden" name='action' value='stockAttribued'>
        <label for="centre_label">centre : </label> 
        <select class="form-control" id='centre_label' name='centre_label' style="width: 200px">
            <?php
            foreach ($results as $label) {
             echo ("<option>$label</option>");
            }
            ?>
        </select>
         <label for="vaccin_label">vaccin : </label> 
        <select class="form-control" id='vaccin_label' name='vaccin_label' style="width: 200px">
            <?php
            foreach ($results1 as $label1) {
             echo ("<option>$label1</option>");
            }
            ?>
        </select>
        <label for="id">Ajouter le nombre des doses : </label><input type="number" step='any' name='quantite' value=''>                
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin miseAJour -->



