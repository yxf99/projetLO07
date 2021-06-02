
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelRdv.php';
require_once '../model/ModelPatient.php';

class ControllerRdv {
 // --- Liste des Vaccin
 public static function rdvReadAll() {
  $results = Modelrdv::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewAll.php';
  if (DEBUG)
   echo ("ControllerRdv : rdvReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function rdvReadId() {
  $results = ModelPatient::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewId.php';
  require ($vue);
 }

 // Affiche un Vaccin particulier (id)
 public static function rdvReadOne() {
  $rdv_id = $_GET['id'];
  $results = ModelRdv::getOne($rdv_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewAll.php';
  require ($vue);
 }

 
 
}
?>
<!-- ----- fin ControllerVaccin -->


