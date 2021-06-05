
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentVaccinMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
      //injection = 0
//      echo $results[2];
//      //patient_id
//      echo $results[1];
   
      // $results contient un tableau avec la liste des clés.
      ?>

        <form role="form" method='get' action='router.php'>
        <input type="hidden" name='action' value='rdvVaccin0'>
        <input type="hidden" id="patient_id" name="patient_id" value='<?php echo $results[1]?>'>
        <div class="form-group">
        <?php
        echo "<label for='patient_id'>patient_id : $results[1]</label>"?>
        <p/>
        <label for="centre_id">Vous pouvez choisir un centre pour commencer votre vaccination: </label> 
        <select class="form-control" id='centre_id' name='centre_id' style="width: 200px">
            
            <?php
               for ($i = 0; $i < count($results[0]); $i++) {
               echo ("<option value=" .  $results[0][$i]['id'] . ">". $results[0][$i]['id'] .":". $results[0][$i]['label'] . "</option>") ;
                }?>
            </select>
            </div>
            <p/>
            <button class= "btn btn-primary" type='submit'>GO 0</button>
  
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewId -->