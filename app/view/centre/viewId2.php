
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentVaccinMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
      //injection = complet ( = 3)
      echo $results[2];
      //patient_id
      echo $results[1];
      // $results contient un tableau avec la liste des clés.
      echo "Vous avez terminé l'injection, voici les infos de votre injection:";
      ?> 
     
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
       
           for ($i = 0; $i < count($results[0]); $i++) {
               echo ("<tr><td>".  $results[0][$i]["id"] . "</td>".
                       "<td>".  $results[0][$i]["label"] ."</td>".
                       "<td>".  $results[0][$i]["doses"] ."</td>".
                       "<td>".  $results[0][$i]["centre_id"] ."</td>".
                       "<td>".  $results[0][$i]["injection"] ."</td>"."</tr>") ;
                }
          ?>
        </tbody>
      </table>
        
      
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewId -->