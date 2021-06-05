
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Vous allez vacciner le vaccin: </h3>");
     echo("<ul>");
     echo ("<li>" . $results[0]['label'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème du vaccin 00</h3>");
     echo ("label = " . $results[0]['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentVaccinFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    
