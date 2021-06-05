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
//   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
//   return $results;
   
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   return array($results);
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
         //0/1/2
   $database = Model::getInstance();
   $query = "select injection from rendezvous where patient_id = :patient_id ";
   $statement = $database->prepare($query);
   $statement->execute([
     'patient_id' => $patient_id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_ASSOC);
   
   //nombre maximum du vaccin 
   
   $query1 = "select doses from vaccin, rendezvous where vaccin.id = rendezvous.vaccin_id and rendezvous.patient_id = :patient_id";
   $statement1 = $database->prepare($query1);
   $statement1->execute([
     'patient_id' => $patient_id
   ]);
   $dosesMax = $statement1->fetchAll(PDO::FETCH_ASSOC);
   
   if($results[0]["injection"] == 0){
        $query = "select distinct id, label from centre, stock where centre.id = stock.centre_id and quantite > 0  ";
        $statement = $database->prepare($query);
        $statement->execute();
        $centrePossible0 = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($centrePossible0,$patient_id,0);
   } elseif ($results[0]["injection"] == $dosesMax[0]["doses"]) {
        $query = "select id, label, doses, centre_id, injection from vaccin, rendezvous where vaccin.id = rendezvous.vaccin_id and rendezvous.patient_id = :patient_id";
        $statement = $database->prepare($query);
        $statement->execute([
            'patient_id' => $patient_id
          ]);
        $listeFinale = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($listeFinale,$patient_id,2);
   } else {// pas suffit
        $query = "select distinct id, label from centre, rendezvous, stock where centre.id = stock.centre_id and rendezvous.vaccin_id = stock.vaccin_id and rendezvous.patient_id = :patient_id and quantite > 0  ";
        $statement = $database->prepare($query);
        $statement->execute([
            'patient_id' => $patient_id
          ]);
        $centrePossible1 = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($centrePossible1,$patient_id,1);
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
            'quantite' => $quantiteMax[0]["max(quantite)"]
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
        $query4 = "update rendezvous set injection = injection + 1 where patient_id = :patient_id ";
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
 
 public static function distribution1($centreChoisi,$patient_id) {
     try {
        $database = Model::getInstance();
        
        //select le vaccin déjà injecté 
        $query = "select distinct id, label from vaccin, rendezvous where vaccin.id = rendezvous.vaccin_id and patient_id = :patient_id  ";
        $statement = $database->prepare($query);
        $statement->execute([
            'patient_id' => $patient_id
          ]);
        $vaccin = $statement->fetchAll(PDO::FETCH_ASSOC);
        
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
}



?>

<!-- ----- fin Modelstock -->