
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentVaccinMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
          <?phpif($results[2][0]==0){?>
        <input type="hidden" name='action' value='rdvVaccin0'>
        <label for="patient_id">patient_id : <?php$results[1]['patient_id']?></label> <select class="form-control" id='patient_id' name='patient_id' style="width: 100px">
        <label for="centre_id">centre_id : </label> <select class="form-control" id='centre_id' name='centre_id' style="width: 100px">
            <?php
               for ($i = 0; $i < count($results[0]); $i++) {
               echo ("<option value=" .  $results[0][$i]['id'] . ">". $results[0][$i]['id'] .":". $results[0][$i]['label'] . "</option>") ;
            }
             ?></select>
            </div>
            <p/>
             <button class="btn btn-primary" type="submit">Submit form</button>
              
              <?php}elseif($results[2][0]==1){?>
            <input type="hidden" name='action' value='rdvVaccin1'>
        <label for="patient_id">patient_id : <?php$results[1]['patient_id']?></label> <select class="form-control" id='patient_id' name='patient_id' style="width: 100px">
        <label for="centre_id">centre_id : </label> <select class="form-control" id='centre_id' name='centre_id' style="width: 100px">
            <?php
            if($results[0] == null){
                echo'vous pouvez pas vacciner ';
            } else {
               for ($i = 0; $i < count($results[0]); $i++) {
               echo ("<option value=" .  $results[0][$i]['id'] . ">". $results[0][$i]['id'] .":". $results[0][$i]['label'] . "</option>") ;
                }
            }
          ?></select>
             </div>
              <p/>
             <button class="btn btn-primary" type="submit">Submit form</button>
        
            <?php}elseif($results[2][0]==2){?>
            <table class = "table table-striped table-bordered">
            <thead>
             <tr>
               <th scope = "col">id</th>
               <th scope = "col">label</th>
               <th scope = "col">doses</th>
               <th scope = "col">centre_id</th>
               <th scope = "col">injection</th>
             </tr>
           </thead>
           <tbody>
          <?php
          // La liste des centres est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getId(), 
             $element->getLabel(), $element->getDoses(),$element->getCentre_id(),$element->getInjection());
          }
          ?>
        </tbody>
      </table>
          ?>
            <?php}?>
        
      
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewId -->