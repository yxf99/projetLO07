
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerVaccination.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinReadOne" :
 case "vaccinReadId" :
 case "vaccinCreate" :
 case "vaccinCreated" :
     ControllerVaccin::$action();
  break;

 case "producteurReadAll" :
 case "producteurReadOne" :
 case "producteurReadId" :
 case "producteurCreate" :
 case "producteurCreated" :
 case "producteurReadRegion" :
 case "producteurCountRegion" :
     ControllerProducteur::$action();
  break;

case "mesPropositions" :
     ControllerVaccionation::$action();
  break;
 // Tache par défaut
 default:
  $action = "vaccinAccueil";
  ControllerVaccin::$action();
}
?>
<!-- ----- Fin Router -->

