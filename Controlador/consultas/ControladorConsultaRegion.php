<?php
$region = $_POST["Region"];
require_once("../../Modelo/ConsultaRegion.php");
$get = new ConsultaRegion_Models();
$consultaregiones = $get->getconsultaRegion($region);

