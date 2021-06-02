<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {
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
  public static function stockAttribu() {
     $results = ModelStockAttribu::getAllIdcentre();
     $results1= ModelStockAttribu::getAllIdvaccin();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAttribution.php';
  require ($vue);
 }
 
 public static function stockAttribued() {
    $centreId = ModelStock::getCentreID(htmlspecialchars($_GET['centre_label']));
    $vaccinId = ModelStock::getVaccinID(htmlspecialchars($_GET['vaccin_label']));      
    $results = ModelStock::update(
     $centreId, $vaccinId,htmlspecialchars($_GET['quantite'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAttributioned.php';
  require ($vue);
 }
 
 public static function stockGlobal() {
  $results = ModelStockGlobal::sommeStock();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewGlobal.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVaccin -->


