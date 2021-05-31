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
 
 public static function documentationInnovationl() {
     include 'config.php';
     $vue = $root . '/public/documentation/documentationInnovation1.php';
     require ($vue);
 }
 
 public static function documentationInnovation2() {
     include 'config.php';
     $vue = $root . '/public/documentation/documentationInnovation2.php';
     require ($vue);
 }
 
 public static function documentationInnovation3() {
     include 'config.php';
     $vue = $root . '/public/documentation/documentationInnovation3.php';
     require ($vue);
 }
 
 public static function vueGlobal() {
     include 'config.php';
     $vue = $root . '/public/documentation/vueGlobal.php';
     require ($vue);
 }
}
