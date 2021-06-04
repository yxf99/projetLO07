
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
        <input type="hidden" name='action' value='rdvSelected'>                               
        <label for="patient_id">id : </label> 
        <select class="form-control" id='patient_id' name='patient_id' style="width: 200px">
            <?php                  
            for ($i = 0; $i < count($results); $i++) {
               echo ("<option value=" .  $results[$i]['id'] . ">". $results[$i]['id'] .":". $results[$i]['nom'] .":". $results[$i]['prenom'] . "</option>") ;
                }
            ?>
        </select>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

<!-- ----- fin viewInsert -->