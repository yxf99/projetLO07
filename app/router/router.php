
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRdv.php');
require ('../controller/ControllerVaccination.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Modification du routeur pour prendre en compt l'ensemble des parametres
$action = $param['action'];

// --- On supprime l'élément action de la structure
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 case "vaccinReadAll" :
 case "vaccinReadOne" :
 case "vaccinReadId" :
 case "vaccinCreate" :
 case "vaccinCreated" :
 case "vaccinMiseAJour";
 case "vaccinMiseAJoured";
     ControllerVaccin::$action();
  break;

 case "centreReadAll" :
 case "centreReadOne" :
 case "centreReadId" :
 case "centreCreate" :
 case "centreCreated" :
     ControllerCentre::$action();
 break;

 case "patientReadAll" :
 case "patientReadOne" :
 case "patientReadId" :
 case "patientCreate" :
 case "patientCreated" :
 case "patientDeleted":
     ControllerPatient::$action($args);
  break;

 case "stockReadAll" :
 case "stockReadOne" :
 case "stockReadId" :
 case "stockAttribu" :
 case "stockAttribued" :
 case "stockGlobal";
     ControllerStock::$action();
  break;

case "rdvReadId";
case "rdvSelect" :
     ControllerRdv::$action();
  break;

case "documentationInnovationl" :
case "documentationInnovation2" :
case "documentationInnovation3" :
case "vueGlobal" :
  ControllerVaccination::$action();
  break;


 // Tache par défaut
 default:
  $action = "vaccinAccueil";
  ControllerVaccination::$action();
}
?>
<!-- ----- Fin Router -->

