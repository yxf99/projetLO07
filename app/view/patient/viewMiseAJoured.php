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
     echo ("<h3>La nouvelle adresse a été mis à jour </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de renouvellement de l'adresse</h3>");
     echo ("id = " . $_GET['id']);
    }

    echo("</div>");?>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin miseAJour -->