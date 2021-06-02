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

public static function getCentreID($centre_label) {
     try {
   $database = Model::getInstance();
   $query = "select id from centre where label = :label";
   $statement = $database->prepare($query);
   $statement->execute([      
    'label' => $centre_label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 public static function getVaccinID($vaccin_label) {
     try {
   $database = Model::getInstance();
   $query = "select id from vaccin where label = :label ";
   $statement = $database->prepare($query);
   $statement->execute([
    'label' => $vaccin_label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
public static function update($centreId, $vaccinId, $quantite) {
     try {
        $database = Model::getInstance();
        $query = "select * from stock where vaccin_id = :vaccin_id and centre_id= :centre_id";
        $testExistence = $database->prepare($query);
            $testExistence->execute([
                'vaccin_id' => $vaccinId,
                'centre_id' => $centreId,
            ]);
            if ($testExistence->rowCount() == 0) {
                return null;
            } else {
        $query = "update stock set quantite = quantite + :quantite where vaccin_id = :vaccin_id and centre_id= :centre_id";
        $statement = $database->prepare($query);
        $statement->execute([
          'vaccin_id' => $vaccinId,
          'centre_id' => $centreId,
          'quantite' => $quantite
        ]);
            return $centreId;}
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
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
   $query = "SELECT centre.label, SUM(quantite) as global FROM centre,stock WHERE stock.centre_id = centre.id GROUP BY label ORDER BY SUM(quantite) DESC;";
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

class ModelStockAttribu {
 private $id, $label;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLable($label) {
  $this->label = $label;
 }

 function getId() {
  return $this->id;
 }

 function getLabel() {
  return $this->label;
 }
 
// retourne une liste des centre_id
 
 public static function getAllIdcentre() {
  try {
   $database = Model::getInstance();
   $query = "select id,label from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 1);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
public static function getAllIdvaccin() {
  try {
   $database = Model::getInstance();
   $query = "select id,label from vaccin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 1);
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

}
?>

<!-- ----- fin Modelstock -->