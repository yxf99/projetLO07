
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

    <?php
    if ($results) {
     echo ("<h3>Le nouveau stock a été mis à jour </h3>");
     echo("<ul>");
     echo ("<li>centre_id = " . $results . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du Vaccin</h3>");
     echo ("id = " . $_GET['centre_label'].$_GET['vaccin_label']);
    }

    echo("</div>");
//    echo $centreId;
//    echo $vaccinId;
    ?>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin miseAJour -->