<?php
require_once("../../Modelo/ConsultaRegion.php");
$consulta = new ConsultaRegion_Models();
$regiones = $consulta->getRegion();
?>