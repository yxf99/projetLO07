<?php

class ControllerVaccination{
    // --- page d'acceuil
 public static function vaccinAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewVaccinAccueil.php';
  if (DEBUG)
   echo ("ControllerVaccin : vaccinAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function mesPropositions() {
     include 'config.php';
     $vue = $root . '/public/documentation/mesPropositions.php';
     require ($vue);
 }
}
