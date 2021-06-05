
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

 public static function rdvSelect() {
  $results = ModelRdv::getPatientInfo();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewId.php';
  require ($vue);
 }
 
  public static function rdvSelected() {
  $patient_id = $_GET['patient_id'];
  $results = ModelRdv::getOne($patient_id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewSelected.php';
  require ($vue);
 }
 
 public static function rdvDistribution() {
  $patient_id = $_GET['patient_id'];
  $results = ModelRdv::distributionVaccin($patient_id);
  if($results[2]==0){
       // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewId0.php';
  require ($vue);
  }elseif ($results[2]==1) {
         include 'config.php';
  $vue = $root . '/app/view/centre/viewId1.php';
  require ($vue);   
        }elseif ($results[2]==2) {
         include 'config.php';
  $vue = $root . '/app/view/centre/viewId2.php';
  require ($vue);   
        }
 
 }

  public static function rdvVaccin0() {
  $centre_id = $_GET['centre_id'];
  $patient_id = $_GET['patient_id'];
  $results = ModelRdv::distribution0($centre_id,$patient_id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewDistribution0.php';
  require ($vue);
 }
 
  public static function rdvVaccin1() {
  $centre_id = $_GET['centre_id'];
  $patient_id = $_GET['patient_id'];
  $results = ModelRdv::distribution1($centre_id,$patient_id);
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewDistribution0.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


