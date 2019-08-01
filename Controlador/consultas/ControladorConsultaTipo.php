<?php
$tipo = $_POST["Tipo"];
require_once("../../Modelo/ConsultaTipo.php");
$get = new ConsultaTipo_Models();
$consultatipos = $get->getconsultaTipo($tipo);

