<!-- ----- début viewInserted -->
<?php
require($root . '/app/view/fragment/fragmentVaccinHeader.html');
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
        echo("<h3>Le patient a été enlevé :</h3>");
        echo("<ul>");
        echo("<li>id = " . $results->getId() . "</li>");
        echo("<li>nom = " . $results->getNom() . "</li>");
        echo("<li>prénom = " . $results->getPrenom() . "</li>");
        echo("<li>adresse = " . $results->getAdresse() . "</li>");
        echo("</ul>");
    } else {
        echo "<h3>Problème de suppression du patient </h3>" . $_GET['id'];
        echo "<p></p>";
    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentVaccinFooter.html';
    ?>
    <!-- ----- fin viewInserted -->