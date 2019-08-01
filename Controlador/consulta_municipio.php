<?php
require_once("../../Modelo/ConsultaMunicipios.php");
$consulta = new ConsultaMunicipios_Models();
$municipios = $consulta->getMunicipio();
?>