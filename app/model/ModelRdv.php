<!-- ----- debut Modelstock -->

<?php
require_once 'Model.php';

class ModelRdv {
 private $centre_id, $patient_id, $injection, $vaccin_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = null) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($centre_id)) {
   $this->centre_id = $centre_id;
   $this->patient_id = $patient_id;
   $this->injection = $injection;
   $this->vaccin_id = $vaccin_id;
  }
 }

 function setCentre_id($centre_id) {
  $this->centre_id = $centre_id;
 }

 function setPatient_id($patient_id) {
  $this->patient_id = $patient_id;
 }

 function setInjection($injection) {
  $this->injection = $injection;
 }
 
  function setVaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }
 function getCentre_id() {
  return $this->centre_id;
 }

 function getPatient_id() {
  return $this->patient_id;
 }

 function getInjection() {
  return $this->injection;
 }
 
 function getVaccin_id() {
 return $this->vaccin_id;
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
 public static function getPatientID($patient_label) {
     try {
   $database = Model::getInstance();
   $query = "select id from patient where label = :label ";
   $statement = $database->prepare($query);
   $statement->execute([
    'label' => $patient_label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
public static function update($centreId, $patientId, $injection, $vaccin_id) {
     try {
        $database = Model::getInstance();
        $query = "select * from stock where patient_id = :patientn_id and centre_id= :centre_id";
        $testExistence = $database->prepare($query);
            $testExistence->execute([
                'patient_id' => $patientId,
                'centre_id' => $centreId,
            ]);
            if ($testExistence->rowCount() == 0) {
                return null;
            } else {
        $query = "update stock set injection = injection + :injection where patient_id = :patient_id and centre_id= :centre_id";
        $statement = $database->prepare($query);
        $statement->execute([
          'patient_id' => $patientId,
          'centre_id' => $centreId,
          'injection' => $injection
        ]);
            return $centreId;}
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}

class ModelRdvGlobal {
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

 
}




?>

<!-- ----- fin Modelstock -->