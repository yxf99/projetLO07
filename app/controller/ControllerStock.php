
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelStock.php';

class Controllerstock {
 // --- Liste des Vaccin
 public static function stockReadAll() {
  $results = ModelStock::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function stockReadId() {
  $results = ModelStock::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewId.php';
  require ($vue);
 }

 // Affiche un Vaccin particulier (id)
 public static function stockReadOne() {
  $stock_id = $_GET['id'];
  $results = ModelStock::getOne($stock_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vaccin
 public static function stockCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau Vaccin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function stockCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelStock::insert(
       htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


