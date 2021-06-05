
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
    
//    var_dump($results[0]);

    ?>
      
    <!-- ===================================================== -->
        <form role="form" method='get' action='router.php'>
       <input type="hidden" name='action' value='rdvDistribution'>
       <input type="hidden" id="patient_id" name="patient_id" value='<?php echo $results[0][0]["patient_id"]?>'>
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
          for ($i = 0; $i < count($results[0]); $i++) {
               echo ("<tr><td>".  $results[0][$i]["centre_id"] . "</td>".
                       "<td>".  $results[0][$i]["patient_id"] ."</td>".
                       "<td>".  $results[0][$i]["injection"] ."</td>".
                       "<td>".  $results[0][$i]["vaccin_id"] ."</td>"."</tr>") ;
                }
          ?>
      </tbody>
    </table>
             <p/>
      <button class="btn btn-primary" type="submit">Go Vaccin</button>
    </form>
    <?php
    include $root . '/app/view/fragment/fragmentVaccinFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    
