<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentVaccinHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentVaccinMenu.html';
      include $root . '/app/view/fragment/fragmentVaccinJumbotron.html';
      ?>
      <p>Ce projet de PHP nous permet de valider nos connaissances et compétences 
          dans le domaine des technologies de web et aussi les manipulations du modèle
          MVC présenté en cours.     
      </p>
      <p>On fait ce projet pas à pas avec des expériences dans les petits peojets hebdomataires. Pour les affichages de listes et l'ajout d'élément,
          on a fait ce que dans mvc1 en changeant des paramètres.
      </p>
      <p>Pour les gestions de stock, il faut bien réfléchir qu'est ce qu'il faudrait pour mettre en oeuvre.
          On a bien réfléchier de créer les nouvelles classes et de modifier les requêtes sql(somme,update,delete...) aussi créer des nouveaux méthodes
          afin de faciliter notre processus.
      </p>
      <p>On a confronté beaucoup de difficultés en binôme et on a travaillé ensemble depuis toujours. Ce projet nous permet de reconnaître le système de php et de collaboration avec gitHub. Bien qu'on ait encore des difficultés, mais on a bien avancé.
      </p>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewAll -->
  