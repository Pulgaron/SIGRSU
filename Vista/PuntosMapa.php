<?php
 session_start();//Reanudar la sesión en el caso de que haya sido iniciada anteriormente
  	if (!isset($_SESSION["iduser"])){//Si se almaceno algo en la variable super global
  		header("Location:../views/InicioSesion.php");//No hay nada en la variable super global asi que lo redirigimos NO PASAS!
  	} else {
  		$name = require_once("../Controlador/usuarios/my_data.php");
  		$validar = require_once("../Controlador/usuarios/controlador_estado.php");
  		$mandar = strcasecmp($validar, 'A');
  		$mandar1 = strcasecmp($validar, 'U');
  	    if ($mandar) {
  				if ($mandar1) {
  					header("Location:login.html");

          	    }

  	     }

    }  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesión Iniciada</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="../imagenes/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/iconos.css" type="text/css" media="all" />
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<header>
    <div class="contenedor">
        <div class="encabezado">Martes 07 de Mayo de 2019</div>
        <div id="marca">
            <table style="margin-left: 10%">
                <tr>
                    <td >
                        <img width="78.8px" height="100px" style="margin-right: 30px" src="../imagenes/logo.png">
                    </td>
                    <td style="border-left: 1px solid white;">
                        <h3 >Sitios de Disposición Final de Residuos Sólidos Urbanos </h3>
                        <h4 >Sistema de Información Geográfica de Veracruz</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</header>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary nav-tabs">
        <div class="collapse navbar-collapse" id="navbarColor01" >
            <ul class="navbar-nav mr-auto " >
                <li class="nav-item active">
                    <a class="nav-link" href="vistaAdmin.html"><span class="sr-only; icon-home"></span> Mi cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Georreferencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Usuarios.html">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Editar.html">Editar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Eliminar.html">Eliminar</a>
                </li>
            </ul>
        </div>
    </nav>
</div>


<footer>
    <p style="text-align: center">SIG de Sitios de Disposición Final de RSU COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</head>
</body>
</html>