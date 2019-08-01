<?php
$latitud = htmlentities(addslashes($_POST["Latitud"]));
$longitud = htmlentities(addslashes($_POST["Longitud"]));
require_once("../../Modelo/puntos.php");
$edit = new Puntos_Models();
$edit_punto = $edit->get_punto($latitud, $longitud);
if($edit_punto){
    foreach ($edit_punto as $punto){
        $id = $punto["idsitios"];
        header("location:../../Vista/Editar2.php?latitud=$latitud&longitud=$longitud&id=$id");   
    }
}
else{
    header("location:../../Vista/Editar.html");  
}
/*if($edit_punto){
    header("location:../../Vista/Editar2.php?latitud=$latitud&longitud=$longitud&id=$id");   
}
else{
    header("location:../../Vista/Editar.html");  
}*/
?>