<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">label</th>
            <th scope="col">dosses</th>
        </tr>
        </thead>
        <tbody>
        <?php
       
        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%d</td></tr>",
                $element->getLabel(),
                $element->getGlobal());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

<!-- ----- fin viewAll -->