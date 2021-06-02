
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {
 // --- Liste des Vaccin
 public static function patientReadAll() {
  $results = ModelPatient::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  if (DEBUG)
   echo ("ControllerPatient : patientReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function patientReadId($args) {
  if (DEBUG) {
            echo 'ControllerPatient:patientReadId:begin</br>';
        }
        $results = ModelPatient::getAllId();
        $target = $args['target'];
        if (DEBUG) {
            echo ("ControllerPatient：patientReadId : target = $target</br>");
        }
  include 'config.php';
  $vue = $root . '/app/view/patient/viewId.php';
  require ($vue);
 }

 // Affiche un Vaccin particulier (id)
 public static function patientReadOne() {
  $patient_id = $_GET['id'];
  $results = ModelPatient::getOne($patient_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vaccin
 public static function patientCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau Vaccin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function patientCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelPatient::insert(
      htmlspecialchars($_GET['nom']),htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewInserted.php';
  require ($vue);
 }
 
  public static function patientDeleted()
    {
        $patient_id = $_GET['id'];
        // Supprime la valeur
        $results = ModelPatient::delete($patient_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewDeleted.php';
        require($vue);

    }
}
?>
<!-- ----- fin ControllerVaccin -->


