<!-- ----- debut Modelstock -->

<?php
require_once 'Model.php';

class ModelStock {
 private $centre_id, $vaccin_id, $quantite;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($centre_id)) {
   $this->centre_id = $centre_id;
   $this->vaccin_id = $vaccin_id;
   $this->quantite = $quantite;

  }
 }

 function setCentre_id($centre_id) {
  $this->centre_id = $centre_id;
 }

 function setVaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }

 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }


 
 function getCentre_id() {
  return $this->centre_id;
 }

 function getVaccin_id() {
  return $this->vaccin_id;
 }

 function getQuantite() {
  return $this->quantite;
 }
 
 
 
 
// retourne une liste des centre_id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select centre_id from stock";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from stock";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($centre_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from stock where centre_id = :centre_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStock");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($vaccin_id, $quantite) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(centre_id) + 1
   $query = "select max(centre_id) from stock";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $centre_id = $tuple['0'];
   $centre_id++;

   // ajout d'un nouveau tuple;
   $query = "insert into stock value (:centre_id, :vaccin_id, :quantite)";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'vaccin_id' => $vaccin_id,
     'quantite' => $quantite
   ]);
   return $centre_id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update() {
  echo ("ModelStock : update() TODO ....");
  return null;
 }

 public static function delete() {
  echo ("ModelStock : delete() TODO ....");
  return null;
 }
 
}

class ModelStockGlobal {
 private $label, $global;

 // pas possible d'avoir 2 constructeurs
 public function __construct($label = NULL, $global = NULL) {
  // valeurs nulles si pas de passage de parametres
     
  if (!is_null($label)) {
   $this->label = $label;
   $this->global = $global;
  }
 }
 function setLable ($label) {
  $this->label = $label;
 }

 function setGlobal($global) {
  $this->global = $global;
 }

 function getLabel() {
  return $this->label;
 }

 function getGlobal() {
  return $this->global;
 }
 

 public static function sommeStock() {
  try {
   $database = Model::getInstance();
   $query = "SELECT centre.label, SUM(quantite) FROM stock,centre WHERE stock.centre_id = centre.id GROUP BY centre_id ORDER BY SUM(quantite) DESC;";
   $statement = $database->prepare($query);
   $statement->execute(); 
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelStockGlobal");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}

?>

<!-- ----- fin Modelstock -->