
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
        <input type="hidden" name='action' value='rdvVaccin'>
        <label for="patient_id">patient_id : <?php$results[1]['patient_id']?></label> <select class="form-control" id='patient_id' name='patient_id' style="width: 100px">
        <label for="centre_id">centre_id : </label> <select class="form-control" id='centre_id' name='centre_id' style="width: 100px">
            <?php
            foreach ($results[0]['id'] as $id) {
             echo ("<option>$id</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewId -->