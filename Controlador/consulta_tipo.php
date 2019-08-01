<?php
require_once("../../Modelo/ConsultaTipo.php");
$consulta = new ConsultaTipo_Models();
$tipos = $consulta->getTipo();
?>