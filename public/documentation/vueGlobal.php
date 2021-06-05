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
      <p>Pour les rendezvous, j'ai séparé les 3 vues dans les 3 cas, mais je pense qu'il est mieux de les écrire dans unz même vue. Ce qui 
          est difficile, c'est le logique et comment diffuser les vaccins avec les reqûetes sql. Il faut séparer les cas différents en utilisant
          if/else et c'est important de manipuler le <br> fetch </br>, particulièrement quand on recupère un array avec ASSOC.
      </p>
      <p>A propos d'amélioration, je pense qu'il est mieux d'insérer les bouton d'ajouter ou supprimer dans la page de la liste pour 
          en faveur des utilisateurs sans besoins de chercher les entrées dans la barre.
      </p>
      <p>On a confronté beaucoup de difficultés en binôme et on a travaillé ensemble depuis toujours. Ce projet nous permet de reconnaître le système de php et de collaborer avec gitHub. Bien qu'on ait encore des difficultés, mais on a bien avancé.
      </p>
  <?php include $root . '/app/view/fragment/fragmentVaccinFooter.html'; ?>

  <!-- ----- fin viewAll -->
  