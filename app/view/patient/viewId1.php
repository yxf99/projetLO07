
<!-- ----- début viewInsert -->
 
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
        <input type="hidden" name='action' value='patientDeleted'>
     <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 100px">
            <?php

            foreach ($results as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
    <p/>
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

<!-- ----- fin viewInsert -->