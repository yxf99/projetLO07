<?php

class ControllerCave{
    // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function mesPropositions() {
     include 'config.php';
     $vue = $root . '/public/documentation/mesPropositions.php';
     require ($vue);
 }
}
