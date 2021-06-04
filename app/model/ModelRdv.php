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
   $query = "select * from rendezvous";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($patient_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from rendezvous where patient_id = :patient_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'patient_id' => $patient_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getPatientInfo() {
     try {
   $database = Model::getInstance();
   $query = "select id, nom, prenom from patient ";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function distributionVaccin($patient_id) {
     try {
   $database = Model::getInstance();
   $query = "select injection from rendezvous where patient_id = :patient_id ";
   $statement = $database->prepare($query);
   $statement->execute([
     'patient_id' => $patient_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   
   if($results[0]['injection'] == 0){
        $query = "select distinct label from centre, stock where centre.id = stock.centre_id and quantite > 0  ";
        $statement = $database->prepare($query);
        $statement->execute();
        $centrePossible = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($centrePossible,$patient_id);
   } elseif ($results[0]['injection'] == 1) {
       
   } else {
       
   }
  
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function distribution0($centreChoisi,$patient_id) {
     try {
        $database = Model::getInstance();
        
        //select la quantite max dans ce centre choisi
        $query = "select distinct max(quantite) from stock where centre_id = :centre_id  ";
        $statement = $database->prepare($query);
        $statement->execute([
            'centre_id' => $centreChoisi
          ]);
        $quantiteMax = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //select le label du vaccin ayant la quantite max(vue)
        $query2 = "select distinct id, label from vaccin, stock where vaccin.id = stock.vaccin_id and quantite= :quantite  ";
        $statement2 = $database->prepare($query2);
        $statement2->execute([
            'quantite' => $quantiteMax[0]['quantite']
          ]);
        $vaccin = $statement2->fetchAll(PDO::FETCH_ASSOC);
        
        //mettre à jour le vaccin
        $query3 = "update stock set quantite= quantite-1 where centre_id = :centre_id and vaccin_id = :vaccin_id ";
        $statement3 = $database->prepare($query3);
        $statement3->execute([
            'centre_id' => $centreChoisi,
            'vaccin_id'=> $vaccin[0]['id']
          ]);
       
        //mettre à jour le patient
        $query4 = "update rendezvous set injection= injection+1 where patient_id = :patient_id ";
        $statement4 = $database->prepare($query4);
        $statement4->execute([
            'patient_id' => $patient_id,
          ]);
        return $vaccin;
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