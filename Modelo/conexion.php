<?php

class Conectar{
  public static function conexion(){
    try{
<<<<<<< HEAD
      $conexion = new PDO('mysql:host=localhost;dbname=bdsigrsu','root', 'Oscarrai96');
=======
      $conexion = new PDO('mysql:host=localhost;dbname=bdsigrsu','root', 'root');
>>>>>>> 3391e3ebbe47869f424fe6fc6d1fd89beb58a786
      $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion -> exec("SET CHARACTER SET UTF8");
    }catch(Exception $e) {
      die("Error: " . $e->getMessage());
      echo "Linea del error " . $e->getLine();
    }
    return $conexion;
  }
}
  ?>
