
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
 // --- page d'acceuil
 public static function vaccinAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewVaccinAccueil.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des Vaccin
 public static function vaccinReadAll() {
  $results = ModelVaccin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function vaccinReadId() {
  $results = ModelVaccin::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewId.php';
  require ($vue);
 }

 // Affiche un Vaccin particulier (id)
 public static function vaccinReadOne() {
  $vaccin_id = $_GET['id'];
  $results = ModelVaccin::getOne($vaccin_id_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vaccin
 public static function vaccinCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau Vaccin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function vaccinCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelVaccin::insert(
      htmlspecialchars($_GET['id']), htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vaccin/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


