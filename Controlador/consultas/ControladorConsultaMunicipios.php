<?php
$municipioo = $_POST["Municipio"];
require_once("../../Modelo/ConsultaMunicipios.php");
$get = new ConsultaMunicipios_Models();
$consultamunicipios = $get->getconsultaMunicipio($municipioo);

